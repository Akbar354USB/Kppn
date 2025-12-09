<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('email_logs', function (Blueprint $table) {
            $table->id();
            $table->string('recipient_email');        // email yg dikirim
            $table->enum('type', ['datang', 'pulang']); // jenis reminder
            $table->enum('status', ['sent', 'failed']); // status kirim
            $table->text('error_message')->nullable();  // pesan error jika gagal
            $table->timestamp('sent_at');               // waktu kirim
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_logs');
    }
};
