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

    public $id;
    public $image;
    public $title;
    public $description;
    public $likes;
    public $author;
    public $toModerate;
    public $liked;
    

    public function __construct($id, $title, $description, $image, $likes = 0, $author = "", $toModerate = 0, $liked = false)
    {   
        $this->id = $id;
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;
        $this->likes = $likes;
        $this->author = $author;
        $this->toModerate = $toModerate;
        
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
