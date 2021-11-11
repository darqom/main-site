<form wire:submit.prevent="{{ $action }}" method="post">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-align-center"></i>
                                </div>
                            </div>
                            <input type="text" wire:model.defer="user.name" id="name" class="form-control @error('user.name') is-invalid @enderror" autofocus>

                            @error('user.name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <input type="email" wire:model.defer="user.email" id="email" class="form-control @error('user.email') is-invalid @enderror">

                            @error('user.email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <input type="text" wire:model.defer="user.username" id="username" class="form-control @error('user.username') is-invalid @enderror" autocomplete="off">

                            @error('user.username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Peran</label>
                        <div class="selectgroup selectgroup-pills">
                            @foreach ($roles as $role)
                            <label class="selectgroup-item">
                                <input type="radio" wire:model="role" class="selectgroup-input" value="{{ $role->name }}">
                                <span class="selectgroup-button">
                                    <strong>{{ $role->name }}</strong>
                                </span>
                            </label>
                            @endforeach
                        </div>
                        @error('role')
                            <div class="text-danger">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="password" wire:model.defer="user.password" id="password" class="form-control @error('user.password') is-invalid @enderror">

                            @error('user.password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirm">Konfirmasi Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-unlock"></i>
                                </div>
                            </div>
                            <input type="password" wire:model.defer="user.password_confirm" id="password_confirm" class="form-control @error('user.password_confirm') is-invalid @enderror">

                            @error('user.password_confirm')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
