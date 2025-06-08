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
      background-color: #f5f7fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #495057;
    }

    .btn-nav {
      width: 140px;
      flex-shrink: 0;
      font-weight: 600;
      color: #3b5bdb;
      border: 1.5px solid #a3bffa;
      background-color: #e7f0ff;
      transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-nav:hover, .btn-nav:focus {
      background-color: #3b5bdb;
      color: white;
      box-shadow: 0 4px 10px rgb(59 91 219 / 0.4);
      text-decoration: none;
      outline: none;
    }

    .empty-state {
      padding: 4rem 1rem;
      text-align: center;
      color: #868e96;
    }

    .empty-state svg {
      width: 90px;
      height: 90px;
      margin-bottom: 1.25rem;
      color: #ced4da;
      filter: drop-shadow(0 1px 2px rgba(0,0,0,0.05));
    }

    table {
      border-collapse: separate;
      border-spacing: 0 6px;
      width: 100%;
      font-size: 0.95rem;
    }

    thead th {
      background-color: #d0e7ff;
      color: #0a3d62;
      font-weight: 600;
      padding: 14px 12px;
      border-radius: 8px;
      text-align: center;
      border-bottom: 2px solid #0a3d62;
      user-select: none;
    }

    tbody tr {
      background-color: #ffffff;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      transition: background-color 0.3s ease;
      border-radius: 8px;
    }

    tbody tr:hover {
      background-color: #e3f2fd;
      cursor: pointer;
    }

    tbody tr:nth-child(odd) {
      background-color: #f9fbff;
    }

    tbody td {
      padding: 12px 14px;
      vertical-align: middle;
      border: none;
      color: #495057;
    }

    tbody td.text-center {
      text-align: center;
      font-variant-numeric: tabular-nums;
    }

    table, thead, tbody, tr, th, td {
      border: none;
    }

    /* Kolom Penugasan */
    th:nth-child(2) {
      max-width: 220px;
      white-space: normal;
      word-wrap: break-word;
      text-align: left;
      vertical-align: middle;
      padding-left: 12px;
    }

    td:nth-child(2) {
      max-width: 220px;
      white-space: normal;
      word-wrap: break-word;
      padding-left: 12px;
      display: flex;
      align-items: center;
    }

    .empty-message {
      padding: 20px 0;
      font-style: italic;
      color: #6c757d;
    }

    a.text-decoration-none {
      color: #3b5bdb;
      transition: color 0.3s ease;
    }

    a.text-decoration-none:hover, a.text-decoration-none:focus {
      text-decoration: underline;
      color: #1d3fcc;
      outline: none;
    }

    .badge-status {
      display: inline-block;
      padding: 0.3em 0.7em;
      font-size: 0.75rem;
      font-weight: 600;
      border-radius: 0.5rem;
      min-width: 70px;
      text-align: center;
      user-select: none;
      box-shadow: inset 0 0 3px rgb(0 0 0 / 0.05);
      transition: background-color 0.3s ease, color 0.3s ease;
      color: #495057;
    }

    .badge-status.selesai {
      background-color: #d6e9d6;
      color: #2e7d32;
    }

    .badge-status.ditolak {
      background-color: #fff7d6;
      color: #a67c00;
    }

    .badge-status.ditugaskan {
      background-color: #cce7f9;
      color: #0d47a1;
    }

    .badge-status.none {
      background-color: #e9ecef;
      color: #6c757d;
    }

    td.status-col {
      text-align: center;
      white-space: nowrap;
    }

    .btn-danger {
      background-color: #ff6b6b;
      border-color: #ff6b6b;
      transition: background-color 0.3s ease;
    }

    .btn-danger:hover, .btn-danger:focus {
      background-color: #e85c5c;
      border-color: #e85c5c;
      box-shadow: 0 4px 8px rgb(232 92 92 / 0.4);
      outline: none;
    }
  </style>
</head>
<body>
  <div class="container-lg">

    <!-- Navigation Buttons -->
    <div class="d-flex flex-wrap gap-2 justify-content-center mb-4">
      <a href="/todo/admin/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded btn-nav">Beranda</a>
      <a href="/admin/todo/penugasanBaru/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded btn-nav">Penugasan Baru</a>
      <a href="/admin/todo/penugasanSelesai/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded btn-nav">Tugas Selesai</a>
      <a href="/admin/todo/penugasanDitolak/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded btn-nav">Tugas Ditolak</a>
    </div>

    <hr />

    @if(count($dataTodo) <= 0)
    <div class="empty-state" role="alert" aria-live="polite">
      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-list-task" viewBox="0 0 16 16" aria-hidden="true" focusable="false">
        <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zM2 5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 5zm.5 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1h-11zm0 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1h-11z"/>
      </svg>
      <p class="mt-3 fs-5">Belum ada tugas yang tersedia.</p>
    </div>
    @else
    <div class="table-responsive">
      <table>
        <thead>
          <tr>
            <th style="width: 50px;">No.</th>
            <th style="min-width: 220px; text-align: left;">Penugasan</th>
            <th style="width: 140px;">Waktu Mulai</th>
            <th style="width: 140px;">Waktu Selesai</th>
            <th style="width: 140px;">Delegator</th>
            <th style="width: 140px;">Delegasi</th>
            <th class="text-center" style="width: 90px;">Status</th>
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
            <td class="status-col">
              @if ($dt->keterangan == 'Selesai')
              <span class="badge-status selesai">Selesai</span>
              @elseif ($dt->keterangan == 'Ditolak')
              <span class="badge-status ditolak">Ditolak</span>
              @elseif ($dt->keterangan == 'Ditugaskan')
              <span class="badge-status ditugaskan">Ditugaskan</span>
              @else
              <span class="badge-status none">-</span>
              @endif
            </td>
            <td class="text-center">
              <a href="/admin/todo/hapusPenugasan/{{ $dt->id }}" class="btn btn-sm btn-danger d-flex align-items-center gap-1 justify-content-center" title="Hapus Tugas" aria-label="Hapus tugas {{ $dt->tugas }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" aria-hidden="true" focusable="false">
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
