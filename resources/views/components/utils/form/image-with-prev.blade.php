@php
$imgFileId = rand(0, 999);

if(!$errors->has($model) && !is_null($img)){
    if(is_string($img)) {
        $bg = "background-image: url('/assets/img/". ($path ?? '') ."$img');";
    }else{
        $bg = "background-image: url('{$img->temporaryUrl()}');";
    }
}
@endphp

<style>
    .image-upload {
        border: 2px dashed #dbdbdb;
        background-size: cover;
        background-position: center center;
        position: relative;
    }
</style>

<div class="d-flex justify-content-center align-items-center @if($center ?? false) m-auto @endif image-upload" style="width: {{ $width ?? '15rem' }}; height: {{ $height ?? '8rem' }}; {{ $bg ?? '' }}">
    <input type="file" id="image-file-{{ $imgFileId }}" class="d-none" wire:model="{{ $model }}">
    <label for="image-file-{{ $imgFileId }}" class="btn btn-sm btn-light">Pilih Gambar</label>
</div>

@error($model)
    <small class="text-danger">{{ $message }}</small>
@enderror
