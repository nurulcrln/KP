@extends('layouts.master')

@section('title')
Tranksaksi
@endsection

@section('breadcrumb')
@parent
<li class="active">Tranksaksi</li>
@endsection

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-4">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Customer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <div class="form-group">
                            <input type="date" id="date" name="date" value="<?=date('Y-m-d')?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="customer">Customer</label>
                        <input type="text" class="form-control" id="id_customer" nama="customer">
                    </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add List Produk</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">
                    <div class="form-group">
                        <label for="customer">Kode Barang</label>
                        <input type="text" class="form-control" id="id_customer" nama="customer">
                    </div>
                    <div class="form-group">
                        <label for="customer">harga</label>
                        <input type="text" class="form-control" id="harga" nama="harga">
                    </div>
                    <div class="form-group">
                        <label for="customer">jumlah</label>
                        <input type="number" class="form-control" id="jumlah" nama="jumlah">
                    </div>
                    <div class="form-group">
                        <button type="submit" onclick="addForm('{{ route('penjualan.store')}}')"
                            class="btn btn-primary">Add</button>
                    </div>

            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-striped table-bordered w-100">
                    <thead>
                        <<th style="width:6%">No</th>
                        <th>No invoice</th>
                        <th>Nama Customer</th>
                        <th>Total Tagihan</th>
                        <th>Status Transaksi</th>
                        <th style="width:15%"><i class="fa fa-cog"></i></th>
                    </thead>
                    <tbody id='penjualan'></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@includeIf('penjualan.form')
@endsection

@push('scripts')
<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            // processing: true,
            // autoWidth: false,
            {
                // tag html
            }
            ajax: {
                method : 'post'
                url: '{{ route ('penjualan.data') }}'
                data : {
                    '_token':'{{csrf_token()}}'
                }
                success : function(penjualan);
            }
        })

        $('#modal-form').validator().on('submit', function (e) {
            if (!e.preventDefault()) {
                $.ajax({
                        url: $('#modal-form').attr('action'),
                        type: 'post',
                        data: $('#modal-form').serialize(),
                    })
                    .done((response) => {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('tidak dapat menyimpan data');
                        return;
                    });
            }
        })
    })

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal title').text('Tambah transaksi');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=kode_barang]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama_barang]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=harga]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=jumlah]').focus();
    }

</script>
@endpush
