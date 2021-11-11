@section('content-header')
<h2 class="section-title">List Users</h2>
<p class="section-lead">
    Akun user digunakan untuk login kedalam aplikasi dengan peran yang telah ditentukan.
</p>
@endsection

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end pb-4">
                    <a href="{{ route('panel.user.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>
                <x-datatable :data="$users" :dynamic="true">
                    <table class="table table-striped table-bordered table-hover" id="users-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Peran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->getRole() }}</td>
                                <td>
                                    <a href="{{ route('panel.user.edit', $user->id) }}" class="btn btn-sm btn-success mr-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger" wire:click="delete({{ $user->id }})">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Data kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </x-datatable>
            </div>
        </div>
    </div>
</div>
