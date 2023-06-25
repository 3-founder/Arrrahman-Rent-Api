<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceOnlyRequest;
use App\Models\InvoiceOnly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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

    public function update(Request $request, $id)
    {

        $request->validate([
            'nomor_invoice' => 'required|string|min:9|max:9',
            'tanggal_invoice' => 'required|date',
            'tanda_penerima_pembayaran' => 'required|string|min:3|max:50',
            'keterangan' => 'required|string|min:3|max:50',
            'periode_pembayaran' => 'required|string|min:3|max:50',
            'total_pembayaran' => 'required|string|min:3|max:12',
            'metode_pembayaran' => 'required|string|min:1|max:20',
            // 'nama_bank' => 'string|min:3|max:20',
            // 'no_rekening' => 'string|min:10|max:10',
            // 'a_n_rekening' => 'string|min:3|max:40',
            'nama_tanda_tangan' => 'required|string|min:3|max:40',
            'img_tanda_tangan' => 'required',
        ]);

        $quotationonly = InvoiceOnly::find($id);

        $destination = "storage/" . $quotationonly->img_tanda_tangan;
        $fileName = "";
        if ($request->hasFile('new_ttd')) {
            if (File::exists($destination)) {
                File::delete($destination);
            } else {
                return "Salah";
            }

            // $fileName = $request->file('new_ttd')->store('company-logo', 'public');
            $fileName = $request->file('new_ttd')->store('ttd-invoce-only', 'public');
        } else {
            $fileName = $request->img_tanda_tangan;
        }


        $quotationonly->nomor_invoice = $request->nomor_invoice;
        $quotationonly->tanggal_invoice = $request->tanggal_invoice;
        $quotationonly->tanda_penerima_pembayaran = $request->tanda_penerima_pembayaran;
        $quotationonly->keterangan = $request->keterangan;
        $quotationonly->periode_pembayaran = $request->periode_pembayaran;
        $quotationonly->total_pembayaran = $request->total_pembayaran;
        $quotationonly->metode_pembayaran = $request->metode_pembayaran;
        $quotationonly->nama_bank = $request->nama_bank;
        $quotationonly->no_rekening = $request->no_rekening;
        $quotationonly->a_n_rekening = $request->a_n_rekening;
        $quotationonly->nama_tanda_tangan = $request->nama_tanda_tangan;
        $quotationonly->img_tanda_tangan = $fileName;
        $result = $quotationonly->save();

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil Merubah Data Invoice Only",
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal Merubah Data Invoice Only",
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