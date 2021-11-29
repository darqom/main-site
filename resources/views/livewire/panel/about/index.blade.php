@section('content-header')
<h2 class="section-title">Tentang Sekolah</h2>
<p class="section-lead">
    Informasi mengenai lembaga beserta seluruh akun media sosial
</p>
@endsection

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6><i class="fas fa-exclamation-circle"></i> Info Sekolah</h6>
            </div>
            <div class="card-body">
                <textarea id="school-about" class="form-control" wire:model.lazy="about.school-info"></textarea>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h6><i class="fas fa-file-signature"></i> Kontak</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="school-phone">No. Telp</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-phone"></i>
                            <span>
                        </div>
                        <input type="number" id="school-phone" class="form-control" wire:model.lazy="about.school-phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="school-mail">Email (surel)</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            <span>
                        </div>
                        <input type="email" id="school-mail" class="form-control" wire:model.lazy="about.school-mail">
                    </div>
                </div>
                <div class="form-group">
                    <label for="school-address">Alamat</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-location-arrow"></i>
                            <span>
                        </div>
                        <input type="text" id="school-address" class="form-control" wire:model.lazy="about.school-address">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6><i class="fab fa-youtube"></i> Video Profil (Youtube)</h6>
            </div>
            <div class="card-body" id="video-url">
                <div class="form-group">
                    <label for="school-video">Video URL</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">https://youtube.com/watch?v=</span>
                        </div>
                        <input type="text" id="school-video" class="form-control" wire:model.lazy="about.school-video">
                    </div>
                </div>
                <div class="form-group">
                    <x-utils.form.image-with-prev model="about.school-video-cover" :img="$about['school-video-cover']" />
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h6><i class="fas fa-poll-h"></i> Sosial Media</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="social-facebook-id">ID Facebook</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fab fa-facebook"></i>
                                    <span>
                                </div>
                                <input type="text" id="social-facebook-id" class="form-control" wire:model.lazy="about.social-facebook-id">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="social-facebook">Nama Akun</label>
                            <input type="text" id="social-facebook" class="form-control" wire:model.lazy="about.social-facebook">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="social-instagram-id">ID Instagram</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fab fa-instagram"></i>
                                    <span>
                                </div>
                                <input type="text" id="social-instagram-id" class="form-control" wire:model.lazy="about.social-instagram-id">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="social-instagram">Nama Akun</label>
                            <input type="text" id="social-instagram" class="form-control" wire:model.lazy="about.social-instagram">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="social-youtube-id">ID Youtube</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fab fa-youtube"></i>
                                    <span>
                                </div>
                                <input type="text" id="social-youtube-id" class="form-control" wire:model.lazy="about.social-youtube-id">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="social-youtube">Nama Akun</label>
                            <input type="text" id="social-youtube" class="form-control" wire:model.lazy="about.social-youtube">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('style')
<style>
    #school-about {
        min-height: 10rem;
    }

    #video-url {
        min-height: 12.5rem;
    }
</style>
@endpush

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
