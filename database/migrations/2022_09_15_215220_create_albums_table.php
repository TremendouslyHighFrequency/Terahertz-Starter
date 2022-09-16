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
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // Basics
            $table->text('title');
            $table->text('slug');
            $table->text('catalog_number');
            $table->date('release_date');
            $table->boolean('free_download');
            $table->float('price_fiat');
            $table->float('price_ergo');

            // Relationships
            $table->unsignedBigInteger('artist_id');
            $table->foreign('artist_id')->references('id')->on('users');

            // Files
            $table->text('album_artwork_url');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
};
