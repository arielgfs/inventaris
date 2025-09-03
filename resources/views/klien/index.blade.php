<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Klien</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('navbar.css') }}">
    <script src="{{ asset('logo-effects.js') }}" defer></script>
</head>
<style>
    :root {
        --primary: #ff6b00;
        --primary-hover: #ff8533;
        --dark: #111;
        --light: #fff;
        --bg-light: #f9f9f9;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: var(--bg-light);
        color: var(--dark);
    }

    /* === Container === */
    .container {
        background: var(--light);
        padding: 32px;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    h2 {
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 24px;
        text-shadow: 0 2px 6px rgba(0,0,0,0.15);
    }

    /* === Button Custom === */
    .btn-success {
        background: var(--primary);
        border: none;
        font-weight: 500;
        box-shadow: 0 0 12px rgba(255,107,0,0.5);
    }
    .btn-success:hover {
        background: var(--primary-hover);
        box-shadow: 0 0 18px rgba(255,107,0,0.9);
    }
    .btn-primary {
        box-shadow: 0 0 6px rgba(13,110,253,0.5);
    }
    .btn-danger {
        box-shadow: 0 0 6px rgba(220,53,69,0.5);
    }

    /* === Table === */
    .table {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 6px 15px rgba(0,0,0,0.08);
        margin: 0 auto;
        width: 100%;
        table-layout: fixed;
    }
    .table thead {
        background: var(--dark);
        color: #fff;
    }
    .table th {
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: 0.5px;
        padding: 14px;
    }
    .table td {
        vertical-align: middle;
        font-size: 14px;
        padding: 14px;
    }
    .table tbody tr:hover {
        background: #fff7f0;
        box-shadow: inset 0 0 12px rgba(255,107,0,0.2);
    }

    /* === Images === */
    img {
        border-radius: 6px;
        object-fit: cover;
        box-shadow: 0 2px 6px rgba(0,0,0,0.25);
    }
</style>
<body>
    <!-- Navbar -->
    <nav class="britech-navbar">
      <div class="britech-nav-container">
        <a href="{{ route('aplikasi.tabel') }}" class="britech-nav-brand">Inventaris Digital</a>
        
        <ul class="britech-nav-menu">
          <li class="britech-nav-item">
            <a class="britech-nav-link" href="{{ route('aplikasi.tabel') }}">Seluruh Tabel</a>
          </li>
          <li class="britech-nav-item">
            <a class="britech-nav-link" href="{{ route('aplikasi.index') }}">Aplikasi</a>
          </li>
          <li class="britech-nav-item">
            <a class="britech-nav-link active" href="{{ route('klien.index') }}">Klien</a>
          </li>
          <li class="britech-nav-item">
            <a class="britech-nav-link" href="{{ route('teknologi.index') }}">Teknologi</a>
          </li>
        </ul>
        
        <div class="britech-nav-logo">
          <img src="/images/britech-logo.png" alt="Britech Logo" class="britech-logo-img">
        </div>
      </div>
    </nav>

    <div class="container py-5">
        <h2>Tabel Data Klien</h2>
        <a href="{{ route('entri.data') }}" class="btn btn-success mb-3">+ Tambah Klien</a>

        <table class="table table-bordered table-striped text-center align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Logo</th>
                    <th>Dibuat Pada</th>
                    <th>Diedit Terakhir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kliens as $index => $klien)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $klien->nama }}</td>
                        <td>
                            @if ($klien->logo)
                                <img src="{{ asset('storage/' . $klien->logo) }}" alt="Logo" height="50">
                            @else
                                <span class="text-muted">No Logo</span>
                            @endif
                        </td>
                        <td>{{ $klien->created_at->format('d M Y H:i') }}</td>
                        <td>{{ $klien->updated_at->format('d M Y H:i') }}</td>
                        <td>
                            <a href="{{ route('klien.edit', $klien->id) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('klien.destroy', $klien->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus klien ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn-delete">Hapus</button>
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
