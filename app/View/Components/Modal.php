<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $idModal;
    public $modalTitle;
    public $isRechazada;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($idModal, $modalTitle, $isRechazada)
    {
        $this->idModal = $idModal;
        $this->modalTitle = $modalTitle;
        $this->isRechazada = $isRechazada;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
