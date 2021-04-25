<?php

namespace App\View\Components;

use App\Models\Files;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class fileSelect extends Component
{
  public $model, $value, $type, $unique, $filter;

	public function __construct($model, $value,$filter = null, $type = 'single' )
	{

		$this->model = $model;
		$this->value = $value;
		$this->type = $type;
		$this->unique = Str::random();
		$this->filter = $filter;
	}

	public function render()
	{
		$data = array();

		if ($this->type == 'single' && $this->value) {
			$data['file'] = Files::where('id', '=', $this->value)->first();
		} else if ($this->type == 'multi' && $this->value) {
			//Get all selected files from the database and then order them in the given value order
			$ids = collect(explode(',', $this->value));
			$files = Files::whereIn('id', $ids)->get();

			$sorted = $ids->map(function ($id) use ($files) {
				return $files->where('id', $id)->first();
			});

			$data['files'] = $sorted;
		}
        return view('components.file-select');
    }
}
