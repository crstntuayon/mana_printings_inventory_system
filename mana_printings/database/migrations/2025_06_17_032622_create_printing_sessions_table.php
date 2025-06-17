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
        Schema::create('printing_sessions', function (Blueprint $table) {
    $table->id();
    $table->string('customer_name');
    $table->text('job_description');
    $table->integer('quantity');
    $table->string('printer_used');
    $table->timestamp('printed_at');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('printing_sessions');
    }
};
