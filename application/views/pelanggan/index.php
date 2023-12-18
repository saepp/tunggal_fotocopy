<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List Data Pelanggan</title>
</head>
<body>
	<h3>List Data Pelanggan</h3>
	<p><?=$this->session->flashdata('message');?></p>
	<a href="<?=base_url('/pelanggan/create');?>">Tambah Data</a>
	<table border="1">
		<tr>
			<th>Nama Pelanggan</th>
			<th>Alamat Pelanggan</th>
			<th>Jenis Kelamin Pelanggan</th>
			<th>No Telepon Pelanggan</th>
			<th colspan="2">Aksi</th>
		</tr>
<?php if (count($data) > 0): ?>
	<?php foreach ($data as $row): ?>
		<tr>
			<td><?=$row->nama_pelanggan;?></td>
			<td><?=$row->alamat_pelanggan;?></td>
			<td><?=$row->jenis_kelamin_pelanggan;?></td>
			<td><?=$row->no_telp_pelanggan;?></td>
			<td><a href="<?=base_url('/pelanggan/edit/' . $row->id_pelanggan);?>">Edit Data</a></td>
			<td><a href="<?=base_url('/pelanggan/delete/' . $row->id_pelanggan);?>">Hapus Data</a></td>
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
