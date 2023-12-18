<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Detail Data Pemesanan Pembelian</title>
</head>
<body>
	<h3>Detail Data Pemesanan Pembelian</h3>
	<p>No Pemesanan : <strong><?=$header->no_pemesanan?></strong></p>
	<p>Tanggal Pemesanan : <strong><?=date('d F Y', strtotime($header->tgl_pemesanan))?></strong></p>
	<p>Keterangan : <strong><?=$header->keterangan?></strong></p>
	<p>Nama Supplier : <strong><?=$header->nama_supplier?></strong></p>
	<p>Status : <strong><?=$header->status?></strong></p>
	<form method="POST" action="<?=base_url('/pemesananpembelian/storedetail');?>">
		<input type="hidden" name="id_pemesanan_pembelian_header" value="<?=$id_pemesanan_pembelian_header?>">
		<label for="id_produk">Nama Produk : </label>
		<select name="id_produk" id="id_produk">
			<option value="" disabled selected>>> Pilih Produk <<</option>
			<?php foreach ($produk as $row): ?>
				<option value="<?=$row->id_produk;?>"><?=$row->nama_produk;?></option>
			<?php endforeach;?>
		</select>
		<br>
		<label for="id_pegawai">Nama Pegawai : </label>
		<select name="id_pegawai" id="id_pegawai">
			<option value="" disabled selected>>> Pilih Pegawai <<</option>
			<?php foreach ($pegawai as $row): ?>
				<option value="<?=$row->id_pegawai;?>"><?=$row->nama_pegawai;?></option>
			<?php endforeach;?>
		</select>
		<br>
		<label for="kuantitas">Kuantitas : </label>
		<input type="text" name="kuantitas" id="kuantitas" placeholder="Contoh : 5">
		<br>
		<label for="base_price">Harga Satuan : </label>
		<input type="number" name="base_price" id="base_price" placeholder="Contoh : 10000">
		<br>
		<button type="submit" name="submit">Add Data</button>
	</form>
	<table border="1">
		<tr>
			<th>Nama Produk</th>
			<th>Kuantitas</th>
			<th>Harga Satuan</th>
			<th>Nama Pegawai</th>
			<th>Total</th>
			<th colspan="2">Aksi</th>
		</tr>
		<?php if ($data): ?>
			<?php foreach ($data as $row): ?>
				<tr>
					<td><?=$row->nama_produk;?></td>
					<td><?=$row->kuantitas;?></td>
					<td><?=$row->base_price + $row->ppn;?></td>
					<td><?=$row->nama_pegawai;?></td>
					<td><?=$row->kuantitas * ($row->base_price + $row->ppn);?></td>
					<td><a href="<?=base_url('/pemesananpembelian/' . $id_pemesanan_pembelian_header . '/editdetail/' . $row->id_pemesanan_pembelian_detail);?>">Edit Data</a></td>
					<td><a href="<?=base_url('/pemesananpembelian/' . $id_pemesanan_pembelian_header . '/deletedetail/' . $row->id_pemesanan_pembelian_detail);?>">Hapus Data</a></td>
			</tr>
			<?php endforeach;?>
			<?php endif;?>
	</table>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
