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
            $table->integer('type_id')->nullable();
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
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgX6lZZsVKZDgCHfRGU_AqhRT5eXrOqbLNyH1HTbyXoPz50rUEcwMDo-d-m6tmof2Funn7vqS5T7s2GXHHKVRqYB-XOgTNoC1AMLxPyJYyDkHtb6iiNAO1HMC_CZhsFgetj4eRzrQBYCo9JnB4kzH4sk6trRijeX4lJMb_Ja4Qqt6GaXug28bIZln6m/s1600/1410716-BEIN.webp",
            ],
            [
                "type_id" => 1,
                "name_en" => "AD Sports",
                "name_ar" => "ابوظبي الرياضية",
                "slug" => Str::slug('AD Sports'),
                "visitors" => 900,
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEg2fDsl8zPnkEmvFXHI5p1gFj1-fvwvbkTvQAPjqWHTX3RSg9HmcOA1X_VQrX-DhdI8WOfMpXNGw_Zh8CWGXaC8YoLLMn9pdfgcKopmpb6zXbHG6iULNstizenuNxil5hGheXwIFYDmzXmEbmwW8URvgLqAXpJLbOYNpKKWc4_KN-cBlUzgbh5prRiP/s1600/ad.jpg",
            ],
            [
                "type_id" => 1,
                "name_en" => "Dubai Sports",
                "name_ar" => "دبي الرياضية",
                "slug" => Str::slug('Dubai Sports'),
                "visitors" => 800,
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjkSuTFX-8Q_MtdTgdufhSVY-XlMigAB0V2WBjUE_c8W8G29JLCf8A6JAKAcq1uKuGQvbAjfF8gEYl8D_2x12bKR74N_SpDob-YGH_0VgB_9ku4XUqQN9_nH86aFs2cq8kAG8FpCpkK5fTvfBw7MQessQhqcLk6jSinehpycUmxzidElyM4o7zPWTgY/s1600/dubai.png",
            ],
            [
                "type_id" => 1,
                "name_en" => "Fox Sports",
                "name_ar" => "فوكس الرياضية",
                "slug" => Str::slug('Fox Sports'),
                "visitors" => 700,
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh7Rw96Wr-Rse2FMcsdZtEqTBkUIavutLp0jzhW5u0c7ZOC8xXdzyEzGjyM_cr3bc7LHTdFrhKn5FXXLDNkgOXhX7xhVO6Yri9dSLHSVfZOMrckWBKLlPAOUdf8b_aa1X_xROm26X02-tMqaJJop0blYEcWqwbGWSNzO-LAIj-LQdC1-MaHpjlEErLh/s1600/FSOval_wBackground_1040x585.gif",
            ],

            [
                "type_id" => 2,
                "name_en" => "Netflix",
                "name_ar" => "نيتفلكس",
                "slug" => Str::slug('Netflix'),
                "visitors" => 1000,
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhUSSUhPPk_pz4Rts-Y8XDYdVDtjpcVoQGwOkfIog8aXT5u5YYyd21aVK-7F7r2lZGt2vrW-MO30_yv2vQcFHfNwb0_N68ZbBYlog5FajWXjcvbMgHj8d727Hj7mjKO1SHajQXxpsc-77vFGa4J_ITYcN8EcjbidM82ldmiud4WzkQEEe4B2FSGhxmO/s1600/05cItXL96l4LE9n02WfDR0h-5.webp",
            ],

            [
                "type_id" => 3,
                "name_en" => "Netflix",
                "name_ar" => "نيتفلكس",
                "slug" => Str::slug('Netflix'),
                "visitors" => 1000,
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhUSSUhPPk_pz4Rts-Y8XDYdVDtjpcVoQGwOkfIog8aXT5u5YYyd21aVK-7F7r2lZGt2vrW-MO30_yv2vQcFHfNwb0_N68ZbBYlog5FajWXjcvbMgHj8d727Hj7mjKO1SHajQXxpsc-77vFGa4J_ITYcN8EcjbidM82ldmiud4WzkQEEe4B2FSGhxmO/s1600/05cItXL96l4LE9n02WfDR0h-5.webp",
            ],
            [
                "type_id" => 3,
                "name_en" => "HBO",
                "name_ar" => "اتش بي او",
                "slug" => Str::slug('HBO'),
                "visitors" => 900,
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEj7ic6bVTPgYdOQF_tO-JeumSf3ggsQcZtHZESU3WAm7tNKtpIWuij8IRn-zxWQ0h9RKRdO71jU4jlDCk3T9s3aUAkCtBHYbCtSbteQz61IKuCamYYp0xdNgHEN9O5qdovs42hNQoKbUA6RRFVb7Iw7Sdh3C72h-4gqaiQPyWmSt6GdfRE_A4ozlU-6/s1600/hbo-max-logo.webp",
            ],
            [
                "type_id" => 3,
                "name_en" => "Fox movies",
                "name_ar" => "فوكس للأفلام",
                "slug" => Str::slug('Fox movies'),
                "visitors" => 980,
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhDSULyVKoNBa_fSHugjBShPmhAm62p4MutGGMIx1ygCQTa4NfAOm9c3dpm7TpTnhos5yxZSM6sVOm76DA9Pix4sjbActdNz3f_vcvCfb18UNU2Qy6Shz824XYI6KTDtwXHw2YzLJRQ5HNB82x4ozHqX-M5ijP_xnkRUuTEf4dVyi_BEfL6sBE3iqFh/s1600/fox%20m.png",
            ],
            [
                "type_id" => 3,
                "name_en" => "MBC",
                "name_ar" => "ام بي سي",
                "slug" => Str::slug('MBC'),
                "visitors" => 970,
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhDSULyVKoNBa_fSHugjBShPmhAm62p4MutGGMIx1ygCQTa4NfAOm9c3dpm7TpTnhos5yxZSM6sVOm76DA9Pix4sjbActdNz3f_vcvCfb18UNU2Qy6Shz824XYI6KTDtwXHw2YzLJRQ5HNB82x4ozHqX-M5ijP_xnkRUuTEf4dVyi_BEfL6sBE3iqFh/s1600/fox%20m.png",
            ],
            [
                "type_id" => 3,
                "name_en" => "Indian movies",
                "name_ar" => "الأفلام الهندية",
                "slug" => Str::slug('Indian movies'),
                "visitors" => 900,
                "image" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgRx-Hz9mGwnSvLpeKWZjsgJ-MRTGsyNTyj4QHpMmh7Z9fgHLaBjFjPtdNhNI3wXnaeXQyL12wvWzGBrSD5I37B4qh8Pr0lPlwbQ86Jvvg42EhBsMgjeGC34-fwFjLCuHB4vENWfeEb77HYGGpXhXMh_niu32CR5CQ94pMprvkjDjdWKPJf8tZlCliX/s1600/hindi-movies-channel-images-logo-hires.png",
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
