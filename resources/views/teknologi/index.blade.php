<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Teknologi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
<body class="bg-light">
    <div class="navbar">
        <a href="{{ route('aplikasi.tabel') }}">Seluruh tabel</a>
        <a href="{{ route('aplikasi.index') }}">Aplikasi Index</a>
        <a href="{{ route('klien.index') }}">Klien Index</a>
        <a href="{{ route('teknologi.index') }}">Teknologi Index</a>
    </div>

<div class="container py-5">
    <h2 class="mb-4">Tabel Data Teknologi</h2>
    <a href="{{ route('entri.data') }}" class="btn btn-success mb-3">Tambah Teknologi</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center align-middle">
            <tr>
                <th>No</th>
                <th>Nama Teknologi</th>
                <th>Versi</th>
                <th>Aplikasi</th>
                <th>Dibuat Pada</th>
                <th>Diedit Terakhir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($teknologis as $index => $teknologi)
                <tr class="text-center align-middle">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $teknologi->nama }}</td>
                    <td>{{ $teknologi->versi }}</td>
                    <td>{{ $teknologi->aplikasi->nama ?? '-' }}</td>
                    <td>{{ $teknologi->created_at->format('d M Y H:i') }}</td>
                    <td>{{ $teknologi->updated_at->format('d M Y H:i') }}</td>
                    <td>
                        <a href="{{ route('teknologi.edit', $teknologi->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('teknologi.destroy', $teknologi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus teknologi ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Tidak ada data teknologi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
