<?php
namespace App\Jobs;
use App\Contracts\WhatsAppProvider;
use App\Models\WhatsappRecipient;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
class SendWhatsappRecipient implements ShouldQueue {
 use Queueable;
 public int $tries=3; public array $backoff=[60,300,900];
 public function __construct(public int $recipientId) {}
 public function handle(WhatsAppProvider $provider): void {
  $recipient=WhatsappRecipient::with('campaign')->findOrFail($this->recipientId);
  if($recipient->status!=='queued' || $recipient->provider_message_id) return;
  if($recipient->campaign->status!=='sending') return;
  try {
   $result=$provider->sendTemplate($recipient->phone,(string)$recipient->campaign->template_name);
   $recipient->update(['status'=>'sent','provider_message_id'=>$result['provider_message_id'],'sent_at'=>now(),'failure_reason'=>null]);
   $recipient->campaign()->increment('sent_count');
  } catch(\Throwable $e) {
   if($this->attempts()>=$this->tries){$recipient->update(['status'=>'failed','failure_reason'=>mb_substr($e->getMessage(),0,1000)]);$recipient->campaign()->increment('failed_count');}
   throw $e;
  }
 }
};