<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pustaka</title>
</head>
<body>
  <a href="<?= base_url(); ?>">Home</a>
  <a href="<?= base_url('user/tambah/form'); ?>">Tambah</a>
  <table border="1">
    <thead>
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Lahir</th>
        <th>No. Telp</th>
        <th>Password</th>
        <th>Akses</th>
        <th>Tanggal Daftar</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach($user as $key => $data){?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $data['nis']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['jenkel']; ?></td>
            <td><?= $data['tgl_lahir']; ?></td>
            <td><?= $data['telp']; ?></td>
            <td><?= $data['password']; ?></td>
            <td><?= $data['akses']; ?></td>
            <td><?= $data['tgl_daftar']; ?></td>
            <td>

                    <a href="<?= base_url('user/ubah/form/'.$data['nis']); ?>">Ubah</a>
                    <a href="<?= base_url('user/hapus/'.$data['nis']); ?>">Hapus</a>

            </td>
        </tr>
        <?php $no++;} ?>
    </tbody>
  </table>
</body>
</html>
