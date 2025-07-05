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
      background-color: #f5f7fa; /* soft light background */
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #495057; /* soft dark gray for text */
      min-height: 100vh;
    }
    .navbar-custom {
      padding: 0.5rem 1rem;
      background-color: #5a86ad; /* calm blue */
      color: #e9ecef; /* light text */
      display: flex;
      justify-content: flex-end;
      align-items: center;
      box-shadow: 0 3px 6px rgb(90 134 173 / 0.3);
      border-radius: 0.3rem;
      gap: 0.75rem;
      font-weight: 600;
      font-size: 0.9rem;
    }
    .navbar-custom a {
      color: #e9ecef;
      text-decoration: none;
      padding: 0.4rem 0.9rem;
      border: 2px solid transparent;
      border-radius: 0.375rem;
      transition: background-color 0.25s ease, color 0.25s ease, border-color 0.25s ease;
      user-select: none;
    }
    .navbar-custom a:hover,
    .navbar-custom a:focus {
      background-color: #e9ecef;
      color: #5a86ad;
      border-color: #5a86ad;
      outline: none;
    }

    .welcome-text {
      margin-bottom: 0.15rem;
      font-size: 1.5rem;
      font-weight: 700;
      color: #343a40; /* slightly darker */
      text-align: center;
      user-select: none;
    }
    .welcome-text span {
      color: #5a86ad; /* accent color */
    }
    .job-title {
      font-size: 1rem;
      color: #6c757d;
      margin-bottom: 1.75rem;
      text-align: center;
      font-weight: 500;
      user-select: none;
    }
    hr {
      max-width: 400px;
      border-color: #ced4da;
      margin: 0 auto 2rem;
      opacity: 0.6;
    }

    .menu-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 1.75rem;
      max-width: 800px;
      margin: 0 auto 3rem;
      padding: 0 1rem;
    }
    .menu-card {
      background-color: #ffffff;
      border-radius: 0.75rem;
      box-shadow: 0 8px 16px rgb(0 0 0 / 0.08);
      padding: 1.5rem 1.2rem;
      text-align: center;
      color: #4a6fa5; /* muted blue */
      font-weight: 600;
      text-decoration: none;
      user-select: none;
      transition:
        transform 0.3s ease,
        box-shadow 0.3s ease,
        color 0.3s ease;
      cursor: pointer;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.5rem;
    }
    .menu-card svg {
      transition: fill 0.3s ease;
    }
    .menu-card:hover,
    .menu-card:focus {
      transform: translateY(-6px);
      box-shadow: 0 14px 28px rgb(0 0 0 / 0.15);
      color: #2c3e70;
      outline: none;
    }
    .menu-card:hover svg,
    .menu-card:focus svg {
      fill: #2c3e70;
    }
  </style>
</head>
<body>
  <div class="container-lg">

    <nav class="navbar-custom" role="navigation" aria-label="Navigasi utama">
      <a href="/admin/todo/profilAdmin/{{ $detailPegawai->id }}" tabindex="0">{{ $detailPegawai->nama }}</a>
      <a href="/" aria-label="Keluar dari aplikasi" tabindex="0">Keluar</a>
    </nav>

    <p class="welcome-text">Selamat Datang, <span>{{ $detailPegawai->nama }}</span>!</p>
    <p class="job-title">PT.Velovelo | {{ $detailPegawai->jabatan }}</p>
    <hr />

    <section aria-label="Menu admin">
      <div class="menu-grid">
        <a href="/admin/todo/dataPenugasan/{{ $detailPegawai->id }}" class="menu-card" role="button" tabindex="0" aria-label="Menu Penugasan">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#4a6fa5" class="mb-2" viewBox="0 0 16 16" aria-hidden="true" focusable="false">
            <path d="M8 0a5 5 0 0 0-5 5v5a5 5 0 0 0 10 0V5a5 5 0 0 0-5-5zm3 10a3 3 0 0 1-6 0V5a3 3 0 0 1 6 0v5z"/>
            <path d="M3.5 11a.5.5 0 0 1 0-1H12a.5.5 0 0 1 0 1H3.5z"/>
          </svg>
          Penugasan
        </a>

        <a href="/admin/todo/rincianPenugasan/{{ $detailPegawai->id }}" class="menu-card" role="button" tabindex="0" aria-label="Menu Statistik Penugasan">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#4a6fa5" class="mb-2" viewBox="0 0 16 16" aria-hidden="true" focusable="false">
            <path d="M0 0h1v15H0V0zM15 0h-1v15h1V0zM2 3h12v2H2V3zm0 5h12v2H2V8zM2 13h12v2H2v-2z"/>
          </svg>
          Statistik Penugasan
        </a>

        <a href="/admin/todo/halamanKelolaPegawai/{{ $detailPegawai->id }}" class="menu-card" role="button" tabindex="0" aria-label="Menu Kegawaian">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#4a6fa5" class="mb-2" viewBox="0 0 16 16" aria-hidden="true" focusable="false">
            <path d="M8 0a5 5 0 0 1 5 5v6a5 5 0 0 1-10 0V5a5 5 0 0 1 5-5zM4.5 8.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zM11 8.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
          </svg>
          Kegawaian
        </a>
      </div>
    </section>

  </div>
</body>
</html>
