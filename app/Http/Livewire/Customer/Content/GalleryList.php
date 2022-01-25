<?php

namespace App\Http\Livewire\Customer\Content;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithPagination;

class GalleryList extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $items = Gallery::latest()->paginate(12);
        return view('livewire.customer.content.gallery-list', [
            'items' => $items
        ]);
    }
}
