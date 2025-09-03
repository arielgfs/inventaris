<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Teknologi - Tabel Profesional</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <link rel="stylesheet" href="{{ asset('navbar.css') }}">
  <script src="{{ asset('logo-effects.js') }}" defer></script>

  <style>
    :root {
      --primary: #ff6b00;
      --primary-hover: #ff8533;
      --dark: #1a1a1a;
      --light: #ffffff;
      --border: #e0e0e0;
      --bg-light: #f8f9fa;
      --success: #28a745;
      --info: #17a2b8;
      --warning: #ffc107;
      --danger: #dc3545;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      color: var(--dark);
      min-height: 100vh;
    }

    /* === Container === */
    .container-custom {
      padding: 2rem;
      max-width: 1400px;
      margin: 2rem auto;
      background: var(--light);
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.15);
      backdrop-filter: blur(10px);
    }

    h2 {
      font-weight: 700;
      color: var(--dark);
      margin-bottom: 2rem;
      text-align: center;
      text-shadow: 0 2px 4px rgba(0,0,0,0.1);
      position: relative;
      padding-bottom: 0.5rem;
    }

    h2::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 4px;
      background: linear-gradient(90deg, var(--primary), var(--primary-hover));
      border-radius: 2px;
    }

    /* === Search Bar === */
    .search-bar {
      display: flex;
      gap: 12px;
      margin-bottom: 1.5rem;
      align-items: center;
    }
    
    .search-bar input {
      flex: 1;
      padding: 12px 20px;
      border: 2px solid var(--border);
      border-radius: 12px;
      font-size: 14px;
      background: var(--bg-light);
      transition: all 0.3s ease;
      box-shadow: inset 0 2px 6px rgba(0,0,0,0.08);
    }
    
    .search-bar input:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: inset 0 2px 8px rgba(255,107,0,0.2), 0 0 0 3px rgba(255,107,0,0.1);
    }
    
    .search-bar button {
      padding: 12px 24px;
      border: none;
      border-radius: 12px;
      background: linear-gradient(135deg, var(--primary), var(--primary-hover));
      color: #fff;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px极15px rgba(255,107,0,0.4);
      cursor: pointer;
    }
    
    .search-bar button:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(255,107,0,0.6);
    }

    /* === Add Button === */
    .btn-add {
      background: linear-gradient(135deg, var(--success), #34ce57);
      color: white;
      padding: 12px 24px;
      border-radius: 12px;
      text-decoration: none;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 1.5rem;
      box-shadow: 0 4px 15px rgba(40,167,69,0.4);
      transition: all 极0.3s ease;
    }
    
    .btn-add:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(40,167,69,0.6);
      color: white;
    }

    /* === Table Container === */
    .table-container {
      background: var(--light);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }

    /* === Table Header Styling === */
    thead {
      background: linear-gradient(135deg, var(--primary), var(--primary-hover));
      color: white;
    }
    
    th {
      padding: 1.25rem 1rem;
      font-weight: 600;
     极font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      border: none;
      position: relative;
      text-shadow: 0 1px 2px rgba(0,0,0,0.2);
    }
    
    th:not(:last-child) {
      border-right: 1px solid rgba(255,255,255,0.15);
    }
    
    /* Header hover effect */
    th:hover {
      background: linear-gradient(135deg, var(--primary-hover), #ff9c66);
    }
    
    /* === Table Body Styling === */
    td {
      padding: 1rem;
      vertical-align: middle;
      border: none;
      font-size: 14px;
      color: #444;
      transition: all 0.2s ease;
      line-height: 1.5;
    }
    
    td:not(:last-child) {
      border-right: 1px solid rgba(0,0,0,0.08);
    }
    
    /* Improved text alignment */
    .col-nama { text-align: left; }
    .col-versi { text-align: center; }
    .col-aplikasi { text-align: left; }
    .col-timestamp { text-align: center; }
    .col-aksi { text-align: center; }
    
    /* === Row Styling === */
    tr {
      transition: all 0.3s ease;
      border-bottom: 1px solid rgba(0,0,0,0.06);
    }
    
    tr:nth-child(even) {
      background: rgba(248, 249, 250, 0.4);
    }
    
    tr:hover {
      background: linear-gradient(135deg, rgba(255,107,0,0.08), rgba(255,133,51,0.12));
      transform: translateX(2px);
      box-shadow: inset 3px 0 0 var(--primary);
    }

    /* Column widths */
    .col-no { width: 60px; }
    .col-nama { width: 180px; font-weight: 500; }
    .col-versi { width: 100px; }
    .col-aplikasi { width: 150px; }
    .col-timestamp { width: 150px; }
    .col-aksi { width: 160px; }

    /* Special column styling - Teknologi */
    th.col-nama, td.col-nama,
    th.col-versi, td.col-versi {
      background: linear-gradient(135deg, #e8f5e8, #d4edda);
      border-left: 4px solid var(--success);
      border-right: 4px solid var(--success);
      color: #333;
    }
    
    /* Hover effects for special columns */
    tr:hover td.col-nama,
    tr:hover td.col-versi {
      background: linear-gradient(135deg, #d4edda, #c3e6cb);
    }

    /* === Action buttons === */
    .action-buttons {
      display: flex;
      gap: 10px;
      align-items: center;
      justify-content: center;
    }
    
    .btn-edit, .btn-delete {
      padding: 8px 16px;
      border-radius: 6px;
      font-size: 12px;
      font-weight: 600;
      text-decoration: none;
      border: none;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 80px;
      text-align: center;
      transition: all 0.2s ease;
    }
    
    .btn-edit {
      background: linear-gradient(135deg, var(--warning), #ffd54f);
      color: #000;
      box-shadow: 0 1px 4px rgba(255,193,7,0.3);
    }
    
    .btn-edit:hover {
      background: linear-gradient(135deg, #ffc107, #ffca28);
      box-shadow: 0 2px 6px rgba(255,193,7,0.4);
    }
    
    .btn-delete {
      background: linear-gradient(135deg, var(--danger), #e74c3c);
      color: white;
      box-shadow: 0 1px 4px rgba(220,53,69,极0.3);
    }
    
    .btn-delete:hover {
      background: linear-gradient(135deg, #dc3545, #c82333);
      box-shadow: 0 2px 6px rgba(220,53,69,0.4);
    }

    /* === Empty state === */
    td em {
      color: #999;
      font-style: italic;
    }
    
    /* Loading state */
    .loading-row {
      animation: pulse 1.5s infinite ease-in-out;
    }
    
    @keyframes pulse {
      0%, 100% { opacity: 0.6; }
      50% { opacity: 0.8; }
    }
    
    /* No data message */
    .no-data {
      text-align: center;
      padding: 3rem;
      color: #666;
      font-style: italic;
    }
    
    .no-data i {
      font-size: 3rem;
      margin-bottom: 1rem;
      display: block;
      color: #ccc;
    }

    /* === Responsive design === */
    @media (max-width: 1200px) {
      .container-custom {
        margin: 1rem;
        padding: 1.5rem;
      }
      
      table {
        font-size: 13px;
      }
      
      th, td {
        padding: 1rem 0.75rem;
      }
      
      /* Adjust column widths for medium screens */
      .col-no { width: 50px; }
      .col-nama { width: 150px; }
      .col-versi { width: 80px; }
      .col-aplikasi { width: 120px; }
      .col-timestamp { width: 120px; }
      .col-aksi { width: 140px; }
    }
    
    @media (max-width: 992px) {
      .container-custom {
        padding: 1rem;
      }
      
      h2 {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
      }
      
      .search-bar {
        flex-direction: column;
        gap: 8px;
      }
      
      .search-bar input {
        width: 100%;
      }
      
      .btn-add {
        width: 100%;
        justify-content: center;
      }
      
      /* Hide less important columns on tablets */
      .col-timestamp {
        display: none;
      }
      
      .col-no { width: 40px; }
      .col-nama { width: 120px; }
      .col-versi { width: 70px; }
      .col-aplikasi { width: 100px; }
      .col-aksi { width: 120px; }
    }
    
    @media (max-width: 768px) {
      .table-container {
        overflow-x: auto;
        border-radius: 12px;
      }
      
      table {
        min-width: 600px;
        font-size: 12px;
      }
      
      th, td {
        padding: 0.75rem 0.5rem;
      }
      
      /* Mobile-specific adjustments */
      .col-no { width: 30px; }
      .col-nama { width: 100px; }
      .col-versi { width: 60px; }
      .col-aplikasi { width: 80px; }
      .col-aksi { width: 100px; }
      
      .action-buttons {
        flex-direction: column;
        gap: 6px;
      }
      
      .btn-edit, .btn-delete {
        width: 100%;
        padding: 6px 12px;
        font-size: 11px;
      }
      
      /* Hide more columns on mobile */
      .col-aplikasi {
        display: none;
      }
    }
    
    @media (max-width: 480px) {
      .container-custom {
        margin: 0.5rem;
        padding: 1rem;
      }
      
      h2 {
        font-size: 1.25rem;
        margin-bottom: 1rem;
      }
      
      table {
        min-width: 500px;
      }
      
      /* Show essential columns only */
      .col-no,
      .col-nama,
      .col-versi,
      .col-aksi {
        display: table-cell;
      }
    }

    /* === Animation === */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    table tbody tr {
      animation: fadeIn 0.5s ease forwards;
    }
    
    table tbody tr:nth-child(1) { animation-delay: 0.1s; }
    table tbody tr:nth-child(2) { animation-delay: 0.2s; }
    table tbody tr:nth-child(3) { animation-delay: 0.3s; }
    table tbody tr:nth-child(4) { animation-delay: 0.4s; }
    table tbody tr:nth-child(5) { animation-delay: 0.5s; }
  </style>
</head>
<body>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Smooth scrolling for table navigation
  const tableContainer = document.querySelector('.table-container');
  if (tableContainer) {
    tableContainer.addEventListener('wheel', function(e) {
      if (e.deltaY !== 0) {
        e.preventDefault();
        this.scrollLeft += e.deltaY;
      }
    });
  }

  // Enhanced search functionality
  const searchInput = document.querySelector('极input[name="search"]');
  const searchForm = document.querySelector('.search-bar');
  
  if (searchInput && searchForm) {
    let searchTimeout;
    
    searchInput.addEventListener('input', function() {
      clearTimeout(searchTimeout);
      searchTimeout = setTimeout(() => {
        searchForm.submit();
      }, 500);
    });
  }

  // Confirmation for delete actions
  const deleteForms = document.querySelectorAll('form[action*="destroy"]');
  deleteForms.forEach(form => {
    form.addEventListener('submit', function(e) {
      if (!confirm('Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.')) {
        e.preventDefault();
      }
    });
  });

  // Loading state simulation (for demo purposes)
  function simulateLoading() {
    const rows = document.querySelectorAll('tbody tr');
    rows.forEach(row => {
      row.classList.add('loading-row');
    });
    
    setTimeout(() => {
      rows.forEach(row => {
        row.classList.remove('loading-row');
      });
    }, 2000);
  }

  // Keyboard navigation
  document.addEventListener('keydown', function(e) {
    if (e.key === '/' && document.activeElement !== searchInput) {
      e.preventDefault();
      searchInput?.focus();
    }
  });

  // Add subtle hover effects to buttons
  const buttons = document.querySelectorAll('.btn-edit, .btn-delete, .btn-add, .search-bar button');
  buttons.forEach(btn => {
    btn.addEventListener('mouseenter', function() {
      this.style.transform = 'translateY(-2px) scale(1.02)';
    });
    
    btn.addEventListener('mouseleave', function() {
      this.style.transform = 'translateY(0) scale(1)';
    });
  });

  console.log('Tabel teknologi enhanced dengan fitur interaktif!');
});
</script>

<!-- Navbar -->
<nav class="britech-navbar">
  <div class="britech-nav-container">
    <!-- Brand -->
    <a href="{{ route('aplikasi.tabel') }}" class="britech-nav-brand">Inventaris Digital</a>
    
    <!-- Navigation Menu -->
    <ul class="britech-nav-menu">
      <li class="britech-nav-item">
        <a class="britech-nav-link" href="{{ route('aplikasi.tabel') }}">Seluruh Tabel</a>
      </li>
      <li class极="britech-nav-item">
        <a class="britech-nav-link" href="{{ route('aplikasi.index') }}">Aplikasi</a>
      </li>
      <li class="britech-nav-item">
        <a class="britech-nav-link" href="{{ route('klien.index') }}">Klien</a>
      </li>
      <li class="britech-nav-item">
        <a class="britech-nav-link active" href="{{ route('teknologi.index') }}">Teknologi</a>
      </li>
    </ul>
    
    <!-- Logo Britech -->
    <div class="britech-nav-logo">
      <img src="/images/britech-logo.png" alt="Britech Logo" class="britech-logo-img">
    </div>
  </div>
</nav>

<div class="container-custom">
  <h2>Data Teknologi</h2>

  <!-- Search Bar -->
  <form method="GET" action="{{ route('teknologi.index') }}" class="search-bar">
    <input type="text" name="search" placeholder="🔍 Cari nama teknologi..." value="{{ request('search') }}">
    <button type="submit">Cari</button>
  </form>

  <!-- Tambah Data -->
  <a href="{{ route('entri.data') }}" class="btn-add">
    <span>+</span>
    Tambah Teknologi
  </a>

  <!-- Tabel Container -->
  <div class="table-container">
    <table>
      <thead>
        <tr>
          <th class="col-no">No</th>
          <th class="col-nama">Nama Teknologi</th>
          <th class="col-versi">Versi</th>
          <th class="col-aplikasi">Aplikasi</th>
          <th class="col-timestamp">Dibuat Pada</th>
          <th class="col-timestamp">Diedit Terakhir</th>
          <th class="col-aksi">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($teknologis as $index => $teknologi)
        <tr>
          <td class="col-no">{{ $index + 1 }}</td>
          <td class="col-nama">{{ $teknologi->nama }}</td>
          <td class="col-versi">{{ $teknologi->versi }}</td>
          <td class="col-aplikasi">{{ $teknologi->aplikasi->nama ?? '-' }}</td>
          <td class="col-timestamp">{{ $teknologi->created_at->format('d M Y H:i') }}</td>
          <td class="col-timestamp">{{ $teknologi->updated_at->format('d M Y H:i') }}</td>
          <td class="col-aksi">
            <div class="action-buttons">
              <a href="{{ route('teknologi.edit', $teknologi->id) }}" class="btn-edit">Edit</a>
              <form action="{{ route('teknologi.destroy', $teknologi->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">Hapus</button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="7" class="text-center no-data">
            <i>💻</i>
            Tidak ada data teknologi
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

</body>      
</html>
