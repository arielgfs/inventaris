<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Aplikasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #f8f9fa, #e9ecef);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 40px;
    }

    .form-card {
      background: #fff;
      border-radius: 16px;
      padding: 35px;
      width: 100%;
      max-width: 700px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
      animation: fadeIn 0.6s ease-in-out;
    }

    h2 {
      font-weight: 700;
      font-size: 1.8rem;
      color: #222;
      margin-bottom: 25px;
      text-align: center;
      text-shadow: 2px 3px 6px rgba(0, 0, 0, 0.25);
    }

    .form-label {
      font-weight: 500;
      color: #444;
    }

    .form-control, .form-select {
      border-radius: 10px;
      border: 1px solid #ddd;
      padding: 10px 14px;
      transition: all 0.3s ease;
      box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
    }

    .form-control:focus, .form-select:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 10px rgba(13,110,253,0.35);
    }

    img {
      border-radius: 10px;
      margin-bottom: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .btn-primary {
      background: linear-gradient(135deg, #0d6efd, #0047ab);
      border: none;
      border-radius: 10px;
      padding: 10px 18px;
      font-weight: 500;
      transition: all 0.3s ease;
      box-shadow: 0 6px 14px rgba(13,110,253,0.35);
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px rgba(13,110,253,0.45);
    }

    .btn-back {
      border-radius: 10px;
      font-weight: 500;
      background: linear-gradient(135deg, #2196F3, #0d47a1);
      color: #fff;
      padding: 10px 18px;
      text-decoration: none;
      margin-left: 10px;
      box-shadow: 0 6px 14px rgba(33,150,243,0.35);
      transition: all 0.3s ease;
    }

    .btn-back:hover {
      transform: translateY(-2px);
      background: linear-gradient(135deg, #1976D2, #08306b);
      box-shadow: 0 10px 20px rgba(33,150,243,0.45);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="form-card">
    <h2>Edit Aplikasi</h2>
    <form action="{{ route('aplikasi.update', $aplikasi->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="nama" class="form-label">Nama Aplikasi</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $aplikasi->nama) }}" required>
      </div>

      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $aplikasi->deskripsi) }}</textarea>
      </div>

      <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <input type="text" name="type" class="form-control" value="{{ old('type', $aplikasi->type) }}">
      </div>

      <div class="mb-3">
        <label for="klien_id" class="form-label">Klien</label>
        <select name="klien_id" class="form-select" required>
          @foreach($klien as $k)
            <option value="{{ $k->id }}" {{ $aplikasi->klien_id == $k->id ? 'selected' : '' }}>
              {{ $k->nama }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="link" class="form-label">Link</label>
        <input type="text" name="link" class="form-control" value="{{ old('link', $aplikasi->link) }}">
      </div>

      <div class="mb-3">
        <label for="gambar" class="form-label">Gambar Aplikasi</label><br>
        @if($aplikasi->gambar)
          <img src="{{ asset('storage/' . $aplikasi->gambar) }}" alt="Gambar" width="120"><br>
        @endif
        <input type="file" name="gambar" class="form-control">
      </div>

      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      <a href="{{ url()->previous() }}" class="btn btn-back">← Kembali</a>
    </form>
  </div>
</body>
</html>
