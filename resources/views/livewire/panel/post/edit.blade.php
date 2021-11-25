@section('content-header')
<h2 class="section-title">Edit Post</h2>
<p class="section-lead">
    Anda dapat mengubah judul, cover, maupun konten
</p>
@endsection

<div>
    <x-panel.post.form action="update" :post="$post" :categories="$categories" />
</div>
