@extends('templates.layout')

@push('style')

@endpush

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">barang</h3>

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
                {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $errors)
                    <li>{{ $errors }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormbarang">
                Tambah barang
            </button>
            @include('barang.data')
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @include('barang.form')
</section>
@endsection

@push('script')
<script>
    $('#tbl-barang').DataTable()
    console.log()
    //Dialog hapus data
    $('.btn-delete').on('click', function(e) {
        console.log()
        let kode_barang = $(this).closest('tr').find('td:eq(0)').text();
        Swal.fire({
            icon: 'error',
            title: 'Hapus Data',
            html: `Apakah data <b> ${kode_barang}</b> akan dihapus?`,
            confirmButtonText: 'Ya',
            denyButtonText: 'Tidak',
            showDenyButton: true,
            focusConfirm: false
        }).then((result) => {
            if (result.isConfirmed) $(e.target).closest('form').submit()
            else swal.close()
        })
    })

    $('#modalFormbarang').on('show.bs.modal', function(e) {
        console.log('modal')
        const btn = $(e.relatedTarget)
        const mode = btn.data('mode')
        const nama = btn.data('nama')
        const id = btn.data('id')
        const kode_barang = btn.data('kode_barang')
        const produk_id = btn.data('produk_id')
        const nama_barang = btn.data('nama_barang')
        const satuan = btn.data('satuan')
        const harga_jual = btn.data('harga_jual')
        const stok = btn.data('stok')
        const ditarik = btn.data('ditarik')
        const user_id = btn.data('user_id')
        const modal = $(this)
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit Data barang')
            modal.find('#nama').val(nama)
            modal.find('#id').val(id)
            modal.find('#kode_barang').val(kode_barang)
            modal.find('#produk_id').val(produk_id)
            modal.find('#nama_barang').val(nama_barang)
            modal.find('#satuan').val(satuan)
            modal.find('#harga_jual').val(harga_jual)
            modal.find('#stok').val(stok)
            modal.find('#ditarik').val(ditarik)
            modal.find('#user_id').val(user_id)
            modal.find('.modal-body form').attr('action', '{{ url("barang")}}/' + id)
            modal.find('#method').html('@method("PATCH")')
        } else {
            modal.find('.modal-title').text('Input Data barang')
            modal.find('#nama').val('')
            modal.find('.modal-body form').attr('action', '{{ url("barang") }}')
        }
    })
</script>
@endpush