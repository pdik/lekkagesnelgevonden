<?php

namespace App;

use App\Models\File as Files;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class Helper
{

    /**
     * Get File
     */
    public static function getFile($id){
        $file = Files::find($id);
        return route('file', [$file->name]);

       //return response()->file(storage_path('app/library/' . $file->file_name . '.' . $file->extension));
    }
	/**
	 * Create a pagination of a collection (For when merging the Files and Folders result).
	 *
	 * @param $items
	 * @param int $perPage
	 * @param int $page
	 * @param array $options
	 *
	 * @since 09/03/2021
	 * @author Pascal Lieverse <P.Lieverse@brightness-group.com>
	 *
	 * @return LengthAwarePaginator
	 */
	public static function paginate($items, $perPage = 5, $page = null, $options = [])
	{
		$page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
		$items = $items instanceof Collection ? $items : Collection::make($items);
		return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
	}

	/**
	 * Format bytes to a readable format.
	 *
	 * @param int $bytes
	 * @param int $precision
	 *
	 * @since 09/03/2021
	 * @author Pascal Lieverse <P.Lieverse@brightness-group.com>
	 *
	 * @return string bytes in a readable format
	 */
	public static function formatBytes($bytes, $precision = 2)
	{
		$units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

		$bytes = max($bytes, 0);
		$pow = floor(($bytes ? log($bytes) : 0) / log(1024));
		$pow = min($pow, count($units) - 1);

		// Uncomment one of the following alternatives
		$bytes /= pow(1024, $pow);

		return round($bytes, $precision) . ' ' . $units[$pow];
	}

	/**
	 * Generate a thumbnail of a image file.
	 *
	 * @param Files $file of the image
	 *
	 * @since 09/03/2021
	 * @author Pascal Lieverse <P.Lieverse@brightness-group.com>
	 *
	 * @return void
	 */
	public static function generateImageThumbnail(Files $file)
	{
		$fileName = $file->file_name . '.' . $file->extension;
		$image = Image::make(File::get(storage_path('app/files/' . $fileName)));


		$image->resize(200, 150, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		})->resizeCanvas(200, 150, 'center', false, "#ffffff");

		$image->save(storage_path('app/files/thumbnails/' . $file->file_name . '.jpg'));
	}

	/**
	 * Generate a thumbnail of a video file.
	 *
	 * @param Files $file of the video
	 *
	 * @since 09/03/2021
	 * @author Pascal Lieverse <P.Lieverse@brightness-group.com>
	 *
	 * @return void
	 */
	public static function generateVideoThumbnail(Files $file)
	{
		$fileName = $file->file_name . '.' . $file->extension;

		$media = FFMpeg::open('files/' . $fileName);
		$duration = $media->getDurationInSeconds();
		$media->getFrameFromSeconds($duration / 4)->export()->save('files/thumbnails/' . $file->file_name . ".jpg");
	}
}
