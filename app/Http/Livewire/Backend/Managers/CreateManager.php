<?php

namespace App\Http\Livewire\Backend\Managers;

use App\Models\Manager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class CreateManager extends Component
{
    use WithFileUploads;

    // Attributes
    public $fname;
    public $lname;
    public $email;
    public $password;
    public $status;
    public $statuses;
    public $image;
    public $roles = [];
    public $role;

    public function mount()
    {
        $arr = Manager::STATUS;
        $this->statuses = [];
        foreach ($arr as $value) {
            # code...
            $this->statuses[$value] = ucfirst($value);
        }
        $this->password = Str::random(10);

        $guardRoles = Role::where('guard_name', 'manager')->get();

        foreach ($guardRoles as $role) {
            $this->roles[$role->id] = $role->name;
        }
    }

    public function render()
    {
        return view('livewire.backend.managers.create-manager');
    }

    public function rules()
    {
        return [
            'fname' => 'required|string|min:2|max:45',
            'lname' => 'required|string|min:2|max:45',
            'email' => 'required|email|unique:managers,email',
            'password' => 'required|string|min:8|max:45',
            'status' => 'required|string|in:' . implode(",", Manager::STATUS),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required|integer|exists:roles,id'
        ];
    }

    public function create()
    {
        $data = $this->validate();

        $imagePath = null;
        if ($data['image']) {
            // $imagePath = $data['image']->file('image')->store('images', 'public'); // Store the image in the public disk storage
            // $data['image'] = $imagePath;
            $imagePath = $this->image->store('hr/managers', 'public'); // Store the image in the public disk storage
        }

        $manager = Manager::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => $data['status'],
            'image' => $imagePath,
        ]);

        $roleObj = Role::where('id', $this->role)->first();
        $manager->assignRole($roleObj);

        return redirect()->route('managers.index');
    }

    public function resetComponent()
    {
        $this->fname = '';
        $this->lname = '';
        $this->email = '';
        $this->password = '';
        $this->status = '';
        $this->image = '';
    }

    public function cancel()
    {
        return redirect()->route('managers.index');
    }
}
