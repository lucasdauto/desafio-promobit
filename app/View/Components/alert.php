<?php

namespace App\View\Components;

use Illuminate\View\Component;

class alert extends Component
{
    /**
     * The message type.
     *
     * @var string
     */
    public $type;

    /**
     * content of alert.
     *
     * @var string
     */
    public $content;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $type, string $content)
    {
        $this->type = $type;
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
