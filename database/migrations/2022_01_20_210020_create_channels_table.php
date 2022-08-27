<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->index()->nullable();
            $table->string('name');
            $table->string('slug');
            $table->integer('visitors')->default(0);
            $table->text('link_one_quality_one');
            $table->text('link_one_quality_two');
            $table->text('link_one_quality_three');
            $table->text('link_two_quality_one')->nullable();
            $table->text('link_two_quality_two')->nullable();
            $table->text('link_two_quality_three')->nullable();
            $table->text('link_three_quality_one')->nullable();
            $table->text('link_three_quality_two')->nullable();
            $table->text('link_three_quality_three')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('channels');
    }
}
