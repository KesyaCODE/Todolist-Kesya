<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Dashboard Penugasan Manajer</title>

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
            --status-success: #28a745; /* Hijau */
            --status-danger: #dc3545; /* Merah */
            --status-info: #17a2b8;   /* Biru Cyan (Ditugaskan) */
            --status-warning: #ffc107; /* Kuning (Opsional untuk status lain) */

            --font-poppins: 'Poppins', sans-serif;
            --font-montserrat: 'Montserrat', sans-serif;
        }

        body {
            font-family: var(--font-poppins);
            background-color: var(--bg-color);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding-top: 20px; /* Jaga agar tidak terlalu mepet atas */
            background-image: linear-gradient(rgba(248, 249, 250, 0.95), rgba(248, 249, 250, 0.95)), url('https://images.unsplash.com/photo-1549925206-8c863a3d537f?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); /* Gambar kantor sebagai latar belakang manajer */
            background-size: cover;
            background-position: center;
        }

        .container {
            max-width: 1300px; /* Lebih lebar untuk tabel */
        }

        .header-section {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 25px 35px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px var(--shadow-subtle);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header-section h1 {
            font-family: var(--font-montserrat);
            font-weight: 700;
            color: var(--primary-blue);
            margin: 0;
            font-size: 2.2rem;
            letter-spacing: -0.5px;
        }

        .nav-buttons .btn {
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

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

        .card {
            border-radius: 12px;
            box-shadow: 0 5px 20px var(--shadow-subtle);
            overflow: hidden; /* Penting untuk border-radius pada tabel dalam */
            border: none; /* Hilangkan border default Bootstrap */
        }

        .card-header {
            background-color: var(--light-blue); /* Latar belakang header card */
            color: var(--dark-blue);
            font-family: var(--font-montserrat);
            font-weight: 600;
            padding: 20px 30px;
            border-bottom: 1px solid var(--border-light);
            font-size: 1.25rem;
        }

        .table-responsive {
            padding: 20px 30px;
            padding-bottom: 0; /* Hilangkan padding bawah agar tabel mepet */
        }

        .table {
            margin-bottom: 0; /* Hilangkan margin bawah tabel */
            border-radius: 10px; /* Radius pada sudut tabel */
            overflow: hidden;
        }

        .table thead th {
            background-color: #f0f8ff; /* Latar belakang header tabel */
            color: var(--text-dark);
            font-weight: 600;
            padding: 15px 20px;
            font-size: 0.9rem;
            border-bottom: 2px solid var(--border-light);
        }

        .table tbody td {
            padding: 15px 20px;
            vertical-align: middle;
            font-size: 0.88rem;
            border-bottom: 1px solid #f0f0f0; /* Border lebih tipis antar baris */
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table-hover tbody tr:hover {
            background-color: #f5fafd; /* Hover lebih lembut */
        }

        .badge {
            padding: 8px 12px;
            border-radius: 20px; /* Lebih bulat */
            font-weight: 600;
            font-size: 0.78rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            white-space: nowrap; /* Pastikan badge tidak pecah */
            text-shadow: 0 1px 1px rgba(0,0,0,0.1);
        }

        /* Custom badge colors */
        .badge.bg-success { background-color: var(--status-success) !important; }
        .badge.bg-danger { background-color: var(--status-danger) !important; }
        .badge.bg-info { background-color: var(--status-info) !important; color: white !important; } /* Ganti warna teks info */
        .badge.bg-secondary { background-color: var(--text-muted) !important; }

        .action-btns .btn {
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .action-btns .btn-outline-primary {
            color: var(--primary-blue);
            border-color: var(--primary-blue);
        }
        .action-btns .btn-outline-primary:hover {
            background-color: var(--primary-blue);
            color: white;
        }

        .action-btns .btn-outline-danger {
            color: var(--status-danger);
            border-color: var(--status-danger);
        }
        .action-btns .btn-outline-danger:hover {
            background-color: var(--status-danger);
            color: white;
        }

        .no-data-message {
            padding: 60px 20px;
            font-size: 1.1rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .header-section {
                flex-direction: column;
                align-items: flex-start;
            }
            .header-section h1 {
                font-size: 1.8rem;
                margin-bottom: 15px;
            }
            .nav-buttons {
                width: 100%;
                justify-content: flex-start;
            }
            .nav-buttons .btn {
                width: auto; /* Biarkan lebar mengikuti konten */
                flex-grow: 1; /* Agar rata di layar kecil */
                text-align: center;
            }
            .table-responsive {
                padding: 15px 20px;
            }
            .table thead th, .table tbody td {
                padding: 12px 15px;
                font-size: 0.85rem;
            }
            .action-btns .btn {
                padding: 6px 10px;
                font-size: 0.8rem;
            }
            .badge {
                padding: 6px 10px;
                font-size: 0.7rem;
            }
        }

        @media (max-width: 576px) {
            .container {
                padding-left: 10px;
                padding-right: 10px;
            }
            .header-section {
                padding: 20px;
            }
            .header-section h1 {
                font-size: 1.6rem;
            }
            .nav-buttons .btn {
                margin-bottom: 8px; /* Spasi antar tombol vertikal */
            }
            .table-responsive {
                padding: 10px;
            }
            .table tbody td {
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="header-section">
            <h1><i class="fas fa-clipboard-list me-3"></i>Dashboard Penugasan Manajer</h1>
            <div class="nav-buttons d-flex flex-wrap gap-2">
                <a class="btn btn-outline-primary" href="/todo/manajer/{{ $adminId }}"><i class="fas fa-home"></i> Beranda</a>
                <a class="btn btn-primary" href="/manajer/todo/penugasanBaru/{{ $adminId }}"><i class="fas fa-plus-circle"></i> Penugasan Baru</a>
                <a class="btn btn-outline-primary" href="/manajer/todo/penugasanSelesai/{{ $adminId }}"><i class="fas fa-check-circle"></i> Tugas Selesai</a>
                <a class="btn btn-outline-primary" href="/manajer/todo/penugasanDitolak/{{ $adminId }}"><i class="fas fa-times-circle"></i> Tugas Ditolak</a> 
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Daftar Tugas Aktif
            </div>
            <div class="card-body p-0">
                @if (count($dataTodo) < 1)
                    <div class="text-center no-data-message">
                        <i class="fas fa-exclamation-circle fa-2x mb-3 text-muted"></i>
                        <h6>Tidak ada penugasan yang tersedia saat ini!</h6>
                        <p class="text-muted">Mulai dengan menambahkan penugasan baru.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>Penugasan</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Delegator</th>
                                    <th>Delegasi</th>
                                    <th>Status</th>
                                    <th class="text-center" style="width: 120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataTodo as $dt)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="/manajer/todo/ubahPenugasan/{{ $dt->id }}/{{ $adminId }}" class="text-decoration-none fw-semibold text-dark hover-underline">
                                            {{ $dt->tugas }}
                                        </a>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($dt->waktu_mulai)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($dt->waktu_selesai)->format('d M Y') }}</td>
                                    <td>{{ $dt->nama_pemberi }}</td>
                                    <td>{{ $dt->nama_penerima }}</td>
                                    <td>
                                        @if ($dt->keterangan == 'Selesai')
                                            <span class="badge bg-success"><i class="fas fa-check-circle"></i> Selesai</span>
                                        @elseif ($dt->keterangan == 'Ditolak')
                                            <span class="badge bg-danger"><i class="fas fa-times-circle"></i> Ditolak</span>
                                        @elseif ($dt->keterangan == 'Ditugaskan')
                                            <span class="badge bg-info"><i class="fas fa-hourglass-half"></i> Ditugaskan</span>
                                        @else
                                            <span class="badge bg-secondary"><i class="fas fa-question-circle"></i> Unknown</span>
                                        @endif
                                    </td>
                                    <td class="text-center action-btns">
                                        <a href="/manajer/todo/ubahPenugasan/{{ $dt->id }}/{{ $adminId }}" class="btn btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="/manajer/todo/hapusPenugasan/{{ $dt->id }}/{{ $adminId }}" class="btn btn-outline-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus tugas ini?')" data-bs-toggle="tooltip" data-bs-placement="top">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
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
    <script>
        // Inisialisasi Tooltips Bootstrap
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>
</html>