<?php

namespace App\Http\Livewire\Backend\Courses;

use App\Models\Category;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreateCourse extends Component
{
    use WithFileUploads;

    // Attributes
    public $name;
    protected $slug;
    public $status;
    public $type;
    public $courseLink;
    public $statuses;
    public $types;
    public $courses;
    public $pre_courses = [];
    public $courseBlog;
    public $courseDescription;
    public $images;
    public $indicatorName;
    public $tests = [];
    protected $categories;
    public $catArray = [];
    public $selectedCategory;

    public function mount()
    {
        $arr_statuses = Course::STATUS;
        $arr_types = Course::TYPE;
        $this->statuses = [];
        foreach ($arr_statuses as $value) {
            # code...
            $this->statuses[$value] = ucfirst($value);
        }
        foreach ($arr_types as $value) {
            # code...
            $this->types[$value] = ucfirst($value);
        }

        $this->courses = Course::byStatus('active')->get();

        $this->categories = Category::byStatus('active')->get();

        foreach ($this->categories as $category) {
            $this->catArray[$category->id] = $category->title;
        }
    }

    public function render()
    {
        return view('livewire.backend.courses.create-course');
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:4|max:50',
            // 'slug' => 'required|string|min:4|max:50',
            'status' => 'required|string|in:' . implode(",", Course::STATUS),
            'type' => 'required|string|in:' . implode(",", Course::TYPE),
            'courseBlog' => 'nullable|string',
            'courseDescription' => 'nullable|string',
            'images' => 'nullable',
            'indicatorName' => 'required|string',
            'courseLink' => 'nullable|string',
            'pre_courses' => 'nullable',
            'tests' => 'nullable',
            'selectedCategory' => 'required|integer|exists:categories,id',
        ];
    }

    public function create()
    {
        $data = $this->validate();

        $course = new Course();
        $course->name = $data['name'];
        $course->indicate = $data['indicatorName'];
        $course->status = $data['status'];
        $course->type = $data['type'];
        $course->category_id = $data['selectedCategory'];
        $course->slug = Str::slug($data['name']);
        $course->link = $data['courseLink'];
        $course->pre_courses = json_encode($data['pre_courses']);

        $files = [];
        if ($data['images']) {
            foreach ($data['images'] as $image) {
                $imagePath = $image->store('cms/courses');
                $files[] = $imagePath;
            }
            $course->images = json_encode($files);
        }

        $course->tests = json_encode($data['tests']);
        $course->description = $data['courseDescription'];
        $course->blog = $data['courseBlog'];
        $isSaved = $course->save();

        if ($isSaved) {
            return redirect()->route('courses.index');
        }
    }

    public function cancel()
    {
        return redirect()->route('managers.index');
    }
}
