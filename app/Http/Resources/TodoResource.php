<?php

namespace App\Http\Resources;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $users_ids = [];
        $admins_ids = [];
        foreach ( $this->users as $user){
            array_push($users_ids, $user->id);
        }
        foreach ( $this->admins as $admin){
            array_push($admins_ids, $admin->id);
        }
        return [
            'id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,
            'status' => $this->status,
            'users' => $this->users,
            'admins' => $this->admins,
            'users_ids' => $users_ids,
            'admins_ids' => $admins_ids,
        ];
    }
}
