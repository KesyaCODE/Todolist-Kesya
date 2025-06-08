<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tugas Ditolak</title>

  <!-- Bootstrap 5 CSS via CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      padding-top: 2rem;
    }
    .breadcrumb-link {
      font-size: 0.85rem;
      padding: 0.4rem 0.8rem;
      border-radius: 20px;
      transition: background-color 0.2s ease;
    }

    .breadcrumb-link:hover {
      background-color: #e2e6ea;
      text-decoration: none;
    }
  .custom-table th,
  .custom-table td {
    vertical-align: middle;
    padding: 0.75rem 1rem;
  }

  .custom-table thead {
    background-color: #f1f3f5;
    font-weight: 600;
    font-size: 0.95rem;
    color: #495057;
  }

  .custom-table tbody tr:hover {
    background-color: #f8f9fa;
    transition: background-color 0.2s ease;
  }

  .custom-table td.text-danger {
    color: #dc3545 !important;
  }

  .custom-table {
    font-size: 0.92rem;
    border: 1px solid #dee2e6;
    border-radius: 0.5rem;
    overflow: hidden;
  }
  </style>
</head>
<body>
  <div class="container-sm">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="ps-1 mb-3">
      <ol class="breadcrumb" style="--bs-breadcrumb-divider: '›'; font-size: 0.9rem;">
        <li class="breadcrumb-item">
          <a href="/todo/user/login/{{ $idPengguna }}" class="btn btn-outline-primary breadcrumb-link">Beranda</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/todo/mytodo/selesai/{{ $idPengguna }}" class="btn btn-outline-primary breadcrumb-link">Tugas Selesai</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/todo/mytodo/ditolak/{{ $idPengguna }}" class="btn btn-outline-primary breadcrumb-link">Tugas Ditolak</a>
        </li>
      </ol>
    </nav>

    <hr />

    <h2 class="text-center fw-bold mb-4">Tugas Tidak Dikerjakan</h2>

    @if (count($todoDitolak) > 0)
      <div class="table-responsive">
  <table class="table table-bordered custom-table text-center align-middle">
    <thead>
      <tr>
        <th style="width: 5%;">No.</th>
        <th class="text-start">Nama Tugas</th>
        <th style="width: 20%;">Tugas Dimulai</th>
        <th style="width: 20%;">Selesai</th>
        <th style="width: 15%;">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($todoDitolak as $ts)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td class="text-start">{{ $ts->tugas }}</td>
          <td>{{ $ts->waktu_mulai }}</td>
          <td>{{ $ts->waktu_selesai }}</td>
          <td class="fw-semibold text-danger">{{ $ts->keterangan }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
    @else
      <p class="text-center fst-italic">Tidak ditemukan data!</p>
    @endif
  </div>

  <!-- Optional Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
