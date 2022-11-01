<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WorkDayItem extends Component
{
    public $workday;
    
    public function __construct($workday = [])
    {
        $this->workday = $workday;
    }
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.work-day-item');
    }
}
