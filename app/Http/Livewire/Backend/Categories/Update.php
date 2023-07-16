<?php

namespace App\Http\Livewire\Backend\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    // Attributes
    public $title;
    public $description;
    public $status;
    public $icon;
    public $statuses;
    public $category;

    public function mount()
    {
        $this->title = $this->category->title;
        $this->description = $this->category->description;
        $this->status = $this->category->status;

        $arr_statuses = Category::STATUS;
        $this->statuses = [];
        foreach ($arr_statuses as $value) {
            # code...
            $this->statuses[$value] = ucfirst($value);
        }
    }

    public function render()
    {
        return view('livewire.backend.categories.update');
    }

    public function rules()
    {
        return [
            'title' => 'required|string|min:2|max:50|unique:categories,title,' . $this->category->id,
            'description' => 'nullable|string',
            'icon' => 'nullable|image',
            'status' => 'required|in:' . implode(',', Category::STATUS),
        ];
    }

    public function create()
    {
        $data = $this->validate();

        $this->category->title = $data['title'];
        $this->category->description = $data['description'];
        $this->category->status = $data['status'];

        if ($data['icon']) {
            $imagePath = $data['icon']->store('cms/categories');
            $this->category->icon = $imagePath;
        }
        $isSaved = $this->category->save();

        if ($isSaved) {
            return redirect()->route('categories.index');
        }
    }

    public function cancel()
    {
        return redirect()->route('managers.index');
    }
}
