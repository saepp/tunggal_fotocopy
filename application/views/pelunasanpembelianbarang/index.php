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
	<a href="<?=base_url('/pelunasanpembelianbarang/create');?>">Tambah Data</a>
	<table border="1">
		<tr>
			<th>No Pelunasan</th>
			<th>Tanggal Pelunasan</th>
			<th>No Penerimaan</th>
			<th>No Pembayaran</th>
			<th>Keterangan</th>
			<th>Nominal</th>
			<th colspan="2">Aksi</th>
		</tr>
<?php if (count($data) > 0): ?>
	<?php foreach ($data as $row): ?>
		<tr>
			<td><?=$row->no_pelunasan;?></td>
			<td><?=$row->tgl_pelunasan;?></td>
			<td><?=$row->no_penerimaan;?></td>
			<td><?=$row->no_pembayaran;?></td>
			<td><?=$row->keterangan;?></td>
			<td><?=$row->nominal_pembayaran;?></td>
			<td><a href="<?=base_url('/pelunasanpembelianbarang/edit/' . $row->id_pelunasan_pembelian_barang);?>">Edit Data</a></td>
			<td><a href="<?=base_url('/pelunasanpembelianbarang/delete/' . $row->id_pelunasan_pembelian_barang);?>">Hapus Data</a></td>
		</tr>
	<?php endforeach;?>
<?php else: ?>
		<tr>
			<td colspan="8" align="center">Belum ada data</td>
		</tr>
<?php endif;?>
	</table>
</body>
</html>
