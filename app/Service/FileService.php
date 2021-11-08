<?php

namespace App\Service;


use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class FileService
{
    /*
     * check the file in request then save it
     */
    public static function saveFile($request, string $fileName, string $disk = 'public', string $folder = 'images')
    {
        if (!$request->file($fileName)) {
            return;
        }
        $imageName = time().'.'.$request->image->extension();  
        // $path = $request->image->move(public_path('images'), $imageName);
        $request->image->storeAs('images', $imageName);
        // $path = self::saveFileToStorage($disk, $folder, $request->file($fileName));
        return $imageName;
    }

    /*
    * save file in storage depending on disk and folder
    * return path of the file
    */
    public static function saveFileToStorage($disk, $folder, $file): string
    {
        $path = Storage::disk($disk)->putFile('', new File($file));
        return '/storage/' . $path;
    }

}