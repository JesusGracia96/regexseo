<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ImageCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $image;
    public $title;
    public $description;
    public $likes;
    

    public function __construct($title, $description, $image, $likes)
    {
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;
        $this->likes = $likes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.image-card');
    }
}
