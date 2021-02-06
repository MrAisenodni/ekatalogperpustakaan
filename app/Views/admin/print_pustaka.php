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
				<th><strong>Nama Pustakawan</strong></th>
				<th width="350px"><strong>Aksi</strong></th>
				<th width="200px"><strong>Tanggal</strong></th>
			</tr>
			<?php
			$no = 1;
			foreach($history_pustaka as $key => $data){?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $data['admin'] ?></td>
				<td><?php if($data['tgl_masuk'] != null) { echo "Pustaka berjudul ".$data['judul']." diletakkan pada rak ".$data['nama']." nomor ".$data['no_lemari']; } else { echo "Pustaka berjudul ".$data['judul']." dipindahkan ke rak ".$data['nama']." nomor ".$data['no_lemari']; } ?></td>
				<td><?php if($data['tgl_masuk'] != null) { echo $data['tgl_masuk']; } else { echo $data['tgl_pindah']; } ?></td>
			</tr>
			<?php $no++;} ?>
		</table>
	</body>
</html>
