<?php

namespace App\View\Components;

use Illuminate\View\Component;

class upload_image extends Component
{
    public $lable,$name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($lable,$name)
    {
        $this->lable=$lable;
        $this->name=$name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.upload_image');
    }
}
