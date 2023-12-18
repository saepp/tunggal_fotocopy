<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Detail Data Pemesanan Pembelian</title>
</head>
<body>
	<h3>Edit Detail Data Pemesanan Pembelian</h3>

	<form method="POST" action="<?=base_url('/pemesananpembelian/' . $id_pemesanan_pembelian_header . '/updatedetail/' . $data->id_pemesanan_pembelian_detail);?>">
		<label for="id_produk">Nama Produk : </label>
		<select name="id_produk" id="id_produk">
			<option value="" disabled selected>>> Pilih Produk <<</option>
			<?php foreach ($produk as $row): ?>
				<option value="<?=$row->id_produk;?>" <?=$row->id_produk == $data->id_produk ? "selected" : ""?>><?=$row->nama_produk;?></option>
			<?php endforeach;?>
		</select>
		<br>
		<label for="id_pegawai">Nama Pegawai : </label>
		<select name="id_pegawai" id="id_pegawai">
			<option value="" disabled selected><< Pilih Pegawai >></option>
			<?php foreach ($pegawai as $row): ?>
				<option value="<?=$row->id_pegawai;?>" <?=$row->id_pegawai == $data->id_pegawai ? "selected" : ""?>><?=$row->nama_pegawai;?></option>
			<?php endforeach;?>
		</select>
		<br>
		<label for="kuantitas">Tanggal Jatuh Tempo : </label>
		<input type="number" name="kuantitas" id="kuantitas" value="<?=$data->kuantitas?>">
		<br>
		<label for="base_price">Harga Satuan : </label>
		<input type="text" name="base_price" id="base_price" value="<?=$data->base_price + $data->ppn?>">
		<br>
		<button type="submit" name="submit">Add Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
