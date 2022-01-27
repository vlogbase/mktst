<?php

namespace App\Http\Livewire\Customer\Cart;

use App\Models\OrderRule;
use App\Models\Shipping;
use App\Models\User;
use App\Traits\CartHelper;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartPagePrice extends Component
{
    use CartHelper;
    protected $listeners = [
        'itemAdded' => 'getData',
        'itemRemoved' => 'getData',
        'itemUpdated' => 'getData',
    ];
    public $cart_price;
    public $vat_price = 0;
    public $shipment_price = 0;
    public $discount_price = 0;
    public $total_price = 0;
    public $items;
    public $coupon_code;
    public $applied_coupon_code = NULL;
    public User $user;
    public $min_cart_cost;

    public function mount()
    {
        $this->getData();
        $this->min_cart_cost = OrderRule::where('name', 'min_order_cost')->first();
    }

    public function getData()
    {
        if (Auth::check()) {
            $this->user = Auth::user();
        }

        $this->items = \Cart::getContent();
        $this->cart_price = \Cart::getSubTotal();
        if ($this->cart_price != 0) {
            $this->vat_price = $this->calcTax();
            $this->shipment_price = $this->calcShipping();
            $this->discount_price = $this->couponDiscount();
            $this->total_price = $this->cart_price +  $this->vat_price + $this->shipment_price - $this->discount_price;
        } else {
            $this->vat_price = 0;
            $this->shipment_price = 0;
            $this->discount_price = 0;
            $this->total_price = 0;
        }
    }

    public function calcTax()
    {
        $taxTotal = 0;
        foreach ($this->items as $item) {
            $taxTotal += (($item->price * $item->quantity) * $item->attributes['tax']) / 100;
        }

        return $taxTotal;
    }

    public function calcShipping()
    {
        $shipment = Shipping::first();
        if ($shipment->campaign && $shipment->campaign_price <= $this->cart_price) {
            $shipping_cost = 0;
        } else {
            $shipping_cost = $shipment->price;
        }
        return $shipping_cost;
    }

    public function couponAttempt()
    {
        $data =  $this->validate([
            'coupon_code' => 'required|exists:coupons,code',
        ]);

        if (Auth::check()) {
            if ($this->checkCouponCode($this->coupon_code, $this->user->id)) {
                session()->put('couponcode', $this->coupon_code);
                $this->applied_coupon_code = $this->coupon_code;
                $this->emit('succesShow', 'Coupon Applied');
                $this->getData();
            } else {
                $this->emit('errorShow', 'Not Available');
            }
        } else {
            $this->emit('loginShow', 'Login Required!');
        }
    }

    public function couponDiscount()
    {
        $couponDiscount = 0;
        $this->applied_coupon_code = NULL;
        if (session()->has('couponcode') && count($this->items) > 0) {
            $this->applied_coupon_code = session('couponcode');
            $couponDiscount = $this->couponDiscountCalc($this->applied_coupon_code, $this->cart_price);
        }

        return  $couponDiscount;
    }

    public function removeCoupon()
    {
        session()->forget('couponcode');
        $this->applied_coupon_code = NULL;
        $this->getData();
    }

    public function render()
    {
        return view('livewire.customer.cart.cart-page-price');
    }
}
