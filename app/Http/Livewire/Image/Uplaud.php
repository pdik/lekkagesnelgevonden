<?php

namespace App\Http\Livewire\Image;

use App\Models\Files;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
class Uplaud extends Component
{
    use WithFileUploads;
        public $uploads = [];
    	public $unique,$selectionId;
    	public $selectedFiles = [];
        public function mount($selectionId = "")
        {
            $this->unique = Str::random();
            $this->selectionId = $selectionId;
        }
        function clearSelected()
        {
            $this->selectedFiles = [];
        }
    public function render()
    {
        return view('livewire.image.uplaud');
    }
    public function updatedUploads()
	{
		$this->resetErrorBag();
		$this->validate([
			'uploads.*' => '',
		]);

		foreach ($this->uploads as $upload) {
			$this->handleFileUpload($upload);
		}
	}

	private function handleFileUpload($upload)
	{
	    $extension = $upload->getClientOriginalExtension();
	    $name = str_replace('.' . $extension, "", $upload->getClientOriginalName());
	    $file = Files::where('name', $name)->first();
	    if(empty($file)){
	        //Files does'nt exist
            $randomName = Carbon::now()->timestamp . Str::random();

            $upload->storeAs('files', $randomName . '.' . $extension);
            $file = new Files;
            $file->name =
            $file->file_name = $randomName;
            $file->extension = $extension;
            $file->size = $upload->getSize();
            $file->folder_id = 0;
            $file->user_id = Auth::id();
            $file->save();
            $this->generateThumbnail($file);
        }
	}

	private  function generateThumbnail(Files $file) {
            if (in_array(strtolower($file->extension), Files::$imageExtensions)) {
			Files::generateImageThumbnail($file);
		} else if (in_array(strtolower($file->extension), Files::$videoExtensions)) {
			Files::generateVideoThumbnail($file);
		}
    }

}
