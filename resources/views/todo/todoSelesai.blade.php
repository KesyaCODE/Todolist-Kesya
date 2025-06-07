<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tugas Selesai</title>

  <!-- Bootstrap 5 CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      padding-top: 2rem;
    }
    .breadcrumb-link {
      min-width: 110px;
    }
  </style>
</head>
<body>
  <div class="container-md">
    <nav aria-label="breadcrumb" class="ps-3 mb-3">
      <ol class="breadcrumb" style="--bs-breadcrumb-divider: '›';">
        <li class="breadcrumb-item">
          <a href="/todo/user/login/{{ $idPengguna }}" class="btn btn-outline-primary btn-sm breadcrumb-link">
            Beranda
          </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <span class="btn btn-primary btn-sm disabled breadcrumb-link">Daftar Tugas</span>
        </li>
        <li class="breadcrumb-item">
          <a href="/todo/mytodo/ditolak/{{ $idPengguna }}" class="btn btn-outline-primary btn-sm breadcrumb-link">
            Tugas Ditolak
          </a>
        </li>
      </ol>
    </nav>

    <hr />

    <h2 class="text-center fw-bold mb-4">Tugas Selesai</h2>

    <div class="container-sm">
      @if (count($todoSelesai) > 0)
        <div class="table-responsive">
          <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-light">
              <tr>
                <th>No.</th>
                <th class="text-start">Nama Tugas</th>
                <th>Tugas Dimulai</th>
                <th>Selesai</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($todoSelesai as $ts)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td class="text-start">{{ $ts->tugas }}</td>
                  <td>{{ $ts->waktu_mulai }}</td>
                  <td>{{ $ts->waktu_selesai }}</td>
                  <td class="text-success fw-bold">{{ $ts->keterangan }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        <p class="text-center fst-italic">Tidak ditemukan data!</p>
      @endif
    </div>
  </div>

  <!-- Bootstrap 5 JS Bundle (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
