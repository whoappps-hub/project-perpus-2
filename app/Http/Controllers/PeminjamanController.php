<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | DATA PEMINJAMAN
        |--------------------------------------------------------------------------
        */

        $data = Peminjaman::latest()->get();

        /*
        |--------------------------------------------------------------------------
        | STATISTIK
        |--------------------------------------------------------------------------
        */

        $total = Peminjaman::count();

        $dipinjam = Peminjaman::where(
            'status',
            'Dipinjam'
        )->count();

        $dikembalikan = Peminjaman::where(
            'status',
            'Dikembalikan'
        )->count();

        /*
        |--------------------------------------------------------------------------
        | CHART DATA
        |--------------------------------------------------------------------------
        */

        $chartData = Peminjaman::select(
                'judul_buku',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('judul_buku')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $chartLabels = $chartData
            ->pluck('judul_buku')
            ->toArray();

        $chartTotals = $chartData
            ->pluck('total')
            ->toArray();

        return view(
            'peminjaman.index',
            compact(
                'data',
                'total',
                'dipinjam',
                'dikembalikan',
                'chartLabels',
                'chartTotals'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        /*
        |--------------------------------------------------------------------------
        | DAFTAR BUKU
        |--------------------------------------------------------------------------
        */

        $books = [

            'Laskar Pelangi',
            'Bumi Manusia',
            'Harry Potter',
            'Matematika Kelas 10',
            'Kimia Dasar',
            'Filosofi Teras',
            'Atomic Habits',
            'Rich Dad Poor Dad',
            'The Psychology of Money',
            'Deep Work',
            'Think and Grow Rich',
            'The Hobbit',
            'The Alchemist',
            'Negeri 5 Menara',
            'Ayat Ayat Cinta',
            'Dilan 1990',
            'Pemrograman Laravel',
            'Belajar Python',
            'Machine Learning Basics',
            'UI UX Design',
            'Clean Code',
            'The Pragmatic Programmer',
            'Sapiens',
            'Hujan',
            'Pulang',
            'Bulan',
            'Algoritma dan Pemrograman',
            'Basis Data',
            'Desain Grafis Modern',
            'Sejarah Dunia'

        ];

        return view(
            'peminjaman.create',
            compact('books')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'nama_peminjam' => 'required',

            'identitas' => 'required',

            'judul_buku' => 'required',

            'tanggal_pinjam' => 'required',

            'tenggat_kembali' => 'required',

            'status' => 'required'

        ]);

        Peminjaman::create([

            'nama_peminjam' => $request->nama_peminjam,

            'identitas' => $request->identitas,

            'judul_buku' => $request->judul_buku,

            'tanggal_pinjam' => $request->tanggal_pinjam,

            'tenggat_kembali' => $request->tenggat_kembali,

            'status' => $request->status

        ]);

        return redirect()
            ->route('peminjaman.index')
            ->with(
                'success',
                'Data berhasil ditambahkan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | DAFTAR BUKU
        |--------------------------------------------------------------------------
        */

        $books = [

            'Laskar Pelangi',
            'Bumi Manusia',
            'Harry Potter',
            'Matematika Kelas 10',
            'Kimia Dasar',
            'Filosofi Teras',
            'Atomic Habits',
            'Rich Dad Poor Dad',
            'The Psychology of Money',
            'Deep Work',
            'Think and Grow Rich',
            'The Hobbit',
            'The Alchemist',
            'Negeri 5 Menara',
            'Ayat Ayat Cinta',
            'Dilan 1990',
            'Pemrograman Laravel',
            'Belajar Python',
            'Machine Learning Basics',
            'UI UX Design',
            'Clean Code',
            'The Pragmatic Programmer',
            'Sapiens',
            'Hujan',
            'Pulang',
            'Bulan',
            'Algoritma dan Pemrograman',
            'Basis Data',
            'Desain Grafis Modern',
            'Sejarah Dunia'

        ];

        return view(
            'peminjaman.edit',
            compact(
                'peminjaman',
                'books'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        $id
    ) {

        $request->validate([

            'nama_peminjam' => 'required',

            'identitas' => 'required',

            'judul_buku' => 'required',

            'tanggal_pinjam' => 'required',

            'tenggat_kembali' => 'required',

            'status' => 'required'

        ]);

        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([

            'nama_peminjam' => $request->nama_peminjam,

            'identitas' => $request->identitas,

            'judul_buku' => $request->judul_buku,

            'tanggal_pinjam' => $request->tanggal_pinjam,

            'tenggat_kembali' => $request->tenggat_kembali,

            'status' => $request->status

        ]);

        return redirect()
            ->route('peminjaman.index')
            ->with(
                'success',
                'Data berhasil diupdate'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->delete();

        return redirect()
            ->route('peminjaman.index')
            ->with(
                'success',
                'Data berhasil dihapus'
            );
    }
}