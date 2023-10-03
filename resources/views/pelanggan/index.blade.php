@extends('templates.layout')

@push('style')

@endpush

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pelanggan</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session ('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li> {{ $error}} </li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <!-- Button trigger modal from produk-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormPelanggan">
                Tambah Produk
            </button>
            <table>
                <table class="table table-" </table>
                    <div class="mt-3">
                        @include('pelanggan.data')
                    </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @include('pelanggan.form')
</section>
@endsection

@push('script')
<script>
    $('#tbl-produk').DataTable()
    $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
        $('.alert-success').slideUp(500)
    })

    // $('.delete-data').on('click', function(e) {
    //     $('#tbl-data-produk').DataTable()

    //     $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
    //         $('.alert-success').slideUp(500)
    //     })
    // }

    // $('#tbl-produk').DataTable()

    // Dialog hapus data
    $('.btn-delete').on('click', function(e) {
        let nama = $(this).closest('tr').find('td:eq(2)').text();
        console.log('delete')
        Swal.fire({
            icon: 'error',
            title: 'Hapus Data',
            html: `Apakah data <b>${nama}</b> akan dihapus?`,
            confirmButtonText: 'Ya',
            denyButtonText: 'Tidak',
            showDenyButton: 'true',
            focusConfirm: false
        }).then((result) => {
            if (result.isConfirmed) $(e.target).closest('form').submit()
            else swal.close()
        })
    })


    $('#modalFormPelanggan').on('show.bs.modal', function(e) {

        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        const kode_pelanggan = btn.data('kode_pelanggan')
        const nama = btn.data('nama')
        const alamat = btn.data('alamat')
        const no_telp = btn.data('no_telp')
        const email = btn.data('email')
        const id = btn.data('id')
        const modal = $(this)
        console.log(modal)
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit Data Pelanggan')
            modal.find('#kode_pelanggan').val(kode_pelanggan)
            modal.find('#nama').val(nama)
            modal.find('#alamat').val(alamat)
            modal.find('#no_telp').val(no_telp)
            modal.find('#email').val(email)
            modal.find('.modal-body form').attr('action', '{{ url("pelanggan") }}/' + id)
            modal.find('#method').html('@method("PATCH")')
        } else {
            modal.find('.modal-title').text('Input Data Pelanggan')
            modal.find('#kode_pelanggan').val('')
            modal.find('#nama').val('')
            modal.find('#alamat').val('')
            modal.find('#no_telp').val('')
            modal.find('#email').val('')
            modal.find('#method').html("")
            modal.find('.modal-body form').attr('action', '{{ url("pelanggan") }}')
        }
    })
</script>
@endpush