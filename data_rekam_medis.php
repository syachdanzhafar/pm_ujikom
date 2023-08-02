<?php
include "connection.php";
$sql 	= "SELECT*FROM vlist_rekammedis";
$result	= $conn->query($sql);

?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Rekam Medis</title>
</head>

<body>
	<h2 align="center">Daftar Rekam Medis</h2>
	<table border="1" width="82%" cellpadding="5" align="center">
		<tr>
			<td colspan="10"><input type="button" value="AddNew" onclick="location='addnew.php'" />
				<colspan="10"><input type="button" value="Menu" onclick="location='index.php'" />
			</td>
		</tr>
		<tr align="center" bgcolor="#DC143C">
			<th width="91" scope="col">No Transaksi</th>
			<th width="100" scope="col">Tanggal</th>
			<th width="106" scope="col">Nama Pasien</th>
			<th width="118" scope="col">Jenis Kelamin</th>
			<th width="78" scope="col">Keluhan</th>
			<th width="87" scope="col">Nama Poli</th>
			<th width="68" scope="col">Dokter</th>
			<th width="138" scope="col">Biaya Admin</th>
			<th width="99" scope="col">Action</th>
		</tr>

		<?php
		while ($row = $result->fetch_array()) {
		?>
			<tr>
				<td align="center">
					<?= $row["no_transaksi"]; ?>
				</td>
				<td align="center">
					<?= $row["tgl_berobat"]; ?>
				</td>
				<td align="center">
					<?= $row["nama_peserta"]; ?>
				</td>
				<td align="center">
					<?= $row["jenis_kelamin"]; ?>
				</td>
				<td align="center">
					<?= $row["keluhan"]; ?>
				</td>
				<td align="center">
					<?= $row["nama_poli"]; ?>
				</td>
				<td align="center">
					<?= $row["nama_bidan"]; ?>
				</td>
				<td align="center">
					<?= $row["biaya_admin"]; ?>
				</td>
				<td align="center">
					<a class="btn btn-primary btn-sm" href="edit.php?notrans=<?= $row["no_transaksi"] ?>">Edit</a>
					<a class="btn btn-danger btn-sm" href="delete.php?x=<?= $row["no_transaksi"] ?>" onclick="return confirm('Data Anda akan dihapus klik ok untuk melanjutkan')">Del</a></h3>
				</td>
			</tr>
		<?php
		};
		?>
	</table>
</body>

</html>