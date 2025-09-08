<?php

namespace App\View\Components;

use App\Models\Info;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Newsletter extends Component
{
    public $video_id;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $nl_vid_url = Info::find(1)->nl_vid;
        preg_match('/vimeo\.com\/(\d+)/', $nl_vid_url, $matches);
        $this->video_id = $matches[1] ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.newsletter');
    }
}
