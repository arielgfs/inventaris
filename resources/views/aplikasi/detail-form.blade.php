<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 40px;
        }
        .section {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            padding: 20px;
        }
        h2, h3 {
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        th {
            width: 20%;
            background-color: #f0f0f0;
            text-align: left;
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-right: 5px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-edit {
            background-color: #4CAF50;
        }
        .btn-delete {
            background-color: #f44336;
        }
        img {
            max-width: 120px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <h2>Detail Aplikasi </h2>
    <a href="{{ url()->previous() }}" class="btn btn-back" style="background-color:#2196F3; color:white; padding:6px 12px; border-radius:5px; text-decoration:none;">← Kembali</a>

    <!-- Bagian Klien -->
    <div class="section">
        <h3>Data Klien {{ $aplikasi->klien->nama ?? '-' }}</h3>
        <table>
            <tr>
                <th>Nama</th>
                <td>{{ $aplikasi->klien->nama ?? '-' }}</td>
            </tr>
            <tr>
                <th>Logo</th>
                <td>
                    @if($aplikasi->klien && $aplikasi->klien->logo)
                        <img src="{{ asset('storage/' . $aplikasi->klien->logo) }}" alt="Logo Klien">
                    @else
                        <em>-</em>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Aksi</th>
                <td>
                    <a href="{{ route('klien.edit', $aplikasi->klien->id) }}" class="btn btn-edit">Edit</a>
                    <form method="POST" action="{{ route('klien.destroy', $aplikasi->klien->id) }}" style="display:inline;" onsubmit="return confirm('Hapus klien ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">Hapus</button>
                    </form>
                </td>
            </tr>
        </table>
    </div>

    <!-- Bagian Aplikasi -->
    <div class="section">
        <h3>Data Aplikasi</h3>
        <table>
            <tr>
                <th>Nama</th>
                <td>{{ $aplikasi->nama }}</td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td>{{ $aplikasi->deskripsi }}</td>
            </tr>
            <tr>
                <th>Type</th>
                <td>{{ $aplikasi->type }}</td>
            </tr>
            <tr>
                <th>Link</th>
                <td><a href="{{ $aplikasi->link }}" target="_blank">{{ $aplikasi->link }}</a></td>
            </tr>
            <tr>
                <th>Gambar</th>
                <td>
                    @if($aplikasi->gambar)
                        <img src="{{ asset('storage/' . $aplikasi->gambar) }}" alt="Gambar Aplikasi">
                    @else
                        <em>-</em>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Aksi</th>
                <td>
                    <a href="{{ route('aplikasi.edit', $aplikasi->id) }}" class="btn btn-edit">Edit</a>
                    <form method="POST" action="{{ route('aplikasi.destroy', $aplikasi->id) }}" style="display:inline;" onsubmit="return confirm('Hapus aplikasi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">Hapus</button>
                    </form>
                </td>
            </tr>
        </table>
    </div>

    <!-- Bagian Teknologi -->
    <div class="section">
        <h3>Teknologi Digunakan</h3>
        <table>
            <thead>
                <tr>
                    <th>Nama Teknologi</th>
                    <th>Versi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($aplikasi->teknologi as $tech)
                    <tr>
                        <td>{{ $tech->nama }}</td>
                        <td>{{ $tech->versi }}</td>
                        <td>
                            <a href="{{ route('teknologi.edit', $tech->id) }}" class="btn btn-edit">Edit</a>
                            <form method="POST" action="{{ route('teknologi.destroy', $tech->id) }}" style="display:inline;" onsubmit="return confirm('Hapus teknologi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3"><em>Tidak ada teknologi terkait.</em></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <!-- Form Tambah Teknologi -->
        <h4>Tambah Teknologi Baru</h4>
        <form method="POST" action="{{ route('teknologi.store') }}">
            @csrf
            <input type="hidden" name="aplikasi_id" value="{{ $aplikasi->id }}">

            <table>
                <tr>
                    <th>Nama Teknologi</th>
                    <td><input type="text" name="nama" required></td>
                </tr>
                <tr>
                    <th>Versi</th>
                    <td><input type="text" name="versi" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-edit">+ Tambah Teknologi</button>
                    </td>
                </tr>
            </table>
        </form>

    </div>

</body>
</html>
