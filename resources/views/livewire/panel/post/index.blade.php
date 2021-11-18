@section('content-header')
<h2 class="section-title">Semua Post</h2>
<p class="section-lead">
    Daftar semua post termasuk yang berstatus draft maupun publish
</p>
@endsection

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end pb-4">
                    <a href="{{ route('panel.post.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>

                <x-datatable :data="$posts" :dynamic="true">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Judul</td>
                                <td>Kategori</td>
                                <td>Status</td>
                                <td>Dibuat Pada</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category }}</td>
                                <td>{{ $post->status }}</td>
                                <td>{{ $post->created_at->format('d/m/Y [H:i]') }}</td>
                                <td>
                                    <a href="{{ route('panel.user.edit', $post->id) }}" class="btn btn-sm btn-success mr-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger" wire:click="delete({{ $post->id }})">
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
</div>
