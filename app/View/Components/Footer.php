<?php

namespace App\View\Components;

use App\Models\Info;
use App\Models\Media;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public $info;
    public $media;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->info = Info::first();
        $this->media = Media::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.footer');
    }
}
