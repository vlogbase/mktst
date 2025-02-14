<?php

namespace App\Http\Resources\Detail;

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
            'description' => $this->productdetail->description,
            'pack' => $this->productdetail->pack,
            'is_favorited' => Auth::guard('sanctum')->check() ? $this->isFavoritedFromUser(Auth::guard('sanctum')->user()->id) : false,
            'images' => ProductImageResource::collection($this->productimages),
            'details' => ProductInfoResource::collection($this->productinfos),

        ];
    }
}
