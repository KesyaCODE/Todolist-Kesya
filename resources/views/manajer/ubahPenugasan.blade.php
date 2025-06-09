<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penugasan Baru</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/css/manajer/ubahPenugasan.css" />
</head>
<body>
    {{-- <div class="container-sm py-4"> --}}
    <div class="main-content-container">
                <div class="nav-buttons-wrapper ">
        <div class="nav-buttons">
            <a class="btn btn-outline-primary" href="/todo/manajer/{{ $adminId }}">
                <i class="fas fa-home"></i> Beranda
            </a>
            {{-- <a class="btn btn-outline-primary" href="/manajer/todo/penugasanBaru/{{ $adminId }}">
                <i class="fas fa-plus-circle"></i> Penugasan Baru
            </a>
            <a class="btn btn-outline-primary" href="/manajer/todo/penugasanSelesai/{{ $adminId }}">
                <i class="fas fa-check-circle"></i> Tugas Selesai
            </a>
            <a class="btn btn-outline-primary" href="/manajer/todo/penugasanDitolak/{{ $adminId }}">
                <i class="fas fa-times-circle"></i> Tugas Ditolak
            </a>  --}}
        </div>
    </div>

        <div class="card">
            <div class="card-header">
                <i class="fas fa-edit me-2"></i> Ubah Data Tugas
            </div>
            <div class="card-body">
                @foreach ( $detailTodo as $dt )
                <form action="/manajer/todo/simpanPerubahanPenugasan/{{ $dt->id }}/{{ $adminId }}" method="get">
                    @csrf
                    <table>
                        <tr>
                            <td>Nama Tugas</td>
                            <td><input type="text" name="namaTodo" value="{{ $dt->tugas }}" class="form-control"></td>
                        </tr>
                        <?php
                            //format tanggal dalam SQL ke HTML
                            $tanggalMulai = date('Y-m-d', strtotime($dt->waktu_mulai)); 
                            $tanggalSelesai = date('Y-m-d', strtotime($dt->waktu_selesai));
                        ?>
                        <tr>
                            <td>Waktu Mulai</td>
                            <td><input type="date" name="tanggalMulai" value="{{ $tanggalMulai }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Waktu Selesai</td>
                            <td><input type="date" name="tanggalSelesai" value="{{ $tanggalSelesai }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Delegator</td>
                            <td>
                                <select name="pemberiTugas" class="form-control">
                                    <option selected value="{{ $dt->tugas_dari }}">{{ $dt->nama_pemberi }}</option>
                                    @foreach ( $delegator as $d )
                                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Pelaksana</td>
                            <td>
                                <select name="namaPenugas" class="form-control">
                                    <option selected value="{{ $dt->tugas_untuk }}">{{ $dt->nama_penerima}}</option>
                                    @foreach ( $pelaksana as $p )
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Ubah Penugasan" class="btn-submit"></td>
                        </tr>
                    </table>
                </form>
                @endforeach
            </div>
        </div>
    </div>
    {{-- </div> --}}
</body>
</html>