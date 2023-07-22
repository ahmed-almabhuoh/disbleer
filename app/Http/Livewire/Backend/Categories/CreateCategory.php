<?php

namespace App\Http\Livewire\Backend\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCategory extends Component
{
    use WithFileUploads;

    // Attributes
    public $title;
    public $description;
    public $status;
    public $icon;
    public $statuses;

    public function mount()
    {
        $arr_statuses = Category::STATUS;
        $this->statuses = [];
        foreach ($arr_statuses as $value) {
            # code...
            $this->statuses[$value] = ucfirst($value);
        }
    }

    public function render()
    {
        return view('livewire.backend.categories.create-category');
    }

    public function rules()
    {
        return [
            'title' => 'required|string|min:2|max:50|unique:categories,title',
            'description' => 'nullable|string',
            'icon' => 'nullable|image',
            'status' => 'required|in:' . implode(',', Category::STATUS),
        ];
    }

    public function create()
    {
        $data = $this->validate();

        $category = new Category();
        $category->title = $data['title'];
        $category->description = $data['description'];
        $category->status = $data['status'];

        if ($data['icon']) {
            $imagePath = $data['icon']->store('cms/categories', 'public');
            $category->icon = $imagePath;
        }
        $isSaved = $category->save();

        if ($isSaved) {
            return redirect()->route('categories.index');
        }
    }

    public function cancel()
    {
        return redirect()->route('managers.index');
    }
}
