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
    public $isReadOnly;
    public $haveValue;
    public $value;
    public $isTextArea;
    
    /**
     * Create a new component instance.
     *
     * @param [type] $divClass =Agregar elementos a la clase del div principal
     * @param [type] $labelFor =Label que indica a que campo va, el name y el id
     * @param boolean $isRequiered = difinir si es un campo requerido o no 
     * @param [type] $label = texto que se muestra al usuario 
     * @param string $typeInput = tipo de input "numbre","date" y text es por default
     * @param boolean $isReadOnly = si es solo de lectura o no
     * @param boolean $haveValue = si contiene o no un value
     * @param [type] $value = el value si es que lo contienen 
     */
    public function __construct($divClass=null, $labelFor, $isRequiered=false,$label,$typeInput="text",$isReadOnly=false,$haveValue=false,$value=null,$isTextArea=false)
    {
        $this->divClass = $divClass;
        $this->labelFor = $labelFor;
        $this->isRequiered=$isRequiered;
        $this->label=$label;
        $this->typeInput=$typeInput;
        $this->isReadOnly=$isReadOnly;
        $this->haveValue=$haveValue;
        $this->value=$value;
        $this->isTextArea=$isTextArea;
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
