<?php

namespace App\Http\Livewire\Backend\Managers;

use App\Models\Manager;
use Livewire\Component;

class Index extends Component
{
    protected $managers;
    public $searchTerm;

    public function render()
    {
        $this->managers = Manager::where('fname', 'LIKE', '%' . $this->searchTerm . '%')
        ->orWhere('lname', 'LIKE', '%' . $this->searchTerm . '%')
        ->orWhere('email', 'LIKE', '%' . $this->searchTerm . '%')
        ->orWhere('status', 'LIKE', '%' . $this->searchTerm . '%')
        ->paginate(10);

        return view('livewire.backend.managers.index', [
            'managers' => $this->managers,
        ]);
    }
}
