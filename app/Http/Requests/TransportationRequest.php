<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransportationRequest extends FormRequest
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
                'id_customer' => 'required|string|min:1|max:20',
                'tanggal_penggunaan' => 'required|date',
                'tujuan' => 'required|string|min:3|max:50',
                'tipe_mobil' => 'required|string|min:1|max:100',
                'jumlah' => 'required|int|min:1|max:3',
                'harga' => 'required|string|min:2|max:12',
            ];
        } else {
            return [
                'id_customer' => 'required|string|min:1|max:20',
                'tanggal_penggunaan' => 'required|date',
                'tujuan' => 'required|string|min:3|max:50',
                'tipe_mobil' => 'required|string|min:1|max:100',
                'jumlah' => 'required|int|min:1|max:3',
                'harga' => 'required|string|min:2|max:12',
            ];
        }
    }

    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'id_customer' => 'id Customer wajib di isi',
                'tanggal_penggunaan' => 'Tanggal penggunaan wajib di isi',
                'tujuan' => 'Tujuan wajib di isi',
                'tipe_mobil' => 'Tipe Mobil Perusahaan wajib di isi',
                'jumlah' => 'Jumlah wajib di isi dan harus berupa angka dan tidak boleh nol',
                'harga' => 'Harga wajib di isi',
            ];
        } else {
            return [
                'id_customer' => 'id Customer wajib di isi',
                'tanggal_penggunaan' => 'Tanggal penggunaan wajib di isi',
                'tujuan' => 'Tujuan wajib di isi',
                'tipe_mobil' => 'Tipe Mobil Perusahaan wajib di isi',
                'jumlah' => 'Jumlah wajib di isi dan harus berupa angka dan tidak boleh nol',
                'harga' => 'Harga wajib di isi',
            ];
        }
    }
}