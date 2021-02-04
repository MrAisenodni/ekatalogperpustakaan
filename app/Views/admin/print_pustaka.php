<html>
	<head>
		<title>Admin Perpustakaan | <?= $title; ?></title>
		<style>
			table {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			}

			td, th {
			  border: 1px solid #000000;
			  text-align: center;
			  height: 20px;
			  margin: 8px;
			}

		</style>
	</head>
	<body>
		<div style="font-size:20px; font-style: oblique; text-align: center;"><b>Laporan Pustaka</b></div>
		<p style="font-size: 14px; text-align: center;"><b>Perpustakaan SMA Negeri 6 Bekasi</b><br>
		PERUMAHAN PONDOK MITRA LESTARI, Jl. Asri Lestari Raya No.25, RT.008/RW.005, Jaka Setia, Kec. Jatiasih, Kota Bks, Jawa Barat 17147
		</p>
		<hr>
		<p></p>
		<table cellpadding="6" >
			<tr>
				<th width="35px"><strong>No</strong></th>
				<th width="200px"><strong>Judul</strong></th>
				<th><strong>Pengarang</strong></th>
				<th><strong>Nama Rak</strong></th>
				<th><strong>Jenis Rak</strong></th>
				<th><strong>Tanggal Tambah</strong></th>
				<th><strong>Tanggal Ubah</strong></th>
			</tr>
			<?php
			$no = 1;
			foreach($pustaka as $key => $data){?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $data['judul'] ?></td>
				<td><?= $data['pengarang'] ?></td>
				<td><?= $data['nama'] ?></td>
				<td><?= $data['jenis'] ?></td>
				<td><?= $data['tgl_tambah'] ?></td>
				<td><?= $data['tgl_ubah'] ?></td>
			</tr>
			<?php $no++;} ?>
		</table>
	</body>
</html>
