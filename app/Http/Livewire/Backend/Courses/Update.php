<?php

namespace App\Http\Livewire\Backend\Courses;

use App\Models\Category;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Update extends Component
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
    public $course;
    protected $categories;
    public $catArray = [];
    public $selectedCategory;
    public $allCourses;


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

        $this->courses = Course::byStatus('active')->where('id', '!=', $this->course->id)->get();

        $this->categories = Category::byStatus('active')->get();

        foreach ($this->categories as $category) {
            $this->catArray[$category->id] = $category->title;
        }

        // Initialize Course Values -- Attributes
        $this->name = $this->course->name;
        $this->status = $this->course->status;
        $this->type = $this->course->type;
        $this->courseLink = $this->course->course_link;
        $this->pre_courses = $this->course->pre_courses;
        $this->courseBlog = $this->course->blog;
        $this->selectedCategory = $this->course->category_id;
        $this->courseDescription = $this->course->description;
        $this->indicatorName = $this->course->indicate;
        $this->tests = $this->course->tests;
        $this->slug = $this->course->slug;

        $courses = Course::byStatus('active')->get();
        $arr = [];
        foreach ($courses as $course) {
            $arr[$course->id] = $course->name;
        }
        $this->allCourses = $arr;
    }

    public function render()
    {
        return view('livewire.backend.courses.update');
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
            'selectedCategory' => 'required|integer',
        ];
    }

    public function create()
    {
        $data = $this->validate();

        $this->course->name = $data['name'];
        $this->course->indicate = $data['indicatorName'];
        $this->course->status = $data['status'];
        $this->course->category_id = $data['selectedCategory'];
        $this->course->type = $data['type'];
        $this->course->slug = Str::slug($data['name'] . ' ' . time());
        $this->course->link = $data['courseLink'];
        $this->course->pre_courses = json_encode($data['pre_courses']);

        $files = [];
        if ($data['images']) {
            foreach ($data['images'] as $image) {
                $imagePath = $image->store('cms/courses', 'public');
                $files[] = $imagePath;
            }
            $this->course->images = json_encode($files);
        }

        $this->course->tests = json_encode($data['tests']);
        $this->course->description = $data['courseDescription'];
        $this->course->blog = $data['courseBlog'];
        $isSaved = $this->course->save();

        if ($isSaved) {
            return redirect()->route('courses.index');
        }
    }

    public function cancel()
    {
        return redirect()->route('managers.index');
    }
}
