<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubKategori;
use App\Models\Kategori;

class SubKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori');
        return view('subkategori.index', compact('kategori'));
    }

    public function data()
    {
        $subkategori = SubKategori::leftJoin('kategori', 'kategori.id_kategori', 'subkategori.id_kategori')
            ->select('subkategori.*', 'nama_kategori')
            ->orderBy('id_kategori', 'asc')
            ->get();

        return datatables()
            ->of($subkategori)
            ->addIndexColumn()
            ->addColumn('aksi', function ($subkategori){
                return '
                    <button onclick="editForm(`'. route('subkategori.update', $subkategori->id_subkategori) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-edit"></i></button> 
                    <button onclick="deleteData(`'. route('subkategori.destroy', $subkategori->id_subkategori) .'`)"class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button> 
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
        // $subkategori = SubKategori::create($request->all());
        $subkategori = new SubKategori();
        $subkategori-> id_kategori = $request->id_kategori;
        $subkategori-> sub_kategori = $request->sub_kategori;
        $subkategori->save();

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
        $subkategori = SubKategori::find($id);

        return response()->json($subkategori);
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
        $subkategori = SubKategori::find($id);
        $subkategori-> id_kategori = $request->id_kategori;
        $subkategori-> sub_kategori = $request->sub_kategori;
        $subkategori->update();

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
        $subkategori = SubKategori::find($id);
        $subkategori->delete();

        return response(null, 204);
    }
}
