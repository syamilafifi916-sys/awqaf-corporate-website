<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class WhatsappCampaign extends Model {
 protected $fillable=['name','template_name','message_preview','status','recipient_count','sent_count','delivered_count','read_count','failed_count','created_by','scheduled_at','started_at','completed_at'];
 protected function casts(): array { return ['scheduled_at'=>'datetime','started_at'=>'datetime','completed_at'=>'datetime']; }
 public function recipients(): HasMany { return $this->hasMany(WhatsappRecipient::class,'campaign_id'); }
};