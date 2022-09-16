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
            $table->boolean('explicit');
            $table->text('summary');
            $table->text('description');
            $table->longText('lyrics');
            $table->date('release_date');
            $table->float('price_fiat');
            $table->float('price_ergo');
            $table->boolean('itunes_block');
            $table->boolean('google_block');

            // Files
            $table->text('artwork_url');
            $table->text('audio_file_url');
            $table->text('high_resolution_file_url');
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
