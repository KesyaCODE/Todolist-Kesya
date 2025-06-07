<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Penugasan Baru</title>

  <link rel="stylesheet" href="/assets/bootstrap.css" />
  <style>
    body {
      padding-top: 15px;
    }
  </style>
</head>
<body>
  <div class="container-lg">

    <div class="mb-3 d-flex flex-wrap gap-2 justify-content-center">
      <a href="/todo/admin/{{ $adminId }}" class="btn btn-outline-primary rounded" style="width: 180px;">
        Beranda
      </a>
      <a href="/admin/todo/dataPenugasan/{{ $adminId }}" class="btn btn-outline-primary rounded" style="width: 180px;">
        Rekap Penugasan
      </a>
      <a href="/admin/todo/penugasanSelesai/{{ $adminId }}" class="btn btn-outline-primary rounded" style="width: 180px;">
        Tugas Selesai
      </a>
      <a href="/admin/todo/penugasanDitolak/{{ $adminId }}" class="btn btn-outline-primary rounded" style="width: 180px;">
        Tugas Ditolak
      </a>
    </div>

    <h4 class="text-center mb-4">Ubah Data Tugas</h4>

    @foreach ($detailTodo as $dt)
    <?php
      $tanggalMulai = date('Y-m-d', strtotime($dt->waktu_mulai));
      $tanggalSelesai = date('Y-m-d', strtotime($dt->waktu_selesai));
    ?>
    <form action="/admin/todo/simpanPerubahanPenugasan/{{ $dt->id }}/{{ $adminId }}" method="get" class="needs-validation" novalidate>
      @csrf

      <div class="mb-3 row">
        <label for="namaTodo" class="col-sm-3 col-form-label">Nama Tugas</label>
        <div class="col-sm-9">
          <input
            type="text"
            class="form-control form-control-lg"
            id="namaTodo"
            name="namaTodo"
            value="{{ $dt->tugas }}"
            required
          />
          <div class="invalid-feedback">Nama Tugas wajib diisi.</div>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="tanggalMulai" class="col-sm-3 col-form-label">Waktu Mulai</label>
        <div class="col-sm-9">
          <input
            type="date"
            class="form-control"
            id="tanggalMulai"
            name="tanggalMulai"
            value="{{ $tanggalMulai }}"
            required
          />
          <div class="invalid-feedback">Tanggal mulai wajib dipilih.</div>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="tanggalSelesai" class="col-sm-3 col-form-label">Waktu Selesai</label>
        <div class="col-sm-9">
          <input
            type="date"
            class="form-control"
            id="tanggalSelesai"
            name="tanggalSelesai"
            value="{{ $tanggalSelesai }}"
            required
          />
          <div class="invalid-feedback">Tanggal selesai wajib dipilih.</div>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="pemberiTugas" class="col-sm-3 col-form-label">Delegator</label>
        <div class="col-sm-9">
          <select class="form-select" id="pemberiTugas" name="pemberiTugas" required>
            <option selected value="{{ $dt->tugas_dari }}">{{ $dt->nama_pemberi }}</option>
            @foreach ($delegator as $d)
              <option value="{{ $d->id }}">{{ $d->nama }}</option>
            @endforeach
          </select>
          <div class="invalid-feedback">Delegator wajib dipilih.</div>
        </div>
      </div>

      <div class="mb-4 row">
        <label for="namaPenugas" class="col-sm-3 col-form-label">Pelaksana</label>
        <div class="col-sm-9">
          <select class="form-select" id="namaPenugas" name="namaPenugas" required>
            <option selected value="{{ $dt->tugas_untuk }}">{{ $dt->nama_penerima }}</option>
            @foreach ($pelaksana as $p)
              <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
          </select>
          <div class="invalid-feedback">Pelaksana wajib dipilih.</div>
        </div>
      </div>

      <div class="text-end">
        <button type="submit" class="btn btn-outline-primary rounded">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-floppy2 me-2"
            viewBox="0 0 16 16"
          >
            <path
              d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v3.5A1.5 1.5 0 0 1 11.5 6h-7A1.5 1.5 0 0 1 3 4.5V1H1.5a.5.5 0 0 0-.5.5m9.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z"
            />
          </svg>
          Simpan Pembaruan
        </button>
      </div>
    </form>
    @endforeach
  </div>

  <script>
    // Bootstrap 5 form validation example (optional)
    (() => {
      'use strict';
      const forms = document.querySelectorAll('.needs-validation');
      Array.from(forms).forEach((form) => {
        form.addEventListener(
          'submit',
          (event) => {
            if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          },
          false
        );
      });
    })();
  </script>
</body>
</html>
