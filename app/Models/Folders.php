<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Folders extends Model
{
	protected $table = 'folders';

	/**
	 * If a folder is removed remove all the files & folders included inside of it.
	 *
	 * @since 09/03/2021
	 * @author Pascal Lieverse <P.Lieverse@brightness-group.com>
	 *
	 * @return void
	 */
	protected static function booted()
	{
		static::deleted(function ($folder) {
			$files = File::where('folder_id', '=', $folder->id)->get();
			foreach ($files as $file) {
				$file->delete();
			}

			$folders = Folders::where('parent_id', '=', $folder->id)->get();
			foreach ($folders as $folder) {
				$folder->delete();
			}
		});
	}

	/**
	 * Get the type.
	 *
	 * @since 09/03/2021
	 * @author Pascal Lieverse <P.Lieverse@brightness-group.com>
	 *
	 * @return string type
	 */
	public function getType()
	{
		return "folder";
	}

	/**
	 * Get the parent of the folder.
	 *
	 * @since 09/03/2021
	 * @author Pascal Lieverse <P.Lieverse@brightness-group.com>
	 *
	 * @return HasOne Folders
	 */
	public function parent(): HasOne
	{
		return $this->hasOne(Folders::class, 'id', 'parent_id');
	}

	/**
	 * Get all the children of the folder.
	 *
	 * @since 09/03/2021
	 * @author Pascal Lieverse <P.Lieverse@brightness-group.com>
	 *
	 * @return HasMany Folders
	 */
	public function children(): HasMany
	{
		return $this->hasMany(Folders::class, 'parent_id', 'id');
	}

	/**
	 * Check if the folder can be moved to the given folder.
	 *
	 * @param int $folderId the id of the folder where its going to be moved to
	 *
	 * @since 09/03/2021
	 * @author Pascal Lieverse <P.Lieverse@brightness-group.com>
	 *
	 * @return bool true if folder can be moved
	 */
	public function canMoveTo($folderId)
	{
		$bool = false;

		if ($this->id != $folderId) {
			$bool = !$this->checkFolder($this->id, $folderId);
		}

		return $bool;
	}

	/**
	 * Check if a folder is inside the given folder.
	 *
	 * @param int $headId the id of the folder
	 * @param int $sub the id of the folder where its going to be moved to
	 *
	 * @since 09/03/2021
	 * @author Pascal Lieverse <P.Lieverse@brightness-group.com>
	 *
	 * @return bool
	 */
	private function checkFolder($headId, $sub)
	{
		$status = false;
		$subfolders = Folders::where('parent_id', '=', $headId)->get();

		//check folders beneath it
		foreach ($subfolders as $subfolder) {

			if ($subfolder->id == $sub) {
				$status = true;
				break;
			}
			//check folders beneath it
			$status = $this->checkFolder($subfolder->id, $sub);
		}

		return $status;
	}

	/**
	 * Get the total size of the folder.
	 *
	 * @since 09/03/2021
	 * @author Pascal Lieverse <P.Lieverse@brightness-group.com>
	 *
	 * @return int size
	 */
	public function getSize(): int
	{
		$size = 0;

		$files = File::where('folder_id', '=', $this->id)->get();
		foreach ($files as $file) {
			$size += $file->size;
		}

		$folders = Folders::where('parent_id', '=', $this->id)->get();
		foreach ($folders as $folder) {
			$size += $folder->getSize();
		}

		return $size;
	}

	/**
	 * Get the total count of files beneath it.
	 *
	 * @since 09/03/2021
	 * @author Pascal Lieverse <P.Lieverse@brightness-group.com>
	 *
	 * @return int count
	 */
	public function getFileCount(): int
	{
		$count = File::where('folder_id', '=', $this->id)->count();

		$folders = Folders::where('parent_id', '=', $this->id)->get();
		foreach ($folders as $folder) {
			$count += $folder->getFileCount();
		}

		return $count;
	}

	/**
	 * Get the total count of folder beneath it.
	 *
	 * @since 09/03/2021
	 * @author Pascal Lieverse <P.Lieverse@brightness-group.com>
	 *
	 * @return int count
	 */
	public function getFolderCount(): int
	{
		$count = 0;

		$folders = Folders::where('parent_id', '=', $this->id)->get();
		foreach ($folders as $folder) {
			$count++;
			$count += $folder->getFolderCount();
		}

		return $count;
	}
}
