<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail To Do</title>
</head>
<body>
    <center>
        <a href="/todo/user/login">Beranda</a> |
        <a href="/todo/mytodo/selesai">Tugas Selesai</a> |
        <a href="/todo/mytodo/ditolak">Tugas Ditolak</a>
    </center>
    <hr>
        <table align="center" border="0">
            @foreach ( $detailTodo as $detail )
                <form action="/todo/perbaruiTodo/{{ $detail->id }}" method="get">
                    <tr>
                        <td>Nama Tugas</td>
                        <td>{{ $detail->tugas }}</td>
                    </tr>
                    <tr>
                        <td>Waktu Mulai</td>
                        <td>{{ $detail->waktu_mulai }}</td>
                    </tr>
                    <tr>
                        <td>Waktu Selesai</td>
                        <td>{{ $detail->waktu_selesai }}</td>
                    </tr>
                    <tr>
                        <td>Penugasan Oleh</td>
                        <td>{{ $detail->pemberi_tugas }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="statusPekerjaan">
                                <option value="{{ $detail->keterangan }}">{{ $detail->keterangan }}</option>
                                <option value="Dikerjakan">Dikerjakan</option>
                                <option value="Ditolak">Ditolak</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Perbarui"></td>
                    </tr>
                </form>
            @endforeach
        </table>
</body>
</html>