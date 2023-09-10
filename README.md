Winston Repository
Ini adalah Codeigniter 4.4.1 yang sudah ditambahkan dengan Myth Auth 1.2.1 serta Bootstrap 5.3.1

File framework CSS tersimpan pada folder public

Akses ke ROOT tidak lagi di folder public tetapi langsung ke folder instalasi sehingga memudahkan untuk di upload ke webhosting.

File untuk mempermudah membangun view aplikasi terdapat pada folder Views/layout dimana didalamnya terdapat 4 file :<br>
bs5-minimal.php -> untuk membangun view standard<br>
bs5-jsminimal.php -> untuk membangun view standard menggunakan jquery<br>
bs5-mythauth.php -> untuk layout login, register dan forgot dari Myth Auth<br>
bs5-winslider -> untuk view yang menyertakan winslider

Setelah download repository ini, perlu dijalankan pada folder dimana file README.md ada :<br>
&emsp; composer require codeigniter4/framework <br>
agar folder vendor nya didownload oleh composer

Cara menggunakan SQLite3 di Codeigniter 4

1. pastikan pada file php.ini, kedua extension dibawah ini diaktivkan :<br>
   &emsp; extension=pdo_sqlite <br>
   &emsp; extension=sqlite3

2. pada file .env konfigurasi database sebagai berikut :<br>
   &emsp; database.default.database = ci4sqlite.db <br>
   &emsp; database.default.DBDriver = SQLite3

3. pada folder instalasi jalankan perintah :<br>
   &emsp; php spark db:create ci4sqlite<br>
   maka secara otomatis pada folder writable akan dibuatkan file :<br>
   &emsp; ci4sqlite.db // writable/ci4sqlite.db

4. untuk mengujinya jalankan perintah :<br>
   &emsp; php spark migrate --all
