@extends('layouts.panel')

@include('components.admin.utils.datatables')

@section('content')
    <h2 class="section-title">List Users</h2>
    <p class="section-lead">
        Akun user digunakan untuk login kedalam aplikasi dengan peran yang telah ditentukan.
    </p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end pb-4">
                        <a href="{{ route('panel.user.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="users-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Peran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->getRole() }}</td>
                                    <td class="d-flex">
                                        <a href="" class="btn btn-sm btn-success mr-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('panel.user.destroy', $user->id) }}" method="post">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    $('#users-table').DataTable();
</script>
@endpush
