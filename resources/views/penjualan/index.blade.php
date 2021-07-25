@extends('layouts.master')
@section('title')
    Transaksi
@endsection
@section('breadcrumb')
    @parent
    <li class="active">Transaksi</li>
@endsection

@section('content')
<main class="app-content">
      <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-cart"></i> Transaction</h1>

        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Transaction</li>
        </ul>
      </div>

      <form id="formSave" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="tile">
                    <div class="tile-body">
                        <table widht="100%">
                            <tr>
                                <td style="vertical-align: top">
                                    <label for="date">Date</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="date" id="date" name="date" value="<?=date('Y-m-d')?>" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width: 30%">
                                    <label for="user">Kasir</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="user_id" name="user_id" value="{{Auth::user()->name}}" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top">
                                    <label for="customer">Customer</label>
                                </td>
                                <td>
                                    <div>
                                        <select id="customer_name" name="customer_name" class="form-control demoSelect">
                                            <option value="umum">Umum</option>
                                            @foreach ($customer as $row)
                                                <option value="{{$row->name}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tile">
                    <div class="tile-body">
                        <table widht="100%">
                            <tr>
                                <td style="vertical-align: top;width: 30%">
                                    <label for="barcode">Barcode</label>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <input type="hidden" id="item_id" name="item_id">
                                        <input type="hidden" id="price" name="price">
                                        <input type="hidden" id="stock" name="stock">
                                        
                                        <input type="text" id="barcode" name="barcode" class="form-control" autofocus >
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top">
                                    <label for="qty">Qty</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id" name="id">
                                        <input type="number" id="qty" name="qty" value="1" min="1" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div>
                                        <button type="submit" name="submit" class="btn btn-primary">
                                            <i class="fa fa-cart-plus"></i> Add
                                          </button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="tile">
                  <div class="tile-body">
                    <div class="box box-widget">
                        <div class="box-body">
                            <div align="right">
                                <h4>Invoice <b><span id="sale_id" name="sale_id">{{ $max_code }}</span></b></h4>
                                <h1><b><span id="grand_total2" style="font-size: 50pt">0</span></b></h1>
                            </div>
                            <br>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </form>
      <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Barcode</th>
                              <th>Product Item</th>
                              <th>Price</th>
                              <th>Qty</th>
                              <th>Discount Item</th>
                              <th>Total</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody id="cart_table">
                           
                          </tbody>
                        </table>
                      </div>
                </div>
            </div>
        </div>
      </div>
      <form action="{{url('admin/sales/transaction/')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-3">
            <div class="tile">
              <div class="tile-body">
                <table widht="100%">
                  <tr>
                    <td style="vertical-align: top;width: 30%">
                        <label for="sub_total">Sub Total</label>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="number" id="sub_total" name="sub_total" value="" class="form-control" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top">
                        <label for="discount">Discount</label>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="number" id="discount" name="discount" value="0" min="0" class="form-control">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top">
                        <label for="grand_total">Grand Total</label>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="number" id="grand_total" name="grand_total" class="form-control" readonly>
                        </div>
                    </td>
                </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="tile">
             <div class="tile-body">
                <table width="100%">
                    <tr>
                        <td style="vertical-align: top; width: 30%">
                            <label for="cash">Cash</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" id="cash" name="cash" value="0" min="0" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top">
                            <label for="change">Change</label>
                        </td>
                        <td>
                            <div>
                                <input type="number" id="change" name="change" class="form-control" readonly>
                                <input type="hidden" id="date" name="date" value="{{date('Y-m-d')}}">
                                <input type="hidden" id="sale_id" name="sale_id" value="{{$max_code}}">
                            </div>
                        </td>
                    </tr>
                </table>
             </div>
            </div>
         </div>

         <div class="col-md-3">
            <div class="tile">
             <div class="tile-body">
                <table width="100%">
                    <tr>
                        <td style="vertical-align: top">
                            <label for="note">Note</label>
                        </td>
                        <td>
                            <div>
                                <textarea id="note" name="note" rows="3" class="form-control" required=""></textarea>
                                
                            </div>
                        </td>
                    </tr>
                </table>
             </div>
            </div>
         </div>
         <div class="col-md-3">
            <div class="">
             <div class="">
                <table width="100%">
                    <tr>
                     
                       <br><br>
                        <button type="submit" id="process_payment" class="btn btn-flat btn-lg btn-success">
                            <i class="fa fa-paper-plane-o"></i> Process
                        </button>
                    </tr>
                </table>
                
             </div>
            </div>
            
         </div>
        </div>
      </form>
      @include('sweetalert::alert')
    </main>
{{-- modal barcode --}}
<div class="modal"  tabindex="-1" role="dialog"  id="modal-item">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Product Item</h5>
          <button type="button" class="close" id="closeModalTambah" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body table-responsive">
          <table class="table table-bordered table-striped" id="sampleTable">
            <thead>
              <tr>
                <th>Barcode</th>
                <th>Name</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($item as $data)
                <tr>
                  <td>{{$data->barcode}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->unit_name}}</td>
                  <td>{{$data->price}}</td>
                  <td>{{$data->stock}}</td>
                  <td class="text-right">
                    <button class="btn btn-info btn-xs" id="select"
                     data-id="{{$data->item_id}}"
                     data-barcode="{{$data->barcode}}"
                     data-price="{{$data->price}}"
                     data-stock="{{$data->stock}}">
                      <i class="fa fa-check"></i> Select
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
    <!-- Modal Edit Cart Item -->
<div class="modal fade" id="modal-item-edit">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="formEdit" method="POST">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title">Update Product Item</h5>
            <button type="button" class="close" id="closeModalEdit" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div class="modal-body table-responsive">
          <input type="hidden" id="cartid_item">
          <div class="form-group">
            <label for="product_item">Product Item</label>
            <div class="row">
              <div class="col-md-5">
                <input type="text" id="barcode_item" class="form-control" readonly>
              </div>
              <div class="col-md-7">
                <input type="text" id="product_item" class="form-control" readonly>
              </div>          
            </div>
          </div>
          <div class="form-group">
            <label for="price_item">Price</label>
            <input type="number" id="price_item" name="price" min="0" class="form-control">
          </div>
          <div class="form-group">
            <label for="qty_item">Qty</label>
            <input type="number" id="qty_item" name="qty" min="1" class="form-control">
          </div>
          <div class="form-group">
            <label for="total_before">Total Before discount</label>
            <input type="number" id="total_before" min="0" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="discount_item">Discount Per Item</label>
            <input type="number" id="discount_item" name="discount_item" class="form-control">
          </div>
          <div class="form-group">
            <label for="total_item">Total After Discount</label>
            <input type="number" id="total_item" name="total" min="0" class="form-control" readonly>
          </div>
        </div>
        <div class="modal-footer">
          <div class="pull-right">

            <button type="submit" class="btn btn-flat btn-success"><i class="fa fa-paper-plane"></i> Save</button>
            
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection