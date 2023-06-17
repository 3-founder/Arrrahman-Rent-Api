<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return $user != '[]' ? response()->json([
            'success' => true,
            'message' => $user,
        ]) : response()->json([
                        'success' => false,
                        'message' => $user,
                    ]);
    }

    public function indexById($id)
    {
        $user = User::find($id);
        return ($user != null) ? response()->json([
            'success' => true,
            'message' => $user,
        ]) : response()->json([
                        'success' => false,
                        'message' => $user,
                    ]);
    }

    public function getGambar()
    {
        $user = User::all();
        return view('gambar', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(UserStoreRequest $request)
    {
        try {
            $ttdImageName = Str::random(32) . "." . $request->tanda_tangan->getClientOriginalExtension();

            //create post
            User::create([
                'nama_lengkap' => $request->nama_lengkap,
                'tanda_tangan' => $ttdImageName,
            ]);

            //save image ttd in storege folder
            Storage::disk('public')->put('ttd/' . $ttdImageName, file_get_contents($request->tanda_tangan));

            //return response json
            return response()->json([
                "success" => true,
                "message" => "Tambah Tanda tangan berhasil.",
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                "success" => false,
                "message" => "Sesuatu terjadi kesalahan",
                "message2" => $e,
            ], 500);
        }
    }

}