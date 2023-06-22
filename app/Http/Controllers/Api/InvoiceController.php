<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // $invoce = Invoice::where()
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(InvoiceRequest $request)
    {
        $fileName = "";
        if ($request->hasFile('img_tanda_tangan')) {
            $fileName = $request->file('img_tanda_tangan')->store('ttd-invoce', 'public');
        } else {
            $fileName = null;
        }

        try {
            $img_tanda_tangan = new Invoice;
            $img_tanda_tangan->id_customer = $request->id_customer;
            $img_tanda_tangan->nomor_invoice = $request->nomor_invoice;
            $img_tanda_tangan->tanggal_invoice = $request->tanggal_invoice;
            $img_tanda_tangan->tanda_penerima_pembayaran = $request->tanda_penerima_pembayaran;
            $img_tanda_tangan->keterangan = $request->keterangan;
            $img_tanda_tangan->periode_pembayaran = $request->periode_pembayaran;
            $img_tanda_tangan->metode_pembayaran = $request->metode_pembayaran;
            $img_tanda_tangan->nama_bank = $request->nama_bank;
            $img_tanda_tangan->no_rekening = $request->no_rekening;
            $img_tanda_tangan->a_n_rekening = $request->a_n_rekening;
            $img_tanda_tangan->nama_tanda_tangan = $request->nama_tanda_tangan;
            $img_tanda_tangan->img_tanda_tangan = $fileName;
            $result = $img_tanda_tangan->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil Menambahkan Data Invoice",

            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal Menambahkan Data Invoice",
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