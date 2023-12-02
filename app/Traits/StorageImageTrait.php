<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImageTrait
{
    public function UploadImageTrait($request, $fieldName, $folderName)
    {
        if($request->hasFile($fieldName)) {
            $file = $request->feature_image;
            $fileNameWithExt = $file->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $file->getClientOriginalExtension();
            $fileNameHash = $fileName . '_feature_image_' . time() . '.' . $ext;
            //        dd($fileNameHash);
//            $filePath = $request->file($fieldName)->storeAs('public/' . $folderName . '/' . auth('admin')->id(), $fileNameHash);
            $filePath = $request->file($fieldName)->storeAs('public/backend/images/' . $folderName, $fileNameHash);
            $data = [
                'fileName' => $fileNameWithExt,
                'filePath' => Storage::url($filePath)
//                'filePath' => $filePath
            ];
            return $data;
        }
        return null;
    }

    public function UploadMultipleImageTrait($request, $fieldName, $folderName)
    {
        $dataUpload = [];
        if($request->hasFile($fieldName)) {
            foreach ($request[$fieldName] as $item) {
                $fileNameWithExt = $item->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $ext = $item->getClientOriginalExtension();
                $fileNameHash = $fileName . '_detail_image_' . time() . '.' . $ext;
//                $filePath = $item->storeAs('public/' . $folderName . '/' . auth('admin')->id(), $fileNameHash);
                $filePath = $item->storeAs('public/backend/images/' . $folderName, $fileNameHash);
                $data = [
                    'fileName' => $fileNameWithExt,
                    'filePath' => Storage::url($filePath)
//                    'filePath' => $filePath
                ];
                $dataUpload[] = $data;
            }
            return $dataUpload;
        }
        return null;
    }

    public function DeleteImageTrait($path)
    {
        $realPath = str_replace('storage', 'public', $path);
        if(file_exists(Storage::path($realPath))){
            Storage::delete($realPath);
            return true;
        }
        return false;
    }

    public function DeleteMultipaleImageTrait($ArrPath)
    {
        foreach ($ArrPath as $item) {
            $realPath = str_replace('storage', 'public', $item);
            if(file_exists(Storage::path($realPath))) {
                Storage::delete($realPath);
            } else {
                return false;
            }
        }
        return true;
    }

}
