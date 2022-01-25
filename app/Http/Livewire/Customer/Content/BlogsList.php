<?php

namespace App\Http\Livewire\Customer\Content;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class BlogsList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $items = Blog::latest()->paginate(12);
        return view('livewire.customer.content.blogs-list', [
            'items' => $items
        ]);
    }
}
