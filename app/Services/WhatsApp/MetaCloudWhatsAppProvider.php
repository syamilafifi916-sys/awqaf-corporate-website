<?php
namespace App\Services\WhatsApp;
use App\Contracts\WhatsAppProvider;
use Illuminate\Support\Facades\Http;
use RuntimeException;
class MetaCloudWhatsAppProvider implements WhatsAppProvider {
 public function sendTemplate(string $phone,string $template,array $parameters=[]): array {
  $token=config('services.whatsapp.token'); $phoneId=config('services.whatsapp.phone_number_id');
  if(!$token || !$phoneId) throw new RuntimeException('WhatsApp provider credentials are not configured.');
  $components=$parameters ? [['type'=>'body','parameters'=>array_map(fn($v)=>['type'=>'text','text'=>(string)$v],$parameters)]] : [];
  $response=Http::withToken($token)->timeout(15)->post('https://graph.facebook.com/'.config('services.whatsapp.graph_version','v23.0')."/{$phoneId}/messages",[
   'messaging_product'=>'whatsapp','to'=>$phone,'type'=>'template','template'=>['name'=>$template,'language'=>['code'=>config('services.whatsapp.language','ms')],'components'=>$components],
  ]);
  $response->throw(); $id=data_get($response->json(),'messages.0.id');
  if(!$id) throw new RuntimeException('Provider did not return a message id.');
  return ['provider_message_id'=>$id];
 }
};