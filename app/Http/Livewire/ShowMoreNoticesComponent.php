<?php

namespace App\Http\Livewire;

use App\Models\Notice;
use Livewire\Component;

class ShowMoreNoticesComponent extends Component
{
    public $notices;

    public function render()
    {
        return view('livewire.show-more-notices-component');
    }

    public function mount()
    {
        $this->notices = Notice::latest()->take(3)->get();
    }
}
