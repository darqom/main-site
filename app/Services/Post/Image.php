<?php

namespace App\Services\Post;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\TemporaryUploadedFile;

class Image
{
    public static $empty = 'noimage.jpg';

    public static function uploadCover(TemporaryUploadedFile $cover): string
    {
        $ext = $cover->getClientOriginalExtension();
        $name = 'post_' . time() . random_int(1, 9999) . '.' . $ext;

        $cover->storeAs('img/post/cover', $name, ['disk' => 'assets']);
        return $name;
    }

    public static function changeCover(TemporaryUploadedFile $cover, string $old): string
    {
        if($old != static::$empty)
            Storage::disk('assets')->delete("img/post/cover/$old");

        return static::uploadCover($cover);
    }

    public static function upload(UploadedFile $image): string
    {
        $ext = $image->getClientOriginalExtension();
        $name = 'postimage_' . time() . random_int(1, 9999) . '.' . $ext;

        $image->storeAs('img/post', $name, ['disk' => 'assets']);
        return $name;
    }

    public static function delete(string $image): string
    {
        Storage::disk('assets')->delete("img/post/$image");
        return $image;
    }
}
