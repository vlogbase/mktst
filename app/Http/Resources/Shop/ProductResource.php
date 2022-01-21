<?php

namespace App\Http\Resources\Shop;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'sku' => $this->sku,
            'stock' => $this->calcStock(),
            'sale_price' => $this->showPrice(),
            'unit_price' => $this->unit_price,
            'discount' => $this->discount,
            'pack' => $this->productdetail->pack,
            'image' => Config('app.url') . $this->getCoverImage(),
        ];
    }
}
