<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Detail Data Penjualan Barang</title>
</head>
<body>
	<h3>Detail Data Penjualan Barang</h3>
	<p>No Penjualan : <strong><?=$header->no_penjualan?></strong></p>
	<p>Tanggal Penjualan : <strong><?=date('d F Y', strtotime($header->tgl_penjualan))?></strong></p>
	<p>Keterangan : <strong><?=$header->keterangan?></strong></p>
	<p>Nama Pelanggan : <strong><?=$header->nama_pelanggan?></strong></p>
	<p>Nama Pegawai : <strong><?=$header->nama_pegawai?></strong></p>
	<form method="POST" action="<?=base_url('/penjualanbarang/storedetail');?>">
		<input type="hidden" name="id_penjualan_barang_header" value="<?=$id_penjualan_barang_header?>">
		<label for="id_produk">Nama Produk : </label>
		<select name="id_produk" id="id_produk">
			<option value="" disabled selected>>> Pilih Produk <<</option>
			<?php foreach ($dataItem as $row): ?>
				<option value="<?=$row->id_produk;?>"><?=$row->nama_produk;?> (<?=$row->stok;?> <?=$row->satuan;?>)</option>
			<?php endforeach;?>
		</select>
		<br>
		<label for="kuantitas">Kuantitas : </label>
		<input type="text" name="kuantitas" id="kuantitas" placeholder="Contoh : 5">
		<br>
		<label for="harga_jual">Harga Jual : </label>
		<input type="number" name="harga_jual" id="harga_jual" placeholder="Contoh : 10000">
		<br>
		<button type="submit" name="submit">Add Data</button>
	</form>
	<table border="1">
		<tr>
			<th>Nama Produk</th>
			<th>Kuantitas</th>
			<th>Harga Jual</th>
			<th>Total</th>
			<th colspan="2">Aksi</th>
		</tr>
		<?php if ($data): ?>
			<?php foreach ($data as $row): ?>
				<tr>
					<td><?=$row->nama_produk;?></td>
					<td><?=$row->kuantitas;?></td>
					<td><?=$row->harga_jual?></td>
					<td><?=$row->kuantitas * $row->harga_jual;?></td>
					<td><a href="<?=base_url('/penjualanbarang/' . $row->id_penjualan_barang_header . '/deletedetail/' . $row->id_penjualan_barang_detail);?>">Hapus Data</a></td>
			</tr>
			<?php endforeach;?>
			<?php endif;?>
	</table>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
