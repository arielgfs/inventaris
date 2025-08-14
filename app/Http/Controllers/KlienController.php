<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klien;
use Illuminate\Support\Facades\Storage;

class KlienController extends Controller
{
   public function index()
{
    $kliens = Klien::all();
    return view('klien.index', compact('kliens'));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $existing = Klien::where('nama', $validated['nama'])->first();
        if ($existing) {
            return redirect()->route('entri.data')->with('error', 'Klien dengan nama ini sudah ada.');
        }

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logo_klien', 'public');
        }

        Klien::create($validated);
        return back()->with('success', 'Data klien berhasil ditambahkan.');
    }

    public function edit($id)
    {
        session(['previous_url' => url()->previous()]);
        $klien = Klien::findOrFail($id);
        return view('klien.edit', compact('klien'));
    }

    public function update(Request $request, $id)
    {
        $klien = Klien::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        $klien->update($validated);

        $redirectUrl = session('previous_url', url()->previous());
        session()->forget('previous_url');

        return redirect($redirectUrl)->with('success', 'Klien berhasil diupdate.');
    }

    public function destroy($id)
    {
        $klien = Klien::findOrFail($id);

        // Hapus file logo jika ada
        if ($klien->logo && Storage::disk('public')->exists($klien->logo)) {
            Storage::disk('public')->delete($klien->logo);
        }

        // Hapus data klien
        $klien->delete();

        return back()->with('success', 'Data klien berhasil dihapus.');
    }
}
