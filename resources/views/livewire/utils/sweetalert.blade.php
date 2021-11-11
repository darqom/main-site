<div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Session::get('alert-success'))
    <script>
        Swal.fire({
            icon: 'success',
            text: '{{ Session::get('alert-success') }}',
            timer: 1500
        });
    </script>
    @endif

    @if (Session::get('alert-error'))
    <script>
        Swal.fire({
            icon: 'success',
            text: '{{ Session::get('alert-error') }}',
            timer: 1500
        });
    </script>
    @endif
</div>
