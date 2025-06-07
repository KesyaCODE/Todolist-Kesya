<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Data Pegawai</title>

  <link rel="stylesheet" href="/assets/bootstrap.css" />
  <style>
    body {
      padding-top: 30px;
      background-color: #f8f9fa;
    }
    .btn-custom {
      min-width: 160px;
    }
    .card {
      border-radius: 15px;
      box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
    }
    table td, table th {
      vertical-align: middle !important;
    }
    .table td .btn {
      min-width: 100px;
    }
  </style>
</head>
<body>
  <div class="container-lg">

    <!-- Tombol Navigasi -->
    <div class="d-flex flex-nowrap overflow-auto gap-2 mb-4 pb-2">
      {{-- <a href="/todo/admin/{{ $adminId }}" class="btn btn-outline-primary rounded-pill btn-custom">Beranda</a> --}}
      <a href="/admin/todo/halamanKelolaPegawai/{{ $adminId }}" class="btn btn-outline-success rounded-pill btn-custom">
        Beranda Kepegawaian
      </a>
      <a href="/admin/todo/pegawai/pegawaiBaru/{{ $adminId }}" class="btn btn-outline-success rounded-pill btn-custom">
        Pegawai Baru
      </a>
    </div>

    <!-- Data Pegawai -->
    <div class="card">
      <div class="card-header bg-success text-white text-center fw-bold">
        Data Pegawai
      </div>
      <div class="card-body p-0">
        @if (count($dataPegawai) < 1)
          <div class="p-4 text-center text-muted">
            <em>Tidak ada data pegawai.</em>
          </div>
        @else
          <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
              <thead class="table-success text-center text-nowrap">
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dataPegawai as $dp)
                  <tr class="text-nowrap">
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $dp->nama }}</td>
                    <td>{{ $dp->jabatan }}</td>
                    <td class="text-center">
                      <div class="d-flex justify-content-center flex-wrap gap-2">
                        <a href="/admin/todo/pegawai/ubahPegawai/{{ $adminId }}/{{ $dp->id }}"
                           class="btn btn-sm btn-outline-primary rounded-pill">
                          Perbarui
                        </a>
                        <a href="/admin/todo/pegawai/hapusPegawai/{{ $adminId }}/{{ $dp->id }}"
                           class="btn btn-sm btn-outline-danger rounded-pill"
                           onclick="return confirm('Apakah Anda yakin ingin menghapus pegawai ini?')">
                          Hapus
                        </a>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @endif
      </div>
    </div>

  </div>
</body>
</html>
