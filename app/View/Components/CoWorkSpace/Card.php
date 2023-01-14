<?php

namespace App\View\Components\CoWorkSpace;

use App\Models\Cws;
use Illuminate\View\Component;

class Card extends Component
{

    public $coWorkSpace;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Cws $cws)
    {
        $this->coWorkSpace = $cws;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.co-work-space.card');
    }
}
