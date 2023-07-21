<?php

namespace App\Http\Livewire\Backend\Roles;

use Livewire\Component;

class Update extends Component
{
    // Attributes
    public $name;
    public $status;
    public $statuses;
    public $role;
    public $guard_name;

    public function mount()
    {
        $this->name = $this->role->name;

        $arr_statuses = ['active', 'inactive'];
        $this->statuses = [];
        foreach ($arr_statuses as $value) {
            # code...
            $this->statuses[$value] = ucfirst($value);
        }
    }

    public function render()
    {
        return view('livewire.backend.roles.update');
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:50|unique:roles,name,' . $this->role->id,
            'guard_name' => 'required|in:manager,supervisor',
        ];
    }

    public function create()
    {
        $data = $this->validate();

        $this->role->name = $data['name'];
        $this->role->guard_name = $data['guard_name'];
        $isSaved = $this->role->save();

        if ($isSaved) {
            return redirect()->route('roles.index');
        }
    }

    public function cancel()
    {
        return redirect()->route('managers.index');
    }
}
