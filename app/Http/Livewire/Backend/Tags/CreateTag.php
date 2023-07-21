<?php

namespace App\Http\Livewire\Backend\Tags;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateTag extends Component
{
    // Attributes
    public $name;
    public $status;
    public $statuses;

    public function mount()
    {
        $arr_statuses = Tag::STATUS;
        $this->statuses = [];
        foreach ($arr_statuses as $value) {
            # code...
            $this->statuses[$value] = ucfirst($value);
        }
    }

    public function render()
    {
        return view('livewire.backend.tags.create-tag');
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:50|unique:tags,tag',
            'status' => 'required|in:' . implode(',', Tag::STATUS),
        ];
    }

    public function create()
    {
        $data = $this->validate();

        $tag = new Tag();
        $tag->tag = '#' . Str::slug($data['name']);
        $tag->status = $data['status'];
        $isSaved = $tag->save();

        if ($isSaved) {
            return redirect()->route('tags.index');
        }
    }

    public function cancel()
    {
        return redirect()->route('tags.index');
    }
}
