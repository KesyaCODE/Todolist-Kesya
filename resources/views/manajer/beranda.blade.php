<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Dashboard Manajer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/manajer/beranda.css" />
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
            <p class="subheader">{{ $detailManajer->jabatan }} | PT.Velovelo</p>
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
        </div>
        <div class="block-menu">
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