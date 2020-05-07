<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            "order_id" => $this->id,
            "buyer_id" => $this->user_id,
            "buyer_name" => $this->user->name,
            "isShipped" => $this->shipped == 1,
            "total" => array_sum($sum),
            "products" => OrderProductResource::collection($this->products),

        ];
    }
}
