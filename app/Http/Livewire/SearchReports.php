<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\report;
use Livewire\WithPagination;
class SearchReports extends Component
{
    use WithPagination;
    public $search;
    public $report;
    public $page = 1;


    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'report',
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.search-reports', [
            'reports' => report::wherehas('customer', function($query){
            $query->where('first_name', 'LIKE', '%'. $this->search. '%');
         })->paginate(10)
        ]);
    }
}
