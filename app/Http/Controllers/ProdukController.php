<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Subkategori;
use App\Models\Supplier;
class ProdukController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori');
        $subkategori = Subkategori::all()->pluck('sub_kategori', 'id_subkategori');
        $supplier = Supplier::all()->pluck('name', 'id_supplier');
        return view('produk.index', compact('kategori', 'subkategori', 'supplier'));

    }

    public function data()
    {
        $produk = Produk::leftJoin('subkategori', 'subkategori.id_subkategori', 'produk.id_subkategori')
            ->select('produk.*', 'sub_kategori')
            ->orderBy('kode_produk', 'asc')
            ->get();

        return datatables()
            ->of($produk)
            ->addIndexColumn()

            ->addColumn('aksi', function ($produk){
                return '
                    <button onclick="editForm(`'. route('produk.update', $produk->id_produk) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-edit"></i></button> 
                    <button onclick="deleteData(`'. route('produk.destroy', $produk->id_produk) .'`)"class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button> 
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
        
    }

    // public function SimpanSupplier($id){
    //     $simpan_supplier = Produk::leftJoin('supplier', 'supplier.id_supplier', 'produk.id_supplier')
    //         ->select('produk.*', 'name')
    //         ->orderBy('id_supplier', 'desc')
    //         ->with('supplier')
    //         ->where('id_produk', $id)
    //         ->get();
        
    //         $data = array();
    //         foreach ($simpan_supplier as $supplier){
    //             $row = array();
    //             $row['name'] = $supplier->produk['name'];
    //             $row['aksi2'] = '<button onclick="deleteData(`'.route('produk.destroy_supplier', $supplier->id_produk).'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-cross"></i></button>';
    //         }
    // }
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
        $produk = new Produk();
        $produk-> kode_produk = $request->kode_produk;
        $produk-> nama_produk = $request->nama_produk;
        $produk-> id_kategori = $request->id_kategori;
        $produk-> id_subkategori = $request->id_subkategori;
        $produk-> id_supplier = $request->id_supplier;
        $produk-> stock = $request->stock;
        $produk->save();

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
        $produk = Produk::find($id);

        return response()->json($produk);
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
        $produk = Produk::find($id);
        $produk-> kode_produk = $request->kode_produk;
        $produk-> nama_produk = $request->nama_produk;
        $produk-> id_kategori = $request->id_kategori;
        $produk-> id_subkategori = $request->id_subkategori;
        $produk-> id_supplier = $request->id_supplier;
        $produk-> stock = $request->stock;
        $produk->update();

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
        $produk = Produk::find($id);
        $produk->delete();

        return response(null, 204);
    }
    // public function destroy_supplier($id)
    // {
    //     $simpan_supplier = Produk::find($id);
    //     $simpan_supplier->delete();

    //     return response(null, 204);
    // }

}
