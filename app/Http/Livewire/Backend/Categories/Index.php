<?php

namespace App\Http\Livewire\Backend\Categories;

use App\Models\Category;
use App\Models\Course;
use Livewire\Component;

class Index extends Component
{
    protected $categories;
    public $searchTerm;

    public function render()
    {
        $this->categories = Category::where('title', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('description', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('status', 'LIKE', '%' . $this->searchTerm . '%')
            ->paginate(10);

        return view('livewire.backend.categories.index', [
            'categories' => $this->categories,
        ]);
    }
}
