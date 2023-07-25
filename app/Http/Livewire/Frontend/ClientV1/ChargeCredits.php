<?php

namespace App\Http\Livewire\Frontend\ClientV1;

use Livewire\Component;

class ChargeCredits extends Component
{
    public $money;
    public $coins;
    protected $ratio = 16;

    public function mount()
    {
        $this->money = 7;
        $this->coins = $this->money * $this->ratio;
    }

    public function render()
    {
        return view('livewire.frontend.client-v1.charge-credits');
    }

    public function updatedMoney()
    {
        if ($this->money != null && $this->money >= 1)
            $this->coins = $this->money *  $this->ratio;
    }

    public function rules()
    {
        return [
            'money' => 'required|numeric|min:7',
            'coins' => 'required|numeric|min:112',
        ];
    }

    public function submitPayment()
    {
        $data = $this->validate();
        return redirect()->route('make.payment', $data['money']);
    }
}
