<?php

namespace App\Http\Livewire\Backend\Tags;

use App\Models\Tag;
use Livewire\Component;

class Index extends Component
{
    protected $tags;
    public $searchTerm;

    public function render()
    {
        $this->tags = Tag::where('tag', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('status', 'LIKE', '%' . $this->searchTerm . '%')
            ->paginate(10);

        return view('livewire.backend.tags.index', [
            'tags' => $this->tags,
        ]);
    }
}
