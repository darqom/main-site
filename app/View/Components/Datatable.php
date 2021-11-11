<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Datatable extends Component
{
    public $data;

    public $dynamic;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data, $dynamic = false)
    {
        $this->data = $data;
        $this->dynamic = $dynamic;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.datatable', [
            'data' => $this->data,
            'dynamic' => $this->dynamic
        ]);
    }
}
