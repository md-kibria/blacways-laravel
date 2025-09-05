<?php

namespace App\View\Components;

use App\Models\Info;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $logo;
    public $title;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->logo = Info::find(1)->logo ? asset('/storage/' . Info::find(1)->logo) : '';
        $this->title = Info::find(1)->title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
