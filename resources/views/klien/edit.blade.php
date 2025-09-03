<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Klien</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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

        h1 {
            font-weight: 700;
            font-size: 1.9rem;
            color: #222;
            margin-bottom: 30px;
            text-align: center;
            text-shadow: 2px 3px 6px rgba(0, 0, 0, 0.25);
        }

        .form-label {
            font-weight: 500;
            color: #444;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 10px 14px;
            transition: all 0.3s ease;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 10px rgba(13,110,253,0.35);
        }

        .img-thumbnail {
            border-radius: 12px;
            margin-top: 10px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
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

        .btn-secondary {
            border-radius: 10px;
            font-weight: 500;
            background: linear-gradient(135deg, #6c757d, #495057);
            color: #fff;
            padding: 10px 18px;
            text-decoration: none;
            margin-left: 10px;
            box-shadow: 0 6px 14px rgba(108,117,125,0.35);
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #5a6268, #343a40);
            box-shadow: 0 10px 20px rgba(108,117,125,0.45);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
<div class="form-card">
    <h1>Edit Klien</h1>

    <form method="POST" action="{{ route('klien.update', $klien->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Klien</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $klien->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Logo (jpg/jpeg/png)</label>
            <input type="file" name="logo" class="form-control">
        </div>

        @if ($klien->logo)
            <div class="mb-3">
                <label>Logo Saat Ini:</label><br>
                <img src="{{ asset('storage/' . $klien->logo) }}" alt="Logo Klien" width="150" class="img-thumbnail">
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
