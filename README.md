<a href="https://webapps.bps.go.id/pikart" target="_blank">![argon-react](https://user-images.githubusercontent.com/8605473/223917590-a10d50d3-4e29-48d6-b0b4-12bf5e62a71b.png)
    </a>
  
  
  
## Tentang Pikart

Pikart adalah website bank gambar yang di buat untuk memnuhi kebutuhan penyimpanan aset digital Badan Pusat Statistik.
Pengguna dapat melakukan permintaan gambar shutterstock dan freepik melalui pikart kemudian akan diunduhkan oleh petugas dari Direktorat Diseminasi Statistik.

Aset digital yang sudah diunggah oleh petugas dapat diakses bersama oleh seluruh pegawai BPS seluruh Indonesia.

## Petunjuk Instalasi

Untuk menggunakan aplikasi Pikart, pengguna cukup akses ke https://webapps.bps.go.id/pikart.

## Framework Yang Digunakan

Laravel adalah framework yang digunakan dalam pembuatan aplikasi Pikart dengan sintaks yang ekspresif dan elegan. 
Laravel menghilangkan kesulitan dari pengembangan dengan mengurangi tugas-tugas umum yang digunakan di banyak proyek web, seperti:

- [Mesin perutean sederhana dan cepat](https://laravel.com/docs/routing).
- [Kontainer injeksi ketergantungan yang kuat](https://laravel.com/docs/container).
- Beberapa back-end untuk penyimpanan [sesi](https://laravel.com/docs/session) dan [cache](https://laravel.com/docs/cache).
- [ORM basis data] yang ekspresif dan intuitif (https://laravel.com/docs/eloquent).
- Database agnostik [migrasi skema](https://laravel.com/docs/migrations).
- [Pemrosesan pekerjaan latar belakang yang kuat](https://laravel.com/docs/queues).
- [Siaran acara waktu nyata](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Standarisasi Coding

Standar coding yang digunakan yang ada di Pikart adalah standar coding framework Laravel dimana codingan terbagi di beberapa folder seperti:

- **app**

Direktori aplikasi berisi kode inti aplikasi. hampir semua kelas di aplikasi Pikart akan berada di direktori ini.

- **bootstrap**

Direktori bootstrap berisi file app.php yang mem-bootstrap framework. Direktori ini juga menampung direktori cache yang berisi file kerangka yang dihasilkan untuk pengoptimalan kinerja seperti rute dan file cache layanan.

- **config**

Direktori config, seperti namanya, berisi semua file konfigurasi Pikart.

- **database**

Direktori database berisi migrasi database, pabrik model, dan seed.

- **public**

Direktori publik berisi file index.php, yang merupakan titik masuk untuk semua permintaan yang masuk ke aplikasi dan mengonfigurasi pemuatan otomatis. Direktori ini juga menampung aset seperti gambar, JavaScript, dan CSS.

- **recources**

Direktori sumber daya berisi tampilan serta aset mentah yang belum dikompilasi seperti CSS atau JavaScript.

- **routes**

Direktori rute berisi semua definisi rute untuk aplikasi. Secara default, beberapa file rute disertakan dengan Laravel: web.php, api.php, console.php, dan channels.php.

File web.php berisi rute yang ditempatkan RouteServiceProvider di grup middleware web, yang menyediakan status sesi, perlindungan CSRF, dan enkripsi cookie. Jika aplikasi tidak menawarkan stateless, RESTful API, maka semua rute Anda kemungkinan besar akan ditentukan dalam file web.php.

File api.php berisi rute yang ditempatkan RouteServiceProvider di grup api middleware. Rute ini dimaksudkan untuk tidak memiliki kewarganegaraan, jadi permintaan yang masuk ke aplikasi melalui rute ini dimaksudkan untuk diautentikasi melalui token dan tidak akan memiliki akses ke status sesi.

File console.php adalah tempat yang dapat menentukan semua perintah konsol berbasis penutupan. Setiap penutupan terikat pada instance perintah yang memungkinkan pendekatan sederhana untuk berinteraksi dengan metode IO setiap perintah. Meskipun file ini tidak menentukan rute HTTP, file ini menentukan titik masuk (rute) berbasis konsol ke dalam aplikasi.

File channels.php adalah tempat yang dapat mendaftarkan semua saluran penyiaran acara yang didukung aplikasi.

- **storage**

Direktori penyimpanan berisi log, templat Blade yang dikompilasi, sesi berbasis file, cache file, dan file lain yang dihasilkan oleh framework. Direktori ini dipisahkan menjadi direktori app, framework, dan log. Direktori aplikasi dapat digunakan untuk menyimpan file apa pun yang dihasilkan oleh aplikasi. Direktori framework digunakan untuk menyimpan file dan cache yang dihasilkan framework. Terakhir, direktori log berisi file log aplikasi.

Direktori penyimpanan/aplikasi/publik dapat digunakan untuk menyimpan file buatan pengguna, seperti avatar profil, yang harus dapat diakses publik.

- **tests**

Direktori tes berisi tes otomatis Anda. Contoh tes unit PHPUnit dan tes fitur disediakan di luar kotak. Setiap kelas tes harus diakhiri dengan kata Test. Anda dapat menjalankan pengujian menggunakan perintah phpunit atau php vendor/bin/phpunit. Atau, jika Anda menginginkan representasi yang lebih detail dan indah dari hasil pengujian Anda, Anda dapat menjalankan pengujian menggunakan perintah php artisan test Artisan.

## Pattern Design

Pattern Design yang digunakan mengikuti patern design yang ditawarkan oleh Laravel yaitu MVC (Model-View-Controller).
Untuk model dan controller ada di foler app sedangkan untuk view ada di folder resources.
