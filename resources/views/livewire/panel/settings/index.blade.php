@section('content-header')
<h2 class="section-title">Pengaturan</h2>
<p class="section-lead">
    Anda dapat mengatur semua konfigurasi dari website
</p>
@endsection

<div class="row">
    <div class="col-lg-6">
        <div class="card card-large-icons">
            <div class="card-icon bg-primary text-white">
                <i class="fas fa-cog"></i>
            </div>
            <div class="card-body">
                <h4>Umum</h4>
                <p>Mengatur tampilan, foto latar belakang, dan lain - lain</p>
                <a href="{{ route('panel.settings.general') }}" class="card-cta">Ubah Setelan <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card card-large-icons">
            <div class="card-icon bg-primary text-white">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="card-body">
                <h4>SMTP</h4>
                <p>SMTP Server digunakan untuk mengkonfigurasi email pemberitahuan.</p>
                <a href="{{ route('panel.settings.smtp') }}" class="card-cta">Ubah Setelan <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
</div>
