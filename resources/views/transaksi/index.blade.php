@extends('layouts.master')
@section('title')
    Transaksi
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Transaksi</li>
@endsection

@section('content')
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with border">
                <button onclick="addForm('{{ route('transaksi.store')}}')" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i>Add Invoice</button>
                <button onclick="itemForm('{{ route('transaksidetail.store')}}')" class="btn btn-primary btn-xs btn-flat"><i class="fa fa-plus-circle"></i>Add Item</button>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>No Invoice</th>
                        <th>Tanggal</th>
                        <th>Total Item</th>
                        <th>Item</th>
                        <th>Total</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@includeIf('transaksi.form')
@endsection

@push('scripts')
<script>
    let table, table2, table3;

    $(function(){
        table = $('.table').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('transaksi.data')}}',
            },
            columns: [
            {data: 'DT_RowIndex', searchable: false, sortable: false},
            {data: 'no_invoice'}, 
            {data: 'tanggal'},
            {data: 'total_item'},
            {data: 'item',searchable: false, sortable: false},
            {data: 'total_pembayaran'},
            {data: 'aksi', searchable: false, sortable: false},
            ]
        });

        table2 = $('.table-transaksidetail').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('transaksi.data', $id_transaksi_detail) }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'kode_produk'},
                {data: 'nama_produk'},
                {data: 'harga'},
                {data: 'jumlah'},
                {data: 'subtotal'},
                {data: 'aksi', searchable: false, sortable: false},
            ],
            dom: 'Brt',
            bSort: false,
            paginate: false
        });
        table3 = $('.table-produk').DataTable();
        
        $('#modal-form').validator().on('submit', function (e){
            if (! e.preventDefault()){
                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize()) 
                .done((response) => {
                    $('#modal-form').modal('hide');
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Tidak dapat menyimpan data');
                    return;
                })
            }
        })
    });

    function addForm(url){
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Add Transaksi');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=no_invoice]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=tanggal]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=customer]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=opsi_bayar]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=tenggat_waktu]').focus();
    }

    function editForm(url){
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Kategori');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=no_invoice]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=tanggal]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=customer]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=opsi_bayar]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=tenggat_waktu]').focus();

        $.get(url)
            .done((response)=>{
                $('#modal-form [name=no_invoice]').val(response.no_invoice);
                $('#modal-form [name=tanggal]').val(response.tanggal);
                $('#modal-form [name=customer]').val(response.customer);
                $('#modal-form [name=opsi_bayar]').val(response.opsi_bayar);
                $('#modal-form [name=tenggat_waktu]').val(response.tenggat_waktu);
            })
            .fail((errors)=>{
                alert('Tidak dapat menampilkan data');
                return;
            })
    }

    function itemForm(url){
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Add Transaksi');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=no_invoice]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=tanggal]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=customer]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=opsi_bayar]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=tenggat_waktu]').focus();
    }

    function hideProduk() {
        $('#modal-produk').modal('hide');
    }
    function pilihProduk(id, kode) {
        $('#id_produk').val(id);
        $('#kode_produk').val(kode);
        hideProduk();
        tambahProduk();
    }
    function tambahProduk() {
        $.post('{{ route('transaksi.store') }}', $('.form-produk').serialize())
            .done(response => {
                $('#kode_produk').focus();
                table.ajax.reload(() => loadForm($('#total').val()));
            })
            .fail(errors => {
                alert('Tidak dapat menyimpan data');
                return;
            });
    }
    function deleteData(url){
        if (confirm('Yakin ingin menghapus data?')){
            $.post(url, {
            '_token': $('[name=csrf-token]').attr('content'),
            '_method': 'delete'
        })
        .done((response)=>{
                table.ajax.reload();
            })
        .fail((errors)=>{
                alert('Tidak dapat menghapus data');
                return;
            })
        }
        
    }
    
</script>
@endpush