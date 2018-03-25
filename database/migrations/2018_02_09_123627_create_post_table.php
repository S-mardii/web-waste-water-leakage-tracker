<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("poster_id")->default(0);
            $table->string("description");
            $table->string("image_url");
            $table->unsignedInteger("area_id");
            $table->string("lat");
            $table->string("lng");
            $table->unsignedInteger("status_id")->default(2);
            $table->unsignedInteger("show")->default(0);
            $table->unsignedInteger("condition_id");
            $table->timestamps();

            $table->foreign('area_id')
                ->references('id')->on('areas');
            $table->foreign('status_id')
                ->references('id')->on('status');
            $table->foreign('condition_id')
                ->references('id')->on('conditions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
