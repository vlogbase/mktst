<?php

namespace App\Http\Livewire\Customer;

use App\Models\Product;
use App\Models\User;
use App\Traits\CartHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class ProductCard extends Component
{
    public Product $product;
    public User $user;

    public $userFavorited = 0;


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
    public function render()
    {
        return view('livewire.customer.product-card');
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
                    'quantity' => 1,
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
}
