<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Kepegawaian</title>

  <link rel="stylesheet" href="/assets/bootstrap.css"/>
  <style>
    body {
      padding-top: 25px;
      background-color: #f8f9fa;
    }
    .btn-custom {
      width: 160px;
    }
    .table thead th {
      background-color: #198754;
      color: #fff;
    }
    .table td, .table th {
      vertical-align: middle;
    }
    .card {
      border-radius: 15px;
      box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
  </style>
</head>
<body>
  <div class="container-lg">

    <!-- Tombol keluar dan beranda -->
    <div class="d-flex justify-content-between mb-3">
      <a href="/todo/admin/{{ $adminId }}" class="btn btn-outline-primary rounded-pill btn-custom">Beranda</a>
      <a href="/" class="btn btn-outline-danger rounded-pill btn-custom">Keluar</a>
    </div>

    <!-- Card Pengelolaan Pegawai -->
    <div class="card mb-5">
      <div class="card-header text-center bg-success text-white fw-bold">
        Pengelolaan Pegawai
      </div>
      <div class="card-body p-0">
        <table class="table table-bordered table-hover text-center mb-0">
          <tbody>
            <tr>
              <td>
                <a href="/admin/todo/dataPegawai/{{ $adminId }}" class="text-decoration-none">Data Pegawai</a>
              </td>
              <td>
                <a href="/admin/todo/statistikPegawai" class="text-decoration-none">Statistik Pegawai</a>
              </td>
              <td>
                <a href="/admin/todo/pegawai/pegawaiBaru/{{ $adminId }}" class="text-decoration-none">Pegawai Baru</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</body>
</html>
