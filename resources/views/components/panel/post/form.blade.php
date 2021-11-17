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
                <h6 id="cat-button" data-toggle="collapse" data-target="#categoryCollapse" class="has-arrow collapsed">
                    <i class="fas fa-list"></i> Kategori
                </h6>
                <div class="collapse in pt-4" id="categoryCollapse">
                    <div class="selectgroup selectgroup-pills">
                        <label class="selectgroup-item m-1">
                            <input type="radio" name="category" class="selectgroup-input" value="berita">
                            <span class="selectgroup-button">
                                <strong>Berita</strong>
                            </span>
                        </label>
                    </div>
                </div>
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

                    <x-utils.form.image-with-prev model="post.cover" :img="$post['cover'] ?? null"/>
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

{{-- For stack style and script --}}

@push('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<style>
    #cat-button {
        margin-top: .7rem;
        cursor: pointer;
    }

    .has-arrow::before
    {
        font-family: "Font Awesome 5 Free";
        content: "\f078";
        float: right;
        transition: all 0.5s;
    }

    .has-arrow.active::before {
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
        transform: rotate(180deg);
    }
</style>
@endpush

@push('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $('.has-arrow').click(function() {
        $(this).toggleClass('active');
    });

    $('#content').summernote({
        height: '40vh',
        tabsize: 2,
        dialogsInBody: true,
        callbacks: {
            onBlur: function(e) {
                const content = $(e.target).html();
                @this.set('post.content', content);
            }
        }
    });
</script>
@endpush
