<?php

namespace App\traits;

use App\Models\Photo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait imageTrait
{
    public function uploadFile($request, $name, $folder, $id, $model)
    {
        if ($file = $request->file($name)) {
            $file_name = $file->getClientOriginalName();
            $file_name_Extension = $request->file($name)->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $file_name)[0] . '_.' . $file_name_Extension;
            if ($file->storeAs('public/admin/' . $folder . '/',$file_to_store)) {
                Photo::create([
                    'Filename' => $file_to_store,
                    'photoable_id' => $id,
                    'photoable_type' => $model,
                ]);
            }
        }

    }


    public function editFile($request, $name, $folder, $id, $model,$oldfile)
    {
        if ($file = $request->file($name)) {
            Storage::disk('public')->delete('admin/'. $folder .'/'. $oldfile);
            $file_name = $file->getClientOriginalName();
            $file_name_Extension = $file->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $file_name)[0] . '_.' . $file_name_Extension;
            if ($file->storeAs('public/admin/' . $folder . '/' , $file_to_store)) {
            
                Photo::updateOrCreate([
                    'photoable_id' => $id,
                    'photoable_type' => $model,
                ],[
                    'Filename' => $file_to_store,
                    'photoable_id' => $id,
                    'photoable_type' => $model,
                ]);
            }

        }
    }


    public function deletedFile( $folder, $id, $model,$oldFile)
    {
        Storage::disk('public')->delete('admin/'.$folder.'/'.$oldFile);
        Photo::where('photoable_id',$id)->where('photoable_type',$model)->delete();
    }


}
