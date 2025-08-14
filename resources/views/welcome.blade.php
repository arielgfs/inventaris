<!DOCTYPE html>
<html>
<head>
    <title>Form Entri Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>
<body>

<h1>Form Entri Data</h1>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<hr>

{{-- Form KLIEN --}}
<h2>Tambah Klien</h2>
<form action="{{ route('klien.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nama" placeholder="Nama Klien">
    <input type="file" name="logo">
    <button type="submit">Simpan Klien</button>
</form>

<hr>

{{-- Form APLIKASI --}}
<h2>Tambah Aplikasi</h2>
<form action="{{ route('aplikasi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nama" placeholder="Nama Aplikasi"><br>
    <textarea name="deskripsi" placeholder="Deskripsi"></textarea><br>
    <input type="text" name="type" placeholder="Tipe"><br>
    <select name="klien_id">
        <option value="">-- Pilih Klien --</option>
        @foreach($klien as $k)
            <option value="{{ $k->id }}">{{ $k->nama }}</option>
        @endforeach
    </select><br>
    <input type="text" name="link" placeholder="Link (Opsional)"><br>
    <input type="file" name="gambar"><br>
    <button type="submit">Simpan Aplikasi</button>
</form>

<hr>

{{-- Form TEKNOLOGI --}}
<h2>Tambah Teknologi</h2>
<form action="{{ route('teknologi.store') }}" method="POST">
    @csrf
    <input type="text" name="nama" placeholder="Nama Teknologi"><br>
    <input type="text" name="versi" placeholder="Versi"><br>
    <select name="aplikasi_id">
        <option value="">-- Pilih Aplikasi --</option>
        @foreach($aplikasi as $a)
            <option value="{{ $a->id }}">{{ $a->nama }}</option>
        @endforeach
    </select><br>
    <button type="submit">Simpan Teknologi</button>
</form>

</body>
</html>
