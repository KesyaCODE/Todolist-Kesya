<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas / Todo</title>

    <link rel="stylesheet" href="asset/bootstrap.css" type="text/css">
</head>
<body>
    <p align="right">
        <a href="/">Keluar</a>
    </p>
    <center>
        TUGAS TERSEDIA
    </center>
    <center>
        [ <a href="/todo/admin">Beranda</a> ] |
        [ <a href="/admin/todo/dataPenugasan">ToDo</a> ] | 
        [ <a href="/admin/todo/rincianPenugasan">Rincian ToDo</a> ]
    </center>
    <hr>
    <center>
        [ <a href="/admin/todo/penugasanBaru">ToDo Baru</a> ]
    </center>
    @if (count($dataTodo)<0)
        <center>
            Tidak ada todo!
        </center>
    @else
        <table align="center" class="table-primary">
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
                <td>{{ $loop->iteration }}</td>
                <td><a href="/admin/todo/ubahPenugasan/{{ $dt->id }}">{{ $dt->tugas }}</a></td>
                <td>{{ $dt->waktu_mulai }}</td>
                <td>{{ $dt->waktu_selesai }}</td>
                <td>{{ $dt->nama_pemberi }}</td>
                <td>{{ $dt->nama_penerima }}</td>
                <td>{{ $dt->keterangan }}</td>
                <td><a href="/admin/todo/hapusPenugasan/{{ $dt->id }}"><font color="red">Hapus</font></a></td>
            </tr>
            @endforeach
        </table>
    @endif
</body>
</html>