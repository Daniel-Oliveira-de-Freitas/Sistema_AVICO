<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{

    public String $alertType;
    public String $message;
    public String $dismissible;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(String $alertType, String $message, String $dismissible = 'true')
    {
        $this->alertType = $alertType;
        $this->message = $message;
        $this->dismissible = $dismissible;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
