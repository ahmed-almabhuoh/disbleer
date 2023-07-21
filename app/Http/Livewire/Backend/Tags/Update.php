<?php

namespace App\Http\Livewire\Backend\Tags;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class Update extends Component
{
    // Attributes
    public $name;
    public $status;
    public $statuses;
    public $tag;

    public function mount()
    {
        $this->name = $this->tag->tag;
        $this->status = $this->tag->status;

        $arr_statuses = Tag::STATUS;
        $this->statuses = [];
        foreach ($arr_statuses as $value) {
            # code...
            $this->statuses[$value] = ucfirst($value);
        }
    }

    public function render()
    {
        return view('livewire.backend.tags.update');
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:50|unique:tags,tag,' . $this->tag->id,
            'status' => 'required|in:' . implode(',', Tag::STATUS),
        ];
    }

    public function create()
    {
        $data = $this->validate();

        $this->tag->tag = '#' . Str::slug($data['name']);
        $this->tag->status = $data['status'];
        $isSaved = $this->tag->save();

        if ($isSaved) {
            return redirect()->route('tags.index');
        }
    }

    public function cancel()
    {
        return redirect()->route('tags.index');
    }
}
