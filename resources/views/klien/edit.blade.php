<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Klien</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Edit Klien</h1>

    <form method="POST" action="{{ route('klien.update', $klien->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Klien</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $klien->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Logo (jpg/jpeg/png)</label>
            <input type="file" name="logo" class="form-control">
        </div>

        @if ($klien->logo)
            <div class="mb-3">
                <label>Logo Saat Ini:</label><br>
                <img src="{{ asset('storage/' . $klien->logo) }}" alt="Logo Klien" width="150" class="img-thumbnail">
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
