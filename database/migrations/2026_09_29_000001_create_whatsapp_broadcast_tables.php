<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {
  Schema::create('whatsapp_campaigns', function (Blueprint $t) {
   $t->id(); $t->string('name'); $t->string('template_name')->nullable(); $t->text('message_preview')->nullable();
   $t->string('status')->default('draft')->index(); $t->unsignedInteger('recipient_count')->default(0);
   $t->unsignedInteger('sent_count')->default(0); $t->unsignedInteger('delivered_count')->default(0);
   $t->unsignedInteger('read_count')->default(0); $t->unsignedInteger('failed_count')->default(0);
   $t->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete(); $t->timestamp('scheduled_at')->nullable();
   $t->timestamp('started_at')->nullable(); $t->timestamp('completed_at')->nullable(); $t->timestamps();
  });
  Schema::create('whatsapp_recipients', function (Blueprint $t) {
   $t->id(); $t->foreignId('campaign_id')->constrained('whatsapp_campaigns')->cascadeOnDelete();
   $t->string('name')->nullable(); $t->string('phone',32); $t->string('status')->default('queued')->index();
   $t->string('provider_message_id')->nullable()->index(); $t->text('failure_reason')->nullable();
   $t->timestamp('sent_at')->nullable(); $t->timestamp('delivered_at')->nullable(); $t->timestamp('read_at')->nullable(); $t->timestamps();
   $t->unique(['campaign_id','phone']);
  });
  Schema::create('whatsapp_suppressions', function (Blueprint $t) {
   $t->id(); $t->string('phone',32)->unique(); $t->string('reason')->nullable(); $t->timestamp('suppressed_at'); $t->timestamps();
  });
 }
 public function down(): void { Schema::dropIfExists('whatsapp_suppressions'); Schema::dropIfExists('whatsapp_recipients'); Schema::dropIfExists('whatsapp_campaigns'); }
};