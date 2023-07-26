<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Action extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $submitAction, public $submitText = 'Submit', public $cancelText= 'Cancel', public $cancelAction = 'cancel', public $classes = 'text-center')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action');
    }
}
