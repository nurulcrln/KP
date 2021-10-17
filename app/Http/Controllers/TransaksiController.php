<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaksi.index');
    }
    public function data()
    {
        $transaksi = Transaksi::orderBy('id_transaksi', 'desc')->get();

        return datatables()
            ->of($transaksi)
            ->addIndexColumn()
            ->addColumn('aksi', function ($transaksi){
                return '
                    <button onclick="editForm(`'. route('transaksi.update', $transaksi->id_transaksi) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-edit"></i></button> 
                    <button onclick="deleteData(`'. route('transaksi.destroy', $transaksi->id_transaksi) .'`)"class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button> 
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = new Transaksi();
        $transaksi-> no_invoice = $request->no_invoice;
        $transaksi-> tanggal = $request->tanggal;
        $transaksi-> customer = $request->customer;
        $transaksi-> opsi_bayar = $request->opsi_bayar;
        $transaksi-> tenggat_waktu = $request->tenggat_waktu;
        $transaksi->save();
        
        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::find($id);

        return response()->json($transaksi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi-> no_invoice = $request->no_invoice;
        $transaksi-> tanggal = $request->tanggal;
        $transaksi-> customer = $request->customer;
        $transaksi-> opsi_bayar = $request->opsi_bayar;
        $transaksi-> tenggat_waktu = $request->tenggat_waktu;
        $transaksi->update();

        return response()->json('Data berhasil disimpan', 200);
    }
    public function update_produk(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi-> no_invoice = $request->no_invoice;
        $transaksi-> tanggal = $request->tanggal;
        $transaksi-> customer = $request->customer;
        $transaksi-> opsi_bayar = $request->opsi_bayar;
        $transaksi-> tenggat_waktu = $request->tenggat_waktu;
        $transaksi->update();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        return response(null, 204);
    }
}
