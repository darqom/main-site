<div class="row">
    <div class="col-md-4">
        <x-panel.settings.aside />
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Pengaturan SMTP</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="host">Host</label>
                            <input wire:model.lazy="option.smtp-host" type="text" id="host" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="port">Port</label>
                            <input wire:model.lazy="option.smtp-port" type="text" id="port" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input wire:model.lazy="option.smtp-username" type="text" id="username" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input wire:model.lazy="option.smtp-password" type="password" id="password" class="form-control">
                        </div>
                    </div>    
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input wire:model.lazy="option.smtp-name" type="text" id="name" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    Livewire.on('saved', () => {
        VanillaToasts.create({
            text: 'Perubahan berhasil disimpan',
            type: 'success',
            timeout: 2500,
        });
    });
</script>
@endpush
