<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List Data Persediaan</title>
</head>
<body>
	<h3>List Data Persediaan</h3>
	<table border="1">
		<tr>
			<th>Nama Produk</th>
			<th>Satuan</th>
			<th>Stock Tersedia</th>
			<th>Nilai Stock</th>
			<th>Detail</th>
		</tr>
<?php if (count($data) > 0): ?>
	<?php foreach ($data as $row): ?>
		<tr>
			<td><?=$row->nama_produk;?></td>
			<td><?=$row->satuan;?></td>
			<td><?=$row->total_persediaan - $row->total_pengambilan;?></td>
			<td><?=$row->nilai_persediaan;?></td>
			<td><a href="<?=base_url('/persediaan/detail/' . $row->id_produk);?>">Detail Data</a></td>
		</tr>
	<?php endforeach;?>
<?php else: ?>
		<tr>
			<td colspan="6" align="center">Belum ada data</td>
		</tr>
<?php endif;?>
	</table>
</body>
</html>
