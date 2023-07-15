<?php

namespace App\Http\Livewire\Backend\Courses;

use App\Models\Course;
use Livewire\Component;

class Index extends Component
{
    protected $courses;
    public $searchTerm;

    public function render()
    {
        $this->courses = Course::where('name', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('status', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('type', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('indicate', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('score', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('description', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('blog', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('slug', 'LIKE', '%' . $this->searchTerm . '%')
            ->paginate(10);

        return view('livewire.backend.courses.index', [
            'courses' => $this->courses,
        ]);
    }
}
