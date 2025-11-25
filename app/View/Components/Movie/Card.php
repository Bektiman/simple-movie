<?php

namespace App\View\Components\Movie;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
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


        if($this->isValid()){
            $this->title = Str::upper($this->title);
            $this->releasedate = Carbon::parse($this->releasedate)->format('M d, Y');

        }



    }

    public function isValid() {



        return $this->title && $this->releasedate && $this->getImage();


    }

    public function getImage(){

        if($this->image){
            return $this->image;
        }
        return 'https://via.placeholder.com/300x450';

    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.movie.card');
    }
}
