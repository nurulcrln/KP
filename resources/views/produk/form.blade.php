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
                    <label for="kode_produk" class="col-md-2 col-md-offset-1 control-label">Kode Produk</label>
                    <div class="col-md-6">
                        <input type="text" name="kode_produk" id="kode_produk" class="form-control" required autofocus>
                        <span class="help-block with-errors"></span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_produk" class="col-md-2 col-md-offset-1 control-label">Nama Produk</label>
                    <div class="col-md-6">
                        <input type="text" name="nama_produk" id="id_produk" class="form-control" required autofocus>
                        <span class="help-block with-errors"></span> 
                    </div>
                </div>
                <div class="form-group row">
                <label for="id_kategori" class="col-md-2 col-md-offset-1 control-label">Kategori</label>
                    <div class="col-md-6">
                        <select name="id_kategori" id="id_kategori" class="form-control">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        <span class="help-block with-errors"></span> 
                    </div> 
                </div>
                <div class="form-group row">
                <label for="id_subkategori" class="col-md-2 col-md-offset-1 control-label">Sub Kategori</label>
                    <div class="col-md-6">
                        <select name="id_subkategori" id="id_subkategori" class="form-control">
                            <option value="">Pilih Sub Kategori</option>
                            @foreach ($subkategori as $key1 => $item2)
                                <option value="{{ $key1 }}">{{ $item2 }}</option>
                            @endforeach
                        </select>
                        <span class="help-block with-errors"></span> 
                    </div> 
                </div>
                <div class="form-group row">
                <label for="id_supplier" class="col-md-2 col-md-offset-1 control-label">Supplier</label>
                    <div class="col-md-6">
                        <select name="id_supplier" id="id_supplier" class="form-control">
                            <option value="">Pilih Supplier</option>
                            @foreach ($supplier as $key2 => $item3)
                                <option value="{{ $key2 }}">{{ $item3 }}</option>
                            @endforeach
                        </select>
                        <span class="help-block with-errors"></span> 
                    </div> 
                </div>
                <div class="form-group row">
                    <label for="harga" class="col-md-2 col-md-offset-1 control-label">Harga</label>
                    <div class="col-md-6">
                        <input type="text" name="harga" id="harga" class="form-control" required autofocus>
                        <span class="help-block with-errors"></span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stock" class="col-md-2 col-md-offset-1 control-label">Stock</label>
                    <div class="col-md-6">
                        <input type="number" name="stock" id="stock" class="form-control" required value="0">
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