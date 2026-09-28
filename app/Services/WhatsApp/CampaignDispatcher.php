<?php
namespace App\Services\WhatsApp;
use App\Jobs\SendWhatsappRecipient;
use App\Models\WhatsappCampaign;
use RuntimeException;
class CampaignDispatcher {
 public function dispatch(WhatsappCampaign $campaign): void {
  if($campaign->status!=='queued') throw new RuntimeException('Campaign must be queued before dispatch.');
  if(!$campaign->template_name) throw new RuntimeException('Approved template name is required.');
  $campaign->update(['status'=>'sending','started_at'=>now()]);
  $campaign->recipients()->where('status','queued')->orderBy('id')->pluck('id')->each(fn($id)=>SendWhatsappRecipient::dispatch($id));
 }
};