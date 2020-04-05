<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SerieCard extends Component
{
    public $serie;
    public $genres;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($serie, $genres)
    {
        $this->serie = $serie;
        $this->genres = $genres;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.serie-card');
    }
}
