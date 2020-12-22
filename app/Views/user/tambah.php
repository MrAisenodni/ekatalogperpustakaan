<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah User</title>
</head>
<body>
  <form action="<?=base_url('user/tambah/submit'); ?>" method="post">
  <label>NIS : </label><input type="text" name="nis" placeholder="NIS"><br>
  <label>Nama : </label><input type="text" name="nama"  placeholder="Nama"><br>
  <label>Jenis Kelamin : </label>
    <input type="radio" name="jenkel" value="L">Laki-laki
    <input type="radio" name="jenkel" value="P">Perempuan<br>
  <label>Tanggal Lahir : </label><input type="date" name="tgllahir"><br>
  <label>No. Telp : </label><input type="text" name="telp"  placeholder="No. Telp"><br>
  <label>Akses : </label>
  <input type="radio" name="akses" value="usr">User
  <input type="radio" name="akses" value="pus">Pustakawan<br>
  <button type="submit" name="button">Tambah</button><a href="<?= base_url('user'); ?>">Back</a>
  </form>
</body>
</html>
