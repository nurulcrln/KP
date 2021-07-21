@extends('layouts.master')
@section('title')
    Kategori1
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Kategori</li>
@endsection

@section('content')
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with border">
                <button onclick="addForm()" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i>Add</button>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Kategori</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@includeIf('kategori.form')
@endsection

@push('scripts')
<script>
    let table;

    $(function(){
        table = $('.table').DataTable({
            processing: true,
            autoWidth: false,
            // ajax: {
            //     url: '{{ route('kategori.data')}}',
            // }
        });
        
    });

    function addForm(){
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Add Kategori');

        $('#modal-form form')[0].reset();
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama_kategori]').focus();
    }
    
</script>
@endpush