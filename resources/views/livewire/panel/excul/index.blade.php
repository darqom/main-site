@section('content-header')
<h2 class="section-title">Ekstrakulikuler</h2>
<p class="section-lead">
    Ekstrakulikuler yang diadakan sekolah
</p>
@endsection

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Ekskul</h4>
            </div>
            <div class="card-body">
                <x-datatable :data="$exculs" dynamic="true">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exculs as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="img-cover" style="background-image: url('/assets/img/excul/{{ $item->image }}')"></div>
                                </td>
                                <td>
                                    <button wire:click="edit({{ $item->id }})" class="btn btn-sm btn-success mr-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button wire:click="delete({{ $item->id }})" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </x-datatable>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                @if($editMode)
                <h4>Edit Ekskul</h4>
                @else
                <h4>Tambah Ekskul</h4>
                @endif
            </div>
            <div class="card-body">
                <form wire:submit.prevent="store">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input wire:model.defer="excul.name" type="text" id="name" class="form-control @error('excul.name') is-invalid @enderror">
                        @error('excul.name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <x-utils.form.image-with-prev model="excul.image" :img="$excul['image'] ?? null" path="excul/" />
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('style')
<style>
    .img-cover{
        width: 7rem;
        height: 4rem;
        background-size: cover;
        background-position: center center;
        margin: .5rem;
        border-radius: .5rem;
    }
</style>
@endpush
