<?php

namespace App\Http\Livewire\Backend\Disables;

use App\Models\Disable;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreateDisable extends Component
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

    public function mount()
    {
        $arr = Disable::STATUS;
        $this->statuses = [];
        foreach ($arr as $value) {
            # code...
            $this->statuses[$value] = ucfirst($value);
        }
        $this->password = Str::random(10);
    }

    public function render()
    {
        return view('livewire.backend.disables.create-disable');
    }

    public function rules()
    {
        return [
            'fname' => 'required|string|min:2|max:45',
            'lname' => 'required|string|min:2|max:45',
            'email' => 'required|email|unique:disables,email',
            'password' => 'required|string|min:8|max:45',
            'status' => 'required|string|in:' . implode(",", Disable::STATUS),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function create()
    {
        $data = $this->validate();

        $imagePath = null;
        if ($data['image']) {
            // $imagePath = $data['image']->file('image')->store('images', 'public'); // Store the image in the public disk storage
            // $data['image'] = $imagePath;
            $imagePath = $this->image->store('hr/disables', 'public'); // Store the image in the public disk storage
        }

        Disable::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => $data['status'],
            'image' => $imagePath,
        ]);

        return redirect()->route('disables.index');
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
        return redirect()->route('disables.index');
    }
}
