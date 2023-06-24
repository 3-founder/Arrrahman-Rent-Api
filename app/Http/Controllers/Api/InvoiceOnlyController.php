<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceOnlyRequest;
use App\Models\InvoiceOnly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class InvoiceOnlyController extends Controller
{
    public function index()
    {
        $invoiceonly = InvoiceOnly::all();
        return $invoiceonly->count() == 0 ? response()->json([
            'success' => false,
            'message' => "Data Invoice Only",
            'data' => $invoiceonly,
        ]) : response()->json([
                        'success' => true,
                        'message' => "Data Invoice Only",
                        'data' => $invoiceonly,
                    ]);
    }

    public function indexById($id)
    {
        $invoiceonly = InvoiceOnly::where('id', '=', $id)->get();
        return $invoiceonly->count() == 0 ? response()->json([
            'success' => false,
            'message' => "Data Invoice Only",
            'data' => $invoiceonly,
        ]) : response()->json([
                        'success' => true,
                        'message' => "Data Invoice Only",
                        'data' => $invoiceonly,
                    ]);
    }

    public function create(InvoiceOnlyRequest $request)
    {
        $fileName = "";
        if ($request->hasFile('img_tanda_tangan')) {
            $fileName = $request->file('img_tanda_tangan')->store('ttd-invoce-only', 'public');
        } else {
            $fileName = null;
        }

        try {
            $img_tanda_tangan = new InvoiceOnly;
            $img_tanda_tangan->nomor_invoice = $request->nomor_invoice;
            $img_tanda_tangan->tanggal_invoice = $request->tanggal_invoice;
            $img_tanda_tangan->tanda_penerima_pembayaran = $request->tanda_penerima_pembayaran;
            $img_tanda_tangan->keterangan = $request->keterangan;
            $img_tanda_tangan->periode_pembayaran = $request->periode_pembayaran;
            $img_tanda_tangan->total_pembayaran = $request->total_pembayaran;
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

    public function filterDate(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $invoiceonly = DB::table('invoiceonly')
            ->select('invoiceonly.*')
            ->whereBetween('tanggal_invoice', [$startDate, $endDate])
            ->get();
        return $invoiceonly != '[]' ? response()->json([
            'success' => true,
            'message' => "Data Invoice",
            'data' => $invoiceonly,
        ]) : response()->json([
                        'success' => false,
                        'message' => "Data Invoice",
                        'data' => $invoiceonly,
                    ]);
    }

    public function destroy($id)
    {
        $invoiceonly = InvoiceOnly::find($id)->delete();

        if ($invoiceonly) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil Menghapus Data Invoice Only",
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal Menghapus Data Invoice Only",
            ]);
        }
    }
}