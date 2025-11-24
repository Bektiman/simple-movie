<?php

namespace App\View\Components\Movie;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     * 
     * 
     */

     public $index;
     public $title;
     public $releasedate;
     public $image;

    public function __construct($index,$title,$releasedate,$image)
    {
        //

        $this->index =$index;
        $this->title =$title;
        $this->releasedate =$releasedate;
        $this->image =$image;

  
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.movie.card');
    }
}
