<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pegawai Baru</title>
    <link rel="stylesheet" type="text/css" href="/assets/bootstrap.css">
</head>
<body>
    <form action="/admin/todo/pegawai/simpanPegawaiBaru/{{ $adminId }}" method="post">
        @csrf
        <h4>Tambah Pegawai Baru</h4>            
        <div class="container-lg">
            <table>
                <tr>
                    <td>
                        <label for="nama" class="form-label">Nama Pegawai</label>
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm" id="nama" name="namaPegawai" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="jabatanPegawai" class="form-label">Jabatan</label>
                    </td>
                    <td>
                        <select class="form-select form-select-sm" id="jabatanPegawai" name="jabatanPegawai">
                            <option value="CEO">CEO</option>
                            <option value="Manajer">Manajer</option>
                            <option value="Staff" selected>Staff</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="jabatanPegawai" class="form-label">Nama Pengguna</label>
                    </td>
                    <td>
                       <input type="text" class="form-control form-control-sm" id="nama" name="namaPengguna" required> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="jabatanPegawai" class="form-label">Kata Sandi</label>
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm" id="nama" name="kataSandi" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary">Simpan</button> 
                    </td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>