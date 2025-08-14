<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Klien</title>
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
    <h2 class="mb-4">Tabel Data Klien</h2>
    <a href="{{ route(name: 'entri.data') }}" class="btn btn-success mb-3">Tambah Klien</a>
<table class="table table-bordered table-striped">
    <thead class="table-dark text-center align-middle">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Logo</th>
            <th>Dibuat Pada</th>        <!-- ✅ Created At -->
            <th>Diedit Terakhir</th>    <!-- ✅ Updated At -->
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($kliens as $index => $klien)
            <tr class="text-center align-middle">
                <td>{{ $index + 1 }}</td>
                <td>{{ $klien->nama }}</td>
                <td>
                    @if ($klien->logo)
                        <img src="{{ asset('storage/' . $klien->logo) }}" alt="Logo" height="50">
                    @else
                        <span class="text-muted">No Logo</span>
                    @endif
                </td>
                <td>{{ $klien->created_at->format('d M Y H:i') }}</td> <!-- 🕓 Created At -->
                <td>{{ $klien->updated_at->format('d M Y H:i') }}</td> <!-- 🛠️ Updated At -->
                <td>
                    <a href="{{ route('klien.edit', $klien->id) }}" class="btn btn-primary btn-sm">Edit</a>

                    <form action="{{ route('klien.destroy', $klien->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus klien ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-muted">Tidak ada data klien.</td>
            </tr>
        @endforelse
    </tbody>
</table>

    
</div>

</body>
</html>
