<?php

use App\Models\Category;
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

        Schema::create('user_channels', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->integer('channel_id')->index();
        });


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

        $categories = Category::select('id','slug')->get();
        $categoriesSlug = [];
        foreach ($categories as $category){
            $categoriesSlug[$category->slug] = $category->id;
        }
        $beinSportId = $categoriesSlug[Str::slug('Bein sports')];
        $channels = [
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports HD News",
                "slug" => Str::slug('Bein Sport HD News'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=75&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports HD ",
                "slug" => Str::slug('Bein Sport HD'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=74&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports 1 HD",
                "slug" => Str::slug('beIN Sports 1 HD'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=67&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports 2 HD",
                "slug" => Str::slug('beIN Sports 2 HD'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=70&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports 3 HD",
                "slug" => Str::slug('beIN Sports 3 HD'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=68&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports 4 HD",
                "slug" => Str::slug('beIN Sports 4 HD'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=69&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports 5 HD",
                "slug" => Str::slug('beIN Sports 5 HD'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=73&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports 6 HD",
                "slug" => Str::slug('beIN Sports 6 HD'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=71&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports 7 HD",
                "slug" => Str::slug('beIN Sports 7 HD'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=58&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports 1 HD Premium",
                "slug" => Str::slug('beIN Sports 1 HD Premium'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=65&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports 2 HD Premium",
                "slug" => Str::slug('beIN Sports 2 HD Premium'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=66&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports 3 HD Premium",
                "slug" => Str::slug('beIN Sports 3 HD Premium'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=72&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports AFC HD",
                "slug" => Str::slug('beIN Sports AFC HD'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=228&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports AFC 1 HD",
                "slug" => Str::slug('beIN Sports AFC 1 HD'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=229&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports AFC 2 HD",
                "slug" => Str::slug('beIN Sports AFC 2 HD'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=230&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports AFC 3 HD",
                "slug" => Str::slug('beIN Sports AFC 3 HD'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=231&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports HD 1 English",
                "slug" => Str::slug('beIN Sports HD 1 English'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=59&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports HD 2 English",
                "slug" => Str::slug('beIN Sports HD 2 English'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=60&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports HD 3 English",
                "slug" => Str::slug('beIN Sports HD 3 English'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=61&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports HD 1 French",
                "slug" => Str::slug('beIN Sports HD 1 French'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=62&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports HD 2 French",
                "slug" => Str::slug('beIN Sports HD 2 French'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=63&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports HD 3 French",
                "slug" => Str::slug('beIN Sports HD 3 French'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=64&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],

            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports HD 1 EXTRA",
                "slug" => Str::slug('beIN Sports HD 1 EXTRA'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=103&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],
            [
                "category_id" => $beinSportId,
                "name" => "beIN Sports HD 2 EXTRA",
                "slug" => Str::slug('beIN Sports HD 2 EXTRA'),
                "visitors" => 1000,
                "image" => "https://proxies.bein-mena-production.eu-west-2.tuc.red/proxy/imgdata?objectId=104&type=100&format_w=125&format_h=125&ratio=1&languageId=ara",
                "link_one_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_one_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_two_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_one" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_two" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
                "link_three_quality_three" => 'https://live-hls-web-aja.getaj.net/AJA/index.m3u8',
            ],


        ];

        foreach ($channels as $channel){
            $newChannel = new Channel();
            $newChannel->category_id = $channel['category_id'];
            $newChannel->name = $channel['name'];
            $newChannel->slug = $channel['slug'];
            $newChannel->visitors = $channel['visitors'];
            $newChannel->image = $channel['image'];
            $newChannel->link_one_quality_one = $channel['link_one_quality_one'];
            $newChannel->link_one_quality_two = $channel['link_one_quality_two'];
            $newChannel->link_one_quality_three = $channel['link_one_quality_three'];
            $newChannel->link_two_quality_one = $channel['link_two_quality_one'];
            $newChannel->link_two_quality_two = $channel['link_two_quality_two'];
            $newChannel->link_two_quality_three = $channel['link_two_quality_three'];
            $newChannel->link_three_quality_one = $channel['link_three_quality_one'];
            $newChannel->link_three_quality_two = $channel['link_three_quality_two'];
            $newChannel->link_three_quality_three = $channel['link_three_quality_three'];
            $newChannel->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_channels');
        Schema::dropIfExists('channels');
    }
}
