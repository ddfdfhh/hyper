<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Share extends Component
{
    /**
     * The message type.
     *
     * @var string
     */
    public $title;
     public $img;

    /**
     * message.
     *
     * @var string
     */
    public $details;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($title, $img,$details)
    {
        $this->title = $title;
        $this->details = $details;
          $this->img = $img;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.share');
    }
}