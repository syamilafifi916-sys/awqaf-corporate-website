<?php
namespace App\Http\Controllers;
use App\Models\WhatsappRecipient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WhatsAppWebhookController extends Controller {
 public function verify(Request $request): Response {
  abort_unless(hash_equals((string)config('services.whatsapp.verify_token'),(string)$request->query('hub_verify_token')),403);
  abort_unless($request->query('hub_mode')==='subscribe',403);
  return response((string)$request->query('hub_challenge'),200)->header('Content-Type','text/plain');
 }
 public function receive(Request $request): Response {
  $secret=(string)config('services.whatsapp.app_secret'); abort_if($secret==='',503);
  $signature=(string)$request->header('X-Hub-Signature-256');
  $expected='sha256='.hash_hmac('sha256',$request->getContent(),$secret);
  abort_unless(hash_equals($expected,$signature),403);
  foreach((array)data_get($request->json()->all(),'entry',[]) as $entry)
   foreach((array)data_get($entry,'changes',[]) as $change)
    foreach((array)data_get($change,'value.statuses',[]) as $status) $this->applyStatus($status);
  return response('EVENT_RECEIVED',200);
 }
 private function applyStatus(array $payload): void {
  $id=$payload['id']??null; $status=$payload['status']??null;
  if(!$id || !in_array($status,['sent','delivered','read','failed'],true)) return;
  $recipient=WhatsappRecipient::where('provider_message_id',$id)->first(); if(!$recipient) return;
  $updates=['status'=>$status];
  if($status==='sent' && !$recipient->sent_at) $updates['sent_at']=now();
  if($status==='delivered' && !$recipient->delivered_at){$updates['delivered_at']=now();$recipient->campaign()->increment('delivered_count');}
  if($status==='read' && !$recipient->read_at){$updates['read_at']=now();$recipient->campaign()->increment('read_count');}
  if($status==='failed' && $recipient->status!=='failed'){$updates['failure_reason']=data_get($payload,'errors.0.title','Provider reported failure');$recipient->campaign()->increment('failed_count');}
  $recipient->update($updates); $this->completeIfDone($recipient->campaign()->first());
 }
 private function completeIfDone($campaign): void {
  if($campaign && $campaign->status==='sending' && !$campaign->recipients()->whereIn('status',['queued','sent'])->exists())
   $campaign->update(['status'=>'completed','completed_at'=>now()]);
 }
};