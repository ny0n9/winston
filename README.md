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
