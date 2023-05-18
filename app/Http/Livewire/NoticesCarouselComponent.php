<?php

namespace App\Http\Livewire;

use App\Models\Notice;
use Livewire\Component;

class NoticesCarouselComponent extends Component
{

    public $notices;

    public function render()
    {
        return view('livewire.notices-carousel-component');
    }

    public function mount()
    {
        $this->notices = Notice::latest()->take(6)->get();
    }
}
