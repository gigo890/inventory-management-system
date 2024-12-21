<?php

namespace App\View\Components\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditItem extends Component
{
    /**
     * Create a new component instance.
     */

     public $item;
    public function __construct($item)
    {
        //Take an item as input
        $this->item=$item;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.edit-item');
    }
}
