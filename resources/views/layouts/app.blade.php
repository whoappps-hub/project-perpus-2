<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Smart Library
    </title>

    <!-- BOOTSTRAP -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- FONT AWESOME -->

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <!-- GOOGLE FONT -->

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <!-- DATATABLE -->

    <link rel="stylesheet"
          href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

    <!-- SWEETALERT -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>

        /*
        |--------------------------------------------------------------------------
        | GLOBAL
        |--------------------------------------------------------------------------
        */

        * {

            font-family: 'Plus Jakarta Sans', sans-serif;

        }

        body {

            background: #F1F5F9;

            color: #0F172A;

        }

        a {

            text-decoration: none;

        }

        /*
        |--------------------------------------------------------------------------
        | NAVBAR
        |--------------------------------------------------------------------------
        */

        .navbar-custom {

            background: white;

            padding: 18px 0;

            box-shadow: 0 4px 20px rgba(0,0,0,0.04);

            margin-bottom: 35px;

        }

        .logo-box {

            width: 45px;
            height: 45px;

            border-radius: 14px;

            background: linear-gradient(
                135deg,
                #2563EB,
                #4F46E5
            );

            display: flex;

            align-items: center;

            justify-content: center;

            color: white;

            font-size: 18px;

        }

        .brand-title {

            font-weight: 800;

            font-size: 20px;

            margin-bottom: 0;

        }

        .brand-subtitle {

            font-size: 12px;

            color: #64748B;

            margin-bottom: 0;

        }

        /*
        |--------------------------------------------------------------------------
        | HERO
        |--------------------------------------------------------------------------
        */

        .hero-dashboard {

            background: linear-gradient(
                135deg,
                #1E3A8A,
                #2563EB,
                #4F46E5
            );

            border-radius: 28px;

            padding: 60px;

            color: white;

            overflow: hidden;

            position: relative;

        }

        .hero-dashboard::before {

            content: '';

            position: absolute;

            width: 400px;
            height: 400px;

            background: rgba(255,255,255,0.05);

            border-radius: 50%;

            top: -120px;
            right: -120px;

        }

        .hero-dashboard h1 {

            font-size: 52px;

            font-weight: 800;

            line-height: 1.1;

            margin-bottom: 20px;

        }

        .hero-dashboard p {

            color: rgba(255,255,255,0.85);

            font-size: 17px;

            line-height: 1.8;

            max-width: 650px;

        }

        /*
        |--------------------------------------------------------------------------
        | CARD
        |--------------------------------------------------------------------------
        */

        .card-box {

            background: white;

            border-radius: 24px;

            padding: 30px;

            box-shadow:
                0 10px 30px rgba(15,23,42,0.05);

            transition: 0.3s;

        }

        .card-box:hover {

            transform: translateY(-4px);

        }

        /*
        |--------------------------------------------------------------------------
        | STATS
        |--------------------------------------------------------------------------
        */

        .stats-card h1 {

            font-size: 42px;

            font-weight: 800;

        }

        .stats-card p {

            color: #64748B;

            margin-bottom: 10px;

            font-weight: 600;

        }

        /*
        |--------------------------------------------------------------------------
        | BUTTON
        |--------------------------------------------------------------------------
        */

        .btn {

            border-radius: 14px;

            padding: 12px 22px;

            font-weight: 600;

            transition: 0.3s;

        }

        .btn-primary {

            background: linear-gradient(
                135deg,
                #2563EB,
                #4F46E5
            );

            border: none;

        }

        .btn-primary:hover {

            transform: translateY(-2px);

        }

        /*
        |--------------------------------------------------------------------------
        | BOOK CARD
        |--------------------------------------------------------------------------
        */

        .book-card {

            background: white;

            border-radius: 22px;

            overflow: hidden;

            transition: 0.35s;

            box-shadow:
                0 8px 25px rgba(15,23,42,0.05);

            height: 100%;

        }

        .book-card:hover {

            transform: translateY(-8px);

        }

        .book-card img {

            width: 100%;

            height: 320px;

            object-fit: cover;

        }

        .book-content {

            padding: 18px;

        }

        .book-content h5 {

            font-size: 16px;

            font-weight: 700;

            margin-bottom: 6px;

        }

        .book-content p {

            color: #64748B;

            margin-bottom: 0;

            font-size: 14px;

        }

        /*
        |--------------------------------------------------------------------------
        | TABLE
        |--------------------------------------------------------------------------
        */

        table.dataTable {

            border-collapse: separate !important;

            border-spacing: 0 14px !important;

        }

        table.dataTable tbody tr {

            background: #F8FAFC;

            transition: 0.3s;

        }

        table.dataTable tbody tr:hover {

            transform: scale(1.01);

            background: #EFF6FF;

        }

        table.dataTable thead th {

            border: none !important;

            background: transparent !important;

            color: #64748B !important;

            font-size: 14px;

            font-weight: 700;

        }

        table.dataTable tbody td {

            border-top: none !important;

            vertical-align: middle;

            padding: 18px !important;

        }

        /*
        |--------------------------------------------------------------------------
        | BADGE
        |--------------------------------------------------------------------------
        */

        .badge-dipinjam {

            background: #FEF3C7;

            color: #92400E;

            padding: 10px 16px;

            border-radius: 999px;

            font-size: 13px;

            font-weight: 700;

        }

        .badge-kembali {

            background: #DCFCE7;

            color: #166534;

            padding: 10px 16px;

            border-radius: 999px;

            font-size: 13px;

            font-weight: 700;

        }

        /*
        |--------------------------------------------------------------------------
        | FORM
        |--------------------------------------------------------------------------
        */

        .form-control,
        .form-select {

            border-radius: 16px;

            padding: 14px 18px;

            border: 1px solid #CBD5E1;

        }

        .form-control:focus,
        .form-select:focus {

            box-shadow: none;

            border-color: #2563EB;

        }

        /*
        |--------------------------------------------------------------------------
        | FOOTER
        |--------------------------------------------------------------------------
        */

        footer {

            font-size: 14px;

        }

        /*
        |--------------------------------------------------------------------------
        | RESPONSIVE
        |--------------------------------------------------------------------------
        */

        @media(max-width:768px) {

            .hero-dashboard {

                padding: 35px;

            }

            .hero-dashboard h1 {

                font-size: 34px;

            }

            .book-card img {

                height: 240px;

            }

        }

    </style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-custom">

    <div class="container">

        <a class="navbar-brand d-flex align-items-center gap-3"
           href="{{ route('peminjaman.index') }}">

            <div class="logo-box">

                <i class="fa-solid fa-book-open"></i>

            </div>

            <div>

                <h5 class="brand-title">

                    Smart Library

                </h5>

                <p class="brand-subtitle">

                    Modern Digital Library

                </p>

            </div>

        </a>

    </div>

