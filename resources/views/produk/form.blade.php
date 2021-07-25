<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
  <div class="modal-dialog" role="document">
    <form action="" method="post" class="form-horizontal">
        @csrf
        @method('post')
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" ></h4>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="nama_produk" class="col-md-2 col-md-offset-1 control-label">Nama Produk</label>
                    <div class="col-md-6">
                        <input type="text" name="nama_produk" id="id_produk" class="form-control" required autofocus>
                        <span class="help-block with-errors"></span> 
                    </div>
                </div>
                <div class="form-group row">
                <label for="sub_kategori" class="col-md-2 col-md-offset-1 control-label">Kategori</label>
                    <div class="col-md-6">
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        <span class="help-block with-errors"></span> 
                    </div> 
                </div>
                <div class="form-group row">
                    <label for="supplier" class="col-md-2 col-md-offset-1 control-label">Supplier</label>
                    <div class="col-md-6">
                        <input type="text" name="supplier" id="supplier" class="form-control" required autofocus>
                        <button onclick="addForm('{{ route('produk.store')}}')" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i></button>
                        <span class="help-block with-errors"></span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stock" class="col-md-2 col-md-offset-1 control-label">Stock</label>
                    <div class="col-md-6">
                        <input type="number" name="stok" id="stok" class="form-control" required value="0">
                        <span class="help-block with-errors"></span> 
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </form>
  </div>
</div>