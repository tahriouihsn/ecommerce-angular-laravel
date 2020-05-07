<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            "id" => $this->id,
            "path" => $this->path,
            "updated_at" => $this->updated_at,
            "created_at" => $this->created_at
        ];
    }
}
