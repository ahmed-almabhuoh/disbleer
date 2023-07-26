<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $label, public $name, public $id = null, public $model = null, public $rowNumber = 3, public $columnNumber = 3, public $description = null, public $isActive = true, public $classes = 'col-md-12')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.textarea');
    }
}
