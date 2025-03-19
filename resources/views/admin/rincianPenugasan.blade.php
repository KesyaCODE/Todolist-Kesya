<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rincian ToDo</title>
</head>
<body>
<center>
        [ <a href="/admin/todo/dataPenugasan">Beranda Tugas</a> ] | 
        [ <a href="/admin/todo/penugasanSelesai">Tugas Selesai</a> ] | 
        [ <a href="/admin/todo/penugasanDitolak">Tugas Ditolak</a> ] | 
        [ <a href="/admin/todo/rincianPenugasan">Rincian Penugasan</a> ]
</center>
<hr>
    <table border="1" align="center">
        <tr>
            <td colspan="2">Rincian Data ToDo</td>
        </tr>
        <tr>
            <td>Ditugaskan</td>
            <td>{{ count($ditugaskan) }}</td>
        </tr>
        <tr>
            <td>Ditolak</td>
            <td>{{ count($ditolak) }}</td>
        </tr>
        <tr>
            <td>Diselesaikan</td>
            <td>{{ count($diselesaikan) }}</td>
        </tr>
    </table>
</body>
</html>