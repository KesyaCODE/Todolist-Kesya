<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pegawai Baru</title>
    <link rel="stylesheet" type="text/css" href="/assets/bootstrap.css">
</head>
<body>
    <br>
            <a class="btn btn-outline-primary btn-sm rounded text-center" style="width: 140px;" href="/todo/admin/{{ $adminId }}">
                Beranda
            </a>
            <a class="btn btn-outline-primary btn-sm rounded text-center" style="width: 140px;" href="/admin/todo/halamanKelolaPegawai/{{ $adminId }}">
                Beranda Kegawaian
            </a>
            <a class="btn btn-outline-primary btn-sm rounded text-center" style="width: 140px;" href="/admin/todo/pegawai/pegawaiBaru/{{ $adminId }}">
                Pegawai Baru
            </a>
        <hr>
    <form action="/admin/todo/pegawai/simpanPerubahanPegawai/{{ $adminId }}/{{ $pegawai->id }}" method="post">
        @csrf
        <h4>Ubah Data Pegawai</h4>            
        <div class="container-lg">
            <table>
                <tr>
                    <td>
                        <label for="nama" class="form-label">ID Pegawai</label>
                    </td>
                    <td>
                        <label for="nama" class="form-label">{{ $pegawai->id }}</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nama" class="form-label">Nama Pegawai</label>
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm" id="nama" name="ubahNamaPegawai" value="{{ $pegawai->nama }}" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="jabatanPegawai" class="form-label">Jabatan</label>
                    </td>
                    <td>
                        <select class="form-select form-select-sm" id="jabatanPegawai" name="ubahJabatanPegawai">
                            <option value="{{ $pegawai->jabatan }}" selected>{{ $pegawai->jabatan }}</option>
                            @foreach (['CEO', 'Manajer', 'Staff'] as $jabatan)
                                @if ($jabatan !== $pegawai->jabatan)
                                    <option value="{{ $jabatan }}">{{ $jabatan }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="jabatanPegawai" class="form-label">Nama Pengguna</label>
                    </td>
                    <td>
                       <input type="text" class="form-control form-control-sm" id="nama" name="ubahNamaPengguna" value="{{ $pegawaiLogin->nama_pengguna ?? ''}}" required> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="jabatanPegawai" class="form-label">Kata Sandi</label>
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm" id="nama" name="ubahKataSandi"  value="{{ $pegawaiLogin->kata_sandi ?? '' }}" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary">Simpan Pembaruan</button> 
                    </td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>