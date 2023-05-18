<?php

namespace App\View\Components;

use App\Models\Notice;
use Illuminate\View\Component;

class CardNotice extends Component
{
    public Notice $notice;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Notice $notice = null)
    {
        $this->notice = $notice;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-notice');
    }
}
