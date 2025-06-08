<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Dashboard Manajer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-blue: #007bff;
            --dark-blue: #0056b3;
            --light-blue: #e0f2fe;
            --bg-color: #f8f9fa;
            --card-bg: #ffffff;
            --text-dark: #343a40;
            --text-muted: #6c757d;
            --border-light: #dee2e6;
            --shadow-subtle: rgba(0, 0, 0, 0.08);

            --font-poppins: 'Poppins', sans-serif;
            --font-montserrat: 'Montserrat', sans-serif;
        }

        body {
            font-family: var(--font-poppins);
            background-color: var(--bg-color);
            color: var(--text-dark);
            height: 100vh; /* Mengatur tinggi body agar pas 1 layar */
            padding: 1.5rem; /* Mengurangi padding body */
            display: flex;
            flex-direction: column;
            justify-content: center; /* Pusatkan konten vertikal */
            align-items: center; /* Pusatkan konten horizontal */
            overflow: hidden; /* Sembunyikan scrollbar jika ada */
            position: relative;
            background-image: linear-gradient(rgba(248, 249, 250, 0.95), rgba(248, 249, 250, 0.95)), url('https://images.unsplash.com/photo-1549925206-8c863a3d537f?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
        }

        .main-content-wrapper {
            width: 100%;
            max-width: 1000px; /* Lebar maksimal konten utama */
            flex-grow: 1; /* Memungkinkan wrapper mengambil ruang yang tersedia */
            display: flex;
            flex-direction: column;
            justify-content: center; /* Pusatkan konten di dalam wrapper */
            align-items: center;
            padding: 0; /* Menghapus padding default jika ada */
            box-sizing: border-box; /* Pastikan padding tidak menambah ukuran */
        }

        .top-nav {
            position: absolute;
            top: 1rem;
            right: 1.5rem;
            display: flex;
            gap: 0.5rem;
            z-index: 1000;
        }
        .top-nav .btn {
            font-weight: 500;
            padding: 0.35rem 0.75rem; /* Mengurangi padding */
            border-radius: 6px; /* Mengurangi border-radius */
            font-size: 0.8rem; /* Mengurangi ukuran font */
            transition: all 0.3s ease;
            box-shadow: none; /* Hilangkan shadow di sini */
        }
        .top-nav .btn:hover {
            transform: translateY(-1px); /* Mengurangi efek translateY */
            box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* Shadow lebih kecil saat hover */
        }

        .header-container {
            max-width: 700px; /* Mengurangi lebar maksimal */
            margin: 0 auto 2rem; /* Mengurangi margin bawah */
            text-align: center;
            padding-top: 0; /* Hilangkan padding top karena body sudah justify-content center */
        }
        .header {
            font-family: var(--font-montserrat);
            font-weight: 700;
            color: var(--primary-blue);
            font-size: 2.5rem; /* Mengurangi ukuran font */
            margin-bottom: 0.3rem; /* Mengurangi margin bawah */
            letter-spacing: -0.8px; /* Sedikit rapat */
            text-shadow: 0 1px 3px rgba(0,0,0,0.05); /* Mengurangi shadow */
        }
        .subheader {
            font-family: var(--font-poppins);
            color: var(--text-muted);
            font-size: 1.05rem; /* Mengurangi ukuran font */
            font-weight: 400;
            margin-bottom: 0;
        }

        .block-menu {
            max-width: 900px; /* Mengurangi lebar maksimal */
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Min lebar blok lebih kecil */
            gap: 1.5rem; /* Mengurangi spasi antar blok */
        }

        .menu-block {
            background: var(--card-bg);
            border-radius: 12px; /* Mengurangi border-radius */
            box-shadow: 0 5px 15px var(--shadow-subtle); /* Mengurangi bayangan */
            padding: 1.5rem; /* Mengurangi padding */
            display: flex;
            align-items: center;
            gap: 1.2rem; /* Mengurangi spasi ikon dan konten */
            text-decoration: none;
            color: var(--text-dark);
            transition: transform 0.3s ease, box-shadow 0.3s ease, color 0.3s ease;
            border: 1px solid var(--border-light);
        }
        .menu-block:hover {
            transform: translateY(-5px); /* Mengurangi efek translateY */
            box-shadow: 0 8px 20px rgba(0, 123, 255, 0.15); /* Bayangan hover lebih kecil */
            color: var(--primary-blue);
        }
        .menu-icon {
            font-size: 3rem; /* Mengurangi ukuran ikon */
            color: var(--primary-blue);
            transition: color 0.3s ease;
        }
        .menu-block:hover .menu-icon {
            color: var(--dark-blue);
        }
        .menu-content h3 {
            font-family: var(--font-montserrat);
            font-size: 1.3rem; /* Mengurangi ukuran judul */
            font-weight: 700;
            margin-bottom: 0.2rem; /* Mengurangi margin bawah */
            color: inherit;
        }
        .menu-content p {
            margin: 0;
            font-size: 0.9rem; /* Mengurangi ukuran paragraf */
            color: var(--text-muted);
        }

        /* Responsive adjustments for smaller screens */
        @media (max-width: 1024px) {
            body {
                padding: 1rem;
            }
            .header-container {
                margin-bottom: 1.5rem;
            }
            .header {
                font-size: 2.2rem;
            }
            .subheader {
                font-size: 1rem;
            }
            .block-menu {
                gap: 1rem;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }
            .menu-block {
                padding: 1.2rem;
                gap: 1rem;
            }
            .menu-icon {
                font-size: 2.8rem;
            }
            .menu-content h3 {
                font-size: 1.2rem;
            }
            .menu-content p {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 0.8rem;
            }
            .top-nav {
                position: static;
                margin-bottom: 1rem;
                justify-content: center;
                width: 100%;
            }
            .header-container {
                margin-bottom: 1.5rem;
                padding-top: 0;
            }
            .header {
                font-size: 1.8rem;
            }
            .subheader {
                font-size: 0.9rem;
            }
            .block-menu {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            .menu-block {
                flex-direction: row; /* Kembali ke row di tablet kecil untuk efisiensi ruang */
                text-align: left;
                padding: 1rem 1.2rem;
                gap: 0.8rem;
            }
            .menu-icon {
                margin-bottom: 0;
                font-size: 2.5rem;
            }
            .menu-content h3 {
                font-size: 1.1rem;
            }
            .menu-content p {
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>

    <div class="top-nav">
        <a href="/manajer/todo/profilManajer/{{ $detailManajer->id }}" class="btn btn-outline-secondary">
            <i class="fas fa-user-circle me-1"></i> Profil
        </a>
        <a href="/" class="btn btn-outline-danger">
            <i class="fas fa-sign-out-alt me-1"></i> Keluar
        </a>
    </div>

    <div class="main-content-wrapper">
        <div class="header-container">
            <h1 class="header">Selamat Datang, {{ $detailManajer->nama }}!</h1>
            <p class="subheader">{{ $detailManajer->jabatan }} | Nama Perusahaan</p>
        </div>

        <div class="block-menu">

            <a href="/manajer/todo/dataPenugasan/{{ $detailManajer->id }}" class="menu-block">
                <i class="fas fa-tasks menu-icon"></i>
                <div class="menu-content">
                    <h3>Penugasan</h3>
                    <p>Lihat dan kelola semua penugasan untuk tim Anda.</p>
                </div>
            </a>

            <a href="/manajer/todo/rincianPenugasan/{{ $detailManajer->id }}" class="menu-block">
                <i class="fas fa-chart-line menu-icon"></i>
                <div class="menu-content">
                    <h3>Statistik Penugasan</h3>
                    <p>Analisis dan statistik dari aktivitas penugasan.</p>
                </div>
            </a>

            <a href="/manajer/todo/dataPegawai/{{ $detailManajer->id }}" class="menu-block">
                <i class="fas fa-users menu-icon"></i>
                <div class="menu-content">
                    <h3>Data Pegawai</h3>
                    <p>Informasi tentang pegawai dalam organisasi Anda.</p>
                </div>
            </a>

            <a href="/manajer/todo/tugasSaya/{{ $detailManajer->id }}" class="menu-block">
                <i class="fas fa-clipboard-check menu-icon"></i>
                <div class="menu-content">
                    <h3>Tugas Saya</h3>
                    <p>Lihat tugas yang ditugaskan langsung kepada Anda.</p>
                </div>
            </a>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>