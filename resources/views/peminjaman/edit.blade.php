@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-8">

        <!-- HERO -->

        <div class="hero-dashboard mb-4">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <span class="badge bg-light text-dark px-3 py-2 mb-4">

                        Smart Digital Library

                    </span>

                    <h1>

                        Edit
                        Data Peminjaman

                    </h1>

                    <p>

                        Update data peminjaman buku.

                    </p>

                </div>

                <div class="col-lg-4 text-center">

                    <i class="fa-solid fa-pen-to-square"
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

                        Update Form Peminjaman

                    </h3>

                    <p class="text-secondary mb-0">

                        Perbarui data dengan benar

                    </p>

                </div>

                <a href="{{ route('peminjaman.index') }}"
                   class="btn btn-dark">

                    <i class="fa-solid fa-arrow-left"></i>

                    Kembali

                </a>

            </div>

            <form action="{{ route('peminjaman.update', $peminjaman->id) }}"
                  method="POST"
                  id="editForm">

                @csrf
                @method('PUT')

                <!-- NAMA -->

                <div class="mb-4">

                    <label class="form-label fw-semibold mb-2">

                        Nama Peminjam

                    </label>

                    <input type="text"
                           name="nama_peminjam"
                           value="{{ $peminjaman->nama_peminjam }}"
                           class="form-control"
                           required>

                </div>

                <!-- IDENTITAS -->

                <div class="mb-4">

                    <label class="form-label fw-semibold mb-2">

                        NIM / NIP

                    </label>

                    <input type="text"
                           name="identitas"
                           value="{{ $peminjaman->identitas }}"
                           class="form-control"
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

                        @foreach($books as $book)

                            <option value="{{ $book }}"
                                {{ $peminjaman->judul_buku == $book ? 'selected' : '' }}>

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
                               value="{{ $peminjaman->tanggal_pinjam }}"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold mb-2">

                            Tenggat Kembali

                        </label>

                        <input type="date"
                               name="tenggat_kembali"
                               value="{{ $peminjaman->tenggat_kembali }}"
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

                        <option value="Dipinjam"
                            {{ $peminjaman->status == 'Dipinjam' ? 'selected' : '' }}>

                            Dipinjam

                        </option>

                        <option value="Dikembalikan"
                            {{ $peminjaman->status == 'Dikembalikan' ? 'selected' : '' }}>

                            Dikembalikan

                        </option>

                    </select>

                </div>

                <!-- BUTTON -->

                <div class="d-flex gap-3">

                    <button type="submit"
                            class="btn btn-primary"
                            id="updateBtn">

                        <i class="fa-solid fa-pen"></i>

                        Update Data

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
.getElementById('editForm')
.addEventListener('submit', function() {

    document.getElementById('updateBtn').innerHTML = `

        <span class="spinner-border spinner-border-sm"></span>

        Mengupdate...

    `;

});

</script>

@endsection