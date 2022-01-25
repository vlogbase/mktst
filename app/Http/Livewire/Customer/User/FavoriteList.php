<?php

namespace App\Http\Livewire\Customer\User;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class FavoriteList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public User $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function deleteItem($id)
    {
        $this->user->userfavorites()->detach($id);
        $this->emit('succesShow', 'Removed Item');
        $this->resetPage();
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        $current_stock = $product->calcStock();

        if ($current_stock > 0) {
            //Add to Cart
            \Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->showPrice(),
                'quantity' => 1,
                'attributes' => array(
                    'image' => $product->getCoverImage(),
                    'slug' => $product->slug,
                    'tax' => $product->taxrate
                )
            ]);
            $this->emit('itemAdded');
        } else {
            $this->emit('errorShow', 'Not enough stock');
        }
    }


    public function render()
    {
        $favorites_raw = $this->user->userfavorites();


        return view('livewire.customer.user.favorite-list', [
            'products' => $favorites_raw->latest()->paginate(10),
        ]);
    }
}
