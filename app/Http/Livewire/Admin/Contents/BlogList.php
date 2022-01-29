<?php

namespace App\Http\Livewire\Admin\Contents;

use App\Models\Blog;
use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class BlogList extends Component
{
    use WithPagination;

    public $list;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['processDone' => 'eventOkay'];

    public function deleteItem($id)
    {
        $this->emit('deletedOkay', $id);
    }

    public function redirectItem($id)
    {
        if ($this->list == 'blog') {
            return redirect()->route('admin.contents.blogs.edit', $id);
        } else {
            return redirect()->route('admin.contents.news.edit', $id);
        }
    }

    public function eventOkay($postId)
    {
        if ($this->list == 'blog') {
            Blog::find($postId)->delete();
        } else {
            News::find($postId)->delete();
        }

        $this->emit('succesAlert', 'Deleted!');
        $this->resetPage();
    }

    public function render()
    {
        if ($this->list == 'blog') {
            $items = Blog::latest()->paginate(12);
        } else {
            $items = News::latest()->paginate(12);
        }

        return view('livewire.admin.contents.blog-list', [
            'items' => $items
        ]);
    }
}
