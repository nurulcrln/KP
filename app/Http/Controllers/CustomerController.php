<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index');
    }
    public function data()
    {
        $customer = Customer::orderBy('id_customer', 'desc')->get();

        return datatables()
            ->of($customer)
            ->addIndexColumn()
            ->addColumn('aksi', function ($customer){
                return '
                    <button onclick="editForm(`'. route('customer.update', $customer->id_customer) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-edit"></i></button> 
                    <button onclick="deleteData(`'. route('customer.destroy', $customer->id_customer) .'`)"class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button> 
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
        $customer = new Customer();
        $customer-> name = $request->name;
        $customer->rekening = $request->rekening;
        $customer-> email = $request->email;
        $customer-> phone = $request->phone;
        $customer-> address = $request->address;
        $customer->save();

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
        $customer = Customer::find($id);

        return response()->json($customer);
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
        $customer = Customer::find($id);
        $customer-> name = $request->name;
        $customer-> rekening = $request->rekening;
        $customer-> email = $request->email;
        $customer-> phone = $request->phone;
        $customer-> address = $request->address;
        $customer->update();

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
        $customer = Customer::find($id);
        $customer->delete();

        return response(null, 204);
    }
}
