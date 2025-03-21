<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo Selesai</title>
</head>
<body>
    <table>
        <tr>
            <td>No.</td>
            <td>Nama ToDo</td>
        </tr>
        @foreach ( $penugasanSelesai as $ps )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $ps->tugas }}</td>
            <td>
        </tr>
        @endforeach
    </table>
</body>
</html>