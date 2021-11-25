@section('content-header')
<h2 class="section-title">Tambah Post</h2>
<p class="section-lead">
    Anda dapat menambahkan gambar, tautan, ataupun list kedalam sebuah post
</p>
@endsection

<div>
    <x-panel.post.form action="store" :post="$post" :categories="$categories" />
</div>
