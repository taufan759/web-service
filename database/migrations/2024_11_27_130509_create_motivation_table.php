<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('motivation', function (Blueprint $table) {
            $table->id();
            $table->string('content'); // Isi motivasi
            $table->unsignedBigInteger('user_id'); // ID user penulis motivasi
            $table->enum('visibility', ['private', 'public'])->default('private'); // Kolom visibilitas
            $table->timestamps();
            // Foreign key ke tabel user
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('motivation');
    }
};
