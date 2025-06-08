<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-blue: #007bff; /* Warna biru utama */
            --dark-blue: #0056b3;    /* Hover primary */
            --light-blue: #e0f2fe;   /* Background card header */
            --bg-color: #f8f9fa;     /* Latar belakang umum yang cerah */
            --card-bg: #ffffff;      /* Latar belakang kartu */
            --text-dark: #343a40;    /* Teks gelap */
            --text-muted: #6c757d;   /* Teks abu-abu */
            --border-light: #dee2e6; /* Border tabel/card */
            --shadow-subtle: rgba(0, 0, 0, 0.08); /* Bayangan halus */

            /* Status Colors */
            --status-success: #28a745; /* Hijau untuk sukses/selesai */
            --status-danger: #dc3545; /* Merah untuk ditolak/bahaya */
            --status-info: #17a2b8;   /* Biru Cyan (Ditugaskan) */

            --font-poppins: 'Poppins', sans-serif;
            --font-montserrat: 'Montserrat', sans-serif;
        }

        body {
            font-family: var(--font-poppins);
            background-color: var(--bg-color);
            color: var(--text-dark);
            min-height: 100vh;
            padding: 2rem; /* Padding body agar konten tidak terlalu mepet */
            background-image: linear-gradient(rgba(248, 249, 250, 0.95), rgba(248, 249, 250, 0.95)), url('https://images.unsplash.com/photo-1549925206-8c863a3d537f?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); /* Gambar kantor sebagai latar belakang manajer */
            background-size: cover;
            background-position: center;
        }

        .container {
            max-width: 1200px; /* Lebar maksimal konsisten */
        }

        /* Header Section (Judul Halaman) */
        .header-section {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 20px 30px; 
            margin-bottom: 25px;
            box-shadow: 0 5px 15px var(--shadow-subtle);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px; 
        }

        .header-section h1 {
            font-family: var(--font-montserrat);
            font-weight: 700;
            color: var(--primary-blue); /* Warna biru utama untuk judul data pegawai */
            margin: 0;
            font-size: 2rem;
            letter-spacing: -0.5px;
        }

        /* Navigasi Tombol */
        .nav-buttons .btn {
            font-weight: 500;
            padding: 10px 18px; 
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            display: inline-flex;
            align-items: center;
            gap: 8px; 
            font-size: 0.95rem; 
        }

        /* Styling untuk tombol yang sedang aktif */
        .nav-buttons .btn-primary {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .nav-buttons .btn-primary:hover {
            background-color: var(--dark-blue);
            border-color: var(--dark-blue);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        /* Styling untuk tombol yang tidak aktif */
        .nav-buttons .btn-outline-primary {
            color: var(--primary-blue);
            border-color: var(--primary-blue);
        }
        
        .nav-buttons .btn-outline-primary:hover {
            background-color: var(--primary-blue);
            color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }

        /* Card untuk Tabel */
        .card {
            border-radius: 12px;
            box-shadow: 0 5px 20px var(--shadow-subtle);
            overflow: hidden; 
            border: none;
        }
        .card-header {
            background-color: var(--light-blue); /* Latar belakang header biru terang */
            color: var(--dark-blue); /* Warna teks biru gelap */
            font-family: var(--font-montserrat);
            font-weight: 600;
            padding: 15px 30px; 
            border-bottom: 1px solid var(--border-light);
            font-size: 1.1rem; 
        }
        .card-body {
            padding: 0; /* Hilangkan padding default Bootstrap */
        }

        /* Tabel Styling */
        .table-responsive {
            padding: 20px 30px; /* Padding di sekitar tabel */
            padding-bottom: 0;
        }

        .table {
            margin-bottom: 0;
            border-collapse: separate; 
            border-spacing: 0; 
            border-radius: 10px; 
            overflow: hidden; 
        }

        .table thead th {
            background-color: #f0f8ff; /* Warna header tabel biru sangat terang */
            color: var(--text-dark);
            font-weight: 600;
            padding: 12px 18px; 
            font-size: 0.88rem; 
            border-bottom: 2px solid var(--border-light);
        }

        .table tbody td {
            padding: 12px 18px; 
            vertical-align: middle;
            font-size: 0.85rem; 
            border-bottom: 1px solid #f0f0f0;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table-hover tbody tr:hover {
            background-color: #f5fafd; /* Hover yang sedikit kebiruan */
        }

        /* Styling untuk pesan kosong */
        .no-data-message {
            padding: 50px 20px; 
            font-size: 1rem; 
            color: var(--text-muted);
            font-weight: 500;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            body {
                padding: 1.5rem;
            }
            .header-section {
                flex-direction: column;
                align-items: flex-start;
                padding: 15px 20px;
                margin-bottom: 20px;
            }
            .header-section h1 {
                font-size: 1.7rem;
                margin-bottom: 10px;
            }
            .nav-buttons {
                width: 100%;
                justify-content: flex-start;
            }
            .nav-buttons .btn {
                width: auto;
                flex-grow: 1; 
                text-align: center;
                padding: 8px 15px;
                font-size: 0.9rem;
            }
            .card-header {
                padding: 12px 20px;
                font-size: 1rem;
            }
            .table-responsive {
                padding: 15px 20px;
            }
            .table thead th, .table tbody td {
                padding: 10px 15px;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            .header-section {
                padding: 15px;
            }
            .header-section h1 {
                font-size: 1.5rem;
            }
            .nav-buttons .btn {
                font-size: 0.85rem;
            }
            .table-responsive {
                padding: 10px;
            }
            .table thead th, .table tbody td {
                font-size: 0.75rem;
                padding: 8px 12px;
            }
            .no-data-message {
                padding: 30px 15px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-section">
            <h1><i class="fas fa-users-cog me-3"></i>Data Pegawai</h1>
            <div class="nav-buttons d-flex flex-wrap gap-2">
                <a class="btn btn-outline-primary" href="/todo/manajer/{{ $idManajer }}"><i class="fas fa-home"></i> Beranda</a>
                <a class="btn btn-outline-primary" href="/manajer/todo/penugasanBaru/{{ $idManajer }}"><i class="fas fa-plus-circle"></i> Penugasan Baru</a>
                <a class="btn btn-outline-primary" href="/manajer/todo/penugasanSelesai/{{ $idManajer }}"><i class="fas fa-check-circle"></i> Tugas Selesai</a>
                <a class="btn btn-outline-primary" href="/manajer/todo/penugasanDitolak/{{ $idManajer }}"><i class="fas fa-times-circle"></i> Tugas Ditolak</a> 
                <a class="btn btn-primary" href="/manajer/todo/dataPegawai/{{ $idManajer }}"><i class="fas fa-users"></i> Data Pegawai</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Daftar Pegawai
            </div>
            <div class="card-body">
                @if (empty($dataPegawai)) <div class="no-data-message">
                        <i class="fas fa-user-slash fa-2x mb-3 text-muted"></i>
                        <h6>Tidak ada data pegawai yang tersedia.</h6>
                        <p class="text-muted">Tambahkan pegawai baru untuk melihat daftar di sini.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th style="width: 50px;" class="text-center">No.</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $dataPegawai as $dp )
                                <tr class="text-nowrap">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $dp->nama }}</td>
                                    <td>{{ $dp->jabatan }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>