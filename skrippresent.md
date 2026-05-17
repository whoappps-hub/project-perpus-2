SCRIPT PRESENTASI -PERPUSTAKAAN DIGITAL
________________________________________
1. OPENING
Assalamu’alaikum warahmatullahi wabarakatuh.
Pada kesempatan kali ini saya akan mempresentasikan project yang saya kembangkan yaitu:
“Smart Library — Sistem Informasi Perpustakaan Digital Berbasis Laravel”.
Project ini dirancang sebagai transformasi dari sistem pencatatan manual atau log book konvensional menjadi sistem digital yang lebih efisien, scalable, dan terstruktur.
Fokus utama pengembangan bukan hanya CRUD dasar, tetapi juga:
•	visual hierarchy, 
•	realtime analytics, 
•	user experience, 
•	serta maintainability code. 
________________________________________
2. LATAR BELAKANG MASALAH
Pada banyak perpustakaan kecil maupun institusi pendidikan, proses pencatatan peminjaman masih dilakukan secara manual menggunakan buku besar.
Permasalahan utama dari sistem manual adalah:
•	redundansi data, 
•	human error, 
•	pencarian data lambat, 
•	statistik sulit dianalisis, 
•	serta tidak adanya data visualization. 
Karena itu saya membuat sistem ini agar proses administrasi peminjaman menjadi lebih modern dan terdigitalisasi.
________________________________________
3. TECHNOLOGY STACK
Dalam pengembangan sistem ini saya menggunakan beberapa teknologi utama.
Backend:
•	PHP 8 
•	Laravel 10 
Laravel dipilih karena memiliki:
•	MVC architecture, 
•	ORM Eloquent, 
•	routing system, 
•	validation, 
•	serta ecosystem yang mature. 
Frontend:
•	Bootstrap 5 
•	Chart.js 
•	DataTables 
•	SweetAlert2 
Database:
•	MySQL 
Development Tools:
•	Visual Studio Code 
•	Laragon 
________________________________________
4. SOFTWARE ARCHITECTURE
Sistem ini menggunakan konsep MVC atau Model View Controller.
Model
Bertugas menangani interaksi database menggunakan Eloquent ORM.
View
Menggunakan Blade Template Engine untuk rendering tampilan frontend.
Controller
Menjadi penghubung antara business logic dengan tampilan.
Dengan arsitektur ini, code menjadi:
•	modular, 
•	reusable, 
•	lebih mudah maintenance, 
•	dan scalable. 
________________________________________
5. DATABASE DESIGN
Database utama menggunakan tabel:
peminjamen
Dengan struktur field:
•	id 
•	nama_peminjam 
•	identitas 
•	judul_buku 
•	tanggal_pinjam 
•	tenggat_kembali 
•	status 
•	timestamps 
Field status menggunakan enum:
•	Dipinjam 
•	Dikembalikan 
Hal ini bertujuan menjaga konsistensi data serta mempermudah filtering analytics.
________________________________________
TAMPILKAN CODE MIGRATION
$table->enum('status', [

    'Dipinjam',
    'Dikembalikan'

]);
________________________________________
6. IMPLEMENTASI CRUD
CREATE
Pada proses create, user dapat menambahkan data peminjaman baru.
Saya menggunakan form validation Laravel untuk memastikan seluruh field wajib terisi.
Selain itu, judul buku dibuat menggunakan dropdown select agar:
•	tidak terjadi typo, 
•	data lebih konsisten, 
•	dan analytics menjadi valid. 
________________________________________
TAMPILKAN VALIDATION
$request->validate([

    'nama_peminjam' => 'required',

    'identitas' => 'required',

    'judul_buku' => 'required',

    'tanggal_pinjam' => 'required',

    'tenggat_kembali' => 'required',

    'status' => 'required'

]);
________________________________________
READ
Pada halaman dashboard, seluruh data peminjaman ditampilkan menggunakan DataTables.
Implementasi ini memberikan fitur:
•	live search, 
•	pagination, 
•	sorting, 
•	serta responsive table. 
Tujuannya agar pengelolaan data tetap nyaman meskipun jumlah data besar.
________________________________________
UPDATE
Fitur update memungkinkan administrator memperbarui status maupun informasi peminjaman.
Pada bagian edit, dropdown otomatis melakukan selected state berdasarkan data sebelumnya sehingga UX lebih baik dan minim error.
________________________________________
DELETE
Untuk proses delete, saya menggunakan SweetAlert confirmation dialog.
Hal ini penting untuk menghindari accidental deletion karena penghapusan bersifat permanen.
________________________________________
7. DASHBOARD ANALYTICS
Salah satu fitur utama sistem ini adalah analytics dashboard.
Dashboard menampilkan:
•	total peminjaman, 
•	total buku dipinjam, 
•	total buku dikembalikan, 
•	dan grafik buku paling populer. 
Data chart tidak dibuat hardcoded, melainkan diambil langsung dari database menggunakan aggregate query.
________________________________________
TAMPILKAN QUERY ANALYTICS
$chartData = Peminjaman::select(
        'judul_buku',
        DB::raw('COUNT(*) as total')
    )
    ->groupBy('judul_buku')
    ->orderByDesc('total')
    ->limit(5)
    ->get();
