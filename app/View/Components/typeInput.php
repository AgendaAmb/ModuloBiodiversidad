<?php

namespace App\View\Components;

use Illuminate\View\Component;

class typeInput extends Component
{
    public $divClass;
    public $labelFor;
    public $isRequiered;
    public $label;
    public $typeInput;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($divClass=null, $labelFor,$isRequiered=false,$label,$typeInput="text")
    {
        $this->divClass = $divClass;
        $this->labelFor = $labelFor;
        $this->isRequiered=$isRequiered;
        $this->label=$label;
        $this->typeInput=$typeInput;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.type-input');
    }
}
