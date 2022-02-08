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
        $users = [];
        $admins = [];
        foreach ( $this->users_ids as $id){
            $user = User::find($id);
            array_push($users, $user);
        }
        foreach ( $this->admins_ids as $id){
            $admin = Admin::find($id);
            array_push($admins, $admin);
        }
        return [
            'id' => $this->id,
            'title' => $this->title,
            'status' => $this->status,
            'users_ids' => $this->users_ids,
            'admins_ids' => $this->admins_ids,
            'users' => $users,
            'admins' => $admins,
        ];
    }
}
