<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Inventaris Digital</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- ===== HEADER ===== -->
    <header>
        <h1>Beesoft Research And Technology</h1>
        <p>Sistem Inventaris Digital</p>
    </header>

    <!-- ===== MAIN CONTENT ===== -->
    <main class="container">

        <!-- Notifikasi -->
        <div class="alert alert-success">
            Data berhasil disimpan!
        </div>

        <!-- Form Klien -->
        <section class="card form-section">
            <h2 class="text-orange">Tambah Klien Baru</h2>
            <form>
                <div class="form-group">
                    <label for="nama">Nama Klien</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama klien" required>
                </div>

                <div class="form-group">
                    <label for="logo">Logo Perusahaan</label>
                    <input type="file" id="logo" name="logo" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Klien</button>
            </form>
        </section>

        <!-- Form Aplikasi -->
        <section class="card form-section">
            <h2 class="text-orange">Tambah Aplikasi</h2>
            <form>
                <div class="form-group">
                    <label for="nama_app">Nama Aplikasi</label>
                    <input type="text" id="nama_app" name="nama" placeholder="Masukkan nama aplikasi" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" placeholder="Jelaskan deskripsi aplikasi" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label for="klien">Pilih Klien</label>
                    <select id="klien" name="klien_id" required>
                        <option value="">-- Pilih Klien --</option>
                        <option value="1">PT Maju Sejahtera</option>
                        <option value="2">CV Digital Nusantara</option>
                        <option value="3">Toko Sehat Alami</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar Aplikasi</label>
                    <input type="file" id="gambar" name="gambar" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Aplikasi</button>
            </form>
        </section>

        <!-- Form Teknologi -->
        <section class="card form-section">
            <h2 class="text-orange">Tambah Teknologi</h2>
            <form>
                <div class="form-group">
                    <label for="nama_tek">Nama Teknologi</label>
                    <input type="text" id="nama_tek" name="nama" placeholder="Contoh: Laravel, React, MySQL" required>
                </div>

                <div class="form-group">
                    <label for="versi">Versi</label>
                    <input type="text" id="versi" name="versi" placeholder="Contoh: 8.0, 18.2, 8.0.33">
                </div>

                <div class="form-group">
                    <label for="aplikasi">Pilih Aplikasi</label>
                    <select id="aplikasi" name="aplikasi_id" required>
                        <option value="">-- Pilih Aplikasi --</option>
                        <option value="1">Sistem Inventory</option>
                        <option value="2">Website E-commerce</option>
                        <option value="3">Aplikasi Mobile</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Teknologi</button>
            </form>
        </section>

    </main>

    <!-- ===== FOOTER ===== -->
    <footer>
        <p>&copy; 2025 Sistem Inventaris Digital - By Siswa Magang</p>
    </footer>

    <!-- Background Efek -->
    <div class="fire-background"></div>
</body>
</html>
