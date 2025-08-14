<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Aplikasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            background-color: #f8f8f8;
        }
        /* === Navigasi === */
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
        /* === Tabel === */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
            vertical-align: top;
        }
        th {
            background: #f4f4f4;
        }
        img {
            width: 80px;
            border-radius: 6px;
            object-fit: cover;
        }
        .aksi-btn {
            display: flex;
            gap: 8px;
        }
        .btn {
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
            text-decoration: none;
        }
        .edit-btn { background: #4CAF50; }
        .hapus-btn { background: #f44336; }
        .tech-list {
            list-style: none;
            padding-left: 0;
        }
        .tech-list li {
            margin-bottom: 4px;
        }
        .search-bar {
            margin-bottom: 16px;
        }
    </style>
</head>
<body>

<!-- Navigasi -->
<div class="navbar">
    <a href="{{ route('aplikasi.tabel') }}">Seluruh tabel</a>
    <a href="{{ route('aplikasi.index') }}">Aplikasi Index</a>
    <a href="{{ route('klien.index') }}">Klien Index</a>
    <a href="{{ route('teknologi.index') }}">Teknologi Index</a>
</div>

<h2>Data Aplikasi</h2>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<form method="GET" action="{{ route('aplikasi.tabel') }}" class="search-bar">
    <input type="text" name="search" placeholder="Cari nama aplikasi..." value="{{ request('search') }}">
    <button type="submit">Cari</button>
</form>

<a href="{{ route('entri.data') }}" class="btn btn-primary mb-3">+ Tambah Data</a>

<table>
    <thead>
        <tr>
            <th>Gambar Aplikasi</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Type</th>
            <th>Link</th>
            <th style="background: #eaffb4dc;">Teknologi (Versi)</th>
            <th style="background: #ffe4b4dc;">Klien</th>
            <th style="background: #ffe4b4dc;">Gambar Klien</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($aplikasi as $item)
        <tr>
            <td>
                @if($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Aplikasi">
                @else
                    <em>Tidak ada</em>
                @endif
            </td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td>{{ $item->type }}</td>
            <td>
                @if($item->link)
                    <a href="{{ $item->link }}" target="_blank">Kunjungi</a>
                @else
                    <em>Tidak tersedia</em>
                @endif
            </td>
            <td style="background: #f8ffe8dc;">
                @if($item->teknologi->count())
                    <ul class="tech-list">
                        @foreach($item->teknologi as $tech)
                            <li>{{ $tech->nama }} (v{{ $tech->versi }})</li>
                        @endforeach
                    </ul>
                @else
                    <em>-</em>
                @endif
            </td>
            <td style="background: #fff0d5dc;">{{ $item->klien->nama ?? '-' }}</td>
            <td style="background: #fff0d5dc;">
                @if($item->klien && $item->klien->logo)
                    <img src="{{ asset('storage/' . $item->klien->logo) }}" alt="{{ $item->klien->nama }}" width="100">
                @else
                    <em>-</em>
                @endif
            </td>
            <td class="aksi-btn">
                <a href="{{ route('aplikasi.detail-form', $item->id) }}" class="btn edit-btn">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
