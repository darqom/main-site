@section('content-header')
<h2 class="section-title">Pengaturan Umum</h2>
<p class="section-lead">
    Foto halaman landing, logo footer, dan judul website
</p>
@endsection

<div class="row">
    <div class="col-md-4">
        <x-panel.settings.aside/>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body row justify-content-between">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="site-title">Judul Website</label>
                        <input type="text" id="site-title" class="form-control" wire:model.lazy="option.site-title">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Foto Banner (Rasio terbaik 16:9)</label>
                        <x-utils.form.image-with-prev model="option.site-banner" :img="$option['site-banner'] ?? null"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Logo Situs (Rasio terbaik 1:1)</label>
                        <x-utils.form.image-with-prev model="option.site-logo" :img="$option['site-logo'] ?? null" width="8rem" />
                    </div>
                </div>
                <div class="col-md-9 mt-4">
                    <div class="form-group text-center">
                        <label for="site-footer-logo">Logo Footer (Rasio terbaik 16:9)</label>
                        <x-utils.form.image-with-prev model="option.site-footer-logo" :img="$option['site-footer-logo'] ?? null" center="true" />
                    </div>
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
