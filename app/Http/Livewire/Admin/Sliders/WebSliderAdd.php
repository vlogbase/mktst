<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\WebSlider;
use Livewire\Component;
use Livewire\WithFileUploads;

class WebSliderAdd extends Component
{
    use WithFileUploads;


    public $top_head;
    public $mid_head;
    public $button_status;
    public $button_text;
    public $button_action;
    public $image;
    public $light;
    public $itemid;
    public $item;
    public $itemImage;

    public function mount($itemid)
    {
        $this->itemid = $itemid;
        if ($this->itemid != 0) {
            $this->item = WebSlider::find($this->itemid);

            $this->top_head = $this->item->top_head;
            $this->mid_head = $this->item->mid_head;
            $this->button_status = $this->item->button_status;
            $this->button_text = $this->item->button_text;
            $this->button_action = $this->item->button_action;
            $this->itemImage = $this->item->image;
            $this->light = $this->item->light;
        }
    }

    public function submit()
    {
        $data =  $this->validate([
            'top_head' => 'nullable|min:2|max:20|unique:blogs,name',
            'mid_head' => 'nullable|min:2|max:30',
            'image' => $this->itemid == 0 ? 'required|max:4024' : 'nullable|max:4024',
            'button_text' => $this->button_status ? 'required|min:2|max:15' : '',
            'button_action' => $this->button_status ? 'required|min:5|max:500' : '',
        ]);

        if ($this->itemid != 0) {
            $this->item->update([
                'top_head' =>  $this->top_head,
                'mid_head' =>  $this->mid_head,
                'button_status' => $this->button_status ? 1 : 0,
                'button_text' => $this->button_status ? $this->button_text : '',
                'button_action' => $this->button_status ? $this->button_action : '',
                'light' => $this->light ? 1 : 0,
            ]);

            if ($this->image) {
                $background = $this->image->store('upload/websliders', 'public');
                $this->item->update([
                    'image' => $background,
                ]);
            }

            $this->emit('succesAlert', 'Updated!');
        } else {
            $background = $this->image->store('upload/websliders', 'public');
            $item = WebSlider::create([
                'top_head' =>  $this->top_head,
                'mid_head' =>  $this->mid_head,
                'image' => $background,
                'button_status' => $this->button_status ? 1 : 0,
                'button_text' => $this->button_status ? $this->button_text : '',
                'button_action' => $this->button_status ? $this->button_action : '',
                'light' => $this->light ? 1 : 0,
            ]);
            return redirect()->route('admin.contents.sliders.web_edit', $item->id);
        }
    }

    public function render()
    {
        return view('livewire.admin.sliders.web-slider-add');
    }
}