</nav>

<!-- CONTENT -->

<div class="container pb-5">

    @if(session('success'))

        <script>

            Swal.fire({

                icon: 'success',

                title: 'Berhasil',

                text: "{{ session('success') }}",

                confirmButtonColor: '#2563EB'

            });

        </script>

    @endif

    @yield('content')

</div>

<!-- JQUERY -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- BOOTSTRAP -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- DATATABLE -->

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<script>

$('#myTable').DataTable({

    responsive: true,

    pageLength: 5,

    language: {

        search: "Cari:",

        lengthMenu: "Tampilkan _MENU_ data",

        info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",

        paginate: {

            previous: "←",

            next: "→"

        }

    }

});

/*
|--------------------------------------------------------------------------
| DELETE ALERT
|--------------------------------------------------------------------------
*/

function confirmDelete(event)
{
    event.preventDefault();

    Swal.fire({

        title: 'Hapus Data?',

        text: 'Data peminjaman akan dihapus permanen',

        icon: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#DC2626',

        cancelButtonColor: '#64748B',

        confirmButtonText: 'Ya, Hapus',

        cancelButtonText: 'Batal'

    }).then((result) => {

        if(result.isConfirmed)
        {
            event.target.closest('form').submit();
        }

    });
}

</script>

</body>
</html>