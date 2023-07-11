<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\Disable;
use App\Models\Report;
use App\Models\Supervisor;
use Livewire\Component;

class Index extends Component
{
    protected $reports;
    public $searchTerm;

    public function render()
    {
        $this->reports = Report::where('title', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('report', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('created_at', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('updated_at', 'LIKE', '%' . $this->searchTerm . '%')
            ->paginate(10);

        foreach ($this->reports as $report) {
            $report->setAttribute('reporterFromName', null);
            $report->setAttribute('reportedFromName', null);
            $reporter = null;
            $reported = null;
            if ($report->report_from == 'disable') {
                $reporter = Disable::where('id', $report->reporter)->first();
                $reported = Supervisor::where('id', $report->reported)->first();
            } else {
                $reporter = Supervisor::where('id', $report->reporter)->first();
                $reported = Disable::where('id', $report->reported)->first();
            }
            if (!is_null($reporter)) {
                $report->setAttribute('reporterFromName', $reporter->fname . ' ' . $reporter->lname);
            }
            if (!is_null($reported)) {
                $report->setAttribute('reportedFromName', $reported->fname . ' ' . $reported->lname);
            }
        }

        return view('livewire.backend.reports.index', [
            'reports' => $this->reports,
        ]);
    }
}
