<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\report;
use Livewire\WithPagination;
class SearchReports extends Component
{
    use WithPagination;

    public $searchTerm;
    public $page = 1;


    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.search-reports', [
            'reports' => report::wherehas('customer', function($query) use($searchTerm){
                $query->where('first_name', 'LIKE', $searchTerm)->orWhere('last_name', 'LIKE', $searchTerm)->orWhere('adres', 'LIKE', $searchTerm)->orWhere('postalcode', 'LIKE', $searchTerm)->orWhere('placename', 'LIKE', $searchTerm);
            })->paginate()
        ]);
    }
}
