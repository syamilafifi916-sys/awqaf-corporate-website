<?php
namespace App\Services\WhatsApp;
use App\Contracts\WhatsAppProvider;
use App\Models\WhatsappCampaign;
use RuntimeException;
class TestSender {
 public function __construct(private WhatsAppProvider $provider,private PhoneNormalizer $normalizer) {}
 public function send(WhatsappCampaign $campaign,string $phone): array {
  if(!config('services.whatsapp.enabled',false)) throw new RuntimeException('WhatsApp provider is disabled.');
  if(!in_array($campaign->status,['draft','ready'],true)) throw new RuntimeException('Test send is only allowed before queue approval.');
  if(!$campaign->template_name) throw new RuntimeException('Approved template name is required.');
  $result=$this->provider->sendTemplate($this->normalizer->malaysia($phone),(string)$campaign->template_name);
  $campaign->update(['test_sent_at'=>now()]);
  return $result;
 }
};