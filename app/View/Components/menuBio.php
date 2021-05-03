<?php

namespace App\View\Components;

use Illuminate\View\Component;

class menuBio extends Component
{
  
    public $btnUrl;
    public $btnText;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $btnText, $btnUrl)
    {
     
        $this->btnText = $btnText;
        $this->btnUrl = $btnUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.menu-bio');
    }
}
