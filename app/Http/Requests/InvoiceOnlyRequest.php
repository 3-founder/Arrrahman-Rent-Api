<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceOnlyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        if (request()->isMethod('post')) {
            return [
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
                'img_tanda_tangan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ];
        } else {
            return [
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
                'img_tanda_tangan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ];
        }
    }

    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'nomor_invoice' => 'Nomor Invoice tidak boleh kosong, dan hanya 9 karakter',
                'tanggal_invoice' => 'tanggal pembuatan invoice tidak boleh kosong',
                'tanda_penerima_pembayaran' => 'Tanda tangan wajib di isi, min 3 max 50 karakter',
                'keterangan' => 'Keterangan Wajib di isi, min 3 max 50 karakter',
                'periode_pembayaran' => 'Periode wajib di isi, min 3 max 50 karakter',
                'total_pembayaran' => 'Total pembayaran wajib di isi, min 3 max 12 karakter',
                'metode_pembayaran' => 'Metode Pembayaran wajib di isi, min 1 max 10 karakter',
                // 'nama_bank' => 'Nama Bank wajib di isi, min 2 max 20 karakter',
                // 'no_rekening' => 'No Rekening wajib di isi, dan hanya 10 digit',
                // 'a_n_rekening' => 'Atas Nama Rekening wajib di isi, min 3 max 40 karakter',
                'nama_tanda_tangan' => 'Nama Penanda Tangan wajib di isi, min 3 max 40 karakter',
                'img_tanda_tangan' => 'Tanda Tangan wajib di isi',
            ];
        } else {
            return [
                'nomor_invoice' => 'Nomor Invoice tidak boleh kosong, dan hanya 9 karakter',
                'tanggal_invoice' => 'tanggal pembuatan invoice tidak boleh kosong',
                'tanda_penerima_pembayaran' => 'Tanda tangan wajib di isi, min 3 max 50 karakter',
                'keterangan' => 'Keterangan Wajib di isi, min 3 max 50 karakter',
                'periode_pembayaran' => 'Periode wajib di isi, min 3 max 50 karakter',
                'total_pembayaran' => 'Total pembayaran wajib di isi, min 3 max 12 karakter',
                'metode_pembayaran' => 'Metode Pembayaran wajib di isi, min 1 max 10 karakter',
                // 'nama_bank' => 'Nama Bank wajib di isi, min 2 max 20 karakter',
                // 'no_rekening' => 'No Rekening wajib di isi, dan hanya 10 digit',
                // 'a_n_rekening' => 'Atas Nama Rekening wajib di isi, min 3 max 40 karakter',
                'nama_tanda_tangan' => 'Nama Penanda Tangan wajib di isi, min 3 max 40 karakter',
                'img_tanda_tangan' => 'Tanda Tangan wajib di isi',
            ];
        }
    }
}