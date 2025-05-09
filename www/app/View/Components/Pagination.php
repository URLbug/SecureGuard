<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Pagination extends Component
{
    public string $route;
    public int $perPage;
    public int $lastPage;
    public int $currentPage;
    public bool $isAdmin;

    /**
     * Create a new component instance.
     */
    public function __construct(string $route, int $perPage,  int $lastPage, int $currentPage, bool $isAdmin = false)
    {
        $this->route = $route;
        $this->perPage = $perPage;
        $this->lastPage = $lastPage;
        $this->currentPage = $currentPage;
        $this->isAdmin = $isAdmin;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if($this->isAdmin) {
            return view('components.pagination-admin');
        }

        return view('components.pagination');
    }
}
