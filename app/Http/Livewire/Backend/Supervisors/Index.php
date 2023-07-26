<?php

namespace App\Http\Livewire\Backend\Supervisors;

use App\Models\Supervisor;
use Livewire\Component;

class Index extends Component
{
    protected $supervisors;
    public $searchTerm;

    public function render()
    {
        $this->supervisors = Supervisor::where('fname', 'LIKE', '%' . $this->searchTerm . '%')
        ->orWhere('lname', 'LIKE', '%' . $this->searchTerm . '%')
        ->orWhere('email', 'LIKE', '%' . $this->searchTerm . '%')
        ->orWhere('status', 'LIKE', '%' . $this->searchTerm . '%')
        ->paginate(10);

        return view('livewire.backend.supervisors.index', [
            'supervisors' => $this->supervisors,
        ]);
    }
}
