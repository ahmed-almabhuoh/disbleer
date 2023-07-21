<?php

namespace App\Http\Livewire\Backend\Roles;

use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Assign extends Component
{
    public $roleId;
    protected $permissions;
    public $showNotification = false;
    public $msg;
    public $role;
    public $guard_permissions;

    public function mount()
    {
        $this->role = Role::where('id', Crypt::decrypt($this->roleId))->first();
    }

    public function render()
    {
        $this->permissions = Permission::where('guard_name', $this->role->guard_name)->paginate(15);
        $this->guard_permissions = $this->role->permissions;

        foreach ($this->permissions as $permission) {
            $permission->setAttribute('assigned', false);
            foreach ($this->guard_permissions as $guard_permission) {
                if ($guard_permission->id == $permission->id) {
                    $permission->setAttribute('assigned', true);
                }
            }
        }

        return view('livewire.backend.roles.assign', [
            'permissions' => $this->permissions,
        ]);
    }

    public function submitAssigning($id)
    {
        $permission = Permission::where('id', Crypt::decrypt($id))->first();
        // $role = Role::where('name', Crypt::decrypt($this->role_name))->first();

        if (!is_null($permission)) {
            if ($this->role->hasPermissionTo($permission)) {
                $this->role->revokePermissionTo($permission);
                $this->showNotification = true;
                $this->msg = __('Permission (' . $permission->name . ') removed from role (' . $this->role->name . ') successfully');
            } else {
                $this->role->givePermissionTo($permission);
                $this->showNotification = true;
                $this->msg = __('Permission (' . $permission->name . ') assigned to role (' . $this->role->name . ') successfully');
            }
        }
    }
}
