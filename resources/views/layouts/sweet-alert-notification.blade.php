@if ($message = Session::get('success'))
    <script>
        swal({
            title: 'Berhasil!',
            text: '{{$message}}',
            icon: "success",
            buttons : {
                confirm : {
                    className: 'btn btn-success'
                }
            }
        });
    </script>
@endif

@if ($message = Session::get('info'))
    <script>
        swal({
            title: 'Informasi!',
            text: '{{$message}}',
            icon: "info",
            buttons : {
                confirm : {
                    className: 'btn btn-success'
                }
            }
        });
    </script>
@endif

@if ($message = Session::get('warning'))
    <script>
        swal({
            title: 'Opps!',
            text: '{{$message}}',
            icon: "warning",
            buttons : {
                confirm : {
                    className: 'btn btn-success'
                }
            }
        });
    </script>
@endif

@if ($message = Session::get('error'))
    <script>
        swal({
            title: 'Terjadi Kesalahan!',
            text: '{{$message}}',
            icon: "error",
            buttons : {
                confirm : {
                    className: 'btn btn-success'
                }
            }
        });
    </script>
@endif

<script>
    function deleteData(url){
        swal({
            title: 'Apakah Anda yakin?',
            text: "Data yang terhapus tidak dapat dikembalikan lagi!",
            icon: 'warning',
            buttons:{
                cancel: {
                    text: 'Batalkan',
                    visible: true,
                    className: 'btn btn-danger'
                },
                confirm: {
                    text : 'Ya, Hapus sekarang!',
                    className : 'btn btn-success'
                }
            }
        }).then((Delete) => {
            if (Delete) {
                window.location.href = url;
            } else {
                swal.close();
            }
        });
    }

    function changeStatus(url){
        swal({
            title: 'Apakah Anda Yakin?',
            text: "Perubahan status akan berdampak pada beberapa data",
            icon: 'warning',
            buttons:{
                cancel: {
                    text: 'Batalkan',
                    visible: true,
                    className: 'btn btn-danger'
                },
                confirm: {
                    text: 'Ya, Ganti Status!',
                    className: 'btn btn-success'
                }
            }
        }).then((Change) => {
            if (Change) {
                window.location.href = url;
            } else {
                swal.close();
            }
        });
    }

    function isInputNumber(event) {
        var char = String.fromCharCode(event.which);
        if (!(/[0-9]/).test(char)) {
            event.preventDefault();
        }
    }
</script>

