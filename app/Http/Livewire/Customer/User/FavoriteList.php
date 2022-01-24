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
        $current_stock = Product::find($id)->calcStock();

        if ($current_stock > 0) {
            //Add to Cart
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
