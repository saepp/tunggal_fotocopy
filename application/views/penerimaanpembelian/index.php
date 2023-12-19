<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List Data Penerimaan Pembelian</title>
</head>
<body>
	<h3>List Data Penerimaan Pembelian</h3>
	<p><?=$this->session->flashdata('message');?></p>
	<a href="<?=base_url('/penerimaanpembelian/create');?>">Tambah Data</a>
	<table border="1">
		<tr>
			<th>No Penerimaan</th>
			<th>Tanggal Penerimaan</th>
			<th>No Pemesanan</th>
			<th>Total penerimaan</th>
			<th>Total Pemesanan</th>
			<th colspan="3">Aksi</th>
		</tr>
<?php if (count($data) > 0): ?>
	<?php foreach ($data as $row): ?>
		<tr>
			<td><?=$row->no_penerimaan;?></td>
			<td><?=$row->tgl_penerimaan;?></td>
			<td><?=$row->no_pemesanan;?></td>
			<td><?=$row->subtotal_penerimaan == 0 ? "0" : $row->subtotal_penerimaan?></td>
			<td><?=$row->subtotal_pemesanan == 0 ? "0" : $row->subtotal_pemesanan?></td>
			<td><a href="<?=base_url('/penerimaanpembelian/' . $row->id_penerimaan_pembelian_header . '/detail/');?>">Detail Data</a></td>
			<td><a href="<?=base_url('/penerimaanpembelian/edit/' . $row->id_penerimaan_pembelian_header);?>">Edit Data</a></td>
			<td><a href="<?=base_url('/penerimaanpembelian/delete/' . $row->id_penerimaan_pembelian_header);?>">Hapus Data</a></td>
		</tr>
	<?php endforeach;?>
<?php else: ?>
		<tr>
			<td colspan="10" align="center">Belum ada data</td>
		</tr>
<?php endif;?>
	</table>
</body>
</html>
