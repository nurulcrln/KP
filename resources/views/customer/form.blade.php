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
                    <label for="name" class="col-md-3 col-md-offset-1 control-label">Nama Customer</label>
                    <div class="col-md-6">
                        <input type="text" name="name" id="name" class="form-control" required autofocus>
                        <span class="help-block with-errors"></span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rekening" class="col-md-3 col-md-offset-1 control-label">No. Rekening</label>
                    <div class="col-md-6">
                        <input type="text" name="rekening" id="rekening" class="form-control" required autofocus>
                        <span class="help-block with-errors"></span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-3 col-md-offset-1 control-label">E-mail</label>
                    <div class="col-md-6">
                        <textarea name="email" id="email" rows="2" class="form-control"></textarea>
                        <span class="help-block with-errors"></span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-md-3 col-md-offset-1 control-label">No. Telepon</label>
                    <div class="col-md-6">
                        <textarea name="phone" id="phone" rows="2" class="form-control"></textarea>
                        <span class="help-block with-errors"></span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-md-3 col-md-offset-1 control-label">Alamat</label>
                    <div class="col-md-6">
                        <textarea name="address" id="address" rows="2" class="form-control"></textarea>
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