<?php

namespace App\Http\Livewire\Customer\Cart;

use App\Models\OrderRule;
use App\Models\PaymentMethod;
use App\Models\PointSystem;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserOffice;
use App\Traits\CartHelper;
use App\Traits\OrderHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class PageCheckout extends Component
{
    use CartHelper;
    use OrderHelper;

    public $cart_price;
    public $vat_price = 0;
    public $shipment_price = 0;
    public $discount_price = 0;
    public $total_price = 0;
    public $earn_point = 0;
    public $items;
    public $coupon_code = "";
    public User $user;
    public UserOffice $useroffices;
    public UserDetail $userdetail;
    public $payments;

    public $ordernote;
    public $officeSelect;
    public $payment_option;
    public $payment_need;
    public $agreement;

    public $prices;

    public $min_cart_cost;

    public function mount()
    {
        $this->getData();
        $this->payments = PaymentMethod::where('status', 1)->get();
        $this->officeSelect = $this->offices->where('is_shipping', 1)->first()->id;
        $this->payment_need = floatVal($this->total_price / PointSystem::first()->spend_coefficient);
        $this->min_cart_cost = OrderRule::where('name', 'min_order_cost')->first();
    }

    public function hydrate()
    {
        $this->getData();
    }

    public function getData()
    {
        $this->user = Auth::user();
        $this->items = \Cart::getContent();
        $this->offices = $this->user->useroffices;
        $this->userdetail = $this->user->userdetail;
        $this->cart_price = \Cart::getSubTotal();
        $this->vat_price = $this->calcTax();
        $this->shipment_price = $this->calcShipping();
        $this->discount_price = $this->couponDiscount();
        $this->total_price = $this->cart_price +  $this->vat_price + $this->shipment_price - $this->discount_price;

        $this->earn_point =  $this->pointCalculation($this->cart_price);

        $this->prices = [

            "cart_cost" =>  $this->cart_price,
            "vat_cost" => $this->vat_price,
            "delivery_cost" =>  $this->shipment_price,
            "discount_cost" => $this->discount_price,
            "final_cost" =>  $this->total_price,
            "earn_point" => $this->earn_point,
        ];
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


    public function orderAttempt()
    {
        $data =  $this->validate([
            'payment_option' => 'required|exists:payment_methods,id',
            'officeSelect' => 'required|exists:user_offices,id',
            'agreement' => 'required'
        ]);

        if ($this->min_cart_cost->status && $this->min_cart_cost->price > $this->cart_price) {
            return redirect()->route('cart');
        }

        //Stock Control
        if ($this->stockControl($this->items)) {
            session()->flash('cart_alert', 'Stock Not Enough!');
            return redirect()->route('cart');
        }

        //Coupon Control
        if (session()->has('couponcode')) {
            if (!$this->checkCouponCode(session('couponcode'), $this->user->id)) {
                session()->flash('cart_alert', 'Coupon Code Invalid!');
                session()->forget('couponcode');
                return redirect()->route('cart');
            } else {
                $this->coupon_code = session('couponcode');
            }
        }


        $ordernum = 'SOW-' . strtoupper(Str::random(12));

        //Payment Control
        if ($this->payment_option == 6) {
            //Point Check
            if ($this->payment_need > $this->user->point) {
                return $this->emit('errorAlert', 'Not Enough Point');
            } else {
                $this->spentPoint($this->prices['final_cost'], $this->user);
            }
        }

        $this->orderCreate($ordernum, $this->prices, $this->items, $this->user, $this->officeSelect, $this->payment_option, $this->coupon_code, 'web');

        if ($this->payment_option == 1) {
            $paymentid = $this->createPayment($ordernum, $this->user, $this->prices['final_cost'], 'web');
            if ($paymentid == 'ERROR') {
                return $this->emit('errorAlert', 'Payment Provider Error');
            }
            return redirect($paymentid);
        } else {
            //Completed Process
            //After Order
            $this->updateStock($this->items); //Stock reduce

            if ($this->coupon_code != '') {
                $this->couponApplied($this->coupon_code, $this->user->id); //Coupon Applied
                session()->forget('couponcode');
            }

            if ($this->payment_option != 6) {
                //Earn Point From Buying
                $this->earnPoint($this->prices['earn_point'], $this->user);
            }
            \Cart::clear();
            $this->sendNotification($this->user, $ordernum);
            return redirect()->route('order_complete', $ordernum);
        }
    }


    public function stockControl($items)
    {
        $fine_products = collect([]);
        $need_update_products = collect([]);
        $need_delete_products = collect([]);
        $updated = false;
        if (count($items) > 0) {
            foreach ($items as $item) {
                $product = Product::find($item->id);
                if ($product->calcStock() > 0) {
                    if ($product->calcStock() >= $item->quantity) {
                    } else {
                        //Updated_products
                        $updated = true;
                        \Cart::update($item->id, array(
                            'quantity' => array(
                                'relative' => false,
                                'value' => $product->calcStock()
                            ),
                        ));
                        $need_update_products->push($product->name . '-' . $product->sku);
                    }
                } else {
                    //Delete_products
                    \Cart::remove($item->id);
                    $updated = true;
                    $need_delete_products->push($product->name . '-' . $product->sku);
                }
            }
        }

        if ($updated) {
            if (count($need_delete_products) > 0) {
                session()->flash('need_delete_products', $need_delete_products);
            }

            if (count($need_update_products) > 0) {
                session()->flash('need_update_products', $need_update_products);
            }
        }

        return $updated;
    }

    public function render()
    {
        return view('livewire.customer.cart.page-checkout');
    }
}
