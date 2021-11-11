@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    Livewire.on('swals', msg => {
        Swal.fire({
            icon: 'success',
            text: msg,
            timer: 1500
        });
    });

    Livewire.on('swale', msg => {
        Swal.fire({
            icon: 'error',
            text: 'msg',
            timer: 1500
        });
    });
</script>
@endpush
