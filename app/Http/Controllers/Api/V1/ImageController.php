<?php

namespace App\Http\Controllers\Api\V1;

use App\Helper;
use App\Http\Controllers\Controller;
Use Pdik\LaravelLibrary\Models\Files;
use App\Models\Items;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class ImageController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ckeditor');
    }
    /**
     * Upload a image
     *
     * @return array
     */
    public function upload(Request $request)
    {
        $file = '';
        if ($request->hasFile('upload')) {

            $extension = $request->file('upload')->getClientOriginalExtension();
            $name =str_replace('.' . $extension, "", $request->file('upload')->getClientOriginalName());

            $file = Files::where('name',$name)->first();
            if(empty($file)){
                $randomName = Carbon::now()->timestamp . Str::random();
                $path = $request->file('upload')->storeAs('files', $randomName . '.' . strtolower($extension),  'public' );
                $file = new Files;
                $file->name = $name;
                $file->file_name = $randomName;
                $file->extension = strtolower($extension);
                $file->size = $request->file('upload')->getSize();
                $file->folder_id = 0;
                $file->save();
                //$this->generateThumbnail($file);
            }
        }
           return array(
                    'url' =>  $this->getImageCkeditor($file->name)
            );
    }
    /**
     * Get the current file from the storage.
     *
     * @param string $fileName
     *
     * @since 06/04/2021
     * @author Pepijn dik <pepijn@pdik.nl>
     *
     * @return  \Symfony\Component\HttpFoundation\BinaryFileResponse file
     */
    public function getImage(string $fileName)
    {
        $file = Files::where('name', '=', $fileName)->first();
        return response()->file(storage_path('app/files/' . $file->file_name . '.' . $file->extension));
    }
    //test
    public function getImageCkeditor(string $fileName){
        $file = Files::where('name', '=', $fileName)->firstOrFail();
        return Storage::url('files/' . $file->file_name . '.' . $file->extension);
    }


}
