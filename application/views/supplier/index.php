<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List Data Supplier</title>
</head>
<body>
	<h3>List Data Supplier</h3>
	<p><?=$this->session->flashdata('message');?></p>
	<a href="<?=base_url('/supplier/create');?>">Tambah Data</a>
	<table border="1">
		<tr>
			<th>ID Supplier</th>
			<th>Nama Supplier</th>
			<th>Alamat Supplier</th>
			<th>No Telepon Supplier</th>
			<th colspan="2">Aksi</th>
		</tr>
<?php if (count($data) > 0): ?>
	<?php foreach ($data as $row): ?>
		<tr>
			<td><?=$row->id_supplier;?></td>
			<td><?=$row->nama_supplier;?></td>
			<td><?=$row->alamat_supplier;?></td>
			<td><?=$row->no_telp_supplier;?></td>
			<td><a href="<?=base_url('/supplier/edit/' . $row->id_supplier);?>">Edit Data</a></td>
			<td><a href="<?=base_url('/supplier/delete/' . $row->id_supplier);?>">Hapus Data</a></td>
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
