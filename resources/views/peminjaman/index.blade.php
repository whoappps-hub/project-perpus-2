@extends('layouts.app')

@section('content')

@php
    $total = $total ?? 0;
    $dipinjam = $dipinjam ?? 0;
    $dikembalikan = $dikembalikan ?? 0;
    $chartLabels = $chartLabels ?? [];
    $chartTotals = $chartTotals ?? [];
    $data = $data ?? [];
@endphp

<!-- HERO -->

<div class="hero-dashboard mb-5">

    <div class="row align-items-center">

        <div class="col-lg-7">

            <span class="badge bg-light text-dark px-3 py-2 mb-4">

                Smart Digital Library

            </span>

            <h1>

            
                Management Perpustakaan Digital

            </h1>

            <p>

                Sistem pengelolaan perpustakaan digital
                yang cerdas dan mudah digunakan untuk
                memudahkan peminjaman buku secara online

            </p>

            <div class="mt-4 d-flex gap-3">

                <a href="{{ route('peminjaman.create') }}"
                   class="btn btn-primary">

                    <i class="fa-solid fa-plus"></i>

                    Tambah Peminjaman

                </a>

                <a href="#dataTable"
                   class="btn btn-light">

                    <i class="fa-solid fa-table"></i>

                    Lihat Data

                </a>

            </div>

        </div>

        <!-- CHART (hanya satu canvas di sini) -->

        <div class="col-lg-5">

            <div class="card-box bg-white">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>

                        <h5 class="fw-bold mb-1">

                            Statistik Buku Populer

                        </h5>

                        <small class="text-secondary">

                            Berdasarkan jumlah peminjaman

                        </small>

                    </div>

                    <div>

                        <i class="fa-solid fa-chart-pie fa-xl text-primary"></i>

                    </div>

                </div>

                <div style="height:350px">

                    <canvas id="myChart"></canvas>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- STATISTIC -->

<div class="row mb-5">

    <div class="col-md-4 mb-4">

        <div class="card-box stats-card">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <p>Total Peminjaman</p>

                    <h1>{{ $total }}</h1>

                </div>

                <i class="fa-solid fa-book fa-2x text-primary"></i>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card-box stats-card">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <p>Dipinjam</p>

                    <h1>{{ $dipinjam }}</h1>

                </div>

                <i class="fa-solid fa-book-open-reader fa-2x text-warning"></i>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card-box stats-card">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <p>Dikembalikan</p>

                    <h1>{{ $dikembalikan }}</h1>

                </div>

                <i class="fa-solid fa-circle-check fa-2x text-success"></i>

            </div>

        </div>

    </div>

</div>

<!-- DAFTAR BUKU -->

