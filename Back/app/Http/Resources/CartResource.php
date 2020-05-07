<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $sum = [];
        foreach ($this->products as $pro) {
            $sum[] = $pro->price * $pro->pivot->quantity;
        }

        return [
            "userName" => $this->user->name,
            "countItems" => count($this->products),
            "total" => array_sum($sum),
            "products" => OrderProductResource::collection($this->products)


        ];
    }
}
