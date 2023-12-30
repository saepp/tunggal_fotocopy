<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List Data Pembayaran</title>
</head>
<body>
	<h3>List Data Pembayaran</h3>
	<p><?=$this->session->flashdata('message');?></p>
	<a href="<?=base_url('/pembayaran/create');?>">Tambah Data</a>
	<table border="1">
		<tr>
			<th>No Pembayaran</th>
			<th>Metode Pembayaran</th>
			<th>Status Pembayaran</th>
			<th>Tanggal pembayaran</th>
			<th>Jenis Pembayaran</th>
			<th>Total Pembayaran</th>
			<th colspan="2">Aksi</th>
		</tr>
<?php if (count($data) > 0): ?>
	<?php foreach ($data as $row): ?>
		<tr>
			<td><?=$row->no_pembayaran;?></td>
			<td><?=$row->metode_pembayaran;?></td>
			<td><?=$row->status_pembayaran;?></td>
			<td><?=$row->tgl_pembayaran;?></td>
			<td><?=$row->jenis_pembayaran;?></td>
			<td><?=$row->total;?></td>
			<td><a href="<?=base_url('/pembayaran/edit/' . $row->id_pembayaran);?>">Edit Data</a></td>
			<td><a href="<?=base_url('/pembayaran/delete/' . $row->id_pembayaran);?>">Hapus Data</a></td>
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
