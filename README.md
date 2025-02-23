# MVC Base - PHP Native

Selamat datang di **MVC Base**! Ini adalah contoh struktur **Model-View-Controller (MVC)** sederhana berbasis **PHP Native**, dengan routing minimalis, pemuatan otomatis (**autoload**), dan dukungan untuk tema halaman (**CSS & JS**) yang dapat diatur per halaman. Proyek ini cocok untuk Anda yang ingin belajar membuat aplikasi web dengan arsitektur **MVC** tanpa menggunakan framework besar seperti Laravel.

---
## Daftar Isi
- [Fitur Utama](#fitur-utama)
- [Struktur Folder](#struktur-folder)
- [Persiapan & Instalasi](#persiapan--instalasi)
- [Menjalankan Aplikasi](#menjalankan-aplikasi)
- [Konfigurasi Environment](#konfigurasi-environment)
- [Penjelasan Singkat](#penjelasan-singkat)
- [Menambahkan CSS & JS per Halaman](#menambahkan-css--js-per-halaman)
- [Kontribusi](#kontribusi)
- [Lisensi](#lisensi)

---
## Fitur Utama
- **Struktur MVC Sederhana**: Memisahkan logika aplikasi (**Controller**), akses data (**Model**), dan tampilan (**View**).
- **Routing Minimalis**: Menggunakan kelas `App` untuk menangani parsing URL dan pemanggilan **controller/method/parameter**.
- **Autoload**: Memuat file-file di folder `core`, `controllers`, dan `models` secara otomatis.
- **Konfigurasi Melalui .env**: Menyimpan variabel seperti `APP_URL`, kredensial database, dsb.
- **Tampilan Terfolder**: View dapat diorganisir dalam folder, ditambah layout utama yang memudahkan menambahkan **CSS/JS global** dan **khusus halaman**.
- **Tema Khusus per Halaman**: Setiap halaman dapat memuat file **CSS & JS** terpisah.

---
## Struktur Folder
Struktur direktori secara umum:
```
project-root/
├── .env
├── index.php                # File router untuk PHP built-in server
├── app/
│   ├── controllers/
│   │   └── HomeController.php
│   ├── core/
│   │   ├── App.php
│   │   ├── Controller.php
│   │   └── Database.php
│   ├── models/
│   │   ├── Model.php
│   │   └── UserModel.php
│   └── views/
│       ├── layouts/
│       │   └── main.php    # Layout utama
│       └── home/
│           └── index.php   # View halaman Home
└── public/
    ├── index.php            # Front controller aplikasi
    └── assets/
        ├── css/
        │   ├── style.css   # CSS global
        │   └── home.css    # CSS khusus halaman Home
        └── js/
            ├── script.js   # JS global
            └── home.js     # JS khusus halaman Home
```

Penjelasan singkat:
- **`.env`**: Menyimpan konfigurasi aplikasi (URL, database, dsb).
- **`index.php` (root)**: File router untuk PHP built-in server.
- **`app/core`**: Berisi file inti (**App, Controller, Database**).
- **`app/controllers`**: Berisi controller, misal `HomeController`.
- **`app/models`**: Berisi model untuk akses database.
- **`app/views`**: Berisi tampilan. **Folder layouts** menampung layout utama, sedangkan folder lain sesuai dengan halaman terkait.
- **`public/index.php`**: Front controller. Semua request dialihkan ke sini.
- **`public/assets`**: Folder untuk file statis (**CSS, JS, gambar, dsb**).

---
## Persiapan & Instalasi
### Clone Repository
```bash
git clone https://github.com/Dimasnotfound/MVCBase.git
cd repo-name
```
### Buat File .env
Jika belum ada, buat file `.env` di root dengan isi minimal seperti:
```ini
APP_URL=http://localhost:8000
DB_HOST=localhost
DB_NAME=my_database
DB_USER=root
DB_PASS=
```
### Sesuaikan Konfigurasi
- Ubah `APP_URL` sesuai dengan alamat yang akan Anda gunakan.
- Jika membutuhkan koneksi database, sesuaikan `DB_HOST`, `DB_NAME`, `DB_USER`, dan `DB_PASS`.

---
## Menjalankan Aplikasi
Jalankan perintah berikut di terminal dari root proyek:
```bash
php -S localhost:8000
```
Kemudian buka browser dan akses:
```
http://localhost:8000
```
Halaman **Home** akan muncul sesuai dengan template dan tema yang telah ditentukan di **home.css**.

---
## Konfigurasi Environment
File `.env` memungkinkan perubahan variabel tanpa mengubah kode utama:
```ini
APP_URL=http://localhost:8000
DB_HOST=localhost
DB_NAME=your_database
DB_USER=root
DB_PASS=
```
Nilai dari `.env` akan di-load di `index.php` menggunakan `parse_ini_file()`.

---
## Penjelasan Singkat
### **Autoload**
Di `public/index.php`, `spl_autoload_register` akan mencari file dengan nama `$class` di **core, controllers, dan models** secara otomatis.

### **Routing**
- `App.php` di folder **core** mem-parsing URL.
- Segment pertama dianggap sebagai **controller** (`HomeController`).
- Segment kedua dianggap sebagai **method** (`index`).
- Sisanya dianggap sebagai **parameter**.

### **Controller**
- Turunan dari `Controller.php`.
- Berisi method yang memanggil `view($viewPath, $data)` untuk me-render file tampilan.

### **Model**
- Turunan dari `Model.php`.
- Mengakses `Database.php` dan dapat melakukan query ke database (**misalnya `UserModel.php`**).

### **View**
- Diletakkan di folder `app/views`.
- Layout utama di `layouts/main.php` menangani tampilan HTML global.

---
## Menambahkan CSS & JS per Halaman
Di dalam **Controller**, saat memanggil `view()`, sertakan parameter `css` dan `js`. Contoh:
```php
$data = [
    'title' => 'Home Page',
    'css' => ['home.css'],
    'js' => ['home.js']
];
$this->view('home/index', $data);
```
File CSS & JS khusus harus berada di folder `public/assets/css` dan `public/assets/js`.

---
## Kontribusi
1. **Fork** repositori ini.
2. Buat **Branch Fitur**:
   ```bash
   git checkout -b feature/nama-fitur
   ```
3. **Commit** perubahan Anda:
   ```bash
   git commit -m 'Menambahkan fitur X'
   ```
4. **Push ke branch**:
   ```bash
   git push origin feature/nama-fitur
   ```
5. **Buat Pull Request** di GitHub.

---
## Lisensi
Proyek ini menggunakan **MIT License**. Anda bebas menggunakan, memodifikasi, dan mendistribusikan proyek ini untuk keperluan pribadi maupun komersial.

**Selamat Mencoba!** 🚀
Jika mengalami kendala, silakan buka **issue** di GitHub atau kirimkan **pull request** untuk perbaikan. Terima kasih!

