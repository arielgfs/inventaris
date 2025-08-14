<!DOCTYPE html>
<html>
<head>
    <title>Form Entri Data</title>
</head>
<style>
    .navbar {
            background-color: #333;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 6px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            display: inline-block;
        }
        .navbar a:hover {
            background-color: #555;
            border-radius: 4px;
        }
</style>

<body>
    <div class="navbar">
        <a href="{{ route('aplikasi.tabel') }}">Seluruh tabel</a>
        <a href="{{ route('aplikasi.index') }}">Aplikasi Index</a>
        <a href="{{ route('klien.index') }}">Klien Index</a>
        <a href="{{ route('teknologi.index') }}">Teknologi Index</a>
    </div>

<h1>Form Entri Data</h1>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<hr>

{{-- Form KLIEN --}}
<h2>Tambah Klien</h2>
<form action="{{ route('klien.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nama" placeholder="Nama Klien" required>
    <input type="file" name="logo" required>
    <button type="submit">Simpan Klien</button>
</form>

<hr>

{{-- Form APLIKASI --}}
<h2>Tambah Aplikasi</h2>
<form action="{{ route('aplikasi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nama" placeholder="Nama Aplikasi" required><br>
    <textarea name="deskripsi" placeholder="Deskripsi" required></textarea><br>
    <input type="text" name="type" placeholder="Tipe" required><br>
    <select name="klien_id" required>
        <option value="">-- Pilih Klien --</option>
        @foreach($klien as $k)
            <option value="{{ $k->id }}">{{ $k->nama }}</option>
        @endforeach
    </select><br>
    <input type="text" name="link" placeholder="Link (Opsional)" required><br>
    <input type="file" name="gambar" required><br>
    <button type="submit">Simpan Aplikasi</button>
</form>

<hr>

{{-- Form TEKNOLOGI --}}
<h2>Tambah Teknologi</h2>
<form action="{{ route('teknologi.store') }}" method="POST">
    @csrf
    <input type="text" name="nama" placeholder="Nama Teknologi" required><br>
    <input type="text" name="versi" placeholder="Versi" required><br>
    <select name="aplikasi_id" required>
        <option value="">-- Pilih Aplikasi --</option>
        @foreach($aplikasi as $a)
            <option value="{{ $a->id }}">{{ $a->nama }}</option>
        @endforeach
    </select><br>
    <button type="submit">Simpan Teknologi</button>
</form>

</body>
</html>
