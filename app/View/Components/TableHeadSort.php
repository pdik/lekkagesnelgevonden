<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableHeadSort extends Component
{
    public $column, $title, $currentSortColumn, $sortType;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($column, $title, $currentSortColumn, $sortType)
    {
        $this->column = $column;
        $this->title = $title;
        $this->currentSortColumn = $currentSortColumn;
        $this->sortType = $sortType;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.table-head-sort');
    }
}
