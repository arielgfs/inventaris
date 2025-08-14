<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Galeri Aplikasi</title>
    <style>
        body {
            font-family: Arial;
            background: #f7f7f7;
            padding: 20px;
        }
        .aplikasi-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }
        .aplikasi-item {
            background: white;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 320px;
            transition: width 0.6s ease 0.3s, transform 1s ease, box-shadow 0.5s ease;
        }
        .aplikasi-item:hover {
            transform: translateY(-5px);
            width: 350px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
                        rgba(0, 0, 0, 0.3) 0px 30px 60px -30px,
                        rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }
        .aplikasi-item img {
            width: 100%;
            height: auto;
            cursor: pointer;
        }
        .aplikasi-content {
            padding: 16px;
            text-align: center;
        }
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            gap: 8px;
            padding: 0;
            margin-top: 20px;
        }
        .pagination li {
            padding: 6px 12px;
            border-radius: 6px;
            background: #eee;
        }
        .pagination li.active {
            background: #3498db;
            color: white;
            font-weight: bold;
        }
        .pagination li a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center">Inventaris Britech</h1>

    <div class="aplikasi-container">
        @foreach($aplikasis as $item)
            <div class="aplikasi-item">
                <a href="{{ route('aplikasi.show', $item->id) }}">
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}">
                    @else
                        <p style="padding: 20px;"><em>Tidak ada gambar</em></p>
                    @endif
                </a>
                <div class="aplikasi-content">
                    <div class="type"><strong>{{ $item->type }}</strong></div>
                    <div class="nama">{{ $item->nama }}</div>
                </div>
            </div>
        @endforeach
    </div>

    <div>
        {{ $aplikasis->links('pagination::bootstrap-5') }}
    </div>
</body>
</html>
