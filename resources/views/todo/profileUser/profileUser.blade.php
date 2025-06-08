<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profil Pengguna</title>
  <link rel="stylesheet" href="/assets/bootstrap.css" />
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
      padding-top: 2rem;
      color: #333;
    }

    .breadcrumb-link {
      min-width: 140px;
      font-size: 0.85rem;
      padding: 0.4rem 0.8rem;
    }

    .breadcrumb a {
      text-decoration: none;
    }

    .card {
      border: none;
      border-radius: 0.75rem;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
    }

    table {
      width: 100%;
    }

    td {
      padding: 0.6rem;
      vertical-align: top;
      font-size: 0.95rem;
    }

    td:first-child {
      color: #555;
      font-weight: 500;
      width: 40%;
    }

    td:last-child {
      color: #212529;
    }

    hr {
      border-top: 1px solid #dee2e6;
    }
  </style>
</head>
<body>
  <div class="container-sm">
    <nav aria-label="breadcrumb" class="ps-1">
      <ol class="breadcrumb mb-3" style="--bs-breadcrumb-divider: ''; font-size: 0.9rem;">
        <li class="breadcrumb-item">
          <a href="/todo/user/login/{{ $idPengguna }}" 
             class="btn btn-outline-success rounded-pill breadcrumb-link">
            ← Informasi Penugasan
          </a>
        </li>
      </ol>
    </nav>

    <div class="card p-4">
      <h5 class="mb-3">Profil Pengguna</h5>
      <hr />
      <table>
        <tr>
          <td>ID Pengguna</td>
          <td>{{ $profilPengguna->id }}</td>
        </tr>
        <tr>
          <td>Nama Lengkap</td>
          <td>{{ $profilPengguna->nama }}</td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td>{{ $profilPengguna->jabatan }}</td>
        </tr>
        <tr>
          <td>Nama Pengguna (Autentikasi)</td>
          <td>{{ $profilPengguna->nama_pengguna }}</td>
        </tr>
        <tr>
          <td>Sandi</td>
          <td><i>Tidak ditampilkan</i></td>
        </tr>
      </table>
    </div>
  </div>
</body>
</html>
