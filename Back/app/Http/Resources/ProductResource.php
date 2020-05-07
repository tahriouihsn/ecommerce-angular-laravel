<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            "name" => $this->name,
            "price" => $this->price,
            "description" => $this->description,
            "seller_Name" => $this->user->name,
            "orders_count" => count($this->orders),
            "images" => ImagesResource::collection($this->images),
            "reviews" => ReviewsResource::collection($this->reviews)

        ];
    }
}
