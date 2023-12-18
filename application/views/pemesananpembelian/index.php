<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List Data Pemesanan Pembelian</title>
</head>
<body>
	<h3>List Data Pemesanan Pembelian</h3>
	<p><?=$this->session->flashdata('message');?></p>
	<a href="<?=base_url('/pemesananpembelian/create');?>">Tambah Data</a>
	<table border="1">
		<tr>
			<th>No Pemesanan</th>
			<th>Tanggal Pemesanan</th>
			<th>Keterangan</th>
			<th>Nama Supplier</th>
			<th>Status</th>
			<th>Tanggal Jatuh Tempo</th>
			<th>Total</th>
			<th colspan="3">Aksi</th>
		</tr>
<?php if (count($data) > 0): ?>
	<?php foreach ($data as $row): ?>
		<tr>
			<td><?=$row->no_pemesanan;?></td>
			<td><?=$row->tgl_pemesanan;?></td>
			<td><?=$row->keterangan;?></td>
			<td><?=$row->nama_supplier;?></td>
			<td><?=$row->status;?></td>
			<td><?=$row->tgl_jatuh_tempo;?></td>
			<td><?=$row->subtotal_pemesanan == 0 ? "0" : $row->subtotal_pemesanan?></td>
			<td><a href="<?=base_url('/pemesananpembelian/' . $row->id_pemesanan_pembelian_header . '/detail/');?>">Detail Data</a></td>
			<td><a href="<?=base_url('/pemesananpembelian/' . $row->id_pemesanan_pembelian_header . '/edit/');?>">Edit Data</a></td>
			<td><a href="<?=base_url('/pemesananpembelian/' . $row->id_pemesanan_pembelian_header . '/delete/');?>">Hapus Data</a></td>
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
