<?php

namespace App\Http\Livewire\Frontend\ClientV1;

use App\Models\Credit;
use App\Models\Job;
use App\Models\Proposal;
use InvalidArgumentException;
use Livewire\Component;

class SubmitProposal extends Component
{
    public $job;
    public $period;
    public $salary;
    public $vat;
    public $submittedVat;
    public $proposal;
    public $isSubmitted = false;
    public $allowedToPropose = true;

    public function mount()
    {
        $this->allowedToPropose = !Proposal::where([
            ['disable_id', '=', auth('disable')->user()->id],
            ['job_id', '=', $this->job->id],
        ])->exists();
        if (!$this->allowedToPropose) {
            // $proposal = $this->job->disable()->where('id', auth('disable')->user()->id)->first();
            // dd($proposal);
            $proposal = Proposal::where([
                ['disable_id', '=', auth('disable')->user()->id],
                ['job_id', '=', $this->job->id],
            ])->first();

            $this->period = $proposal->period;
            $this->salary = $proposal->salary;
            $this->vat = $proposal->vat;
            $this->proposal = $proposal->proposal;
        }
    }

    public function render()
    {
        return view('livewire.frontend.client-v1.submit-proposal');
    }

    public function updatedSalary()
    {
        if (!is_numeric($this->salary)) {
            throw new InvalidArgumentException(__("Input must be a numeric value."));
        }

        $this->vat = $this->salary * 0.15;
        $this->submittedVat = $this->vat;
    }

    public function rules()
    {
        return [
            'period' => 'required|integer|min:1',
            'salary' => 'required|numeric|min:25',
            'submittedVat' => 'required|numeric|min:3.75',
            'proposal' => 'required|string',
        ];
    }

    public function submitProposal()
    {
        $data = $this->validate();
        Proposal::create([
            'period' => $data['period'],
            'salary' => $data['salary'],
            'vat' => $data['submittedVat'],
            'proposal' => $data['proposal'],
            'job_id' => $this->job->id,
            'disable_id' => auth('disable')->user()->id,
        ]);

        Credit::create([
            'amount' => 0,
            'credits' => -1 * $this->job->dist_count,
            'status' => 'active',
            'disable_id' => auth()->user()->id,
            'transaction_id' => 0,
            'description' => 'Submit a new proposal for a job',
        ]);

        $this->isSubmitted = true;
        $this->period = null;
        $this->salary = null;
        $this->vat = null;
        $this->submittedVat = null;
        $this->proposal = null;
    }
}
