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
                    <label for="email">Opsi Pembayaran :</label>
                    <div class="form-group">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="cash">Cash
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="credit">Credit
                        </label>
                    </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="box box-primary" id="modal-form">
            <div class="box-header with-border">
                <h3 class="box-title">Add List Produk</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">

                    <div class="form-group">
                        <label for="customer">Kode Produk</label>
                        <select name="id_produk" id="id_produk" class="form-control">
                            <option value="">Pilih Produk</option>
                            @foreach ($produk as $key => $item)
                            <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
  
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
    <!-- left column -->
    <div class="col-md-3">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h1 class="box-title">No Invoice</h1>
            </div>

        </div>
    </div>
    <button type="button" class="btn btn-danger">Proses</button>


</div>



<div class="col-md-12">
    <div class="box">
        <div class="box-body table-responsive">
            <table class="table table-striped table-bordered w-100">
                <thead>
                    <th style="width:6%">No</th>
                    <th>Kode Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Sub total</th>
                    <th style="width:15%"><i class="fa fa-cog"></i></th>
                </thead>
                <tbody id='penjualan'></tbody>
            </table>
        </div>

    </div>
</div>

@includeIf('penjualan.form')
@endsection

@push('scripts')
<script>
    let table;


    table = $('.table').DataTable({
        processing: true,
        autoWidth: false,
        ajax: {
            url: '{{ route('
            penjualan.data ')}}',
        },
        columns: [{
                data: 'DT_RowIndex',
                searchable: false,
                sortable: false
            },
            {
                data: 'kode_produk'
            },
            {
                data: 'harga'
            },
            {
                data: 'jumlah'
            },
            {
                data: 'sub_total'
            },
            {
                data: 'aksi',
                searchable: false,
                sortable: false
            },
        ]
    });

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

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=kode_produk]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=harga]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=jumlah]').focus();
    }

    function deleteData(url) {
        if (confirm('Yakin ingin menghapus data?')) {
            $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                })
        }

    }

</script>
@endpush
