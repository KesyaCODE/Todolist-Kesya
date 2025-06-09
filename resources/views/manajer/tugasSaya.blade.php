<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Dashboard Penugasan Manajer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/manajer/tugasSaya.css" />
</head>
<body>
    <div class="container-sm py-4">
        <div class="header-section">
            <h1><i class="fas fa-clipboard-list me-3"></i>Dashboard Penugasan Manajer</h1>
            <div class="nav-buttons d-flex flex-wrap gap-2">
                <a class="btn btn-outline-primary" href="/todo/manajer/{{ $adminId }}"><i class="fas fa-home"></i> Beranda</a>
                {{-- <a class="btn btn-outline-primary" href="/manajer/todo/penugasanBaru/{{ $adminId }}"><i class="fas fa-plus-circle"></i> Penugasan Baru</a> --}}
                {{-- <a class="btn btn-outline-primary" href="/manajer/todo/penugasanSelesai/{{ $adminId }}"><i class="fas fa-check-circle"></i> Tugas Selesai</a> --}}
                {{-- <a class="btn btn-outline-primary" href="/manajer/todo/penugasanDitolak/{{ $adminId }}"><i class="fas fa-times-circle"></i> Tugas Ditolak</a>  --}}
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Daftar Khusus Saya
            </div>
            <div class="card-body p-0">
                @if (count($tugasSaya) < 1)
                    <div class="text-center no-data-message">
                        <i class="fas fa-exclamation-circle fa-2x mb-3 text-muted"></i>
                        <h6>Tidak ada penugasan yang tersedia saat ini!</h6>
                        <p class="text-muted">Mulai dengan menambahkan penugasan baru.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>Penugasan</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Delegator</th>
                                    <th>Delegasi</th>
                                    <th>Status</th>
                                    <th class="text-center" style="width: 120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tugasSaya as $dt)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="/manajer/todo/ubahPenugasan/{{ $dt->id }}/{{ $adminId }}" class="text-decoration-none fw-semibold text-dark hover-underline">
                                            {{ $dt->tugas }}
                                        </a>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($dt->waktu_mulai)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($dt->waktu_selesai)->format('d M Y') }}</td>
                                    <td>{{ $dt->nama_pemberi }}</td>
                                    <td>{{ $dt->nama_penerima }}</td>
                                    <td>
                                        @if ($dt->keterangan == 'Selesai')
                                            <span class="badge bg-success"><i class="fas fa-check-circle"></i> Selesai</span>
                                        @elseif ($dt->keterangan == 'Ditolak')
                                            <span class="badge bg-danger"><i class="fas fa-times-circle"></i> Ditolak</span>
                                        @elseif ($dt->keterangan == 'Ditugaskan')
                                            <span class="badge bg-info"><i class="fas fa-hourglass-half"></i> Ditugaskan</span>
                                        @else
                                            <span class="badge bg-secondary"><i class="fas fa-question-circle"></i> Unknown</span>
                                        @endif
                                    </td>
                                    <td class="text-center action-btns">
                                        <a href="/manajer/todo/ubahPenugasan/{{ $dt->id }}/{{ $adminId }}" class="btn btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="/manajer/todo/hapusPenugasan/{{ $dt->id }}/{{ $adminId }}" class="btn btn-outline-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus tugas ini?')" data-bs-toggle="tooltip" data-bs-placement="top">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Inisialisasi Tooltips Bootstrap
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>
</html>