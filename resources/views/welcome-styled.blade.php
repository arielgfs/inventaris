<!DOCTYPE html>
<html>
<head>
    <title>Form Entri Data</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">Inventaris Aplikasi</div>
            <nav>
                <ul>
                    <li><a href="#klien">Klien</a></li>
                    <li><a href="#aplikasi">Aplikasi</a></li>
                    <li><a href="#teknologi">Teknologi</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-2">
            {{-- Form KLIEN --}}
            <div class="card" id="klien">
                <div class="card-header">
                    <h2 class="card-title">Tambah Klien</h2>
                </div>
                <form action="{{ route('klien.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama Klien</label>
                        <input type="text" name="nama" placeholder="Masukkan nama klien" required>
                    </div>
                    <div class="form-group">
                        <label>Logo Klien</label>
                        <input type="file" name="logo" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Klien</button>
                </form>
            </div>

            {{-- Form APLIKASI --}}
            <div class="card" id="aplikasi">
                <div class="card-header">
                    <h2 class="card-title">Tambah Aplikasi</h2>
                </div>
                <form action="{{ route('aplikasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama Aplikasi</label>
                        <input type="text" name="nama" placeholder="Masukkan nama aplikasi" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" placeholder="Deskripsi aplikasi" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tipe Aplikasi</label>
                        <input type="text" name="type" placeholder="Contoh: Web, Mobile, Desktop" required>
                    </div>
                    <div class="form-group">
                        <label>Klien</label>
                        <select name="klien_id" required>
                            <option value="">-- Pilih Klien --</option>
                            @foreach($klien as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Link Aplikasi (Opsional)</label>
                        <input type="text" name="link" placeholder="https://example.com">
                    </div>
                    <div class="form-group">
                        <label>Gambar Aplikasi</label>
                        <input type="file" name="gambar" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Aplikasi</button>
                </form>
            </div>

            {{-- Form TEKNOLOGI --}}
            <div class="card" id="teknologi">
                <div class="card-header">
                    <h2 class="card-title">Tambah Teknologi</h2>
                </div>
                <form action="{{ route('teknologi.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Teknologi</label>
                        <input type="text" name="nama" placeholder="Contoh: Laravel, React, MySQL" required>
                    </div>
                    <div class="form-group">
                        <label>Versi</label>
                        <input type="text" name="versi" placeholder="Contoh: 8.0, 18.2.0" required>
                    </div>
                    <div class="form-group">
                        <label>Aplikasi</label>
                        <select name="aplikasi_id" required>
                            <option value="">-- Pilih Aplikasi --</option>
                            @foreach($aplikasi as $a)
                                <option value="{{ $a->id }}">{{ $a->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Teknologi</button>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Inventaris Aplikasi. All rights reserved.</p>
    </footer>
</body>
</html>
