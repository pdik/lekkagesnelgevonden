<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithUpdate;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Methods;
class Chooser extends Component
{
    use WithPagination;
    use WithUpdate;

    /**
     * Transition status.
     */
    private const STATUS = [
        'selected' => 'unselected',
        'unselected' => 'selected',
    ];

    /**
     * Items per page.
     *
     * @var int
     */
    public  $pagination = 0 ;

    /**
     * Filter Method.
     *
     * @var string
     */
    public $filter = 'all';

    /**
     * Selected array
     */

    public $selected = [];


    /**
     * Search Items.
     *
     * @var string
     */
    public $search = '';



    /**
     * New method value
     *
     * @var string
     */
    public $name = '';


    /**
     * Render the component.
     *
     * @return View
     */
    public function render()
    {
        $methods = Methods::search($this->search)->paginate($this->pagination);
        return view('livewire.chooser', ['methods' => $methods]);

       // dd($methods);
    }

    /**
     * Mount component.
     *
     * @param int $pagination
     */
    public function mount(int $pagination): void
    {
        $this->pagination = $pagination;
        $this->checkItemsOnCurrentPage = false;
        $this->fill(request()->only('search', 'page', 'filter'));
    }



    /**
     * Override the pagination view.
     *
     * @return string
     */
    public function paginationView(): string
    {
        return 'vendor/livewire/simple-bootstrap';
    }
}
