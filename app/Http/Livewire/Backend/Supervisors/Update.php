<?php

namespace App\Http\Livewire\Backend\Supervisors;

use App\Models\Supervisor;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $fname;
    public $lname;
    public $email;
    public $password;
    public $status;
    public $statuses;
    public $image;
    public $supervisor;

    public function mount()
    {
        $this->fname = $this->supervisor->fname;
        $this->lname = $this->supervisor->lname;
        $this->email = $this->supervisor->email;
        $this->status = $this->supervisor->status;

        $arr = Supervisor::STATUS;
        $this->statuses = [];
        foreach ($arr as $value) {
            # code...
            $this->statuses[$value] = ucfirst($value);
        }
    }

    public function render()
    {
        return view('livewire.backend.supervisors.update');
    }

    public function rules()
    {
        return [
            'fname' => 'required|string|min:2|max:45',
            'lname' => 'required|string|min:2|max:45',
            'email' => 'required|email|unique:supervisors,email,' . $this->supervisor->id,
            'password' => 'nullable|string|min:8|max:45',
            'status' => 'required|string|in:' . implode(",", Supervisor::STATUS),
            'image' => 'nullable|image',
        ];
    }

    public function update()
    {
        $data = $this->validate();

        $updatedArray = [];

        $imagePath = null;
        if ($data['image']) {
            // $imagePath = $data['image']->file('image')->store('images', 'public'); // Store the image in the public disk storage
            // $data['image'] = $imagePath;
            $imagePath = $this->image->store('hr/supervisors', 'public'); // Store the image in the public disk storage
        }

        if ($data['password']) {
            $updatedArray =  [
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'email' => $data['email'],
                'status' => $data['status'],
                'image' => $imagePath ?? $this->supervisor->image,
            ];
        } else {
            $updatedArray =  [
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'password' => Hash::make($data['password']),
                'email' => $data['email'],
                'status' => $data['status'],
                'image' => $imagePath ?? $this->supervisor->image,
            ];
        }

        Supervisor::where('id', '=', $this->supervisor->id)->update($updatedArray);
        return redirect()->route('supervisors.index');
    }

    public function cancel()
    {
        return redirect()->route('supervisors.index');
    }
}
