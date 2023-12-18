<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List Data Produk</title>
</head>
<body>
	<h3>List Data Produk</h3>
	<p><?=$this->session->flashdata('message');?></p>
	<a href="<?=base_url('/produk/create');?>">Tambah Data</a>
	<table border="1">
		<tr>
			<th>Nama Produk</th>
			<th>Satuan</th>
			<th colspan="2">Aksi</th>
		</tr>
<?php if (count($data) > 0): ?>
	<?php foreach ($data as $row): ?>
		<tr>
			<td><?=$row->nama_produk;?></td>
			<td><?=$row->satuan;?></td>
			<td><a href="<?=base_url('/produk/edit/' . $row->id_produk);?>">Edit Data</a></td>
			<td><a href="<?=base_url('/produk/delete/' . $row->id_produk);?>">Hapus Data</a></td>
		</tr>
	<?php endforeach;?>
<?php else: ?>
		<tr>
			<td colspan="5" align="center">Belum ada data</td>
		</tr>
<?php endif;?>
	</table>
</body>
</html>
