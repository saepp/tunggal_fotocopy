<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List Data Persediaan Detail</title>
</head>
<body>
	<h3>List Data Persediaan Detail</h3>
	<table border="1">
		<tr>
			<th>Nama Produk</th>
			<th>Satuan</th>
			<th>Tanggal</th>
			<th>Keterangan</th>
			<th>Harga Satuan</th>
			<th>Stock Masuk</th>
			<th>Stock Keluar</th>
			<th>Stock Tersedia</th>
			<th>Nilai Stock</th>
		</tr>
<?php if (count($data) > 0): ?>
	<?php foreach ($data as $row): ?>
		<tr>
			<td><?=$row->nama_produk;?></td>
			<td><?=$row->satuan;?></td>
			<td><?=$row->tgl_persediaan;?></td>
			<td><?=$row->keterangan;?></td>
			<td><?=$row->harga_satuan;?></td>
			<td><?=$row->kuantitas;?></td>
			<td><a href="<?=base_url('/persediaan/pengambilanproduk/' . $row->id_persediaan);?>"><?=$row->total_pengambilan;?></a></td>
			<td><?=$row->kuantitas - $row->total_pengambilan;?></td>
			<td><?=($row->kuantitas - $row->total_pengambilan) * $row->harga_satuan;?></td>
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
