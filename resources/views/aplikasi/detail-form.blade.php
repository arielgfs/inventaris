<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        :root {
            --primary: #045598ff;
            --primary-hover: #ff8533;
            --blue: #045598ff;
            --danger: #df0f00da;
            --success: #4CAF50;
            --light: #fff;
            --dark: #111;
            --gray: #f9f9f9;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--gray);
            padding: 40px;
            color: var(--dark);
        }

        h2, h3, h4 {
            margin-top: 0;
            font-weight: 600;
            text-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }

        .section {
            background-color: var(--light);
            border-radius: 14px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            padding: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #eaeaea;
        }
        th {
            background-color: #f3f3f3;
            text-align: left;
            font-weight: 500;
        }
        tbody tr:hover {
            background: #fafafa;
        }

        img {
            max-width: 120px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 8px 14px;
            margin: 2px 3px;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            width: 120px;
            text-align: center;
        }

        .btn-back {
            background-color: #045598;
            color: white;
            box-shadow: 0 0 8px rgba(4, 85, 152, 0.5);
            width: 120px;
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-back:hover {
            background-color: #0670c4;
            box-shadow: 0 0 12px rgba(4, 85, 152, 0.8);
            color: white;
        }

        .btn-edit {
            background-color: #045598;
            color: white;
            box-shadow: 0 0 8px rgba(4, 85, 152, 0.5);
            width: 120px;
            text-align: center;
        }
        .btn-edit:hover {
            background-color: #0670c4;
            box-shadow: 0 0 12px rgba(4, 85, 152, 0.8);
            color: white;
        }

        .btn-delete {
            background-color: red;
            color: white;
            box-shadow: 0 0 6px rgba(220,53,69,0.5);
            width: 120px;
            text-align: center;
        }
        .btn-delete:hover {
            background-color: #dc3545;
            box-shadow: 0 0 12px rgba(220,53,69,0.8);
            color: white;
        }

        /* Input di form Tambah Teknologi */
        input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }
        input[type="text"]:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 8px rgba(255,107,0,0.5);
        }
    </style>
</head>
<body>

    <h2>Detail Aplikasi</h2>
    <a href="{{ url()->previous() }}" class="btn btn-back">Kembali</a>

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
                    <a href="{{ route('klien.edit', $aplikasi->klien->id) }}" class="btn-edit">Edit</a>
                    <form method="POST" action="{{ route('klien.destroy', $aplikasi->klien->id) }}" style="display:inline;" onsubmit="return confirm('Hapus klien ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Hapus</button>
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
                        <button type="submit" class="btn-edit">+ Tambah Teknologi</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>
