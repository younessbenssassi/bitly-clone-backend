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
        return $this->morphedByMany(User::class,'todoable');
    }
    public function admins(){
        return $this->morphedByMany(Admin::class,'todoable');
    }
}
