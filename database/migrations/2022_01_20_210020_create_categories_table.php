<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\Category;
use Illuminate\Support\Str;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id')->index()->nullable();
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('slug');
            $table->integer('visitors')->default(0);
            $table->text('image')->nullable();
            $table->timestamps();
        });

        $categories = [
            [
                "type_id" => 1,
                "name_en" => "Bein Sports",
                "name_ar" => "بي ان سبورت",
                "slug" => Str::slug('Bein sports'),
                "visitors" => 1000,
                "image" => "https://i.postimg.cc/52fYt3Fh/1410716-BEIN.webp",
            ],
            [
                "type_id" => 1,
                "name_en" => "AD Sports",
                "name_ar" => "ابوظبي الرياضية",
                "slug" => Str::slug('AD Sports'),
                "visitors" => 900,
                "image" => "https://i.postimg.cc/JnRHs5gD/ad.jpg",
            ],
            [
                "type_id" => 1,
                "name_en" => "Dubai Sports",
                "name_ar" => "دبي الرياضية",
                "slug" => Str::slug('Dubai Sports'),
                "visitors" => 800,
                "image" => "https://i.postimg.cc/xTXJNCsR/dubai.png",
            ],
            [
                "type_id" => 1,
                "name_en" => "Fox Sports",
                "name_ar" => "فوكس الرياضية",
                "slug" => Str::slug('Fox Sports'),
                "visitors" => 700,
                "image" => "https://i.postimg.cc/zXHvXQB2/FSOval-w-Background-1040x585.gif",
            ],

            [
                "type_id" => 2,
                "name_en" => "Netflix",
                "name_ar" => "نيتفلكس",
                "slug" => Str::slug('Netflix'),
                "visitors" => 1000,
                "image" => "https://i.postimg.cc/K8gMwzBz/05c-It-XL96l4-LE9n02-Wf-DR0h-5.webp",
            ],
            [
                "type_id" => 3,
                "name_en" => "HBO",
                "name_ar" => "اتش بي او",
                "slug" => Str::slug('HBO'),
                "visitors" => 900,
                "image" => "https://i.postimg.cc/wvbx95dd/hbo-max-logo.webp",
            ],
            [
                "type_id" => 3,
                "name_en" => "Fox movies",
                "name_ar" => "فوكس للأفلام",
                "slug" => Str::slug('Fox movies'),
                "visitors" => 980,
                "image" => "https://i.postimg.cc/ydfxk4ct/fox-m.png",
            ],
            [
                "type_id" => 3,
                "name_en" => "MBC",
                "name_ar" => "ام بي سي",
                "slug" => Str::slug('MBC'),
                "visitors" => 970,
                "image" => "https://i.postimg.cc/B61ZQLZL/mbc.jpg",
            ],
            [
                "type_id" => 3,
                "name_en" => "Indian movies",
                "name_ar" => "الأفلام الهندية",
                "slug" => Str::slug('Indian movies'),
                "visitors" => 900,
                "image" => "https://i.postimg.cc/MZMfvH3Y/hindi-movies-channel-images-logo-hires.png",
            ],

        ];
        foreach ($categories as $category){
            $newCategory = new Category();
            $newCategory->type_id = $category['type_id'];
            $newCategory->name_en = $category['name_en'];
            $newCategory->name_ar = $category['name_ar'];
            $newCategory->slug = $category['slug'];
            $newCategory->visitors = $category['visitors'];
            $newCategory->image = $category['image'];
            $newCategory->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
