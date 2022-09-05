<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\Channel;
use Illuminate\Support\Str;

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
        /*
        $channels = [
            [
                "category_id" => 1,
                "name_en" => "Bein Sports",
                "name_ar" => "بي ان سبورت",
                "slug" => Str::slug('Bein sports'),
                "visitors" => 1000,
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgX6lZZsVKZDgCHfRGU_AqhRT5eXrOqbLNyH1HTbyXoPz50rUEcwMDo-d-m6tmof2Funn7vqS5T7s2GXHHKVRqYB-XOgTNoC1AMLxPyJYyDkHtb6iiNAO1HMC_CZhsFgetj4eRzrQBYCo9JnB4kzH4sk6trRijeX4lJMb_Ja4Qqt6GaXug28bIZln6m/s1600/1410716-BEIN.webp",
            ],

        ];

        foreach ($channels as $channel){
            $newCategory = new Channel();
            $newCategory->type_id = $channel['type_id'];
            $newCategory->name_en = $channel['name_en'];
            $newCategory->name_ar = $channel['name_ar'];
            $newCategory->slug = $channel['slug'];
            $newCategory->visitors = $channel['visitors'];
            $newCategory->image = $channel['image'];
            $newCategory->save();
        }
        */
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
