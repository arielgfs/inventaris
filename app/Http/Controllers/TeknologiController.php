<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teknologi;
use App\Models\Aplikasi;

class TeknologiController extends Controller
{
    public function index()
    {
        $teknologis = \App\Models\Teknologi::all();
        return view('teknologi.index', compact('teknologis'));
    }

    // Menyimpan teknologi baru
    // Menyimpan teknologi baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'versi' => 'required|string|max:50',
            'aplikasi_id' => 'required|exists:aplikasi,id',
        ]);

        // Cek duplikat
        $existing = Teknologi::where('nama', $validated['nama'])
            ->where('aplikasi_id', $validated['aplikasi_id'])
            ->first();

        if ($existing) {
            return back()->with('error', 'Teknologi ini sudah terdaftar untuk aplikasi tersebut.');
        }

        Teknologi::create($validated);

        return back()->with('success', 'Teknologi berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        session(['previous_url' => url()->previous()]); // simpan URL sebelum halaman edit
        $teknologi = Teknologi::findOrFail($id);
        $aplikasis = Aplikasi::all();

        return view('teknologi.edit', compact('teknologi', 'aplikasis'));
    }


    

    // Memperbarui teknologi
    public function update(Request $request, $id)
    {
        $teknologi = Teknologi::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'versi' => 'required|string|max:50',
        ]);

        $teknologi->update($validated);

        // Ambil URL yang disimpan dan hapus dari session
        $redirectUrl = session('previous_url', url()->previous());
        session()->forget('previous_url');

        return redirect($redirectUrl)->with('success', 'Teknologi berhasil diupdate.');
    }

    // Menghapus teknologi
    public function destroy($id)
    {
        $teknologi = Teknologi::findOrFail($id);
        $aplikasiId = $teknologi->aplikasi_id;

        $teknologi->delete();

        return back()->with('success', 'Teknologi berhasil dihapus.');
    }
}
