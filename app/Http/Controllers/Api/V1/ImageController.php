<?php

namespace App\Http\Controllers\Api\V1;

use App\Helper;
use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Items;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        if ($request->hasFile('upload')) {

            $extension = $request->file('upload')->getClientOriginalExtension();
            $name =str_replace('.' . $extension, "", $request->file('upload')->getClientOriginalName());
            $file = File::where('name',$name)->first();
            if($file == null){
                $randomName = Carbon::now()->timestamp . Str::random();
                $path = $request->file('upload')->storeAs('files', $randomName . '.' . $extension);
                $file = new File;
                $file->name = $name;
                $file->file_name = $randomName;
                $file->extension = $extension;
                $file->size = $request->file('upload')->getSize();
                $file->folder_id = 0;
                $file->save();
                $this->generateThumbnail($file);
            }
            return  array(
                'url' => route('file', [$file->name])
            );
        }
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
        $file = File::where('name', '=', $fileName)->firstOrFail();
        return response()->file(storage_path('app/files/' . $file->file_name . '.' . $file->extension));
    }
    private function generateThumbnail(File $file)
    {
        if (in_array(strtolower($file->extension), File::$imageExtensions)) {
            Helper::generateImageThumbnail($file);
        } else if (in_array(strtolower($file->extension), File::$videoExtensions)) {
            Helper::generateVideoThumbnail($file);
        }
    }
    public function getThumbnail($fileName)
    {
        return Cache::rememberForever('thumbnail-' . $fileName, function () use ($fileName) {
            $file = File::where('name', '=', $fileName)->firstOrFail();
            return File::make(File::get(storage_path('app/files/thumbnails/' . $file->file_name . '.jpg')))->response();
        });
    }
    /**
     * When an image is edited with TUI image editor save it to the storage/database.
     *
     * @param Request $request {file name, file extension, image, current folder}
     *
     * @return File file
     *@author Pepijn dik <pepijn@pdik.nl>
     *
     * @since 11/03/2021
     */
    public function postEdit(Request $request)
    {
        $file = new File();
        $file->name = $request->name . '_' . Str::random(2);
        $file->file_name = Carbon::now()->timestamp . Str::random();
        $file->extension = $request->extension;
        $file->size = strlen(base64_decode($request->image));
        $file->folder_id = $request->folder;
        $file->user_id = Auth::id();
        $file->save();

        $image = preg_replace('/^data:image\/\w+;base64,/', '', $request->image);
        Storage::put('/files/' . $file->file_name . '.' . $file->extension, base64_decode($image));

        Helper::generateImageThumbnail($file);
        return $file;
    }

}
