<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'ordercode' => $this->ordercode,
            'cart_price' =>  $this->cart_price,
            'shipment_price' =>  $this->shipment_price,
            'discount_price' =>  $this->discount_price,
            'total_price' =>  $this->total_price,
            'pay_type' => $this->pay_type,
            'pay_status' => $this->pay_status,
            'status' => $this->status,
            'notes' => $this->notes,
            'products' => OrderProductResource::collection($this->orderproducts)
        ];
    }
}
