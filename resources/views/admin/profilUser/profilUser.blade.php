<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profil Pengguna</title>
  <link rel="stylesheet" href="/assets/bootstrap.css" />
  <style>
    body {
      background-color: #f9f9f9;
      padding: 2rem 0;
      font-family: 'Segoe UI', sans-serif;
      color: #333;
    }

    .breadcrumb-link {
      color: #0d6efd;
      text-decoration: none;
      font-size: 0.9rem;
      border: 1px solid #0d6efd;
      padding: 6px 12px;
      border-radius: 6px;
      display: inline-block;
    }

    .breadcrumb-link:hover {
      background-color: #0d6efd;
      color: #fff;
      text-decoration: none;
    }

    .profile-box {
      background-color: #fff;
      border: 1px solid #dee2e6;
      border-radius: 10px;
      padding: 2rem;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .profile-title {
      font-size: 1.25rem;
      font-weight: 600;
      margin-bottom: 1.5rem;
      border-bottom: 1px solid #ddd;
      padding-bottom: 0.5rem;
    }

    .profile-row {
      display: flex;
      justify-content: space-between;
      padding: 0.75rem 0;
      border-bottom: 1px solid #eee;
    }

    .profile-row:last-child {
      border-bottom: none;
    }

    .profile-label {
      font-weight: 500;
      color: #555;
      flex: 1;
    }

    .profile-value::before {
      content: ": ";
      margin-right: 4px;
      color: #999;
    }

    .profile-value {
      flex: 2;
      text-align: left;
      color: #222;
      font-style: italic;
    }

    @media (max-width: 576px) {
      .profile-row {
        flex-direction: column;
        align-items: flex-start;
      }

      .profile-value::before {
        content: "";
      }

      .profile-label, .profile-value {
        width: 100%;
      }

      .profile-label {
        margin-bottom: 0.25rem;
      }
    }
  </style>
</head>
<body>
  <div class="container-sm">
    <nav aria-label="breadcrumb" class="mb-4 ps-2">
      <ol class="breadcrumb" style="--bs-breadcrumb-divider: '';">
        <li class="breadcrumb-item">
          <a href="/todo/admin/{{ $idPengguna }}" class="breadcrumb-link">&lt; Kembali</a>
        </li>
      </ol>
    </nav>

    <div class="profile-box">
      <div class="profile-title">Profil Pengguna</div>

      <div class="profile-row">
        <div class="profile-label">ID Pengguna</div>
        <div class="profile-value">{{ $profilPengguna->id }}</div>
      </div>

      <div class="profile-row">
        <div class="profile-label">Nama Lengkap</div>
        <div class="profile-value">{{ $profilPengguna->nama }}</div>
      </div>

      <div class="profile-row">
        <div class="profile-label">Jabatan</div>
        <div class="profile-value">{{ $profilPengguna->jabatan }}</div>
      </div>

      <div class="profile-row">
        <div class="profile-label">Nama Pengguna (Autentikasi)</div>
        <div class="profile-value">{{ $profilPengguna->nama_pengguna }}</div>
      </div>

      <div class="profile-row">
        <div class="profile-label">Sandi</div>
        <div class="profile-value"><i>Tidak ditampilkan</i></div>
      </div>
    </div>
  </div>
</body>
</html>
