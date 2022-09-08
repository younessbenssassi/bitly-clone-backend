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
                "slug" => Str::slug('Bein Sport News'),
                "visitors" => 1000,
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEj_LZpSQLRWgaZS3aYOn4WpeAPI9Lb_omN2xVmuzU4nMq42Zu7FxAjANltcLZKp-Ra9zuZ94Qrf9epRNoRkdPaQsQmlNgWPyk0jwguR0eo2xT_9by3U33sDufircJlLSPr8Q1R9EH69hoRV7bbzn0CfQsQ9WG8a7NbyaSPF05oJZF4FKikm-kqwC_18/s1600/beinNews.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiw3rlEWQLxX_2vTh344cAqSJFqDKdsuBxgN0uROZrK3yvWNaFxXlY-s1EQ8KleTzv3lLUPQO4FTwYQha02XrDOsCyVmpYeY1lUXdvP6WvL0m545jIDr99tM9MpUYt7plPMoQ1cH8N9D_JoiOFsBq9EeH9iwJRVtFwQzVsA5Go_-s8Z5udtcJ-6kCHz/s1600/hd1.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgRPYtJHg0dvTiDlYciP2lvtW0flRjJSviwjXAqBfRxrd3uUGjs6g0T37fbgS3oueOFAfryCuTW_v34ITOiUEDFt5zJgfVPYNCVlFzgKBHPoFRGkFywq9MzS6jcqfKsva9Z6Fqh55A-201fJZCl82lMQfO7B-22PAHTDqzwMG9r-zpRQ-NJtFrac5EJ/s1600/hd2.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhq4ckmXeZbgVPK1qFT216VwifMPKljvxo7ZFw8rhQ9uqzdHD28HtOJM_mKdYAcVcQVmPQrFbKhyPVME2dSgJeR78SYejNbo5AcLOAo8zKYuhGknVQSHaie7PnN9wyebBzz_T8BnaHUS4SFNz41TSZyN2tf1aWCq8jyUPsEE1m_fvVkqh4E1UXgoz1_/s1600/hd3.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhuczDDksG8rjTgOUvk3loSays6SaTDt98a_7qIzpszLou-Lkm6HDS4JjV-pzRhRufYcUc1CRiVLHRaYYVuBGNQP5XTBmFPCdtQffQxwEBHx6nujcdeKHm_Nw6vxT4Xx5F0DG6Tw6bwxTThecw6LopV2_MAEhNayJ50IAJuYdhDhyWDPJVANmBiLxFr/s1600/hd4.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgpTXqiSt2bbAXbU3yLcjidhsjHwW9CqlZUntzO4hPJffvGiFduwNWHBJKWn_IUxOqFRe84-i7TOK9uAOjoCZ66JrTFxLiQvjPsv7DSobn7tQv3hPvwF_I_MS_nFYrwKZ7cEoEg-Jk1gWUnqqcIK5QcnQUu8V0uusV0bp3VMmckGMYjXdF7x1IYhEdO/s1600/hd5.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjIXJHttRKNmnsa1MLVxNNRQqnSJZVW63qjaktt27I1w1hbQciBeprkh5Ez1NSmD6Wadj0qTRNqvifXgVUf0TUBcK7u9-ooMAMYgKLT-PXM2MEx4UVKXhmtacEuTpo2l0BUWd5xz8Y1TEWwrvcVHglkDBozRW2moF340zOLBQRbRx5kB9XvtB6tpdIq/s1600/hd6.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiylfr700iUyssU0GPhXpPv8kUyFqcGt-sWpPxjAd4UPJ5c6_Q_Ao-Cpf0H_1N71xH9V171K3Q9PawI30e2vUCLjYy-gPUyDq9FQDwOAgr8ggmooMSAs0KSUHzSoDv5hf5qwFlKhNywHXrSt4P05VK_3H0I6cGVtISwPAexu0bu17hvJu0iV4v-01ZP/s1600/hd7.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh_PfpA8K7qj7GAgptiWoRkmU9hGBaEN93-oyR8Y4UNJvtUz7vfan27qgngAEuyHzUHA9tf4DiIbezrrRxBw1TCKyzxCXEkjEcPKxj2X6PueDDA_798UczKX0Q_05kMsozyrTsPQH03bDoupPg-AaEpPwkfy9UDxBRMZXjJPefXrVBNwyvS47mW5xlo/s1600/hdp1.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiLOexvIHOu_Hf4t4c_ZBbzhOaDnty30QiTcJHATUwhTbCYB45WWOViLd9wvj5WmIEZQRHjTh0RPQ4uWWggMZxFOt53s3JlwrHf1SC5714XYqE_yufGSw03YUtIpmKnvKpe2iLDvMqs2ZIaWh9_jHtwk0v7Zjvf0uaxWBB1FejZoRDlx5wm20xE-hEY/s1600/hdp2.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhv1cGt39iI2o5asBSPCtGwhF3GsnPlX6DwGpy-gS3sFu_74GURgRxgXDf8P3UuNDiyikKBSMYUqv_CBrymN-5ciQFcTLbeqAAo93Y5-v0v_k18N_ZIeKbSQGymq9XHEnGSJs1oe0-Pk5da3a1mgUd4Pui7fUS4ITdbmc9XQLes5-0EtN2x_G2sm7U7/s320/hdp3.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhXO_BB7sBt7B0fZBVG3gTKmeFTwp_V6R6ZIquBfbSK6j1gcvWJoHB1qODEUZOBsGo0mHcZFy1m5gxmWGSgK0kX5tbr6zpYBdJp7pvOydhr08sEUWFYutHTkYYGMkP2Z72J1I0UBusIIg8ZJoMrWv9GRJpLs2kTUgY2doithOOOGQfISgkdSP3vyUwC/s1600/hda.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi7YJHFvJ1dKsghWFIwhirr2977PVJHevR3CpM_vhKFGedyn5JQzXZNB1pG2ZBK1kadiEsR_2SPXQAlAMH87l8fwDier8ne55PN-qSkEoAwT94shdiNTj9KQP5ntU5b_UKCzPcAJ9U2Ce9HAPEEl8DN3wxeF2GOjstoj9fARSf_oySvpapn-EPG5Lre/s1600/hda1.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi0k_dqtssQJY3U-2mlh4f_k8QLophAniZaj1NLzAPM4FmnhHFJP7LNzW4xeijjx9bbO-hB_X6hU0KwR1VwqB_WGsrviPSvpXwSAMplPY7MrtxyihULGmg_tNpPV3HvzBVKQ_6kIX3nJ5-TEWo4lFtFge1_ZTkEek_nj9z8eL80zmEJuW8rBogziQtX/s1600/hda2.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEinrQAKM_indaSTeh5OZ6O3AyCyzQlqPGIBY3ulYc57STl9z_E4ElFD_dfBCHYM2WJadZ46spUurW9IDmiT6s2Lj5RU5NdGtTnSvPQIOZ5Nw-CNUP71b__2R5H7j5_N3YpbyWLD9aGW2T1whIdkH16bHmcQ1JQEolgMOBNXj9wdObNetDlKsUJwWLx6/s1600/hda3.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgSgPNn2c6rMRyqIwZU4WOCjYLRrXeNiaWwuEYNpCrbU2GQx8ffDkl8eIG0PfiD3o8M21_RmjCF1j6inhofoBNPEZ2EE_ihvTNb2ZEh4PPtibWjQmDPBNGAibR30-RBS_vT2jPcfLQwuAB73YNlOjRosrU19s1ZN6AjZruZ519YxlIASGmfjHkIm5UU/s1600/hde1.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhvtIusjXkp89dZLDDC4Os9FcnU9H1KKxayhDKH8YSiVenpCYokOU9R-C_szae3dD8rMzwzAG1nvE2ytPvd0cP7vK9EWSBU0y79ozF8fGUrQmLf7pKZudWLccc9KSpriPFrkxnQPNhJjHnafQgJ5kYgWbAn5l3ia1o0tZGWyKPFugp_rwxKQI0NGM2h/s1600/hde2.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhe5tRuYZ9xCmOgmICUvssaDhar3Ur_EOToC3dhtE2xFOH1UlZ-hZ6psZbhvNfziBJPVF9YRtqHcL7S-rYMMcDZtKDzMD81VEb7io6n-vJ6zbmjwbtujUceT_H3Dgn4sNC79stpJHaNhpmq85EUOzV9gV0dJ_tU-LYKmV3m7IagrrfwECdCeYPJqXqn/s1600/hde3.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiYLrrFlV6qAqvNquENECot-1F_BPyjO0MGMiv-pTSwhHcUKBzuib6Ti-DoorFFBSkRfSPuS6sGrNDYNTIeAJvIf8LsEv34z6gLP7EJFiqFsOuPFEdtlUoIV0a1Oawv2s4e8-GehKriFQEDeLbGXKZSjQZkv_geQwaH9oxrJyeXiA2EnP6wY84Xn73N/s1600/hdf1.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiiFMNuw3EZeQlvPbl2AqE5eFSmVf7pYZEqYd4UzqSjc5QVyh2JV_dn-swSgyD-vLVKst6qmH-YEofexLuoR2XHtbUGjNliZkSWM2wAS0H1razd-yzw-CnKZwC2gQSGjVjegE5kCLlgs3safD7fuM6RQj2XsWIozki4oiItov1FdM5KtTbtPKCijxO0/s1600/hdf2.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgH3kcjqHdG4Am0RquK8M3k5MmnFQPJjpSdFpk6EqxMRFwWCG3LYNENrAIya1GRYyscl_I37YdGiSBhEn0HwMphNWSFLL3XHTs2fHEEKDeWo2jPcRZ7DtL8-CgedYUBVpXm87pq1LwQmEes2IxnQxPCVjpLaqqonelTSX2napfir-L1dBlNY-HjFtPd/s1600/hdf3.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEigyCpcqaJyklKzdo25DZULFDcECuQzIMAZQo3hITjcXYHMOP8b4HGS3ANE_hVIVEm8RKrEGlVJy22WWM7sMq08ym7AvCO4rk9Yp2WXP_Mq5X914afndTzzYZX_CjEy-Jm_FqumlbXqHB7HrSvzASFLO9u9M2aGcC8e78EbXAzXvI-CT_h_FLshVyO7/s320/hdx1.png",
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh7tyMtYOakHGxwJWDNtxSsybNRircx8fbJvVca01fM9KicOCFfDdco2oJ2-_IbpeLAuLVjeb9ap4b1fTB1evYBe9cIlJH0oCDmKEoNhL8MG8XVmgJBGYg1znLJ9N0KTTKOA66Vhx0JuoWf33r7bnKG3aKRIlW0qw1g_1bJ7d7DtGB7IlPOVd3bbgmQ/s320/hdx2.png",
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
