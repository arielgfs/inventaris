<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Aplikasi</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f0f0f0; }
        .detail-container { max-width: 800px; margin: auto; background: white; border-radius: 12px; padding: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        img { max-width: 100%; border-radius: 8px; margin-bottom: 20px; }
        .tech-badge {
            display: inline-block;
            background: #eee;
            padding: 5px 10px;
            border-radius: 20px;
            margin: 5px;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="detail-container">
        <h2>{{ $aplikasi->nama }}</h2>
        @if($aplikasi->gambar)
            <img src="{{ asset('storage/' . $aplikasi->gambar) }}" alt="{{ $aplikasi->nama }}">
        @endif

        <h4>Type:</h4>
        <p>{{ $aplikasi->type }}</p>

        <h4>Deskripsi:</h4>
        <p>{{ $aplikasi->deskripsi ?? 'Belum ada deskripsi.' }}</p>

        <h4>Link:</h4>
        <p><a href="{{ $aplikasi->link ?? '#' }}" target="_blank">{{ $aplikasi->link ?? 'Tidak tersedia' }}</a></p>

        <h4>Klien:</h4>
        @if($aplikasi->klien && $aplikasi->klien->logo)
            <img src="{{ asset('storage/' . $aplikasi->klien->logo) }}" alt="{{ $aplikasi->klien->nama }}" width="100">
        @endif
        <p>{{ $aplikasi->klien->nama ?? 'Tanpa klien' }}</p>

        <h4>Teknologi Aplikasi:</h4>
        <div class="teknologi-aplikasi">
            @forelse($aplikasi->teknologi as $tech)
                <span class="tech-badge">{{ $tech->nama }} V{{ $tech->versi }}</span>
            @empty
                <p>Tidak ada teknologi.</p>
            @endforelse
        </div>

        <br>
        <a href="{{ route('aplikasi.gambar') }}">← Kembali ke galeri</a>
    </div>
</body>
</html>
