<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            // Basics
            $table->string('title');
            $table->text('slug');
            $table->string('track_type');
            $table->boolean('explicit')->nullable();
            $table->text('summary')->nullable();
            $table->text('description')->nullable();
            $table->longText('lyrics');
            $table->date('release_date')->nullable();
            $table->float('price_fiat');
            $table->float('price_ergo');
            $table->boolean('itunes_block')->nullable();
            $table->boolean('google_block')->nullable();

            // Files
            $table->text('artwork_url')->nullable();
            $table->text('audio_file_url')->nullable();
            $table->text('high_resolution_file_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracks');
    }
};
