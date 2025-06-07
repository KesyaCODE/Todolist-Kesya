<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Beranda</title>

  <link rel="stylesheet" href="/assets/bootstrap.css" />
  <style>
    body {
      padding-top: 20px;
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .navbar-custom {
      padding: 0.5rem 1rem;
      background-color: #0d6efd;
      color: white;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      box-shadow: 0 2px 4px rgb(13 110 253 / 0.3);
      border-radius: 0.3rem;
    }
    .navbar-custom a {
      color: white;
      font-weight: 600;
      text-decoration: none;
      padding: 0.375rem 0.75rem;
      border: 2px solid white;
      border-radius: 0.375rem;
      transition: background-color 0.3s, color 0.3s;
    }
    .navbar-custom a:hover {
      background-color: white;
      color: #0d6efd;
      text-decoration: none;
    }
    .welcome-text {
      margin-bottom: 0.1rem;
      font-size: 1.4rem;
      font-weight: 700;
      color: #212529;
    }
    .job-title {
      font-size: 0.9rem;
      color: #6c757d;
      margin-bottom: 1.5rem;
    }
    .menu-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
      gap: 1.5rem;
      margin-top: 1rem;
    }
    .menu-card {
      background-color: white;
      border-radius: 0.5rem;
      box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
      padding: 1.25rem;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
      color: #0d6efd;
      font-weight: 600;
      text-decoration: none;
      user-select: none;
    }
    .menu-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 10px 20px rgb(0 0 0 / 0.15);
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container-lg">

    <nav class="navbar-custom">
      <a href="/" aria-label="Keluar dari aplikasi">Keluar</a>
    </nav>

    <p class="welcome-text">Selamat Datang, <span>{{ $detailPegawai->nama }}</span>!</p>
    <p class="job-title">{{ $detailPegawai->jabatan }}</p>
    <hr />

    <section aria-label="Menu admin">
      <div class="menu-grid">
        <a href="/admin/todo/dataPenugasan/{{ $detailPegawai->id }}" class="menu-card" role="button" tabindex="0">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#0d6efd" class="mb-2" viewBox="0 0 16 16">
            <path d="M8 0a5 5 0 0 0-5 5v5a5 5 0 0 0 10 0V5a5 5 0 0 0-5-5zm3 10a3 3 0 0 1-6 0V5a3 3 0 0 1 6 0v5z"/>
            <path d="M3.5 11a.5.5 0 0 1 0-1H12a.5.5 0 0 1 0 1H3.5z"/>
          </svg>
          Penugasan
        </a>

        <a href="/admin/todo/rincianPenugasan/{{ $detailPegawai->id }}" class="menu-card" role="button" tabindex="0">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#0d6efd" class="mb-2" viewBox="0 0 16 16">
            <path d="M0 0h1v15H0V0zM15 0h-1v15h1V0zM2 3h12v2H2V3zm0 5h12v2H2V8zM2 13h12v2H2v-2z"/>
          </svg>
          Statistik Penugasan
        </a>

        <a href="/admin/todo/halamanKelolaPegawai/{{ $detailPegawai->id }}" class="menu-card" role="button" tabindex="0">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#0d6efd" class="mb-2" viewBox="0 0 16 16">
            <path d="M8 0a5 5 0 0 1 5 5v6a5 5 0 0 1-10 0V5a5 5 0 0 1 5-5zM4.5 8.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zM11 8.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
          </svg>
          Kegawaian
        </a>
      </div>
    </section>

  </div>
</body>
</html>
