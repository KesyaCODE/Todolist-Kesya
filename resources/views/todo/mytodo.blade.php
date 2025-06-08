<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>My To Do</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding-top: 2rem;
      color: #343a40;
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

    .tugas-wrapper {
      background-color: #ffffff;
      border: 1px solid #dee2e6;
      border-radius: 0.75rem;
      padding: 1rem 1.25rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
    }

    .tugas-item a {
      color: #0d6efd;
      text-decoration: none;
      font-weight: 500;
    }

    .tugas-item a:hover {
      text-decoration: underline;
    }

    hr {
      border-top: 1px solid #dee2e6;
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

    <!-- Judul -->
    <main>
      <h4 class="text-center fw-semibold mb-4">Daftar Tugas Saya</h4>

      @if ($daftarTugas->isEmpty())
        <p class="text-center text-muted">Tidak ada tugas baru.</p>
      @else
        <div class="tugas-wrapper">
          @foreach ($daftarTugas as $tugas)
            <div class="d-flex tugas-item align-items-center mb-2">
              <span class="me-2 text-secondary">{{ $loop->iteration }}.</span>
              <a href="/todo/detailTugas/{{ $tugas->id }}/{{ $idPengguna }}">
                {{ $tugas->tugas }}
              </a>
            </div>
            @if (!$loop->last)
              <hr class="my-2" />
            @endif
          @endforeach
        </div>
      @endif
    </main>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
