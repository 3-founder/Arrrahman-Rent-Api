<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = DB::table('customer')
            ->join('users', 'users.id', '=', 'customer.id_user')
            ->select('users.*', 'customer.*')
            ->get();
        return $customers != '[]' ? response()->json([
            'success' => true,
            'message' => "Data Customer",
            'data' => $customers,
        ]) : response()->json([
                        'success' => false,
                        'message' => "Data Customer",
                        'data' => $customers,
                    ]);
    }

    public function indexById($id)
    {
        $customers = Customer::find($id);
        return $customers != '[]' ? response()->json([
            'success' => true,
            'message' => "Data Customer",
            'data' => $customers,
        ]) : response()->json([
                        'success' => false,
                        'message' => "Data Customer",
                        'data' => $customers,
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CustomerRequest $request)
    {
        $customer = new Customer();
        $customer->kutipan_sewa = $request->kutipan_sewa;
        $customer->nama_customer = $request->nama_customer;
        $customer->email = $request->email;
        $customer->nama_perusahaan = $request->nama_perusahaan;
        $customer->kota = $request->kota;
        $customer->nama_jalan = $request->nama_jalan;
        $customer->kode_pos = $request->kode_pos;
        $customer->no_hp = $request->no_hp;
        $customer->tanggal = $request->tanggal;
        $customer->no_quotation = $request->no_quotation;
        $customer->komentar = $request->komentar;
        $customer->total_harga = $request->total_harga;
        $customer->id_user = $request->id_user;
        $result = $customer->save();

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil Menambahkan Data Customer",
                'data' => $customer,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal Menambahkan Data Customer",
                'data' => $customer,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}