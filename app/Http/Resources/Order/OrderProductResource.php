<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'sold_price' => $this->sold_price,
            'quantity' => $this->quantity,
            'product_id' => $this->product_id,
            'name' => $this->product->name,
            'sku' => $this->product->sku,
            'pack' => $this->product->productdetail->pack,
            'image' => $this->product->getCoverImage(),
        ];
    }
}
