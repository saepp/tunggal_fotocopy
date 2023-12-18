<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List Data Akun</title>
</head>
<body>
	<h3>List Data Akun</h3>
	<p><?=$this->session->flashdata('message');?></p>
	<a href="<?=base_url('/akun/create');?>">Tambah Data</a>
	<table border="1">
		<tr>
			<th>Nama Akun</th>
			<th>Header Akun</th>
			<th>Kode Akun</th>
			<th colspan="2">Aksi</th>
		</tr>
<?php if (count($data) > 0): ?>
	<?php foreach ($data as $row): ?>
		<tr>
			<td><?=$row->nama_akun;?></td>
			<td><?=$row->header_akun;?></td>
			<td><?=$row->kode_akun;?></td>
			<td><a href="<?=base_url('/akun/edit/' . $row->id_akun);?>">Edit Data</a></td>
			<td><a href="<?=base_url('/akun/delete/' . $row->id_akun);?>">Hapus Data</a></td>
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
