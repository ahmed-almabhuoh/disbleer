<?php

namespace App\Http\Livewire\Backend\Jobs;

use App\Models\Job;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Update extends Component
{
    use WithFileUploads;

    // Attributes
    public $title;
    public $description;
    public $files;
    public $type;
    public $types;
    public $allTags;
    public $tags = [];
    public $is_limited = true;
    public  $from_date;
    public $to_date;
    public  $started_salary;
    public $end_salary;
    public $job;

    public function mount()
    {
        $this->title = $this->job->title;
        $this->description = $this->job->description;
        $this->type = $this->job->type;
        $this->is_limited = $this->job->limited;
        $this->from_date = $this->job->from_date;
        $this->to_date = $this->job->to_date;
        $this->started_salary = $this->job->started_salary;
        $this->end_salary = $this->job->end_salary;
        $this->tags = $this->job->tags()->select(['tags.id'])->get();

        $arr_types = Job::TYPES;
        $this->types = [];
        foreach ($arr_types as $value) {
            # code...
            $this->types[$value] = ucfirst($value);
        }

        $this->allTags = Tag::byStatus('active')->get();
        $arr_tags = [];
        foreach ($this->allTags as $tag) {
            $arr_tags[$tag->id] = $tag->tag;
        }
        $this->allTags = $arr_tags;
    }

    public function render()
    {
        return view('livewire.backend.jobs.update');
    }

    public function rules()
    {
        return [
            'title' => 'required|string|min:4|max:50',
            'description' => 'required|string|min:10|max:500',
            'files' => 'nullable',
            'type' => 'required|string|in:' . implode(",", Job::TYPES),
            'is_limited' => 'required|boolean',
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date',
            'started_salary' => 'required|numeric|min:1',
            'end_salary' => 'required|numeric|min:1',
        ];
    }

    public function create()
    {
        $data = $this->validate();

        $this->job->title = $data['title'];
        $this->job->description = $data['description'];
        $this->job->type = $data['type'];
        $this->job->limited = $data['is_limited'];
        $this->job->from_date = $data['from_date'];
        $this->job->to_date = $data['to_date'];
        $this->job->started_salary = $data['started_salary'];
        $this->job->end_salary = $data['end_salary'];
        $this->job->supervisor_id = auth('supervisor')->check() ?  auth('supervisor')->user()->id : auth()->user()->id;
        $this->job->slug = Str::slug($data['title'] . ' ' . time());

        $files = [];
        if ($data['files']) {
            foreach ($data['files'] as $file) {
                $filePath = $file->store('cms/jobs', 'public');
                $files[] = $filePath;
            }
            $this->job->files = json_encode($files);
        }

        $isSaved = $this->job->save();

        // Retrieve the tags based on the tag IDs
        $tags = Tag::whereIn('id', $this->tags)->get();

        // Attach the tags to the job
        $this->job->tags()->syncWithoutDetaching($tags);

        if ($isSaved) {
            return redirect()->route('jobs.index');
        }
    }

    public function cancel()
    {
        return redirect()->route('jobs.index');
    }
}
