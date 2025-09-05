<?php

namespace App\View\Components;

use Closure;
use App\Models\Info;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Meta extends Component
{   
    public $logo;
    public $site_title;
    public $site_description;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->logo = Info::find(1)->logo ? asset('/storage/' . Info::find(1)->logo) : '' ;
        $this->site_title = Info::find(1)->title;
        $this->site_description = Info::find(1)->description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.meta');
    }
}
