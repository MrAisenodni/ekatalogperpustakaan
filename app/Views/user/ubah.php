<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
</head>
<body>
  <form action="<?=base_url('user/ubah/submit/'.$user['nis']); ?>" method="post">
  <label>Nama : </label><input type="text" name="nama" placeholder="Nama" value="<?= $user['nama'];?>"><br>
  <label>Jenis Kelamin : </label>
    <input type="radio" name="jenkel" value="L"<?php if($user['jenkel']==='L'){echo "checked";}?>>Laki-laki
    <input type="radio" name="jenkel" value="P"<?php if($user['jenkel']==='P'){echo "checked";}?>>Perempuan<br>
  <label>Tanggal Lahir : </label><input type="date" name="tgllahir" value="<?= $user['tgl_lahir'];?>"><br>
  <label>No. Telp : </label><input type="text" name="telp"  placeholder="No. Telp" value="<?= $user['telp']?>"><br>
  <button type="submit" name="button">Tambah</button><a href="<?= base_url('user'); ?>">Back</a>
  </form>
</body>
</html>
