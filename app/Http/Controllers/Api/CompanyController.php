<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyStoreRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::all();
        return $company == '[]' ? response()->json([
            "success" => false,
            "message" => "Data Company",
            "data" => $company,
        ]) : response()->json([
                        "success" => true,
                        "message" => "Data Company",
                        "data" => $company,
                    ]);
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return response()->json([
            "success" => true,
            "data" => $company,
        ]);
    }

    public function update(Request $request, Company $company, $id)
    {
        $request->validate([
            'kota' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'nama_company' => 'required',
            'logo' => 'required',
        ]);

        $company = Company::find($id);

        $destination = "storage/" . $company->logo;
        $fileName = "";
        if ($request->hasFile('new_logo')) {
            if (File::exists($destination)) {
                File::delete($destination);
            } else {
                return "Salah";
            }

            $fileName = $request->file('new_logo')->store('company-logo', 'public');
        } else {
            $fileName = $request->logo;
        }


        $company->kota = $request['kota'];
        $company->no_hp = $request['no_hp'];
        $company->email = $request['email'];
        $company->nama_company = $request['nama_company'];
        $company->logo = $fileName;
        $result = $company->save();

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil Merubah Data Company",
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal Merubah Data Company",
            ]);
        }
    }

    public function create(CompanyStoreRequest $request)
    {
        $fileName = "";
        if ($request->hasFile('logo')) {
            $fileName = $request->file('logo')->store('company-logo', 'public');
        } else {
            $fileName = null;
        }

        $logo = new Company();
        $logo->kota = $request->kota;
        $logo->alamat = $request->alamat;
        $logo->no_hp = $request->no_hp;
        $logo->email = $request->email;
        $logo->nama_company = $request->nama_company;
        $logo->logo = $fileName;
        $result = $logo->save();

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil Menambahkan Data Company",
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal Menambahkan Data Company",
            ]);
        }
    }
}