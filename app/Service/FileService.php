<?php

namespace App\Service;

use App\Models\UserRole;
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

    public static function rol($user, $club1, $color1)
    {
        $roles = $user->roles;
        $i = 0;
        $dd = [];
        $cc = [];
        foreach($roles as $role)
        {
            $userrole = UserRole::findOrFail($role->pivot->id); 
            if($club1 == null && $color1 == null)
            {
                array_push($dd , $userrole);
            }
            if($userrole->club_id == $club1 && $userrole->color_id == $color1)
            {
                
            }
            else
            {
                unset($roles[$i]);
            }
            
            $i = $i + 1;
        }
        
        // dd($cc);
        return $roles;
    }

}