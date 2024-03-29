<?php

namespace App\Http\Resources;
use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return 
        [
         'id' => $this->id,   //this refers to object of PostResource
         'title'=>$this->title,
         'description'=>$this->description,
         'created_at'=>$this->created_at,
         'slug'=>Str::slug($this->title),
         'user'=>new UserResource($this->user), //object from UserResource
        ];
    }
}
