<?php

namespace App\Http\Livewire\Backend\Disables;

use App\Models\Disable;
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
    public $disable;

    public function mount()
    {
        $this->fname = $this->disable->fname;
        $this->lname = $this->disable->lname;
        $this->email = $this->disable->email;
        $this->status = $this->disable->status;

        $arr = Disable::STATUS;
        $this->statuses = [];
        foreach ($arr as $value) {
            # code...
            $this->statuses[$value] = ucfirst($value);
        }
    }

    public function render()
    {
        return view('livewire.backend.disables.update');
    }

    public function rules()
    {
        return [
            'fname' => 'required|string|min:2|max:45',
            'lname' => 'required|string|min:2|max:45',
            'email' => 'required|email|unique:disables,email,' . $this->disable->id,
            'password' => 'nullable|string|min:8|max:45',
            'status' => 'required|string|in:' . implode(",", Disable::STATUS),
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
            $imagePath = $this->image->store('hr/disables', 'public'); // Store the image in the public disk storage
        }

        if ($data['password']) {
            $updatedArray =  [
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'email' => $data['email'],
                'status' => $data['status'],
                'image' => $imagePath ?? $this->disable->image,
            ];
        } else {
            $updatedArray =  [
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'password' => Hash::make($data['password']),
                'email' => $data['email'],
                'status' => $data['status'],
                'image' => $imagePath ?? $this->disable->image,
            ];
        }

        Disable::where('id', '=', $this->disable->id)->update($updatedArray);
        return redirect()->route('disables.index');
    }

    public function cancel()
    {
        return redirect()->route('disables.index');
    }
}
