<?php

namespace App\Http\Livewire;

use App\Models\Notice;
use Livewire\Component;

class NoticesCarousel extends Component
{

    public $notices;

    public function render()
    {
        return view('livewire.notices-carousel');
    }

    public function mount()
    {
        $this->notices = Notice::latest()->take(6)->get();
    }
}
