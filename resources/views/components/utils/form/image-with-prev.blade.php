<style>
    .image-upload {
        width: {{ $width ?? '15rem' }};
        height: {{ $height ?? '8rem' }};
        border: 2px dashed #dbdbdb;
        background-size: cover;
        background-position: center center;
        position: relative;

        @if(!$errors->has($model) && !is_null($img))
            @if(is_string($img))
            background-image: url('/assets/img/post/cover/{{ $img }}');
            @else
            background-image: url('{!! $img->temporaryUrl() !!}');
            @endif
        @endif
    }
</style>

<div class="d-flex justify-content-center align-items-center m-auto image-upload">
    <input type="file" id="image-file" class="d-none" wire:model="{{ $model }}">
    <label for="image-file" class="btn btn-sm btn-light">Pilih Gambar</label>
</div>

@error($model)
    <small class="text-danger">{{ $message }}</small>
@enderror
