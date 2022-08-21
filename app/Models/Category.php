<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_ar',
        'image',
    ];

    public function channels(): HasMany
    {
        return $this->hasMany(Channel::class,'category_id');
    }

    public static function getTypes() : array{
        return [
            1 => [
                "type" => "sport",
                "id" => 1
            ],
            2 => [
                "name" => "news",
                "id" => 2
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
