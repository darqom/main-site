<form wire:submit.prevent="{{ $action }}">
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <input type="text" id="title" class="form-control @error('post.title') is-invalid @enderror" placeholder="Judul Pos" autofocus wire:model.defer="post.title">
                @error('post.title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="card">
            <div class="card-body pb-2" wire:ignore>
                <textarea id="content" class="form-control">{!! $post['content'] ?? '' !!}</textarea>
            </div>
            @error('post.content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body pb-4">
                <h6 id="cat-button" data-toggle="modal" data-target="#categoryModal" class="">
                    <i class="fas fa-list"></i> Kategori
                </h6>
            </div>
        </div>

        <div class="card" style="min-height: 26rem;">
            <div class="card-header">
                <h6><i class="fas fa-paper-plane"></i> Publikasi</h6>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="status">Status</label>
                        <select id="status" class="form-control @error('post.status') is-invalid @enderror" wire:model="post.status">
                            <option value="">--Pilih--</option>
                            <option value="publish">Publish</option>
                            <option value="draft">Draft</option>
                        </select>
                        @error('post.status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="comment">Kolom Komentar</label>
                        <select id="comment" class="form-control @error('post.comment') is-invalid @enderror" wire:model="post.comment">
                            <option value="">--Pilih--</option>
                            <option value="deny">Tidak</option>
                            <option value="allow">Ya</option>
                        </select>
                        @error('post.comment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group text-center mt-2">
                    <label>Foto Cover (opsional)</label>

                    <x-utils.form.image-with-prev model="post.cover" path="post/cover/" :img="$post['cover'] ?? null" />
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body text-center">
                <button class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>
</form>

<div wire:ignore.self class="modal fade" tabindex="-1" id="categoryModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kategori</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="selectgroup selectgroup-pills">
                    @foreach ($categories as $category)
                    <label class="selectgroup-item m-1">
                        <input type="radio" name="category" class="selectgroup-input" value="{{ $category->id }}" wire:model="post.category_id">
                        <span class="selectgroup-button">
                            <strong>{{ $category->name }}</strong>
                        </span>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- For stack style and script --}}

@push('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<style>
    #cat-button {
        margin-top: .7rem;
        cursor: pointer;
    }

    .modal-backdrop {
        display: none;
    }
</style>
@endpush

@push('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    const uploadImageSummer = (el, image) => {
        let data = new FormData();
        data.append('image', image);

        $.ajax({
            url: '{{ route('panel.upload.post') }}',
            cache: false,
            processData: false,
            contentType: false,
            data: data,
            method: 'post',
            dataType: 'json',
            success: function(data){
                if(data.status == 'success'){
                    $(el).summernote('insertImage', data.url);
                }else{
                    console.warn(data.msg);
                }
            },
            error: function(data){
                console.warn(data.responseText);
            }
        });
    }

    const deleteImageSummer = image => {
        $.ajax({
            url: '{{ route('panel.upload.post') }}',
            data: {image: image},
            method: 'delete'
        });
    }

    $('#content').summernote({
        height: '40vh',
        tabsize: 2,
        dialogsInBody: true,
        callbacks: {
            onBlur: function(e) {
                const content = $(e.target).html();
                @this.set('post.content', content);
            },
            onImageUpload: image => {
                uploadImageSummer('#content', image[0]);
            },
            onMediaDelete: target => {
                deleteImageSummer(target[0].src);
            }
        }
    });
</script>
@endpush
