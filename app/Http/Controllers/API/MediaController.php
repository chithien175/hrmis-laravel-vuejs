<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use MediaUploader;
use Plank\Mediable\Media;

class MediaController extends Controller
{
    public function list()
    {
        $images = Media::orderBy('created_at', 'desc')->get();
        return $images;
    }

    public function upload(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'file' => 'file|image'
        ]);

        if($validator->fails()){
            return response(['message' => $validator->errors()], 433);
        }

        $file = $request['file'];
        $folder = 'media/' . Carbon::now()->year . '/' . Carbon::now()->month . '/';
        $uniqid = uniqid();

        $mainFileName = $uniqid . '.' . $file->getClientOriginalExtension();
        $thumbFileName = $uniqid . '_thumb.' . $file->getClientOriginalExtension();

        if(!file_exists(public_path($folder))){
            mkdir(public_path($folder), 0755, true);
        }

        $mainImage = \Image::make($file)
            ->resize(1080, null, function ($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->save(public_path($folder) . $mainFileName);

        $media = MediaUploader::fromSource(public_path($folder) . $mainFileName)
            ->toDirectory($folder)
            ->upload();

        $thumbImage = \Image::make($file)
            ->resize(400, null, function ($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->save(public_path($folder) . $thumbFileName);

        return response()->json(['data' => $media], 201);
    }
}
