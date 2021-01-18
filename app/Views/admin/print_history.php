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
		<div style="font-size:20px; font-style: oblique; color:'#dddddd'; text-align: center;"><i>Laporan Kunjungan Perpustakaan</i></div>
		<p>
		<i>Perpustakaan SMA Negeri 6 Bekasi</i><br>
		PERUMAHAN PONDOK MITRA LESTARI, Jl. Asri Lestari Raya No.25, RT.008/RW.005, Jaka Setia, Kec. Jatiasih, Kota Bks, Jawa Barat 17147
		</p>
		<hr>
		<hr>
		<p></p>
		<table cellpadding="6" >
			<tr>
				<th><strong>No</strong></th>
				<th><strong>Aksi</strong></th>
				<th><strong>Akses</strong></th>
				<th><strong>Tanggal Akses</strong></th>
			</tr>
			<?php
			$no = 1;
			foreach($history as $key => $data){?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $data['aksi'] ?></td>
				<td><?php if($data['akses']==='usr'){echo 'User';}else{echo 'Pustakawan';} ?></td>
				<td><?= $data['tgl_akses'] ?></td>
			</tr>
			<?php $no++;} ?>
		</table>
	</body>
</html>
