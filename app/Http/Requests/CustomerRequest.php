<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
                'no_quotation' => 'required|string|min:9|max:9',
                'kutipan_sewa' => 'required|string|min:3|max:50',
                'nama_customer' => 'required|string|min:3|max:50',
                'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
                'nama_perusahaan' => 'required|string|min:3|max:100',
                'kota' => 'required|string|min:3|max:50',
                'nama_jalan' => 'required|string|min:3|max:150',
                'kode_pos' => 'required|string|min:5|max:5',
                'no_hp' => 'required|string|min:9|max:17',
                'tanggal' => 'required|date',
                'id_user' => 'required',
            ];
        } else if (request()->isMethod('put')) {
            return [
                'no_quotation' => 'required|string|min:9|max:9',
                'kutipan_sewa' => 'required|string|min:3|max:50',
                'nama_customer' => 'required|string|min:3|max:50',
                'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
                'nama_perusahaan' => 'required|string|min:3|max:100',
                'kota' => 'required|string|min:3|max:50',
                'nama_jalan' => 'required|string|min:3|max:150',
                'kode_pos' => 'required|string|min:5|max:5',
                'no_hp' => 'required|string|min:9|max:17',
                'tanggal' => 'required|date',
                'id_user' => 'required',
            ];
        } else {
            return [
                'no_quotation' => 'required|string|min:9|max:9',
                'kutipan_sewa' => 'required|string|min:3|max:50',
                'nama_customer' => 'required|string|min:3|max:50',
                'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
                'nama_perusahaan' => 'required|string|min:3|max:100',
                'kota' => 'required|string|min:3|max:50',
                'nama_jalan' => 'required|string|min:3|max:150',
                'kode_pos' => 'required|string|min:5|max:5',
                'no_hp' => 'required|string|min:9|max:17',
                'tanggal' => 'required|date',
                'id_user' => 'required',
            ];
        }
    }

    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'kutipan_sewa' => 'kutipan Sewa wajib di isi, min 3 max 50 karakter',
                'nama_customer' => 'Nama wajib di isi, min 3 max 50 karakter',
                'email' => 'Terjadi kesalahan input email',
                'nama_perusahaan' => 'Nama Perusahaan wajib di isi, min 3 max 50 karakter',
                'kota' => 'Kota wajib di isi, min 3 max 50 karakter',
                'nama_jalan' => 'Nama jalan wajib di isi, min 3 max 100 karakter',
                'kode_pos' => 'Kode Pos wajib di isi, dan hanya 5 digit',
                'no_hp' => 'No Hp wajib di isi, min 9 digit',
                'tanggal' => 'Tanggal Wajib di isi',
                'no_quotation' => 'No Quotation wajib di isi, dan hanya 9 karakter',
                'id_user' => 'id user tidak boleh kosong',
            ];
        } else if (request()->isMethod('put')) {
            return [
                'kutipan_sewa' => 'kutipan Sewa wajib di isi, min 3 max 50 karakter',
                'nama_customer' => 'Nama wajib di isi, min 3 max 50 karakter',
                'email' => 'Terjadi kesalahan input email',
                'nama_perusahaan' => 'Nama Perusahaan wajib di isi, min 3 max 50 karakter',
                'kota' => 'Kota wajib di isi, min 3 max 50 karakter',
                'nama_jalan' => 'Nama jalan wajib di isi, min 3 max 100 karakter',
                'kode_pos' => 'Kode Pos wajib di isi, dan hanya 5 karakter',
                'no_hp' => 'No Hp wajib di isi, min 9 digit',
                'tanggal' => 'Tanggal Wajib di isi',
                'no_quotation' => 'No Quotation wajib di isi, dan hanya 9 karakter',
                'id_user' => 'id user tidak boleh kosong',
            ];

        } else {
            return [
                'kutipan_sewa' => 'kutipan Sewa wajib di isi, min 3 max 50 karakter',
                'nama_customer' => 'Nama wajib di isi, min 3 max 50 karakter',
                'email' => 'Terjadi kesalahan input email',
                'nama_perusahaan' => 'Nama Perusahaan wajib di isi, min 3 max 50 karakter',
                'kota' => 'Kota wajib di isi, min 3 max 50 karakter',
                'nama_jalan' => 'Nama jalan wajib di isi, min 3 max 100 karakter',
                'kode_pos' => 'Kode Pos wajib di isi, dan hanya 5 karakter',
                'no_hp' => 'No Hp wajib di isi, min 9 digit',
                'tanggal' => 'Tanggal Wajib di isi',
                'no_quotation' => 'No Quotation wajib di isi, dan hanya 9 karakter',
                'id_user' => 'id user tidak boleh kosong',
            ];
        }
    }
}