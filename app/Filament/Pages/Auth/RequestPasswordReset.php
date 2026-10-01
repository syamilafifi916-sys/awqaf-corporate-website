<?php

namespace App\Filament\Pages\Auth;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Exception;
use Filament\Facades\Filament;
use Filament\Notifications\Auth\ResetPassword as ResetPasswordNotification;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

class RequestPasswordReset extends \Filament\Pages\Auth\PasswordReset\RequestPasswordReset
{
    public function request(): void
    {
        try {
            $this->rateLimit(2);
        } catch (TooManyRequestsException $exception) {
            $this->getRateLimitedNotification($exception)?->send();

            return;
        }

        $data = $this->form->getState();

        $status = Password::broker(Filament::getAuthPasswordBroker())->sendResetLink(
            $data,
            function (CanResetPassword $user, string $token): void {
                if (! method_exists($user, 'notify')) {
                    $userClass = $user::class;

                    throw new Exception("Model [{$userClass}] does not have a [notify()] method.");
                }

                $sendingSeen = false;
                $sentSeen = false;

                $sendingListener = function (MessageSending $event) use (&$sendingSeen): void {
                    $sendingSeen = true;

                    Log::warning('Password reset MessageSending event fired.', [
                        'mailer' => config('mail.default'),
                        'transport' => config('mail.mailers.'.config('mail.default').'.transport'),
                        'smtp_host' => config('mail.mailers.smtp.host'),
                        'smtp_port' => config('mail.mailers.smtp.port'),
                        'smtp_scheme' => config('mail.mailers.smtp.scheme'),
                        'smtp_username_set' => filled(config('mail.mailers.smtp.username')),
                        'smtp_password_set' => filled(config('mail.mailers.smtp.password')),
                    ]);
                };

                $sentListener = function (MessageSent $event) use (&$sentSeen): void {
                    $sentSeen = true;

                    Log::warning('Password reset MessageSent event fired.', [
                        'mailer' => config('mail.default'),
                        'message_id' => $event->sent->getMessageId(),
                    ]);
                };

                Event::listen(MessageSending::class, $sendingListener);
                Event::listen(MessageSent::class, $sentListener);

                try {
                    $notification = new ResetPasswordNotification($token);
                    $notification->url = Filament::getResetPasswordUrl($token, $user);
                    $user->notify($notification);

                    Log::warning('Filament admin password reset notification completed.', [
                        'user_id' => $user->getAuthIdentifier(),
                        'mailer' => config('mail.default'),
                        'message_sending_seen' => $sendingSeen,
                        'message_sent_seen' => $sentSeen,
                    ]);
                } catch (\Throwable $exception) {
                    Log::error('Filament admin password reset mail transport failed.', [
                        'user_id' => $user->getAuthIdentifier(),
                        'mailer' => config('mail.default'),
                        'exception' => $exception::class,
                        'message' => $exception->getMessage(),
                        'message_sending_seen' => $sendingSeen,
                        'message_sent_seen' => $sentSeen,
                    ]);

                    throw $exception;
                } finally {
                    Event::forget(MessageSending::class);
                    Event::forget(MessageSent::class);
                }
            },
        );

        if ($status !== Password::RESET_LINK_SENT) {
            Log::warning('Filament admin password reset request was not sent.', [
                'status' => $status,
            ]);

            Notification::make()
                ->title(__($status))
                ->danger()
                ->send();

            return;
        }

        Notification::make()
            ->title(__($status))
            ->success()
            ->send();

        $this->form->fill();
    }
}
