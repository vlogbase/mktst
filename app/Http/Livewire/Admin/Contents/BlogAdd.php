<?php

namespace App\Http\Livewire\Admin\Contents;

use App\Models\Blog;
use App\Models\News;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class BlogAdd extends Component
{
    public $message;
    public $title;
    public $image;
    public $text = "";
    public $list;


    use WithFileUploads;

    protected $listeners = ['typeCKeditor' => 'equalMessage'];

    public function equalMessage($text)
    {
        $this->text = $text;
    }

    public function submit()
    {
        $data =  $this->validate([
            'title' => 'required|min:6|max:50|unique:blogs,name',
            'text' => 'required|min:10|max:5000',
            'image' => 'max:3024',
        ]);

        $background = $this->image->store('upload/contents', 'public');

        if ($this->list == 'blog') {
            $item = Blog::create([
                'name' => $this->title,
                'slug' => Str::slug($this->title),
                'text' => $this->text,
                'image' => $background
            ]);
            return redirect()->route('admin.contents.blogs.edit', $item->id);
        } else {
            $item = News::create([
                'name' => $this->title,
                'slug' => Str::slug($this->title),
                'text' => $this->text,
                'image' => $background
            ]);
            return redirect()->route('admin.contents.news.edit', $item->id);
        }
    }
    public function render()
    {
        return view('livewire.admin.contents.blog-add');
    }
}
