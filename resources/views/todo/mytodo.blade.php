<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My To Do</title>
</head>
<body>
    <center>
        <a href="/todo/user/login">Beranda</a> |
        <a href="/todo/mytodo/selesai">Tugas Selesai</a> |
        <a href="/todo/mytodo/ditolak">Tugas Ditolak</a>
    </center>
    <hr>
@if (count($daftarTugas)>0)
<table border="1" align="center">
        <tr>
            <td>No.</td>
            <td>Tugas Tersedia</td>
        </tr>
        @foreach ( $daftarTugas as $tugas )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="/todo/detailTugas/{{ $tugas->id }}">{{ $tugas->tugas }}</a></td>
        </tr>
        @endforeach
    </table>
    @else
    <center>Tidak ada tugas baru!</center>
@endif
</body>
</html>