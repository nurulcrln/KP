@extends('layouts.master')
@section('title')
    Customer
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Customer</li>
@endsection

@section('content')
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with border">
                <button onclick="addForm('{{ route('customer.store')}}')" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i>Add</button>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Nama Customer</th>
                        <th>Email</th>
                        <th>No. Telepon</th>
                        <th>No. Rekening</th>
                        <th>Alamat</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@includeIf('customer.form')
@endsection

@push('scripts')
<script>
    let table;

    $(function(){
        table = $('.table').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('customer.data')}}',
            },
            columns: [
            {data: 'DT_RowIndex', searchable: false, sortable: false},
            {data: 'name'},
            {data: 'email'},
            {data: 'phone'},
            {data: 'rekening'},
            {data: 'address'}, 
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
        $('#modal-form .modal-title').text('Add Customer');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=name]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=rekening]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=email]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=phone]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=address]').focus();
    }

    function editForm(url){
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Kategori');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=name]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=rekening]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=email]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=phone]').focus();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=address]').focus();

        $.get(url)
            .done((response)=>{
                $('#modal-form [name=name]').val(response.name);
                $('#modal-form [name=rekening]').val(response.rekening);
                $('#modal-form [name=email]').val(response.email);
                $('#modal-form [name=phone]').val(response.phone);
                $('#modal-form [name=address]').val(response.address);
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