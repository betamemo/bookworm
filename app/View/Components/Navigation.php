<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navigation extends Component
{
    public $menu = [];
    
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menu = [
            ['name' => 'Home', 'url' => '/'],
            ['name' => 'Books', 'url' => '/books'],
            ['name' => 'Categories', 'url' => '/categories'],
            ['name' => 'Contact', 'url' => '/contact'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation');
    }
}
