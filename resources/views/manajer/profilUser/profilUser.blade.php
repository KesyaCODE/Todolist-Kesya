<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Pengguna</title>

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
            max-width: 800px; /* Lebar maksimal disesuaikan untuk profil */
        }

        /* Header Section (Judul Halaman) - Disesuaikan untuk halaman detail/profil */
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
            color: var(--primary-blue); /* Warna biru utama untuk judul profil */
            margin: 0;
            font-size: 2rem;
            letter-spacing: -0.5px;
        }
        
        /* Tombol kembali/navigasi yang konsisten */
        .back-button {
            font-weight: 500;
            padding: 10px 18px; 
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.95rem;
            background-color: var(--primary-blue); /* Menggunakan warna primary-blue */
            border-color: var(--primary-blue);
            color: white;
        }

        .back-button:hover {
            background-color: var(--dark-blue);
            border-color: var(--dark-blue);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }


        /* Profil Card */
        .card {
            border-radius: 12px;
            box-shadow: 0 5px 20px var(--shadow-subtle);
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
        .card-body-profile { /* Kelas baru untuk padding khusus body profil */
            padding: 30px; /* Padding lebih besar di dalam card body */
        }

        /* Tabel Detail Profil */
        .table-profile {
            width: 100%;
            margin-bottom: 0;
        }

        .table-profile td {
            padding: 12px 0; /* Padding vertikal yang lebih konsisten */
            font-size: 0.95rem;
            border-bottom: 1px solid #f0f0f0; /* Garis pemisah antar baris */
        }

        .table-profile tbody tr:last-child td {
            border-bottom: none; /* Hilangkan border pada baris terakhir */
        }

        .profile-label {
            font-family: var(--font-poppins);
            font-weight: 600; /* Lebih tebal */
            color: var(--text-dark); /* Teks gelap */
            width: 35%; /* Mengatur lebar kolom label */
            padding-right: 15px; /* Memberi sedikit spasi antara label dan value */
        }
        .profile-value {
            font-family: var(--font-poppins);
            color: var(--text-dark); /* Teks gelap */
            font-weight: 400; /* Normal */
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            body {
                padding: 1.5rem;
            }
            .container {
                max-width: 100%; 
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
            .back-button {
                padding: 8px 15px;
                font-size: 0.9rem;
            }
            .card-header {
                padding: 12px 20px;
                font-size: 1rem;
            }
            .card-body-profile {
                padding: 20px;
            }
            .table-profile td {
                padding: 10px 0;
                font-size: 0.85rem;
            }
            .profile-label {
                width: 40%; /* Menyesuaikan lebar label di layar yang lebih kecil */
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
            .back-button {
                font-size: 0.85rem;
            }
            .card-body-profile {
                padding: 15px;
            }
            .table-profile td {
                font-size: 0.8rem;
            }
            .profile-label {
                width: 45%; /* Menyesuaikan lebar label di layar sangat kecil */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-section">
            <h1><i class="fas fa-user-circle me-3"></i>Profil Pengguna</h1>
            <a href="/todo/manajer/{{ $idPengguna }}" class="btn back-button">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>
        </div>

        <div class="card">
            <div class="card-header">
                Informasi Detail Pengguna
            </div>
            <div class="card-body-profile">
                <div class="table-responsive">
                    <table class="table table-borderless table-profile mb-0">
                        <tbody>
                            <tr>
                                <td class="profile-label">ID Pengguna</td>
                                <td class="profile-value">{{ $profilPengguna->id }}</td>
                            </tr>
                            <tr>
                                <td class="profile-label">Nama Lengkap</td>
                                <td class="profile-value">{{ $profilPengguna->nama }}</td>
                            </tr>
                            <tr>
                                <td class="profile-label">Jabatan</td>
                                <td class="profile-value">{{ $profilPengguna->jabatan }}</td>
                            </tr>
                            <tr>
                                <td class="profile-label">Nama Pengguna</td>
                                <td class="profile-value">{{ $profilPengguna->nama_pengguna }}</td>
                            </tr>
                            <tr>
                                <td class="profile-label">Sandi</td>
                                <td class="text-muted"><em>Tidak ditampilkan untuk keamanan</em></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>