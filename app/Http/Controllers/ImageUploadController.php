<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        if ($image) 
        {
            $extension = $image->getClientOriginalExtension();
            $filename = Str::random(9);
            $uploaded_file =$filename. '.' . $extension;
            $path = public_path('storage/app/public/editor/images/');
            
            if ($image->move($path, $uploaded_file)) {
                $imageUrlFull = url('/storage/app/public/editor/images/'.$uploaded_file);
            }
        } 

        return response()->json(['url' => $imageUrlFull]);
    }
}
