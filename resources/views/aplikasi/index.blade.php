{{-- resources/views/aplikasi/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Aplikasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
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

<div class="container mt-5">
    
    <h1 class="mb-4">Daftar Aplikasi</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('entri.data') }}" class="btn btn-primary mb-3">+ Tambah Aplikasi</a>

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Aplikasi</th>
                <th>Deskripsi</th>
                <th>Type</th>
                <th>Klien</th>
                <th>Link</th>
                <th>Gambar</th>
                <th>Dibuat</th>
                <th>Diperbarui</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($aplikasi as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->deskripsi ?? '-' }}</td>
                    <td>{{ $item->type ?? '-' }}</td>
                    <td>{{ $item->klien ? $item->klien->nama : '-' }}</td>
                    <td>
                        @if($item->link)
                            <a href="{{ $item->link }}" target="_blank">{{ $item->link }}</a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar" width="80">
                        @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td>{{ $item->created_at ? $item->created_at->format('d-m-Y H:i') : '-' }}</td>
                    <td>{{ $item->updated_at ? $item->updated_at->format('d-m-Y H:i') : '-' }}</td>
                    <td>
                        <a href="{{ route('aplikasi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('aplikasi.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">Tidak ada data aplikasi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
