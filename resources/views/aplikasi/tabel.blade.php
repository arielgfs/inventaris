<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Aplikasi</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <link rel="stylesheet" href="{{ asset('navbar.css') }}">
  <script src="{{ asset('logo-effects.js') }}" defer></script>

  <style>
    :root {
      --primary: #ff6b00;
      --primary-hover: #ff8533;
      --dark: #111;
      --light: #fff;
      --border: #e2e2e2;
      --bg-light: #f9f9f9;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: var(--bg-light);
      color: var(--dark);
    }

    /* === Container === */
    .container-custom {
      padding: 32px;
      max-width: 1200px;
      margin: 30px auto;
      background: var(--light);
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    h2 {
      font-weight: 600;
      color: var(--dark);
      margin-bottom: 24px;
      text-align: center;
      text-shadow: 0 2px 6px rgba(0,0,0,0.15);
    }

    /* === Search Bar === */
    .search-bar {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
    }
    .search-bar input {
      flex: 1;
      padding: 10px;
      border: 1px solid var(--border);
      border-radius: 8px;
      font-size: 14px;
      box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
    }
    .search-bar button {
      padding: 10px 18px;
      border: none;
      border-radius: 8px;
      background: var(--primary);
      color: #fff;
      font-weight: 500;
      transition: 0.3s;
      box-shadow: 0 0 10px rgba(255,107,0,0.5);
    }
    .search-bar button:hover {
      background: var(--primary-hover);
      box-shadow: 0 0 16px rgba(255,107,0,0.8);
    }

    /* === Table === */
    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 8px;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }
    th, td {
      padding: 20px 15px;
      border-bottom: 1px solid var(--border);
      font-size: 15px;
      vertical-align: middle;
      border-right: 1px solid #f0f0f0;
    }
    th:last-child, td:last-child {
      border-right: none;
    }
    th {
      background: #000; /* Solid black for header - formal appearance */
      font-weight: 600;
      color: #fff; /* Teks putih untuk kontras */
      text-transform: uppercase;
      font-size: 14px;
      letter-spacing: 0.5px;
      border-bottom: 2px solid #ddd;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Enhanced shadow for depth */
    }
    
    tr:hover {
      background: rgba(255, 107, 0, 0.1); /* Light orange on hover */
      transition: background 0.3s ease; /* Smooth transition */
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
      th, td {
        padding: 10px; /* Adjust padding for smaller screens */
        font-size: 12px; /* Smaller font size */
      }
    }
    tr:nth-child(even) {
      background: #f9f9f9; /* Warna latar belakang untuk baris genap */
    }
    tr:hover {
      background: #fff7f0;
      box-shadow: inset 0 0 12px rgba(255,107,0,0.2);
    }

    /* Kolom dengan jarak dan border yang jelas */
    .col-gambar { width: 100px; }
    .col-nama { width: 150px; }
    .col-deskripsi { width: 200px; }
    .col-type { width: 100px; }
    .col-link { width: 100px; }
    .col-teknologi { width: 180px; }
    .col-klien { width: 120px; }
    .col-logo-klien { width: 100px; }
    .col-aksi { width: 150px; }

    /* Warna latar belakang khusus untuk kolom Teknologi */
    th.col-teknologi, td.col-teknologi {
      background-color: #e8f5e8;
      border-left: 3px solid #4caf50;
      border-right: 3px solid #4caf50;
    }

    /* Warna latar belakang konsisten untuk kolom Klien dan Logo Klien */
    th.col-klien, td.col-klien,
    th.col-logo-klien, td.col-logo-klien {
      background-color: #e3f2fd;
      border-left: 3px solid #2196f3;
      border-right: 3px solid #2196f3;
    }

    /* Efek hover untuk kolom khusus */
    tr:hover td.col-teknologi {
      background-color: #d4edda;
    }
    tr:hover td.col-klien,
    tr:hover td.col-logo-klien {
      background-color: #bbdefb;
    }

    /* === Image === */
    img {
      width: 70px;
      height: 70px;
      border-radius: 6px;
      object-fit: cover;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    /* === Buttons === */
    .btn-custom {
      padding: 8px 14px;
      border-radius: 8px;
      font-size: 13px;
      font-weight: 500;
      text-decoration: none;
      transition: 0.3s;
      display: inline-block;
    }
    .btn-primary-custom {
      background: var(--primary);
      color: #fff;
      box-shadow: 0 0 12px rgba(255,107,0,0.6);
    }
    .btn-primary-custom:hover {
      background: var(--primary-hover);
      box-shadow: 0 0 18px rgba(255,107,0,0.9);
    }
    .btn-detail {
      background: #222;
      color: #fff;
      box-shadow: 0 0 8px rgba(0,0,0,0.4);
    }
    .btn-detail:hover {
      background: #333;
      box-shadow: 0 0 12px rgba(0,0,0,0.6);
    }

    /* Responsive */
    @media (max-width: 768px) {
      .search-bar { flex-direction: column; }
      table, th, td { font-size: 12px; }
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="britech-navbar">
  <div class="britech-nav-container">
    <!-- Brand -->
    <a href="{{ route('aplikasi.tabel') }}" class="britech-nav-brand">Inventaris Digital</a>
    
    <!-- Navigation Menu -->
    <ul class="britech-nav-menu">
      <li class="britech-nav-item">
        <a class="britech-nav-link active" href="{{ route('aplikasi.tabel') }}">Seluruh Tabel</a>
      </li>
      <li class="britech-nav-item">
        <a class="britech-nav-link" href="{{ route('aplikasi.index') }}">Aplikasi</a>
      </li>
      <li class="britech-nav-item">
        <a class="britech-nav-link" href="{{ route('klien.index') }}">Klien</a>
      </li>
      <li class="britech-nav-item">
        <a class="britech-nav-link" href="{{ route('teknologi.index') }}">Teknologi</a>
      </li>
    </ul>
    
    <!-- Logo Britech -->
    <div class="britech-nav-logo">
      <img src="/images/britech-logo.png" alt="Britech Logo" class="britech-logo-img">
    </div>
  </div>
</nav>

<div class="container-custom">
  <h2>Data Aplikasi</h2>

  <!-- Search Bar -->
  <form method="GET" action="{{ route('aplikasi.tabel') }}" class="search-bar">
    <input type="text" name="search" placeholder="Cari nama aplikasi..." value="{{ request('search') }}">
    <button type="submit">Cari</button>
  </form>

  <!-- Tambah Data -->
  <a href="{{ route('entri.data') }}" class="btn-custom btn-primary-custom mb-3">+ Tambah Data</a>

  <!-- Tabel -->
  <table>
    <thead>
      <tr>
        <th class="col-gambar">Gambar Aplikasi</th>
        <th class="col-nama">Nama</th>
        <th class="col-deskripsi">Deskripsi</th>
        <th class="col-type">Type</th>
        <th class="col-link">Link</th>
        <th class="col-teknologi">Teknologi</th>
        <th class="col-klien">Klien</th>
        <th class="col-logo-klien">Logo Klien</th>
        <th class="col-aksi">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($aplikasi as $item)
      <tr>
        <td class="col-gambar">
          @if($item->gambar)
            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Aplikasi">
          @else <em>-</em>
          @endif
        </td>
        <td class="col-nama">{{ $item->nama }}</td>
        <td class="col-deskripsi">{{ $item->deskripsi }}</td>
        <td class="col-type">{{ $item->type }}</td>
        <td class="col-link">
          @if($item->link)
            <a href="{{ $item->link }}" target="_blank" style="color: var(--primary); text-shadow:0 0 4px rgba(255,107,0,0.6);">Kunjungi</a>
          @else <em>-</em>
          @endif
        </td>
        <td class="col-teknologi">
          @if($item->teknologi->count())
            <ul style="margin: 0; padding-left: 16px;">
              @foreach($item->teknologi as $tech)
                <li style="margin-bottom: 4px;">{{ $tech->nama }} (v{{ $tech->versi }})</li>
              @endforeach
            </ul>
          @else <em>-</em>
          @endif
        </td>
        <td class="col-klien">{{ $item->klien->nama ?? '-' }}</td>
        <td class="col-logo-klien">
          @if($item->klien && $item->klien->logo)
            <img src="{{ asset('storage/' . $item->klien->logo) }}" alt="{{ $item->klien->nama }}">
          @else <em>-</em>
          @endif
        </td>
        <td class="col-aksi">
          <a href="{{ route('aplikasi.edit', $item->id) }}" class="btn-edit">Edit</a>
          <form action="{{ route('aplikasi.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete">Hapus</button>
          </form>
          <a href="{{ route('aplikasi.detail-form', $item->id) }}" class="btn-custom btn-detail">Detail</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>      
</html>
