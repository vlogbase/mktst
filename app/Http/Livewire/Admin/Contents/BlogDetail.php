<?php

namespace App\Http\Livewire\Admin\Contents;

use App\Models\Blog;
use App\Models\News;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class BlogDetail extends Component
{
    public $message;
    public $title;
    public $image;
    public $text = "";
    public $itemid;
    public $item;
    public $current_image;
    public $list;


    use WithFileUploads;

    protected $listeners = ['typeCKeditor' => 'equalMessage'];

    public function mount($itemid)
    {
        if ($this->list == 'blog') {
            $this->item = Blog::find($itemid);
        } else {
            $this->item = News::find($itemid);
        }
        $this->title = $this->item->name;
        $this->current_image = $this->item->image;
        $this->message = $this->item->text;
        $this->text = $this->item->text;
        $this->emit('textSetCK', $this->item->text);
    }

    public function equalMessage($text)
    {
        $this->text = $text;
    }

    public function submit()
    {
        $data =  $this->validate([
            'title' => 'required|min:6|max:50',
            'text' => 'required|min:10|max:5000',
            'image' => 'nullable|max:3024',
        ]);

        if ($this->image) {
            $background = $this->image->store('upload/contents', 'public');
            $this->item->update([
                'image' => $background,
            ]);
        }

        $this->item->update([
            'name' => $this->title,
            'slug' => Str::slug($this->title),
            'text' => $this->text,
        ]);

        $this->emit('succesAlert', 'Updated!');
    }
    public function render()
    {
        return view('livewire.admin.contents.blog-detail');
    }
}
