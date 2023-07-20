<?php

namespace App\Http\Livewire\Backend\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    // Attributes
    public $name;
    public $status;
    public $statuses;

    public function mount()
    {
        $arr_statuses = ['active', 'inactive'];
        $this->statuses = [];
        foreach ($arr_statuses as $value) {
            # code...
            $this->statuses[$value] = ucfirst($value);
        }
    }

    public function render()
    {
        return view('livewire.backend.roles.create-role');
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:50|unique:roles,name',
            // 'status' => 'nullable|string',
            // 'icon' => 'nullable|image',
            // 'status' => 'required|in:' . implode(',', Role::STATUS),
        ];
    }

    public function create()
    {
        $data = $this->validate();

        $role = new Role();
        $role->name = $data['name'];
        $isSaved = $role->save();

        if ($isSaved) {
            return redirect()->route('roles.index');
        }
    }

    public function cancel()
    {
        return redirect()->route('roles.index');
    }
}
