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
		<div style="font-size:64px; color:'#dddddd'"><i>Laporan Pustaka</i></div>
		<p>
		<i>Perpustakaan</i><br>
		Jakarta, Indonesia
		</p>
		<hr>
		<hr>
		<p></p>
		<table cellpadding="6" >
			<tr>
				<th><strong>No</strong></th>
				<th><strong>Judul Buku</strong></th>
				<th><strong>Pengarang</strong></th>
				<th><strong>Penerbit</strong></th>
				<th><strong>Tahun</strong></th>
				<th><strong>Lokasi</strong></th>
			</tr>
			<?php
			$no = 1;
			foreach($pustaka as $key => $data){?>
			<tr>
				<td><?= $no; ?></td>
				<td>
						<?= $data['judul']; ?>
				</td>
				<td><?= $data['pengarang']; ?></td>
				<td>
						<?= $data['penerbit']; ?>
				</td>
				<td><?= $data['tahun']; ?></td>
				<td><?= $data['nama']; ?></td>
			</tr>
			<?php $no++;} ?>
		</table>
	</body>
</html>
