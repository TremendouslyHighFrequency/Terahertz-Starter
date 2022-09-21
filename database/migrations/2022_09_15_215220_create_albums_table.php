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
            $table->text('catalog_number')->nullable();
            $table->date('release_date')->nullable();
            $table->boolean('free_download')->nullable();
            $table->float('price_fiat');
            $table->float('price_ergo', 24, 10);
            $table->longText('description')->nullable();
            $table->text('promo_link')->nullable();

            // Relationships
            $table->unsignedBigInteger('publisher_id');
            $table->foreign('publisher_id')->references('id')->on('users')->nullable();

            // Files
            $table->text('album_artwork_url')->nullable();
            $table->text('archive_url')->nullable();

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
