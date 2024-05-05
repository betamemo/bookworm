<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navigation extends Component
{
    public $menu = [];

    public function __construct()
    {
        $this->menu = [
            ['name' => 'Home', 'url' => '/'],
            ['name' => 'Books', 'url' => '/books'],
            ['name' => 'Authors', 'url' => '/authors'],
            ['name' => 'Genres', 'url' => '/genres'],
            ['name' => 'Search', 'url' => '/search'],
        ];
    }

    public function render(): View|Closure|string
    {
        return view('components.navigation');
    }
}
