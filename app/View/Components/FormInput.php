<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInput extends Component
{

    public $type;
    public $title;
    public $model;
    public $disable;

    /**
     * FormInput constructor.
     * @param string $type
     * @param string $title
     * @param string $model
     */
    public function __construct($type, $title, $model,$disable=false)
    {
        $this->type = $type;
        $this->title = $title;
        $this->model = $model;
        $this->disable=$disable;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {

        return view('components.form.form-input');
    }
}
