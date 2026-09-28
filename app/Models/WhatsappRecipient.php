<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class WhatsappRecipient extends Model {
 protected $fillable=['campaign_id','name','phone','status','provider_message_id','failure_reason','sent_at','delivered_at','read_at'];
 protected function casts(): array { return ['sent_at'=>'datetime','delivered_at'=>'datetime','read_at'=>'datetime']; }
 public function campaign(): BelongsTo { return $this->belongsTo(WhatsappCampaign::class,'campaign_id'); }
};