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

        $folders = scandir(public_path($request['folder'].'/'));
   
        foreach($folders as $key => $folder){
            if ($folder == '.' || $folder == '..') {
                continue;
            }
            if( is_dir(public_path($request['folder'].'/').$folders[$key]) ){
                $item = [
                    'id' => $key.'_'.$folder,
                    'aggregate_type' => 'folder',
                    'filename' => $folder,
                    'extension' => 'folder',
                    'directory' => $request['folder']
                ];
                array_unshift($media , $item);
            }else{
                unset($folders[$key]);
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

        if(!file_exists(public_path($folder) . '/')){
            mkdir(public_path($folder) . '/', 0755, true);
        }

        $mainFileName = $uniqid . '.' . $file->getClientOriginalExtension();

        // nếu là hình ảnh
        if($file->getClientOriginalExtension() == 'jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF'){
            $mainImage = \Image::make($file)
            ->resize(1920, null, function ($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->save(public_path($folder) . '/' . $mainFileName);
        // nếu không phải hình ảnh
        }else{
            $file->move(public_path($folder) . '/',$mainFileName);
        }

        $media = MediaUploader::fromSource(public_path($folder) . '/' . $mainFileName)
            ->toDirectory($folder)
            ->upload();

        return response()->json(['data' => $media], 201);
    }

    public function destroy($id)
    {
        $media = Media::findOrFail($id);

        $media_path = public_path($media->directory).'/'.$media->filename.'.'.$media->extension;

        if(file_exists($media_path)){
            @unlink($media_path);
        }

        $media->delete();

        return ['message' => 'Đã xóa tập tin'];
    }

    public function folderCreate(Request $request){
        $request->validate([
            'name'     => 'required|string|max:255',
        ]);

        $folder = $request['folder'];
        $name = $request['name'];

        $folder = $folder . '/' . $name . '/';
        if(!file_exists(public_path($folder))){
            mkdir(public_path($folder), 0755, true);
        }

        return ['message' => 'Tạo thư mục thành công'];
    }

    public function folderDestroy(Request $request)
    {
        // return $request['folder'];
        $path = public_path($request['folder'].'/');
        $media = Media::where('directory', 'like', $request['folder'].'%')->get();
        if($media){
            foreach($media as $key => $value){
                $value->delete();
            }
        }

        $this->delDir($path);

        return ['message' => 'Đã xóa thư mục'];
    }

    protected function delDir($dir) { 
        $files = array_diff(scandir($dir), array('.','..')); 
        foreach ($files as $file) { 
        (is_dir("$dir/$file")) ? $this->delDir("$dir/$file") : unlink("$dir/$file"); 
        } 
        return rmdir($dir); 
    } 

    public function changeName(Request $request)
    {
        $item = $request['item'];
        $new_name = $request['name'];
        $folder = $request['folder'];

        if($item['aggregate_type'] == 'folder'){
            // Xử lý đổi tên thư mục
            $old_path = public_path($folder).'/'.$item['filename'];
            $new_path = public_path($folder).'/'.$new_name;

            if(file_exists($old_path) && !file_exists($new_path)){
                rename($old_path, $new_path);

                $media = Media::where('directory', 'like', $folder.'/'.$item['filename'].'%')->get();
                foreach($media as $key => $value){
                    $value->directory = str_replace($folder.'/'.$item['filename'], $folder.'/'.$new_name, $value->directory);
                    $media[$key]->save();
                }
            }
        }else{
            // Xử lý đổi tên tập tin
            $media = Media::findOrfail($item['id']);
            $request->validate([
                'name'      => 'required|string|max:255|unique:media,filename,'.$media->id
            ]);
            
            if($media){
                $old_path = public_path($folder).'/'.$media->filename.'.'.$media->extension;
                $new_path = public_path($folder).'/'.$new_name.'.'.$media->extension;
                if(file_exists($old_path)){
                    rename($old_path, $new_path);
                }
                $media->filename = $new_name;
                $media->save();
            }
        }
        return ['message' => 'Đổi tên thành công'];
    }

    public function moveItemName(Request $request)
    {
        $item = $request['item'];
        $move_to = $request['move_to'];
        $folder = $request['folder'];

        if($move_to){
            if($item['aggregate_type'] == 'folder'){
                // Xử lý di chuyển thư mục
                $old_path = public_path($folder).'/'.$item['filename'];
                $new_path = public_path($folder).'/'.$move_to.'/'.$item['filename'];

                if(file_exists($old_path)){
                    rename($old_path, $new_path);

                    $media = Media::where('directory', 'like', $folder.'/'.$item['filename'].'%')->get();
                    foreach($media as $key => $value){
                        $value->directory = str_replace($folder.'/'.$item['filename'], $folder.'/'.$move_to.'/'.$item['filename'], $value->directory);
                        $media[$key]->save();
                    }
                }

            }else{
                // Xử lý di chuyển tập tin
                $media = Media::findOrFail($item['id']);
                
                if($media){
                    $current_file_path = public_path($folder).'/'.$media->filename.'.'.$media->extension;

                    if($move_to == '../'){
                        $temp = explode("/", $media->directory);
                        $removed = array_pop($temp);
                        $temp = implode('/', $temp);
                        $media->directory = $temp;
                        $media->save();

                        $new_file_path = public_path($media->directory).'/'.$media->filename.'.'.$media->extension;
                        if(file_exists($current_file_path)){
                            rename($current_file_path, $new_file_path);
                        }
                    }else{
                        $media->directory = $media->directory.'/'.$move_to;
                        $media->save();

                        $new_file_path = public_path($media->directory).'/'.$media->filename.'.'.$media->extension;
                        if(file_exists($current_file_path)){
                            rename($current_file_path, $new_file_path);
                        }
                    }
                }
            }
            return ['message' => 'Di chuyển thành công'];
        }
        
    }

    public function handleImageAdded(Request $request){
        if ($request->hasFile('image')) {

            $validator = \Validator::make($request->all(), [
                'image' => 'image'
            ]);
    
            if($validator->fails()){
                return response(['message' => $validator->errors()], 433);
            }
    
            $file = $request['image'];
            $folder = 'media/'.$request['module'].'/' . Carbon::now()->year . '_' . Carbon::now()->month;
            $uniqid = uniqid();
    
            $mainFileName = $uniqid . '.' . $file->getClientOriginalExtension();

            if(!file_exists(public_path($folder) . '/')){
                mkdir(public_path($folder) . '/', 0755, true);
            }
    
            $mainImage = \Image::make($file)
                ->resize(1920, null, function ($constraint){
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save(public_path($folder) . '/' . $mainFileName);
    
            $media = MediaUploader::fromSource(public_path($folder) . '/' . $mainFileName)
                ->toDirectory($folder)
                ->upload();
            
            $media_url = '/'.$media->directory.'/'.$media->filename.'.'.$media->extension;

            return response()->json(['url' => $media_url], 200);
        }
        
    }
}
