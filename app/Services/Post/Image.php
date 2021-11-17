<?php

namespace App\Services\Post;

use Livewire\TemporaryUploadedFile;

class Image
{
    public static function uploadCover(TemporaryUploadedFile $cover)
    {
        $ext = $cover->getClientOriginalExtension();
        $name = 'post_' . time() . random_int(1, 9999) . '.' . $ext;

        $cover->storeAs('img/post/cover', $name, ['disk' => 'assets']);
        return $name;
    }
}
