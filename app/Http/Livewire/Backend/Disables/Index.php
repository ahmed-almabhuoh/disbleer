<?php

namespace App\Http\Livewire\Backend\Disables;

use App\Models\Disable;
use Livewire\Component;

class Index extends Component
{
    protected $disables;
    public $searchTerm;

    public function render()
    {
        $this->disables = Disable::where('fname', 'LIKE', '%' . $this->searchTerm . '%')
        ->orWhere('lname', 'LIKE', '%' . $this->searchTerm . '%')
        ->orWhere('email', 'LIKE', '%' . $this->searchTerm . '%')
        ->orWhere('status', 'LIKE', '%' . $this->searchTerm . '%')
        ->paginate(10);

        return view('livewire.backend.disables.index', [
            'disables' => $this->disables,
        ]);
    }
}
