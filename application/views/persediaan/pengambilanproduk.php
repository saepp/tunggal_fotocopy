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
			<th>Tanggal</th>
			<th>Keterangan</th>
			<th>Kuantitas Pengambilan</th>
		</tr>
<?php if (count($data) > 0): ?>
	<?php foreach ($data as $row): ?>
		<tr>
			<td><?=date('d F Y', strtotime($row->tgl_pengambilan));?></td>
			<td><?=$row->keterangan;?></td>
			<td><?=$row->kuantitas;?></td>
		</tr>
	<?php endforeach;?>
<?php else: ?>
		<tr>
			<td colspan="3" align="center">Belum ada data</td>
		</tr>
<?php endif;?>
	</table>
</body>
</html>
