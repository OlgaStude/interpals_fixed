<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class postResource extends JsonResource
{
    // /**
    //  * Transform the resource into an array.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    //  */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'lang'=> $this->lang,
            'text' => $this->text,
            'created_at' => $this->created_at,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'surname' => $this->surname,
            'pfp' => $this->pfp,
            'comments' => commentResource::collection($this->comments)
        ];
    }
}
