<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List Data Penjualan Barang</title>
</head>
<body>
	<h3>List Data Penjualan Barang</h3>
	<p><?=$this->session->flashdata('message');?></p>
	<a href="<?=base_url('/penjualanbarang/create');?>">Tambah Data</a>
	<table border="1">
		<tr>
			<th>No Penjualan</th>
			<th>Tanggal Penjualan</th>
			<th>Nama Pelanggan</th>
			<th>Nama Pegawai</th>
			<th>Produk</th>
			<th>Total</th>
			<th colspan="3">Aksi</th>
		</tr>
<?php if (count($data) > 0): ?>
	<?php foreach ($data as $row): ?>
		<tr>
			<td><?=$row->no_penjualan;?></td>
			<td><?=$row->tgl_penjualan;?></td>
			<td><?=$row->nama_pelanggan;?></td>
			<td><?=$row->nama_pegawai;?></td>
			<td><?=$row->nama_produk;?></td>
			<td><?=$row->total_penjualan?></td>
			<td><a href="<?=base_url('/penjualanbarang/' . $row->id_penjualan_barang_header . '/detail/');?>">Detail Data</a></td>
			<td><a href="<?=base_url('/penjualanbarang/edit/' . $row->id_penjualan_barang_header);?>">Edit Data</a></td>
			<td><a href="<?=base_url('/penjualanbarang/delete/' . $row->id_penjualan_barang_header);?>">Hapus Data</a></td>
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
