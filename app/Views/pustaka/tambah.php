<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Pustaka</title>
</head>
<body>
  <form action="<?=base_url('pustaka/tambah/submit'); ?>" method="post">
  <label>Judul : </label><input type="text" name="judul"  placeholder="Judul Buku"><br>
  <label>Pengarang : </label><input type="text" name="pengarang"  placeholder="Pengarang Buku"><br>
  <label>Editor : </label><input type="text" name="editor"  placeholder="Editor Buku"><br>
  <label>Penerbit : </label><input type="text" name="penerbit"  placeholder="Penerbit Buku"><br>
  <label>Tahun Terbit : </label><input type="text" name="tahun"  placeholder="Tahun Terbit Buku"><br>
  <label>Jumlah Halaman : </label><input type="number" name="halaman"  placeholder="Halaman Buku"><br>
  <label>Lokasi Penyimpanan : </label><input type="text" name="lokasi"  placeholder="Lokasi Buku"><br>
  <button type="submit" name="button">Tambah</button><a href="<?= base_url('pustaka'); ?>">Back</a>
  </form>
</body>
</html>
