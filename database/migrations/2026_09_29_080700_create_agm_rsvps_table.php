<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('agm_rsvps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('ic_number');
            $table->string('attendance', 20);
            $table->timestamps();
            $table->index('attendance');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agm_rsvps');
    }
};
