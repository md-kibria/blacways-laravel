<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PopupAd extends Component
{
    public $ad;
    public $visibility;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $info = \App\Models\Info::find(1);
        $this->ad = $info ? $info->ad : null;
        $this->visibility = $info ? $info->ad_visibility : false;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.popup-ad');
    }
}
