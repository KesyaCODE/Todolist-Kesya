<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>My To Do</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/css/staff/mytodo.css" />
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
          <a href="/todo/mytodo/{{ $idPengguna }}" class="btn btn-outline-primary breadcrumb-link">Penugasan</a>
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

    <!-- Judul -->
<main class="container py-4" style="max-width: 600px;">
  <h4 class="text-center fw-bold mb-4" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    Daftar Tugas Saya
  </h4>

  @if ($daftarTugas->isEmpty())
    <p class="text-center text-muted fst-italic">Tidak ada tugas baru.</p>
  @else
    <div class="tugas-wrapper d-flex flex-column gap-3">
      @foreach ($daftarTugas as $tugas)
        <a href="/todo/detailTugas/{{ $tugas->id }}/{{ $idPengguna }}" 
           class="tugas-item d-flex align-items-center p-3 rounded shadow-sm text-decoration-none"
           style="background-color: #f9f9f9; transition: background-color 0.3s, box-shadow 0.3s;">
          <div class="badge bg-primary rounded-circle me-3 d-flex justify-content-center align-items-center"
               style="width: 32px; height: 32px; font-weight: 600; font-size: 1rem; color: white;">
            {{ $loop->iteration }}
          </div>
          <div class="text-truncate" style="font-size: 1.1rem; color: #333;">
            {{ $tugas->tugas }}
          </div>
        </a>
      @endforeach
    </div>
  @endif
</main>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
