@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-8">

        <!-- HERO -->

        <div class="hero-dashboard mb-4">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <span class="badge bg-light text-dark px-3 py-2 mb-4">

                        Create Borrowing Data

                    </span>

                    <h1>

                        Tambah
                        Data Peminjaman

                    </h1>

                    <p>

                        Tambahkan data peminjaman buku
                        ke dalam sistem perpustakaan digital
                        modern dengan tampilan premium
                        dan interaktif.

                    </p>

                </div>

                <div class="col-lg-4 text-center">

                    <i class="fa-solid fa-book-bookmark"
                       style="
                       font-size:120px;
                       color:rgba(255,255,255,0.15);
                       ">

                    </i>

                </div>

            </div>

        </div>

        <!-- FORM -->

        <div class="card-box">

            <div class="d-flex justify-content-between align-items-center mb-5">

                <div>

                    <h3 class="fw-bold mb-1">

                        Form Peminjaman Buku

                    </h3>

                    <p class="text-secondary mb-0">

                        Lengkapi data dengan benar

                    </p>

                </div>

                <a href="{{ route('peminjaman.index') }}"
                   class="btn btn-dark">

                    <i class="fa-solid fa-arrow-left"></i>

                    Kembali

                </a>

            </div>

            <form action="{{ route('peminjaman.store') }}"
                  method="POST"
                  id="createForm">

                @csrf

                <!-- NAMA -->

                <div class="mb-4">

                    <label class="form-label fw-semibold mb-2">

                        Nama Peminjam

                    </label>

                    <input type="text"
                           name="nama_peminjam"
                           class="form-control"
                           placeholder="Masukkan nama peminjam"
                           required>

                </div>

                <!-- IDENTITAS -->

                <div class="mb-4">

                    <label class="form-label fw-semibold mb-2">

                        NIM / NIP

                    </label>

                    <input type="text"
                           name="identitas"
                           class="form-control"
                           placeholder="Masukkan identitas"
                           required>

                </div>

                <!-- JUDUL BUKU -->

                <div class="mb-4">

                    <label class="form-label fw-semibold mb-2">

                        Judul Buku

                    </label>

                    <select name="judul_buku"
                            class="form-select"
                            required>

                        <option value="">

                            -- Pilih Judul Buku --

                        </option>

                        @foreach($books as $book)

                            <option value="{{ $book }}">

                                {{ $book }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- TANGGAL -->

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold mb-2">

                            Tanggal Pinjam

                        </label>

                        <input type="date"
                               name="tanggal_pinjam"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold mb-2">

                            Tenggat Kembali

                        </label>

                        <input type="date"
                               name="tenggat_kembali"
                               class="form-control"
                               required>

                    </div>

                </div>

                <!-- STATUS -->

                <div class="mb-5">

                    <label class="form-label fw-semibold mb-2">

                        Status Buku

                    </label>

                    <select name="status"
                            class="form-select"
                            required>

                        <option value="Dipinjam">

                            Dipinjam

                        </option>

                        <option value="Dikembalikan">

                            Dikembalikan

                        </option>

                    </select>

                </div>

                <!-- BUTTON -->

                <div class="d-flex gap-3">

                    <button type="submit"
                            class="btn btn-primary"
                            id="submitBtn">

                        <i class="fa-solid fa-floppy-disk"></i>

                        Simpan Data

                    </button>

                    <a href="{{ route('peminjaman.index') }}"
                       class="btn btn-secondary">

                        Batal

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

document
.getElementById('createForm')
.addEventListener('submit', function() {

    document.getElementById('submitBtn').innerHTML = `

        <span class="spinner-border spinner-border-sm"></span>

        Menyimpan...

    `;

});

</script>

@endsection