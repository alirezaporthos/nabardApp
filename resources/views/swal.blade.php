<script>
    @if (session('success'))
    swal({
        type: 'success',
        title: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 1500
    })
    @elseif(session('danger'))
    swal({
        type: 'danger',
        title: "{{ session('danger') }}",
        showConfirmButton: false,
        timer: 2000
    })@endif

    </script>
