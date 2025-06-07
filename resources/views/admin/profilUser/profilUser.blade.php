<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="/assets/bootstrap.css" />
      <style>
        body {
        padding-top: 2rem;
        }
        /* Optional: atur min-width untuk breadcrumb links agar seragam */
        .breadcrumb-link {
        min-width: 110px;
        }
    </style>
</head>
<body>
<div class="container-sm">
    <nav aria-label="breadcrumb" class="ps-3">
      <ol class="breadcrumb mb-3" style="--bs-breadcrumb-divider: '';">
        <li class="breadcrumb-item">
          <a href="/todo/user/login/{{ $idPengguna }}" 
             class="d-inline-block text-decoration-none border border-primary rounded px-2 py-1 fs-7 text-center breadcrumb-link">
            < Informasi Penugasan
          </a>
        </li>
      </ol>
    </nav>

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
            <td>Nama Pengguna ( Autentikasi )</td>
            <td>{{ $profilPengguna->nama_pengguna }}</td>
        </tr>
        <tr>
            <td>Sandi</td>
            <td><i>Tidak ditampilkan</i></td>
        </tr>
    </table>
</body>
</html>