<div class="card-box mb-5">

    <div class="mb-5">

        <h2 class="fw-bold">

            Koleksi Buku

        </h2>

        <p class="text-secondary">

            Koleksi buku populer perpustakaan digital

        </p>

    </div>

    @php

    $books = [

    [
    "title" => "Atomic Habits",
    "author" => "James Clear",
    "image" => "https://m.media-amazon.com/images/I/81ANaVZk5LL.jpg"
    ],

    [
    "title" => "Rich Dad Poor Dad",
    "author" => "Robert Kiyosaki",
    "image" => "https://m.media-amazon.com/images/I/81bsw6fnUiL.jpg"
    ],

    [
    "title" => "Harry Potter",
    "author" => "J.K Rowling",
    "image" => "https://m.media-amazon.com/images/I/81iqZ2HHD-L.jpg"
    ],

    [
    "title" => "Laskar Pelangi",
    "author" => "Andrea Hirata",
    "image" => "https://upload.wikimedia.org/wikipedia/id/8/8e/Laskar_pelangi_sampul.jpg"
    ],

    [
    "title" => "Bumi Manusia",
    "author" => "Pramoedya Ananta Toer",
    "image" => "https://bukukita.com/babacms/displaybuku/98759_f.jpg"
    ],

    [
    "title" => "The Psychology of Money",
    "author" => "Morgan Housel",
    "image" => "https://m.media-amazon.com/images/I/71g2ednj0JL.jpg"
    ],

    [
    "title" => "Filosofi Teras",
    "author" => "Henry Manampiring",
    "image" => "https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/picture_meta/2023/11/27/kjf6cgigkomf6sy9o5qauu.jpg"
    ],

    [
    "title" => "Dilan 1990",
    "author" => "Pidi Baiq",
    "image" => "https://mojokstore.com/wp-content/uploads/2016/11/Dilan-Dia-Adalah-Dilanku-tahun-1990-Pidi-Baiq-front.jpg"
    ],

    [
    "title" => "Negeri 5 Menara",
    "author" => "Ahmad Fuadi",
    "image" => "https://m.media-amazon.com/images/S/compressed.photo.goodreads.com/books/1249749162i/6688121.jpg"
    ],

    [
    "title" => "Bumi",
    "author" => "Tere Liye",
    "image" => "https://cdn.gramedia.com/uploads/items/9786020332956_Bumi-New-Cover.jpg"
    ],

    [
    "title" => "Pulang",
    "author" => "Tere Liye",
    "image" => "https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/items/pulang_tere_liye.jpeg"
    ],

    [
    "title" => "Hujan",
    "author" => "Tere Liye",
    "image" => "https://www.gramedia.com/blog/content/images/2025/01/Hujan.png"
    ],

    [
    "title" => "Sapiens",
    "author" => "Yuval Noah Harari",
    "image" => "https://m.media-amazon.com/images/I/713jIoMO3UL.jpg"
    ],

    [
    "title" => "Think and Grow Rich",
    "author" => "Napoleon Hill",
    "image" => "https://m.media-amazon.com/images/I/71UypkUjStL.jpg"
    ],

    [
    "title" => "The Alchemist",
    "author" => "Paulo Coelho",
    "image" => "https://m.media-amazon.com/images/I/71aFt4+OTOL.jpg"
    ],

    [
    "title" => "The Subtle Art",
    "author" => "Mark Manson",
    "image" => "https://m.media-amazon.com/images/I/71QKQ9mwV7L.jpg"
    ],

    [
    "title" => "Deep Work",
    "author" => "Cal Newport",
    "image" => "https://m.media-amazon.com/images/I/71m-MxdJ2WL.jpg"
    ],

    [
    "title" => "Ikigai",
    "author" => "Hector Garcia",
    "image" => "https://m.media-amazon.com/images/I/81l3rZK4lnL.jpg"
    ],

    [
    "title" => "Educated",
    "author" => "Tara Westover",
    "image" => "https://m.media-amazon.com/images/I/81WojUxbbFL.jpg"
    ],

    [
    "title" => "The Midnight Library",
    "author" => "Matt Haig",
    "image" => "https://m.media-amazon.com/images/I/81J6APjwxlL.jpg"
    ],

    [
    "title" => "Cantik Itu Luka",
    "author" => "Eka Kurniawan",
    "image" => "https://static.mizanstore.com/d/img/book/cover/cantik-itu-luka-sc-isbn-lama-eka-kurniawan.jpg"
    ],

    [
    "title" => "Laut Bercerita",
    "author" => "Leila S. Chudori",
    "image" => "https://www.gramedia.com/blog/content/images/2020/08/laut-bercerita-leila-s-chudori_gramedia.jpg"
    ],

    [
    "title" => "Ayat Ayat Cinta",
    "author" => "Habiburrahman",
    "image" => "https://upload.wikimedia.org/wikipedia/id/b/b4/Ayatayatcinta.jpg"
    ],

    [
    "title" => "Perahu Kertas",
    "author" => "Dewi Lestari",
    "image" => "https://upload.wikimedia.org/wikipedia/id/thumb/7/7f/Perahu_Kertas_Sampul.jpg/250px-Perahu_Kertas_Sampul.jpg"
    ],

    [
    "title" => "Origin",
    "author" => "Dan Brown",
    "image" => "https://m.media-amazon.com/images/I/91uwocAMtSL.jpg"
    ],

    [
    "title" => "Inferno",
    "author" => "Dan Brown",
    "image" => "https://miro.medium.com/v2/1*-BLLL4-w6g1NKfrl7f1l6A.jpeg"
    ],

    [
    "title" => "Digital Fortress",
    "author" => "Dan Brown",
    "image" => "https://m.media-amazon.com/images/I/81zN7udGRUL.jpg"
    ],

    [
    "title" => "Sherlock Holmes",
    "author" => "Arthur Conan Doyle",
    "image" => "https://cdn.gramedia.com/uploads/picture_meta/2023/6/19/hp4eu9cu4xqa8yshmfmb9g.jpg"
    ],

    [
    "title" => "To Kill a Mockingbird",
    "author" => "Harper Lee",
    "image" => "https://m.media-amazon.com/images/I/81O7u0dGaWL._AC_UF1000,1000_QL80_.jpg"
    ],

    [
    "title" => "1984",
    "author" => "George Orwell",
    "image" => "https://m.media-amazon.com/images/I/71kxa1-0mfL.jpg"
    ]

    ];

    @endphp

    <div class="row">

        @foreach($books as $book)

        <div class="col-lg-3 col-md-4 col-6 mb-4">

            <div class="book-card">

                <img src="{{ $book['image'] }}"
                     alt="{{ $book['title'] }}">

                <div class="book-content">

                    <h5>

                        {{ $book['title'] }}

                    </h5>

                    <p>

                        {{ $book['author'] }}

                    </p>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

