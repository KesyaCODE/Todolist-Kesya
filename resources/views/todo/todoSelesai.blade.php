<center>
        <a href="/todo/user/login">Beranda</a> |
        <a href="/todo/mytodo/selesai">Tugas Selesai</a> |
        <a href="/todo/mytodo/ditolak">Tugas Ditolak</a>
</center>
<hr>
<center>
    Tugas Selesai
</center>
<table border="1" align="center">
    <tr>
        <td>No.</td>
        <td>Nama Tugas</td>
        <td>Tugas Dimulai</td>
        <td>Selesai</td>
        <td>Status</td>
    </tr>
    @foreach ( $todoSelesai as $ts )
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $ts->tugas }}</td>
        <td>{{ $ts->waktu_mulai }}</td>
        <td>{{ $ts->waktu_selesai }}</td>
        <td><b><font color="green">{{ $ts->keterangan }}</font></b></td>
    </tr>
    @endforeach
</table>