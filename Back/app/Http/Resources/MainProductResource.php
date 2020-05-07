<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MainProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {


        return [
            "id" => $this->id,
            "user_id" => $this->seller_id,
            "userName" => $this->seller->name,

            "price" => $this->price,
            "isShipped" => $this->shipped,

        ];
    }
}
