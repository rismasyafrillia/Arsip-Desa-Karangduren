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
            Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat', 100);
            $table->foreignId('category_id')->constrained('categories')->onDelete('restrict');
            $table->string('title', 255);
            $table->string('file_name', 255);
            $table->string('original_file_name', 255);
            $table->dateTime('uploaded_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archives');
    }
};
