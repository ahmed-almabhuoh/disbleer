<?php

namespace App\Http\Livewire\Backend\Jobs;

use App\Models\Job;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreateJob extends Component
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

    public function mount()
    {
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
        return view('livewire.backend.jobs.create-job');
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

        $job = new Job();
        $job->title = $data['title'];
        $job->description = $data['description'];
        $job->type = $data['type'];
        $job->limited = $data['is_limited'];
        $job->from_date = $data['from_date'];
        $job->to_date = $data['to_date'];
        $job->started_salary = $data['started_salary'];
        $job->end_salary = $data['end_salary'];
        $job->supervisor_id = auth('supervisor')->check() ? auth('supervisor')->user()->id : auth()->user()->id;
        $job->slug = Str::slug($data['title'] . ' ' . time());

        $files = [];
        if ($data['files']) {
            foreach ($data['files'] as $file) {
                $filePath = $file->store('cms/jobs', 'public');
                $files[] = $filePath;
            }
            $job->files = json_encode($files);
        }

        $isSaved = $job->save();

        // Retrieve the tags based on the tag IDs
        $tags = Tag::whereIn('id', $this->tags)->get();

        // Attach the tags to the job
        $job->tags()->syncWithoutDetaching($tags);

        if ($isSaved) {
            return redirect()->route('jobs.index');
        }
    }

    public function cancel()
    {
        return redirect()->route('jobs.index');
    }
}
