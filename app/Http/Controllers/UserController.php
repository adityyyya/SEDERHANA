<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $user = User::when($search, function ($query, $search) {
            return $query->where('nip', 'like', "%{$search}%")
                         ->orWhere('nama', 'like', "%{$search}%")
                         ->orWhere('jabatan', 'like', "%{$search}%")
                         ->orWhere('tgl_lahir', 'like', "%{$search}%")
                         ->orWhere('gajih', 'like', "%{$search}%");
        })->get();

        return view('pegawai.index', ['user' => $user]);
    }

    public function tambah()
    {
        return view('pegawai.form');
    }

    public function simpan(Request $request)
    {
        $data = $request->validate([
            'nip' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|in:admin,lurah,sekretaris lurah', // Validasi sesuai ENUM
            'tgl_lahir' => 'required|date',
            'gajih' => 'required|numeric',
        ]);

        User::create($data);

        return redirect()->route('pegawai');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('pegawai.form', ['user' => $user]);
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            'nip' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|in:admin,lurah,sekretaris lurah', // Validasi sesuai ENUM
            'tgl_lahir' => 'required|date',
            'gajih' => 'required|numeric',
        ]);

        User::find($id)->update($data);

        return redirect()->route('pegawai');
    }

    public function hapus($id)
    {
        User::find($id)->delete();

        return redirect()->route('pegawai');
    }
}
