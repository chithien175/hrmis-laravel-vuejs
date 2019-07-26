<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use MediaUploader;
use Plank\Mediable\Media;

class MediaController extends Controller
{
    public function list(Request $request)
    {
        $media = Media::where('directory', $request['folder'])->orderBy('created_at', 'desc')->get()->toArray();

        $folders = scandir(public_path($request['folder']));
        unset($folders[0]);unset($folders[1]);

        foreach($folders as $key => $folder){
            if( is_file(public_path('media\\').$folders[$key]) ){
                unset($folders[$key]);
            }else{
                $folder = [
                    'id' => $key.'_'.$folder,
                    'aggregate_type' => 'folder',
                    'filename' => $folder,
                    'extension' => 'folder',
                    'directory' => $folder
                ];
                array_unshift($media , $folder);
            }
            
        }

        return $media;
    }

    public function upload(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'file' => 'file|max:20000'
        ]);

        if($validator->fails()){
            return response(['message' => $validator->errors()], 433);
        }

        $file = $request['file'];
        $folder = $request['folder'];
        $uniqid = uniqid();

        if(!file_exists(public_path($folder))){
            mkdir(public_path($folder), 0755, true);
        }

        $mainFileName = $uniqid . '.' . $file->getClientOriginalExtension();

        if($file->getClientOriginalExtension() == 'JPG|PNG|GIF'){
            $mainImage = \Image::make($file)
            ->resize(1080, null, function ($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->save(public_path($folder) . $mainFileName);

            $thumbFileName = $uniqid . '_thumb.' . $file->getClientOriginalExtension();

            $thumbImage = \Image::make($file)
                ->resize(400, null, function ($constraint){
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save(public_path($folder) . $thumbFileName);
        }else{
            $file->move(public_path($folder),$mainFileName);
        }

        $media = MediaUploader::fromSource(public_path($folder) . $mainFileName)
            ->toDirectory($folder)
            ->upload();

        return response()->json(['data' => $media], 201);
    }

    public function destroy($id)
    {
        $media = Media::findOrFail($id);

        $media_path = public_path($media->directory).''.$media->filename.'.'.$media->extension;
        $media_thumb_path = public_path($media->directory).''.$media->filename.'_thumb.'.$media->extension;

        if(file_exists($media_path)){
            @unlink($media_path);
        }
        if(file_exists($media_thumb_path)){
            @unlink($media_thumb_path);
        }

        $media->delete();

        return ['message' => 'Đã xóa tập tin'];
    }

    public function handleImageAdded(Request $request){
        if ($request->hasFile('image')) {
            // $path = $request->image->path();
            // $extension = $request->image->extension();

            $validator = \Validator::make($request->all(), [
                'image' => 'image'
            ]);
    
            if($validator->fails()){
                return response(['message' => $validator->errors()], 433);
            }
    
            $file = $request['image'];
            $folder = 'media/post/' . Carbon::now()->year . '/' . Carbon::now()->month . '/';
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
            
            $media_url = '/'.$media->directory.''.$media->filename.'.'.$media->extension;

            return response()->json(['url' => $media_url], 200);
        }
        
    }
}
