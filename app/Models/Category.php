<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Channel;
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function channels(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Channel::class,'category_id');
    }

}
