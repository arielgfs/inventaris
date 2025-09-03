<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Entri Data - Britech</title>
    <link rel="stylesheet" href="{{ asset('navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('entri-data.css') }}">
</head>
<body>
    <!-- Navigation -->
    <nav class="britech-navbar">
        <div class="britech-nav-container">
            <div class="britech-nav-logo">
                <a href="#" class="britech-nav-brand">BRITECH</a>
            </div>
            <ul class="britech-nav-menu">
                <li class="britech-nav-item">
                    <a href="{{ route('aplikasi.tabel') }}" class="britech-nav-link">Seluruh Tabel</a>
                </li>
                <li class="britech-nav-item">
                    <a href="{{ route('aplikasi.index') }}" class="britech-nav-link">Aplikasi</a>
                </li>
                <li class="britech-nav-item">
                    <a href="{{ route('klien.index') }}" class="britech-nav-link">Klien</a>
                </li>
                <li class="britech-nav-item">
                    <a href="{{ route('teknologi.index') }}" class="britech-nav-link">Teknologi</a>
                </li>
                <li class="britech-nav-item">
                    <a href="{{ url('/input/entri-data') }}" class="britech-nav-link active">Entri Data</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="entri-data-container">
        <div class="entri-data-header">
            <h1 class="entri-data-title">Form Entri Data</h1>
            <p class="entri-data-subtitle">Tambahkan data klien, aplikasi, dan teknologi baru ke dalam sistem</p>
        </div>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form KLIEN -->
        <div class="form-section">
            <div class="form-header">
                <h2 class="form-title">Tambah Klien Baru</h2>
            </div>
            <form action="{{ route('klien.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="klien-nama">Nama Klien</label>
                    <input type="text" class="form-input" id="klien-nama" name="nama" placeholder="Masukkan nama klien" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="klien-logo">Logo Klien</label>
                    <input type="file" class="form-file" id="klien-logo" name="logo" required>
                </div>
                <button type="submit" class="btn-submit">Simpan Klien</button>
            </form>
        </div>

        <hr class="form-divider">

        <!-- Form APLIKASI -->
        <div class="form-section">
            <div class="form-header">
                <h2 class="form-title">Tambah Aplikasi Baru</h2>
            </div>
            <form action="{{ route('aplikasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="aplikasi-nama">Nama Aplikasi</label>
                    <input type="text" class="form-input" id="aplikasi-nama" name="nama" placeholder="Masukkan nama aplikasi" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="aplikasi-deskripsi">Deskripsi</label>
                    <textarea class="form-textarea" id="aplikasi-deskripsi" name="deskripsi" placeholder="Deskripsi aplikasi" required></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="aplikasi-type">Tipe</label>
                    <input type="text" class="form-input" id="aplikasi-type" name="type" placeholder="Tipe aplikasi" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="aplikasi-klien">Klien</label>
                    <select class="form-select" id="aplikasi-klien" name="klien_id" required>
                        <option value="">-- Pilih Klien --</option>
                        @foreach($klien as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="aplikasi-link">Link (Opsional)</label>
                    <input type="text" class="form-input" id="aplikasi-link" name="link" placeholder="Link aplikasi (jika ada)">
                </div>
                <div class="form-group">
                    <label class="form-label" for="aplikasi-gambar">Gambar Aplikasi</label>
                    <input type="file" class="form-file" id="aplikasi-gambar" name="gambar" required>
                </div>
                <button type="submit" class="btn-submit">Simpan Aplikasi</button>
            </form>
        </div>

        <hr class="form-divider">

        <!-- Form TEKNOLOGI -->
        <div class="form-section">
            <div class="form-header">
                <h2 class="form-title">Tambah Teknologi Baru</h2>
            </div>
            <form action="{{ route('teknologi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="teknologi-nama">Nama Teknologi</label>
                    <input type="text" class="form-input" id="teknologi-nama" name="nama" placeholder="Masukkan nama teknologi" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="teknologi-versi">Versi</label>
                    <input type="text" class="form-input" id="teknologi-versi" name="versi" placeholder="Versi teknologi" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="teknologi-aplikasi">Aplikasi</label>
                    <select class="form-select" id="teknologi-aplikasi" name="aplikasi_id" required>
                        <option value="">-- Pilih Aplikasi --</option>
                        @foreach($aplikasi as $a)
                            <option value="{{ $a->id }}">{{ $a->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn-submit">Simpan Teknologi</button>
            </form>
        </div>
    </div>
</body>
</html>
