<?php

namespace App\Http\Resources;

use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class commentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $test = Like::where([
            ['comments_id', '=', $this->id],
            ['users_id', '=', Auth::user()->id]
        ]);

        if($test){
            $liked = true;
        }else{
            $liked = false;
        }
        
        // return parent::toArray($request);
        return [
            'text' => $this->text,
            'user_name' => User::find($this->users_id)->name,
            'user_surname' => User::find($this->users_id)->surname,
            'user_pfp' => User::find($this->users_id)->pfp,
            'user_id' => $this->users_id,
            'liked' => $liked
        ];
    }
}
