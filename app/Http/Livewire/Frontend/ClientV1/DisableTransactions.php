<?php

namespace App\Http\Livewire\Frontend\ClientV1;

use App\Models\Transaction;
use Livewire\Component;

class DisableTransactions extends Component
{
    public $searchReference;
    protected $transactions;

    public function render()
    {
        $this->transactions = Transaction::own()->where('reference_number', 'LIKE', '%' . $this->searchReference . '%')->with('credit')->paginate(10);

        return view('livewire.frontend.client-v1.disable-transactions', [
            'transactions' => $this->transactions,
        ]);
    }
}
