<!-- resources/views/klien/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Klien</title>
</head>
<body>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('klien.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nama Klien</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}"><br>
        @error('nama') <span style="color: red">{{ $message }}</span><br> @enderror

        <label>Logo Klien</label><br>
        <input type="file" name="logo"><br>
        @error('logo') <span style="color: red">{{ $message }}</span><br> @enderror

        <button type="submit">Simpan</button>
    </form>

</body>
</html>
