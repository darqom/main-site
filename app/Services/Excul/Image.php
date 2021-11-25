<?php

namespace App\Services\Excul;

use Illuminate\Support\Facades\Storage;
use Livewire\TemporaryUploadedFile;

class Image
{
    public static $empty = 'noimage.jpg';

    public static function upload(TemporaryUploadedFile $image, $old)
    {
        $ext = $image->getClientOriginalExtension();
        $name = 'excul_' . time() . random_int(1, 9999) . '.' . $ext;

        $image->storeAs('img/excul', $name, ['disk' => 'assets']);
        static::delete($old);
        
        return $name;
    }

    public static function delete($image): void
    {
        if(is_string($image)) {
            if($image != static::$empty)
                Storage::disk('assets')->delete("img/excul/$image");
        }
    }
}