________________________________________
PENJELASAN QUERY
Pada query ini:
•	groupBy() digunakan untuk mengelompokkan buku berdasarkan judul, 
•	COUNT(*) menghitung total peminjaman, 
•	orderByDesc() mengurutkan berdasarkan buku terpopuler, 
•	dan limit(5) membatasi hanya lima buku dengan peminjaman tertinggi. 
Kemudian data tersebut dikirim ke frontend menggunakan JSON dan divisualisasikan menggunakan Chart.js.
________________________________________
TAMPILKAN CHART JS
new Chart(ctx, {

    type: 'doughnut',

    data: {

        labels: labels,

        datasets: [{

            data: totals

        }]

    }

});
________________________________________
8. UI / UX ENGINEERING
Pada sisi antarmuka, saya menghindari desain CRUD default yang monoton.
Karena itu saya menerapkan:
•	clean dashboard layout, 
•	modern card system, 
•	smooth hover animation, 
•	visual hierarchy, 
•	soft shadow, 
•	responsive design, 
•	dan gradient styling. 
Selain itu, daftar buku menggunakan real book cover agar tampilan lebih realistis dan profesional.
________________________________________
9. CODE QUALITY
Dalam pengembangan project ini saya juga memperhatikan kualitas code.
Beberapa pendekatan yang saya gunakan:
•	penggunaan resource route, 
•	reusable layout Blade, 
•	separation of concern, 
•	compact variable passing, 
•	serta penggunaan Eloquent ORM dibanding raw SQL biasa. 
Tujuannya agar project lebih maintainable untuk pengembangan jangka panjang.
________________________________________
TAMPILKAN RESOURCE ROUTE
Route::resource(
    'peminjaman',
    PeminjamanController::class
);
________________________________________
10. CHALLENGE SAAT DEVELOPMENT
Beberapa challenge yang saya temui saat development antara lain:
•	sinkronisasi chart realtime, 
•	handling Blade rendering, 
•	validasi data, 
•	serta konsistensi statistik analytics. 
Salah satu challenge terbesar adalah memastikan chart benar-benar dinamis berdasarkan database, bukan data statis.
________________________________________
11. HASIL AKHIR
Hasil akhir dari project ini adalah sistem perpustakaan digital dengan fitur:
•	CRUD lengkap, 
•	analytics dashboard, 
•	responsive UI, 
•	realtime chart, 
•	daftar buku interaktif, 
•	serta modern user interface. 
Sistem ini sudah cukup layak digunakan sebagai fondasi aplikasi perpustakaan skala kecil hingga menengah.
________________________________________
12. FUTURE DEVELOPMENT
Untuk pengembangan berikutnya, sistem ini masih dapat dikembangkan menjadi:
•	authentication multi-role, 
•	QR Code borrowing, 
•	export PDF dan Excel, 
•	notifikasi keterlambatan, 
•	REST API, 
•	serta integrasi mobile application. 
________________________________________
13. PENUTUP
Sekian presentasi project dari saya.
Terima kasih atas perhatian dan waktunya.
Wassalamu’alaikum warahmatullahi wabarakatuh.

