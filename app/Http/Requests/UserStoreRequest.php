<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
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
                'nama_lengkap' => 'required|string|min:3|max:50',
                'tanda_tangan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        } else {
            return [
                'nama_lengkap' => 'required|string|min:3|max:50',
                'tanda_tangan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        }
    }

    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'nama_lengkap.required' => 'Nama Lengkap wajib di isi',
                'tanda_tangan.required' => 'Tanda Tangan wajib di isi',
            ];
        } else {
            return [
                'nama_lengkap.required' => 'Nama Lengkap wajib di isi',
                'tanda_tangan.required' => 'Tanda Tangan wajib di isi',
            ];
        }
    }
}