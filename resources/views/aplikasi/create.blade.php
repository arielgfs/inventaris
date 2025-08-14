<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Aplikasi</title>
</head>
<body>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('aplikasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nama Aplikasi</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}"><br>
        @error('nama') <span style="color:red">{{ $message }}</span><br> @enderror

        <label>Deskripsi</label><br>
        <textarea name="deskripsi">{{ old('deskripsi') }}</textarea><br>
        @error('deskripsi') <span style="color:red">{{ $message }}</span><br> @enderror

        <label>Type</label><br>
        <input type="text" name="type" value="{{ old('type') }}"><br>
        @error('type') <span style="color:red">{{ $message }}</span><br> @enderror

        <label>Klien</label><br>
        <select name="klien_id">
            <option value="">-- Pilih Klien --</option>
            @foreach($klien as $k)
                <option value="{{ $k->id }}" {{ old('klien_id') == $k->id ? 'selected' : '' }}>
                    {{ $k->nama }}
                </option>
            @endforeach
        </select><br>
        @error('klien_id') <span style="color:red">{{ $message }}</span><br> @enderror

        <label>Link</label><br>
        <input type="text" name="link" value="{{ old('link') }}"><br>
        @error('link') <span style="color:red">{{ $message }}</span><br> @enderror

        <label>Gambar</label><br>
        <input type="file" name="gambar"><br>
        @error('gambar') <span style="color:red">{{ $message }}</span><br> @enderror

        <button type="submit">Simpan</button>
    </form>

</body>
</html>
