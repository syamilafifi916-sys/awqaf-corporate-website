<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class WhatsappSuppression extends Model {
 protected $fillable=['phone','reason','suppressed_at'];
 protected function casts(): array { return ['suppressed_at'=>'datetime']; }
};