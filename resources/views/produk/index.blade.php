@extends('layouts.master')
@section('title')
    Produk
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Produk</li>
@endsection

@section('content')
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with border">
                <button onclick="addForm('{{ route('produk.store')}}')" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i>Add</button>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Sub Kategori</th>
                        <th>Stock</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@includeIf('produk.form')
@endsection

@push('scripts')
<script>
    let table;

    $(function(){
        table = $('.table').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('produk.data')}}',
            },
            columns: [
            {data: 'DT_RowIndex', searchable: false, sortable: false},
            {data: 'kode_produk'}, 
            {data: 'nama_produk'},
            {data: 'sub_kategori'},
            {data: 'stock'},
            {data: 'aksi', searchable: false, sortable: false},
            ]
        });

        
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
        $('#modal-form .modal-title').text('Add Produk');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=kode_produk]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama_produk]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=id_kategori]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=id_subkategori]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=id_supplier]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=harga]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=stock]').focus();
    }

    function editForm(url){
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Produk');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=kode_produk]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama_produk]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=id_kategori]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=id_subkategori]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=id_supplier]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=id_harga]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=stock]').focus();
        $.get(url)
            .done((response)=>{
                $('#modal-form [name=kode_produk]').val(response.kode_produk);
                $('#modal-form [name=nama_produk]').val(response.nama_produk);
                $('#modal-form [name=id_kategori]').val(response.id_kategori);
                $('#modal-form [name=id_subkategori]').val(response.id_subkategori);
                $('#modal-form [name=id_supplier]').val(response.id_supplier);
                $('#modal-form [name=harga]').val(response.harga);
                $('#modal-form [name=stock]').val(response.stock);
            })
            .fail((errors)=>{
                alert('Tidak dapat menampilkan data');
                return;
            })
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