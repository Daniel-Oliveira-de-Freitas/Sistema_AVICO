<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ErrorMessage extends Component
{

    public String $errorName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($errorName)
    {
        $this->errorName = $errorName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.error-message');
    }
}
