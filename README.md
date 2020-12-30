# Setting Applikasi

## 1. Ekstrak/Clone

Download project nya melalui download manual atau bisa langsung di clone aja dari git ke
repository tertentu(Usahakan di dalam folder htdocs)

## 2. Update/Install Composer

Aplikasi ini menggunakan composer untuk update dependency/vendor yang ada di dalamnya.
cara nya cukup arahkan ke path nya di Command Line(CLI) contoh:C:\xampp\htdocs\perpus.
setelah itu run perintah composer update, pastikan sudah terkoneksi internet.

note: composer update hanya dijalankan apabila project sudah lama tidak di jalankan lalu mau menjalankannya lagi di kemudian hari tidak perlu setiap mau menjalankan aplikasinya.

## 3. Konfigurasi DATABASE

Aktifkan server yang ingin di pakai(xampp).
Lalu buatlah database secara manual di localhostnya, contoh: perpus.
Setelah itu Anda tidak perlu membuat table-table di dalamnya, cukup buat databasenya saja, lalu Anda kembali ke folder aplikasinya lagi, cari file dengan nama env yang terletak di root project.
setelah itu buka file env lalu pada bagian :

-# database.default.hostname = localhost
-# database.default.database = ci4
-# database.default.username = root
-# database.default.password = root
-# database.default.DBDriver = MySQLi

sesuaikan dengan konfigurasi server Anda dan hapus tanda "#" contoh:

database.default.hostname = localhost
database.default.database = perpus
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi

Setelah itu save as filenya dengan nama .env lalu save di root project.

Kembali ke CLI, ke path folder aplikasinya lalu run perintah php spark migrate.
Fungsinya untuk menambahkan struktur table ke dalam database yang sudah dibuat tadi.

Setelah selesai migrate, run perintah php spark db:seed UserSeeder.(Besar Kecil nya huruf berpengaruh jangan sampai salah)
Fungsinya untuk menambahkan data kedalam table user untuk pertama kali.


## 4 Run Project

Setelah langkah-langkah diatas selesai, Anda bisa memulai menjalankan aplikasinya dengan cara:
 1. run php spark serve.
 2. lalu di address browser ketikkan localhost:8080
