<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas / Todo</title>

    <link rel="stylesheet" href="/assets/bootstrap.css" type="text/css">
</head>
<body>
    <div class="container-xl">
        <br>
            <a class="btn btn-outline-primary rounded text-center" style="width: 180px;" href="/todo/admin/{{ $adminId }}">
                Beranda
            </a>
            <a class="btn btn-outline-primary rounded text-center" style="width: 180px;" href="/admin/todo/penugasanBaru/{{ $adminId }}">
                Penugasan Baru
            </a>
            <a class="btn btn-outline-primary rounded text-center" style="width: 180px;" href="/admin/todo/penugasanSelesai/{{ $adminId }}">
                Tugas Selesai
            </a> 
            <a class="btn btn-outline-primary rounded text-center" style="width: 180px;" href="/admin/todo/penugasanDitolak/{{ $adminId }}">
                Tugas Ditolak
            </a>
         
        <hr>
        @if (count($dataTodo)<0)
            <center>
                Tidak ada todo!
            </center>
        @else
            <table class="table table-striped table-hover table-bordered align-middle shadow-sm rounded">
                <tr class="table-primary">
                    <td>No.</td>
                    <td>Penugasan</td>
                    <td>Waktu Mulai</td>
                    <td>Waktu Selesai</td>
                    <td>Delegator</td>
                    <td>Delegasi</td>
                    <td>Status</td>
                    <td>Keterangan</td>
                </tr>
                @foreach ( $dataTodo as $dt )
                <tr>
                    <td align="center">{{ $loop->iteration }}</td>
                    <td><a class="text-decoration-none" href="/admin/todo/ubahPenugasan/{{ $dt->id }}">{{ $dt->tugas }}</a></td>
                    <td>{{ $dt->waktu_mulai }}</td>
                    <td>{{ $dt->waktu_selesai }}</td>
                    <td>{{ $dt->nama_pemberi }}</td>
                    <td>{{ $dt->nama_penerima }}</td>
                    <td>
                        @if ($dt->keterangan == 'Selesai')
                            <span class="badge text-bg-success">
                                Selesai
                            </span>
                        @elseif ($dt->keterangan == 'Ditolak')
                            <span class="badge text-bg-warning">
                                Ditolak
                            </span>
                        @elseif ($dt->keterangan == 'Ditugaskan')
                            <span class="badge text-bg-info">
                                Ditugaskan
                            </span>
                        @endif
                    </td>
                    <td align="center">
                        <a class="text-decoration-none" href="/admin/todo/hapusPenugasan/{{ $dt->id }}">
                            <span class="badge text-bg-danger">Hapus</span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
        @endif
    </div>
</body>
</html>