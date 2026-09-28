<?php
namespace App\Services\WhatsApp;
use App\Models\WhatsappCampaign;
use App\Models\WhatsappRecipient;
use App\Models\WhatsappSuppression;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class RecipientImporter {
 public function __construct(private PhoneNormalizer $normalizer) {}
 /** CSV headers: name,phone. Returns import counters. */
 public function import(WhatsappCampaign $campaign,string $path): array {
  $handle=fopen($path,'r'); if(!$handle) throw new RuntimeException('Unable to open CSV.');
  $headers=array_map(fn($v)=>strtolower(trim((string)$v)),fgetcsv($handle) ?: []);
  $nameIndex=array_search('name',$headers,true); $phoneIndex=array_search('phone',$headers,true);
  if($phoneIndex===false){fclose($handle);throw new RuntimeException('CSV must contain a phone column.');}
  $stats=['imported'=>0,'duplicate'=>0,'suppressed'=>0,'invalid'=>0];
  DB::transaction(function() use($campaign,$handle,$nameIndex,$phoneIndex,&$stats){
   while(($row=fgetcsv($handle))!==false){
    try{$phone=$this->normalizer->malaysia((string)($row[$phoneIndex]??''));}catch(\Throwable){$stats['invalid']++;continue;}
    if(WhatsappSuppression::where('phone',$phone)->exists()){$stats['suppressed']++;continue;}
    $exists=WhatsappRecipient::where('campaign_id',$campaign->id)->where('phone',$phone)->exists();
    if($exists){$stats['duplicate']++;continue;}
    WhatsappRecipient::create(['campaign_id'=>$campaign->id,'name'=>$nameIndex===false?null:trim((string)($row[$nameIndex]??'')),'phone'=>$phone,'status'=>'queued']);
    $stats['imported']++;
   }
   $campaign->update(['recipient_count'=>$campaign->recipients()->count()]);
  });
  fclose($handle); return $stats;
 }
};