<!-- DATA TABLE -->

<div class="card-box mb-5"
     id="dataTable">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">

                Data Peminjaman Buku

            </h2>

            <p class="text-secondary">

                Log aktivitas peminjaman perpustakaan

            </p>

        </div>

    </div>

    <div class="table-responsive">

        <table class="table align-middle"
               id="myTable">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Peminjam</th>
                    <th>Identitas</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tenggat</th>
                    <th>Status</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($data as $item)

                <tr>

                    <td>
                        <strong>
                            {{ $loop->iteration }}
                        </strong>
                    </td>

                    <td>
                        <strong>
                            {{ $item->nama_peminjam }}
                        </strong>
                    </td>

                    <td>
                        {{ $item->identitas }}
                    </td>

                    <td>
                        <span class="fw-semibold">
                            {{ $item->judul_buku }}
                        </span>
                    </td>

                    <td>
                        {{ $item->tanggal_pinjam }}
                    </td>

                    <td>
                        {{ $item->tenggat_kembali }}
                    </td>

                    <td>

                        @if($item->status == 'Dipinjam')

                            <span class="badge-dipinjam">

                                Dipinjam

                            </span>

                        @else

                            <span class="badge-kembali">

                                Dikembalikan

                            </span>

                        @endif

                    </td>

                    <td>

                        <div class="d-flex gap-2">

                            <a href="{{ route('peminjaman.edit', $item->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fa-solid fa-pen"></i>

                            </a>

                            <form action="{{ route('peminjaman.destroy', $item->id) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="confirmDelete(event)">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="8" class="text-center text-secondary py-4">

                        Tidak ada data peminjaman.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<!-- FOOTER -->

<footer class="text-center py-4 text-secondary">

    © 2026 Smart Library —
    Modern Digital Library System

</footer>

<!-- CHART JS -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    const labels = {!! json_encode($chartLabels ?? []) !!};
    const totals = {!! json_encode($chartTotals ?? []) !!};

    function initChart() {
        const canvas = document.getElementById('myChart');
        if (!canvas) return;

        if (!Array.isArray(labels) || !Array.isArray(totals) || labels.length === 0 || totals.length === 0) {
            return;
        }

        const ctx = canvas.getContext('2d');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: totals,
                    backgroundColor: ['#2563EB', '#0EA5E9', '#8B5CF6', '#F59E0B', '#22C55E'],
                    hoverOffset: 12,
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom', labels: { padding: 20, font: { size: 13, weight: '600' } } },
                    tooltip: { backgroundColor: '#0F172A', padding: 12, cornerRadius: 12 }
                },
                animation: { animateRotate: true, duration: 1800 },
                cutout: '68%'
            }
        });
    }

    function confirmDelete(e) {
        e = e || window.event;
        if (e) e.preventDefault();
        if (confirm('Hapus data peminjaman ini?')) {
            const btn = e.target || e.srcElement;
            const form = btn.closest('form');
            if (form) form.submit();
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        initChart();
    });

</script>

@endsection