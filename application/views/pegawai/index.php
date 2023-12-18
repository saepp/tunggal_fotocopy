<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List Data Pegawai</title>
</head>
<body>
	<h3>List Data Pegawai</h3>
	<p><?=$this->session->flashdata('message');?></p>
	<a href="<?=base_url('/pegawai/create');?>">Tambah Data</a>
	<table border="1">
		<tr>
			<th>Nama Pegawai</th>
			<th>Alamat Pegawai</th>
			<th>No Telepon Pegawai</th>
			<th>Jenis Kelamin Pegawai</th>
			<th>Posisi Pegawai</th>
			<th colspan="2">Aksi</th>
		</tr>
<?php if (count($data) > 0): ?>
	<?php foreach ($data as $row): ?>
		<tr>
			<td><?=$row->nama_pegawai;?></td>
			<td><?=$row->alamat_pegawai;?></td>
			<td><?=$row->no_telp_pegawai;?></td>
			<td><?=$row->jenis_kelamin_pegawai;?></td>
			<td><?=$row->posisi_pegawai;?></td>
			<td><a href="<?=base_url('/pegawai/edit/' . $row->id_pegawai);?>">Edit Data</a></td>
			<td><a href="<?=base_url('/pegawai/delete/' . $row->id_pegawai);?>">Hapus Data</a></td>
		</tr>
	<?php endforeach;?>
<?php else: ?>
		<tr>
			<td colspan="7" align="center">Belum ada data</td>
		</tr>
<?php endif;?>
	</table>
</body>
</html>
