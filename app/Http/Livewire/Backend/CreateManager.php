<?php

namespace App\Http\Livewire\Backend;

use App\Models\Manager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateManager extends Component
{
    // Attributes
    public $fname;
    public $lname;
    public $email;
    public $password;
    public $status;
    public $statuses;
    public $image;

    public function mount()
    {
        $arr = Manager::STATUS;
        $this->statuses = [];
        foreach ($arr as $value) {
            # code...
            $this->statuses[$value] = ucfirst($value);
        }
        $this->password = Str::random(10);
    }

    public function render()
    {
        return view('livewire.backend.create-manager');
    }

    public function rules()
    {
        return [
            'fname' => 'required|string|min:2|max:45',
            'lname' => 'required|string|min:2|max:45',
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:45',
            'status' => 'required|string|in:' . implode(",", Manager::STATUS),
            'image' => 'nullable|image',
        ];
    }

    public function create()
    {
        $data = $this->validate();

        Manager::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => $data['status'],
        ]);

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
