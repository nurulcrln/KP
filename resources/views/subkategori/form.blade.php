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
                    <label for="id_kategori" class="col-md-3 col-md-offset-1 control-label">Kategori</label>
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
                <label for="sub_kategori" class="col-md-3 col-md-offset-1 control-label">Sub Kategori</label>
                    <div class="col-md-6">
                        <input type="text" name="sub_kategori" id="id_subkategori" class="form-control" required autofocus>
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