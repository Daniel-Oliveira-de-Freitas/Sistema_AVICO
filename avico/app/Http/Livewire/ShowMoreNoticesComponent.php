<?php

namespace App\Http\Livewire;

use App\Models\Notice;
use Livewire\Component;

class ShowMoreNoticesComponent extends Component
{
    public $notices;
    public function render()
    {
        $this->notices = Notice::latest()->take(3)->get();
        return view('livewire.show-more-notices-component');
    }
}
