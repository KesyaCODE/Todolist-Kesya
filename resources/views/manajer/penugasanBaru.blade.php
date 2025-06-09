<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Penugasan Baru</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/manajer/penugasanBaru.css" />
</head>
<body>
    <div class="container-sm">
        <div class="header-section">
            <h1><i class="fas fa-plus-circle me-3"></i>Penugasan Baru</h1>
            <div class="nav-buttons d-flex flex-wrap gap-2">
                <a class="btn btn-outline-primary" href="/todo/manajer/{{ $adminId }}"><i class="fas fa-home"></i> Beranda</a>
                <a class="btn btn-primary" href="/manajer/todo/penugasanBaru/{{ $adminId }}"><i class="fas fa-plus-circle"></i> Penugasan Baru</a>
                <a class="btn btn-outline-primary" href="/manajer/todo/penugasanSelesai/{{ $adminId }}"><i class="fas fa-check-circle"></i> Tugas Selesai</a>
                <a class="btn btn-outline-primary" href="/manajer/todo/penugasanDitolak/{{ $adminId }}"><i class="fas fa-times-circle"></i> Tugas Ditolak</a> 
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Formulir Penugasan Tugas Baru
            </div>
            <div class="card-body-form">
                <form action="/manajer/todo/simpanPenugasanBaru" method="POST"> @csrf <div class="mb-3">
                        <label for="namaTodo" class="form-label">Nama Tugas</label>
                        <input type="text" name="namaTodo" id="namaTodo" class="form-control" placeholder="Contoh: Cek Inventaris Tahunan" required />
                    </div>
                    <div class="mb-3">
                        <label for="tanggalMulai" class="form-label">Waktu Mulai</label>
                        <input type="date" name="tanggalMulai" id="tanggalMulai" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="tanggalSelesai" class="form-label">Waktu Selesai</label>
                        <input type="date" name="tanggalSelesai" id="tanggalSelesai" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="pemberiTugas" class="form-label">Delegator (Pemberi Tugas)</label>
                        <select name="pemberiTugas" id="pemberiTugas" class="form-select" required>
                            <option value="">Pilih Delegator</option> @foreach ($namaDelegator as $nd)
                                <option value="{{ $nd->id }}">{{ $nd->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="namaPenugas" class="form-label">Pelaksana (Penerima Tugas)</label>
                        <select name="namaPenugas" id="namaPenugas" class="form-select" required>
                            <option value="">Pilih Pelaksana</option> @foreach ($namaPelaksana as $np)
                                <option value="{{ $np->id }}">{{ $np->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success w-100"><i class="fas fa-paper-plane me-2"></i>Tugaskan!</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>