<?php

namespace App\Http\Livewire\Customer;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProductDetailButtons extends Component
{
    public Product $product;
    public User $user;
    public $userFavorited = 0;
    public $quantity = 1;

    public function mount()
    {
        if (Auth::check()) {
            $this->user = Auth::user();
            $toggle = DB::table('product_user')->where('product_id', $this->product->id)->where('user_id', $this->user->id)->first();
            if ($toggle) {
                $this->userFavorited = 1;
            } else {
                $this->userFavorited = 0;
            }
        } else {
            $this->userFavorited = 0;
        }
    }

    public function channgeQty($type)
    {

        if ($type == '-') {
            if ($this->quantity > 1) {
                $this->quantity = $this->quantity - 1;
            }
        } else if ($type == '+') {
            if ($this->quantity < 500) {
                $this->quantity = $this->quantity + 1;
            }
        }
    }


    public function addToCart()
    {
        $current_stock = Product::find($this->product->id)->calcStock();
        if (Auth::check()) {
            if ($current_stock > 0) {
                //Add to Cart
                \Cart::add([
                    'id' => $this->product->id,
                    'name' => $this->product->name,
                    'price' => $this->product->showPrice(),
                    'quantity' => $this->quantity,
                    'attributes' => array(
                        'image' => $this->product->getCoverImage(),
                        'slug' => $this->product->slug,
                        'tax' => $this->product->taxrate
                    )
                ]);
                $this->emit('itemAdded');
            } else {
                $this->emit('errorShow', 'Not enough stock');
            }
        } else {
            $this->emit('loginShow', 'Login Required!');
        }
    }

    public function updatedQuantity($val)
    {
        if (is_numeric($val)) {
            if ($val > 500) {
                $this->quantity = 500;

                $this->emit('errorShow', 'Max Quantity');
            } else if ($val <= 0) {
                $this->quantity = 1;
            } else {
                $this->quantity = $val;
            }
        } else {
            $this->quantity = 1;
            $this->emit('errorShow', 'Must be a number');
        }
    }

    public function addToFav()
    {
        if (Auth::check()) {
            if ($this->userFavorited) {
                $this->userFavorited = 0;
                $this->user->products()->detach($this->product->id);
                $this->emit('succesShow', 'Removed from favorites');
            } else {
                $this->userFavorited = 1;
                $this->user->products()->attach($this->product->id);
                $this->emit('succesShow', 'Added to favorites');
            }
        } else {
            $this->emit('loginShow', 'Login Required!');
        }
    }
    public function render()
    {
        return view('livewire.customer.product-detail-buttons');
    }
}
