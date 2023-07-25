<?php

namespace App\Http\Livewire\Frontend\ClientV1;

use Livewire\Component;

class SubmittedProposals extends Component
{
    public $searchTerm;
    protected $proposals;

    public function render()
    {
        $this->proposals = auth()->user()->proposals()->paginate(10);
        return view('livewire.frontend.client-v1.submitted-proposals', [
            'proposals' => $this->proposals,
        ]);
    }
}
