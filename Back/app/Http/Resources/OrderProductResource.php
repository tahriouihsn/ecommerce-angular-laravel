<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductResource extends JsonResource
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
            "product_id" => $this->id,
            "seller_id" => $this->seller_id,
            "sellerName" => $this->seller->name,
            "productName"=>$this->name,
            "quantity"=>$this->pivot->quantity,
            "price"=>$this->price,
            "total"=>$this->pivot->quantity*$this->price,
            "isShipped" => $this->shipped,
            "image"=>$this->images->first()

        ];



    }
}
