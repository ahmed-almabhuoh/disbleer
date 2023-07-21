<?php

namespace App\Http\Livewire\Backend\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    protected $permissions;
    public $searchTerm;

    public function render()
    {
        $this->permissions = Permission::where('name', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('guard_name', 'LIKE', '%' . $this->searchTerm . '%')
            ->paginate(10);

        return view('livewire.backend.permissions.index', [
            'permissions' => $this->permissions,
        ]);
    }
}
