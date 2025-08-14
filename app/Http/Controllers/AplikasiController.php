<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aplikasi;
use App\Models\Klien;
use Illuminate\Support\Facades\Storage;

class AplikasiController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'type'      => 'nullable|string',
            'klien_id'  => 'required|exists:klien,id',
            'link'      => 'nullable|string',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

// cek duplikat
        $existing = Aplikasi::where('nama', $validated['nama'])
            ->where('klien_id', $validated['klien_id'])
            ->first();

        if ($existing) {
            return redirect()->route('entri.data')
                ->with('error', 'Aplikasi ini sudah ada untuk klien tersebut.');
        }

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('gambar_aplikasi', 'public');
        }

        Aplikasi::create($validated);

        return back()->with('success', 'Data aplikasi berhasil ditambahkan.');
    }


    public function gambar()
    {
        $aplikasis = Aplikasi::with('klien')->paginate(6);
        return view('aplikasi.gambar', compact('aplikasis'));
    }

    public function show($id)
    {
        $aplikasi = Aplikasi::with('klien')->findOrFail($id);
        return view('aplikasi.detail', compact('aplikasi'));
    }


    public function tabel(Request $request)
    {
        $query = Aplikasi::with('klien');

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $aplikasi = $query->orderBy('created_at', 'desc')->get();
        return view('aplikasi.tabel', compact('aplikasi'));
    }


    public function edit($id)
    {
        // Simpan URL sebelumnya untuk redirect
        session(['previous_url' => url()->previous()]);

        $aplikasi = Aplikasi::findOrFail($id);
        $klien    = Klien::all();

        return view('aplikasi.edit', compact('aplikasi', 'klien'));
    }


    public function update(Request $request, $id)
    {
        $aplikasi = Aplikasi::findOrFail($id);

        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'type'      => 'nullable|string',
            'klien_id'  => 'required|exists:klien,id',
            'link'      => 'nullable|string',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Hapus gambar lama & upload baru
        if ($request->hasFile('gambar')) {
            if ($aplikasi->gambar && Storage::disk('public')->exists($aplikasi->gambar)) {
                Storage::disk('public')->delete($aplikasi->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('gambar_aplikasi', 'public');
        }

        $aplikasi->update($validated);

        // Redirect ke halaman sebelumnya
        $redirectUrl = session('previous_url', route('aplikasi.index'));
        session()->forget('previous_url');

        return redirect($redirectUrl)->with('success', 'Aplikasi berhasil diupdate.');
    }


    public function destroy($id)
    {
        $aplikasi = Aplikasi::findOrFail($id);

        if ($aplikasi->gambar && Storage::disk('public')->exists($aplikasi->gambar)) {
            Storage::disk('public')->delete($aplikasi->gambar);
        }

        $aplikasi->delete();

        return back()->with('success', 'Aplikasi berhasil dihapus.');
    }

   
    public function detail($id)
    {
        $aplikasi = Aplikasi::with('klien')->findOrFail($id);
        return view('aplikasi.detail-form', compact('aplikasi'));
    }

 
    public function index()
    {
        $aplikasi = Aplikasi::all();
        return view('aplikasi.index', compact('aplikasi'));
    }
}
