<?php

namespace App\Http\Livewire\Admin\Campaign\Coupon;

use App\Models\Coupon;
use Livewire\Component;
use Illuminate\Support\Str;

class CouponAdd extends Component
{

    public $code;
    public $status;
    public $type;
    public $discount;


    public function mount($itemid)
    {
        $this->itemid = $itemid;
        if ($this->itemid != 0) {
            $this->item = Coupon::find($this->itemid);

            $this->code = $this->item->code;
            $this->status = $this->item->status;
            $this->type = $this->item->type;
            $this->discount = $this->item->discount;
        }
    }

    public function submit()
    {
        $data =  $this->validate([
            'code' => $this->itemid != 0 ? 'required|min:2|max:15|unique:coupons,code,' . $this->itemid : 'required|min:2|max:15|unique:coupons,code',
            'type' => 'required',
            'discount' => 'required|gt:0',
        ]);

        if ($this->itemid != 0) {
            $this->item->update([
                'code' =>  $this->code,
                'type' =>  $this->type,
                'discount' => $this->discount,
                'status' => $this->status ? 1 : 0,
            ]);

            $this->emit('succesAlert', 'Updated!');
        } else {
            $item = Coupon::create([
                'code' =>  $this->code,
                'type' =>  $this->type,
                'discount' => $this->discount,
                'status' => $this->status ? 1 : 0,
            ]);
            return redirect()->route('admin.campaigns.coupons.edit', $item->id);
        }
    }


    public function generateCode()
    {
        $this->code = strtoupper(Str::random(8));
    }
    public function render()
    {
        return view('livewire.admin.campaign.coupon.coupon-add');
    }
}
