<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('track_id');
            $table->string('track_name');
            $table->string('artist_name');
            $table->string('artwork_url100');
            $table->string('artistViewUrl');
            $table->string('collectionName')->nullable();
            $table->string('collectionViewUrl')->nullable();
            $table->string('trackViewUrl');
            $table->string('previewUrl');
            $table->string('kasi')->nullable();
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
