<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
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
                'kota' => 'required|string|min:3|max:100',
                'alamat' => 'required|string|min:3|max:150',
                'no_hp' => 'required|string|min:11|max:13',
                'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
                'nama_company' => 'required|string|min:3|max:100',
                'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ];
        } else {
            return [
                'kota' => 'required|string|min:3|max:100',
                'alamat' => 'required|string|min:3|max:150',
                'no_hp' => 'required|string|min:11|max:13',
                'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
                'nama_company' => 'required|string|min:3|max:100',
                'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ];
        }
    }

    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'kota' => 'Kota wajib di isi',
                'alamat' => 'Alamat wajib di isi',
                'no_hp' => 'No Hp wajib di isi',
                'email' => 'Inputlah email yang sesuai',
                'nama_company' => 'Nama Perusahaan wajib di isi',
                'logo' => 'Logo wajib di isi, dan gambar berupa jpeg,png,jpg, max:2048',
            ];
        } else {
            return [
                'kota' => 'Kota wajib di isi',
                'alamat' => 'Alamat wajib di isi',
                'no_hp' => 'No Hp wajib di isi',
                'email' => 'Inputlah email yang sesuai',
                'nama_company' => 'Nama Perusahaan wajib di isi',
                'logo' => 'Logo wajib di isi, dan gambar berupa jpeg,png,jpg, max:2048',
            ];
        }
    }
}