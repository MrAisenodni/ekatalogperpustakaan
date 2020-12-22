<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Pustaka</title>
</head>
<body>
  <form action="<?=base_url('pustaka/ubah/submit/'.$pustaka['kd_buku']); ?>" method="post">
  <label>Judul : </label><input type="text" name="judul" class="form-control" value="<?= $pustaka['judul'] ?>"><br>
  <label>Pengarang : </label><input type="text" name="pengarang" class="form-control" value="<?= $pustaka['pengarang'] ?>"><br>
  <label>Editor : </label><input type="text" name="editor" class="form-control" value="<?= $pustaka['editor'] ?>"><br>
  <label>Penerbit : </label><input type="text" name="penerbit" class="form-control" value="<?= $pustaka['penerbit'] ?>"><br>
  <label>Tahun Terbit : </label><input type="text" name="tahun" class="form-control" value="<?= $pustaka['tahun'] ?>"><br>
  <label>Jumlah Halaman : </label><input type="number" name="halaman" class="form-control" value="<?= $pustaka['halaman'] ?>"><br>
  <label>Lokasi Penyimpanan : </label><input type="text" name="lokasi" class="form-control" value="<?= $pustaka['lokasi'] ?>"><br>
  <button type="submit" name="button">Ubah</button><a href="<?= base_url('pustaka'); ?>">Back</a>
  </form>
</body>
</html>
