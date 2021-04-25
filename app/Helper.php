<?php

namespace App;

use App\Models\Files as Files;

use Brightnessgroup\LaravelUltimateLibrary\Http\Controllers\LibraryController;
use Cache;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class Helper
{
    public $path;
    public function setPath($path) {
        $this->path = $path;
    }

    public static  function GetImagesForPdf($images) {
        //Get all selected files from the database and then order them in the given value order
        $ids = collect(explode(',', $images));
        $files = \Brightnessgroup\LaravelUltimateLibrary\Models\Files::whereIn('id', $ids)->get();
        $images = $ids->map(function ($id) use ($files) {
            return $files->where('id', $id)->first();
        });

        foreach($images as $index => $image) {
            $images[$index] = array( //make an array of images and corresponding miniatures
                'full' =>  route('laravel-ultimate-library::file', $image->name),
                'thumb' => Helper::getThumbnail($image->name),
                'alt'   => 'text',
            );
        }
        return (count($images)) ? $images : false;
    }
    public static function createArray($images){
          $ids = collect(explode(',', $images));
        return $ids;
    }
    /**
     * Get Files
     */
    public static function getFile(string $fileName){
        $file = \Brightnessgroup\LaravelUltimateLibrary\Models\Files::where('name', '=', $fileName)->firstOrFail();
		return response()->file(storage_path('app/library/' . $file->file_name . '.' . $file->extension));
    }
  	public static  function getThumbnail($fileName)
	{
	    $file = \Brightnessgroup\LaravelUltimateLibrary\Models\Files::where('name', '=', $fileName)->firstOrFail();
	    return  $file->file_name . '.' . $file->extension;
	}
}
