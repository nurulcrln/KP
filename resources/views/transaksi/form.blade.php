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
                    <label for="no_invoice" class="col-md-3 col-md-offset-1 control-label">No_Invoice</label>
                    <div class="col-md-6">
                        <input type="text" name="no_invoice" id="no_invoice" class="form-control" required autofocus>
                        <span class="help-block with-errors"></span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal" class="col-md-3 col-md-offset-1 control-label">Tanggal</label>
                    <div class="col-md-6">
                        <input type="date" id="tanggal" name="tanggal" value="<?=date('Y-m-d')?>" class="form-control">
                        <span class="help-block with-errors"></span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="customer" class="col-md-3 col-md-offset-1 control-label">Kustomer</label>
                    <div class="col-md-6">
                        <input type="text" name="customer" id="customer" class="form-control" required autofocus>
                        <span class="help-block with-errors"></span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="opsi_bayar" class="col-md-3 col-md-offset-1 control-label">Opsi Pembayaran</label>
                    <div class="col-md-6">
                    <div class="form-check">
                                <label class="form-check-label" for="radio1">
                                    <input type="radio" class="form-check-input" name="opt1" id="radio1" value="cash">Cash
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label" for="radio2">
                                <input type="radio" class="form-check-input" name="opt2" id="radio2" value="credit">Credit
                                </label>
                            </div>
                        <span class="help-block with-errors"></span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tenggat_waktu" class="col-md-3 col-md-offset-1 control-label">Batas Waktu</label>
                    <div class="col-md-6">
                    <input type="date" id="tanggal" name="tanggal" value="<?=date('Y-m-d')?>" class="form-control">
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