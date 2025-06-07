<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar Tugas / Todo</title>

  <link rel="stylesheet" href="/assets/bootstrap.css" />
  <style>
    body {
      padding: 2rem 0;
      background-color: #f9f9fb;
    }
    .btn-nav {
      width: 140px;
      flex-shrink: 0;
    }
    .empty-state {
      padding: 3rem 1rem;
      text-align: center;
      color: #6c757d;
    }
    .empty-state svg {
      width: 80px;
      height: 80px;
      margin-bottom: 1rem;
      color: #adb5bd;
    }
    table {
      border-radius: 0.5rem;
      overflow: hidden;
      box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 0.075);
    }
    a.text-decoration-none:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container-lg">

    <!-- Navigation Buttons -->
    <div class="d-flex flex-wrap gap-2 justify-content-center mb-4">
      <a href="/todo/admin/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded btn-nav">
        Beranda
      </a>
      <a href="/admin/todo/penugasanBaru/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded btn-nav">
        Penugasan Baru
      </a>
      <a href="/admin/todo/penugasanSelesai/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded btn-nav">
        Tugas Selesai
      </a>
      <a href="/admin/todo/penugasanDitolak/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded btn-nav">
        Tugas Ditolak
      </a>
    </div>

    <hr />

    @if(count($dataTodo) <= 0)
    <div class="empty-state">
      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-list-task" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zM2 5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 5zm.5 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1h-11zm0 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1h-11z"/>
      </svg>
      <p class="mt-3 fs-5">Belum ada tugas yang tersedia.</p>
    </div>
    @else
    <div class="table-responsive shadow-sm rounded">
      <table class="table table-sm table-striped table-hover table-bordered align-middle small mb-0">
        <thead class="table-primary text-nowrap">
          <tr>
            <th class="text-center" style="width: 50px;">No.</th>
            <th>Penugasan</th>
            <th>Waktu Mulai</th>
            <th>Waktu Selesai</th>
            <th>Delegator</th>
            <th>Delegasi</th>
            <th>Status</th>
            <th class="text-center" style="width: 90px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dataTodo as $dt)
          <tr class="text-nowrap">
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>
              <a href="/admin/todo/ubahPenugasan/{{ $dt->id }}/{{ $adminId }}" class="text-decoration-none">
                {{ $dt->tugas }}
              </a>
            </td>
            <td>{{ $dt->waktu_mulai }}</td>
            <td>{{ $dt->waktu_selesai }}</td>
            <td>{{ $dt->nama_pemberi }}</td>
            <td>{{ $dt->nama_penerima }}</td>
            <td>
              @if ($dt->keterangan == 'Selesai')
              <span class="badge bg-success">Selesai</span>
              @elseif ($dt->keterangan == 'Ditolak')
              <span class="badge bg-warning text-dark">Ditolak</span>
              @elseif ($dt->keterangan == 'Ditugaskan')
              <span class="badge bg-info text-dark">Ditugaskan</span>
              @else
              <span class="badge bg-secondary">-</span>
              @endif
            </td>
            <td class="text-center">
              <a href="/admin/todo/hapusPenugasan/{{ $dt->id }}" class="btn btn-sm btn-danger d-flex align-items-center gap-1 justify-content-center" title="Hapus Tugas">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
                Hapus
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif
  </div>
</body>
</html>
