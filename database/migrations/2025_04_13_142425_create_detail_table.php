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
        Schema::create('detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('album_id');
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
            $table->text('description_it')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ru')->nullable();
            $table->string('owner_image')->nullable();
            $table->string('owner_image_fhd')->nullable();
            $table->string('location_image')->nullable();
            $table->string('location_image_fhd')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail');
    }
};
