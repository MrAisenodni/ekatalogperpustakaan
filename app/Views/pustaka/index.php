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
  <a href="<?= base_url('pustaka/tambah/form'); ?>">Tambah</a>
  <table border="1">
    <thead>
        <th>No</th>
        <th>Kode Buku</th>
        <th>Judul Buku</th>
        <th>Pengarang</th>
        <th>Editor</th>
        <th>Penerbit</th>
        <th>Tahun</th>
        <th>Halaman</th>
        <th>Lokasi</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach($pustaka as $key => $data){?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $data['kd_buku']; ?></td>
            <td><?= $data['judul']; ?></td>
            <td><?= $data['pengarang']; ?></td>
            <td><?= $data['editor']; ?></td>
            <td><?= $data['penerbit']; ?></td>
            <td><?= $data['tahun']; ?></td>
            <td><?= $data['halaman']; ?></td>
            <td><?= $data['lokasi']; ?></td>
            <td>

                    <a href="<?= base_url('pustaka/ubah/form/'.$data['kd_buku']); ?>">Edit</a>
                    <a href="<?= base_url('pustaka/hapus/'.$data['kd_buku']); ?>">Hapus</a>

            </td>
        </tr>
        <?php $no++;} ?>
    </tbody>
  </table>
</body>
</html>
