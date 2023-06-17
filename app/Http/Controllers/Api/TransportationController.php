<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransportationRequest;
use App\Models\Customer;
use App\Models\Transportation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransportationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $trans = Transportation::where('id_customer', '=', $id)->get();
        $customer2 = DB::table('customer')
            ->join('users', 'users.id', '=', 'customer.id_user')
            ->where('customer.id', '=', $id)
            ->select('users.*', 'customer.*')
            ->get();
        return $customer2 != '[]' ? response()->json([
            'success' => true,
            'message' => "Data Transportation",
            'data' => $trans != '[]' ? [
                'type_trans' => true,
                'transportation' => $trans,
            ] : array(
                'type_trans' => false,
                'transportation' => $trans,
            ),

            'customer' => $customer2,
        ]) : response()->json([
                        'success' => false,
                        'message' => "Data Transportation",
                        'data' => array(
                            'transportation' => $trans,
                        ),
                        'customer' => $customer2,
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(TransportationRequest $request)
    {
        $trans = new Transportation();
        $trans->id_customer = $request->id_customer;
        $trans->tanggal_penggunaan = $request->tanggal_penggunaan;
        $trans->tujuan = $request->tujuan;
        $trans->lama_penggunaan = $request->lama_penggunaan;
        $trans->tipe_mobil = $request->tipe_mobil;
        $trans->jumlah = $request->jumlah;
        $trans->harga = $request->harga;
        $result = $trans->save();

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil Menambahkan Data Transportation",
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal Menambahkan Data Transportation",
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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