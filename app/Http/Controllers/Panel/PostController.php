<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\Post\Image;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'file|image|mimes:jpg,png,gif'
        ]);

        $name = Image::upload($request->file('image'));
        return response()->json([
            'status' => 'success',
            'url' => "/assets/img/post/$name"
        ], 200);
    }

    public function deleteImage(Request $request)
    {
        $name = explode('/', $request->image);
        $name = Image::delete(end($name));

        return response()->json([
            'status' => 'success',
            'name' => $name
        ], 200);
    }
}
