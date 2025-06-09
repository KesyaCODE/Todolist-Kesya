<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Penugasan Selesai</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/manajer/penugasanSelesai.css" />
</head>
<body>
    <div class="container-sm">
        <div class="header-section">
            <h1><i class="fas fa-check-circle me-3"></i>Penugasan Selesai</h1>
            <div class="nav-buttons d-flex flex-wrap gap-2">
                <a class="btn btn-outline-primary" href="/todo/manajer/{{ $adminId }}"><i class="fas fa-home"></i> Beranda</a>
                <a class="btn btn-outline-primary" href="/manajer/todo/penugasanBaru/{{ $adminId }}"><i class="fas fa-plus-circle"></i> Penugasan Baru</a>
                <a class="btn btn-primary" href="/manajer/todo/penugasanSelesai/{{ $adminId }}"><i class="fas fa-check-circle"></i> Tugas Selesai</a>
                <a class="btn btn-outline-primary" href="/manajer/todo/penugasanDitolak/{{ $adminId }}"><i class="fas fa-times-circle"></i> Tugas Ditolak</a> 
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Daftar Penugasan yang Telah Selesai
            </div>
            <div class="card-body">
                @if (count($penugasanSelesai) < 1)
                    <div class="text-center no-data-message">
                        <i class="fas fa-box-open fa-2x mb-3 text-muted"></i>
                        <h6>Tidak ada penugasan yang telah selesai.</h6>
                        <p class="text-muted">Semua tugas menanti untuk diselesaikan!</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th style="width: 50px;" class="text-center">No.</th>
                                    <th>Nama Tugas</th>
                                    <th>Waktu Penugasan</th>
                                    <th>Waktu Selesai</th>
                                    <th>Pemberi</th>
                                    <th>Pelaksana</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penugasanSelesai as $ps)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $ps->tugas }}</td>
                                        <td>{{ \Carbon\Carbon::parse($ps->waktu_mulai)->format('d M Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($ps->waktu_selesai)->format('d M Y') }}</td>
                                        <td>{{ $ps->nama_pemberi }}</td>
                                        <td>{{ $ps->nama_penerima }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>