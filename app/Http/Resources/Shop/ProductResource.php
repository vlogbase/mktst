<?php

namespace App\Http\Resources\Shop;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

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
            'is_favorited' => Auth::guard('sanctum')->check() ? $this->isFavoritedFromUser(Auth::guard('sanctum')->user()->id) : false,
            'image' => Config('app.url') . $this->getCoverImage(),
        ];
    }
}
