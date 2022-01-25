<?php

namespace App\Http\Livewire\Customer\Content;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class NewsList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $items = News::latest()->paginate(12);
        return view('livewire.customer.content.news-list', [
            'items' => $items
        ]);
    }
}
