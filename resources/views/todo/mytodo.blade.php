<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>My To Do</title>

  <!-- Bootstrap 5 CDN -->
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
  <div class="container-sm">
    <nav aria-label="breadcrumb" class="ps-3">
      <ol class="breadcrumb mb-3" style="--bs-breadcrumb-divider: '';">
        <li class="breadcrumb-item">
          <a href="/todo/user/login/{{ $idPengguna }}" 
             class="d-inline-block text-decoration-none border border-primary rounded px-2 py-1 fs-7 text-center breadcrumb-link">
            Beranda
          </a>
        </li>
        <li class="breadcrumb-item">
          <a href="/todo/mytodo/selesai/{{ $idPengguna }}" 
             class="d-inline-block text-decoration-none border border-primary rounded px-2 py-1 fs-7 text-center breadcrumb-link">
            Tugas Selesai
          </a>
        </li>
        <li class="breadcrumb-item">
          <a href="/todo/mytodo/ditolak/{{ $idPengguna }}" 
             class="d-inline-block text-decoration-none border border-primary rounded px-2 py-1 fs-7 text-center breadcrumb-link">
            Tugas Ditolak
          </a>
        </li>
      </ol>
    </nav>

    <hr />

    <main>
      <h2 class="text-center fw-bold mb-4">Daftar Tugas Saya</h2>

      @if ($daftarTugas->isEmpty())
        <p class="text-center">Tidak ada tugas baru!</p>
      @else
        <div class="border rounded p-3">
          @foreach ($daftarTugas as $tugas)
            <div class="d-flex align-items-center mb-2">
              <span class="me-2">{{ $loop->iteration }}.</span>
              <a href="/todo/detailTugas/{{ $tugas->id }}/{{ $idPengguna }}" 
                 class="link-offset-2 link-underline link-underline-opacity-0">
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

  <!-- Optional: Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
