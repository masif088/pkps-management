<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormDate extends Component
{
    public $type;
    public $title;
    public $model;
    public $time;

    /**
     * FormInput constructor.
     * @param string $type
     * @param string $title
     * @param $model
     * @param $time
     */
    public function __construct($type, $title, $model)
    {
        $this->type = $type;
        $this->title = $title;
        $this->model = $model;
//        $this->time = $time;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.form.form-date');
    }
}
