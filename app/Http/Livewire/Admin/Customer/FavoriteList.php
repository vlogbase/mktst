<?php

namespace App\Http\Livewire\Admin\Customer;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class FavoriteList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $user;

    public function render()
    {
        $items = $this->user->userfavorites();
        return view('livewire.admin.customer.favorite-list', [
            'items' => $items->latest()->paginate(5, ['*'], 'favoritesPage'),
        ]);
    }
}
