<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

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
            'total_price' =>  $this->total_price,
            'status' => $this->status,
            'date' => Carbon::parse($this->created_at)->diffForHumans(),
            'products' => $this->orderproducts->count()
        ];
    }
}
