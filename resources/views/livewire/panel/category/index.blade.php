@section('content-header')
<h2 class="section-title">Kategori</h2>
<p class="section-lead">
    Daftar semua kategori yang dapat digunakan untuk post
</p>
@endsection

<div>
    <div class="row">

        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end pb-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
    
                    <x-datatable :data="$categories" dynamic="true">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalForm" wire:click="edit({{ $category->id }})">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $category->id }})">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">Data Kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </x-datatable>
                </div>
            </div>
        </div>
    </div>

    <x-panel.category.modal submit="store()" />
</div>

@push('style')
<style>
    .modal-backdrop {
        display: none;
    }
</style>
@endpush

@push('script')
<script>
    $('#modalForm').on('shown.bs.modal', () => {
        $('#name').focus();
    });

    $('#modalForm').on('hidden.bs.modal', () => {
        Livewire.emit('resetForm');
    });

    Livewire.on('swals', () => {
        $('#modalForm').modal('hide');
    });
</script>
@endpush
