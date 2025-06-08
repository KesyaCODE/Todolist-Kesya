<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Kepegawaian</title>
  <link rel="stylesheet" href="/assets/bootstrap.css"/>
  <style>
    body {
      padding-top: 30px;
      background-color: #f8f9fa;
    }
    .btn-custom {
      min-width: 160px;
      font-weight: 500;
    }
    .card {
      border-radius: 15px;
      box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
    .menu-table a {
      display: block;
      padding: 12px 0;
      color: #198754;
      font-weight: 600;
    }
    .menu-table td {
      border: 1px solid #dee2e6;
      transition: background-color 0.2s ease;
    }
    .menu-table td:hover {
      background-color: #e9fbe8;
    }
    .table th, .table td {
      vertical-align: middle;
    }
  </style>
</head>
<body>
  <div class="container-lg">

    <!-- Navigasi Atas -->
    <div class="d-flex justify-content-between mb-4">
      <a href="/todo/admin/{{ $adminId }}" class="btn btn-outline-success rounded-pill btn-custom">🏠 Beranda</a>
      <a href="/" class="btn btn-outline-danger rounded-pill btn-custom">🚪 Keluar</a>
    </div>

    <!-- Card Menu Kepegawaian -->
    <div class="card">
      <div class="card-header text-center bg-success text-white fw-bold">
        Pengelolaan Pegawai
      </div>
      <div class="card-body p-0">
        <table class="table table-bordered text-center mb-0 menu-table">
          <tbody>
            <tr>
              <td>
                <a href="/admin/todo/dataPegawai/{{ $adminId }}" class="text-decoration-none">📋 Data Pegawai</a>
              </td>
              <td>
                <a href="/admin/todo/statistikPegawai" class="text-decoration-none">📊 Statistik Pegawai</a>
              </td>
              <td>
                <a href="/admin/todo/pegawai/pegawaiBaru/{{ $adminId }}" class="text-decoration-none">➕ Tambah Pegawai Baru</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</body>
</html>
