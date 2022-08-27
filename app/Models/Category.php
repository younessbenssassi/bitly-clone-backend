<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;
class Category extends Model
{
    use HasFactory;

    public function channels(): HasMany
    {
        return $this->hasMany(Channel::class,'category_id');
    }

    public static function getTypes() : array{
        return [
            1 => [
                "name" => "Sport",
                "slug" => "sport",
                "id" => 1
            ],
            2 => [
                "name" => "Netflix",
                "slug" => "netflix",
                "id" => 2
            ],
            3 => [
                "name" => "Movies",
                "slug" => "movies",
                "id" => 3
            ],
            4 => [
                "name" => "News",
                "slug" => "news",
                "id" => 4
            ],
            5 => [
                "name" => "Carton",
                "slug" => "carton",
                "id" => 5
            ],
        ];
    }

    public static function getType($id) : array | null{
        $types = Category::getTypes();
        if ( isset($types[$id])){
            return  $types[$id];
        }
        return null;
    }

}
