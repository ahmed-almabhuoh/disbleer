<?php

namespace App\Http\Livewire\Backend\Managers;

use App\Models\Manager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class Update extends Component
{
    public $fname;
    public $lname;
    public $email;
    public $password;
    public $status;
    public $statuses;
    public $image;
    public $manager;

    public function mount()
    {
        $this->fname = $this->manager->fname;
        $this->lname = $this->manager->lname;
        $this->email = $this->manager->email;
        $this->status = $this->manager->status;

        $arr = Manager::STATUS;
        $this->statuses = [];
        foreach ($arr as $value) {
            # code...
            $this->statuses[$value] = ucfirst($value);
        }
    }

    public function render()
    {
        return view('livewire.backend.managers.update');
    }

    public function rules()
    {
        return [
            'fname' => 'required|string|min:2|max:45',
            'lname' => 'required|string|min:2|max:45',
            'email' => 'required|email|unique:managers,email,' . $this->manager->id,
            'password' => 'nullable|string|min:8|max:45',
            'status' => 'required|string|in:' . implode(",", Manager::STATUS),
            'image' => 'nullable|image',
        ];
    }

    public function update()
    {
        $data = $this->validate();

        $updatedArray = [];

        if ($data['password']) {
            $updatedArray =  [
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'email' => $data['email'],
                'status' => $data['status'],
            ];
        } else {
            $updatedArray =  [
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'password' => Hash::make($data['password']),
                'email' => $data['email'],
                'status' => $data['status'],
            ];
        }

        Manager::where('id', '=', $this->manager->id)->update($updatedArray);
        return redirect()->route('managers.index');
    }

    public function cancel()
    {
        return redirect()->route('managers.index');
    }
}
