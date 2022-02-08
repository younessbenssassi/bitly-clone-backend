<?php

namespace App\Models;

use App\Http\Resources\TodoResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'users_ids' => 'array',
        'admins_ids' => 'array',
        'status' => 'boolean'
    ];

    public function users(){
        return $this->morphToMany(User::class);
    }
    public function admins(){
        return $this->morphToMany(Admin::class);
    }
}
