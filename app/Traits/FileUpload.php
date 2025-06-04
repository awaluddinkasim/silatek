<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait FileUpload
{
    /**
     * Upload file ke server.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @param  string  $path
     * @return string
     */
    public function uploadFile($file, $path)
    {
        $filename = time() . '.' . $file->extension();
        $file->move(public_path($path), $filename);

        return $filename;
    }

    /**
     * Hapus file dari server.
     *
     * @param  string  $filename
     * @param  string  $path
     * @return void
     */
    public function deleteFile($filename, $path)
    {
        if (file_exists(public_path($path . '/' . $filename))) {
            File::delete(public_path($path . '/' . $filename));
        }
    }
}
