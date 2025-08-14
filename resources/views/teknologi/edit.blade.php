<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Teknologi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Teknologi</h1>

        {{-- Menampilkan error validasi jika ada --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('teknologi.update', $teknologi->id) }}">
            @csrf
            @method('PUT')

            <!-- Pilih Aplikasi -->
            <div class="mb-3">
                <label for="aplikasi_id" class="form-label">Pilih Aplikasi</label>
                <select class="form-select" name="aplikasi_id" id="aplikasi_id" required>
                    <option value="">-- Pilih Aplikasi --</option>
                    @foreach ($aplikasis as $aplikasi)
                        <option value="{{ $aplikasi->id }}" {{ $aplikasi->id == $teknologi->aplikasi_id ? 'selected' : '' }}>
                            {{ $aplikasi->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Nama Teknologi -->
            <div class="mb-3">
                <label class="form-label" for="nama_teknologi">Nama Teknologi</label>
                <input type="text" id="nama_teknologi" name="nama" class="form-control" value="{{ old('nama', $teknologi->nama) }}" required>
            </div>

            <!-- Versi -->
            <div class="mb-3">
                <label class="form-label" for="versi">Versi</label>
                <input type="text" id="versi" name="versi" class="form-control" value="{{ old('versi', $teknologi->versi) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
