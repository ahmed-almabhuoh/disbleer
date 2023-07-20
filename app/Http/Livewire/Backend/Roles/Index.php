<?php

namespace App\Http\Livewire\Backend\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    protected $roles;
    public $searchTerm;

    public function render()
    {
        $this->roles = Role::where('name', 'LIKE', '%' . $this->searchTerm . '%')
            ->paginate(10);

        return view('livewire.backend.roles.index', [
            'roles' => $this->roles,
        ]);
    }
}
