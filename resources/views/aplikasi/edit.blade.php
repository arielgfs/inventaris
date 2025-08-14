<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Aplikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h2>Edit Aplikasi</h2>

    <form action="{{ route('aplikasi.update', $aplikasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Aplikasi</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $aplikasi->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $aplikasi->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" name="type" class="form-control" value="{{ old('type', $aplikasi->type) }}">
        </div>

        <div class="mb-3">
            <label for="klien_id" class="form-label">Klien</label>
            <select name="klien_id" class="form-select" required>
                @foreach($klien as $k)
                    <option value="{{ $k->id }}" {{ $aplikasi->klien_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" name="link" class="form-control" value="{{ old('link', $aplikasi->link) }}">
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Aplikasi</label><br>
            @if($aplikasi->gambar)
                <img src="{{ asset('storage/' . $aplikasi->gambar) }}" alt="Gambar" width="100" class="mb-2"><br>
            @endif
            <input type="file" name="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ url()->previous() }}" class="btn btn-back" style="background-color:#2196F3; color:white; padding:6px 12px; border-radius:5px; text-decoration:none;">← Kembali</a>

    </form>
</body>
</html>
