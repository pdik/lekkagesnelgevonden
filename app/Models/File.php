<?php

namespace App\Models;

use App\Models\Folders;
use Database\Seeders\users;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = ['name','extension','path'];


    public static $imageExtensions = ["jpg", "jpeg", "webp", "gif", "png", "svg", "bmp"];
    public static $videoExtensions      = ["webm", "mp4"];

    /**
     * Document extensions
     * Word, excel, powerpoint,Access,pdf
     */

    public static $docExtensions =  [
        'word'       => ["docx", "docm", "dotx","dotm","docb","doc", "dot", "wbk"],
        'excel'      => ["xls", "xlt","xlm","xlsx", "xlsm","xltx", "xltm"],
        'powerpoint' => ["ppt", "pot", "pps", "pptx", "pptm", "potx", "potm", "ppam","ppsx", "ppsm", "sldx", "sldm"],
        'acces'      => ["accdb", "accde","accdt","accdr"],
        'one'        => ["one"],
        'pdf'        => ["pdf"],
    ];


    /**
     * If a file gets deleted from the db also remove the stored file and thumbnail.
     *
     * @since 09/03/2021
     * @author Pascal Lieverse <P.Lieverse@brightness-group.com>
     *
     * @return void
     */
    protected static function booted()
    {
        static::deleted(function ($file) {
            File::delete(storage_path('app/files/thumbnails/' . $file->file_name . '.jpg'));
            File::delete(storage_path('app/files/' . $file->file_name . '.' . $file->extension));
        });
    }
        public function folder()
    {
        return $this->hasOne(Folders::class, 'id', 'folder_id');
    }
        public function getType()
    {
        return "file";
    }
      public function owner()
    {
        return $this->hasOne(Users::class, 'id', 'user_id');
    }

    /**
     * Get of multi array a single array  with all extensions for Documents
     * @since 22/03/2021
     * @author Pepijn dik <pepijn@pdik.nl>
     * @return array
     *
     */
    public static function getAllDocuments(): array
    {
        return array_values(File::$docExtensions);
    }

    public static function getMedia(){
        return array_merge(File::$imageExtensions,File::$videoExtensions);
    }

      /**
     * Return Icons
       *
       * @since 06/03/2021
     * @author Pepijn dik <pepijn@pdik.nl>
     */
    public static function getIcon($file){

        /**
         * Filter for Document extensions
         */
        foreach(File::$docExtensions as $key => $doc) {
            if(in_array($file->extension, $doc)){
                return asset('images/files/svg/'.$key.'.svg');
            }
        }
        /**
         * Filter for image extensions
         */

        if(in_array($file->extension, File::$imageExtensions)){
            return route('thumbnail', [$file->name]);
        }

        /**
         * Filter for Video extensions
         */

        if(in_array($file->extension, File::$videoExtensions )){
            return route('thumbnail', [$file->name]);
        }

        return asset('images/file.png');

    }
}
