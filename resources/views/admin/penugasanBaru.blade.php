<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penugasan Baru</title>
</head>
<body>
    <form action="/admin/todo/simpanPenugasanBaru" method="get">
        <table>
            <tr>
                <td>Nama Tugas</td>
                <td><input type="text" name="namaTodo"></td>
            </tr>
            <tr>
                <td>Waktu Mulai</td>
                <td><input type="date" name="tanggalMulai"></td>
            </tr>
            <tr>
                <td>Waktu Selesai</td>
                <td><input type="date" name="tanggalSelesai"></td>
            </tr>
            <tr>
                <td>Delegator</td>
                <td><select name="pemberiTugas">
                    @foreach ( $namaDelegator as $nd )
                        <option value="{{ $nd->id }}">{{ $nd->nama }}</option>
                    @endforeach
                </select></td>
            </tr>
            <tr>
                <td>Pelaksana</td>
                <td><select name="namaPenugas">
                    @foreach ( $namaPelaksana as $np )
                        <option value="{{ $np->id }}">{{ $np->nama }}</option>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tugaskan!"></td>
            </tr>
        </table>
    </form>
</body>
</html>