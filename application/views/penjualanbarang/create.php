<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Data Penjualan Barang</title>
</head>
<body>
	<h3>Add Data Penjualan Barang</h3>
	<form method="POST" action="<?=base_url('/penjualanbarang/store');?>">
		<label for="keterangan">Keterangan : </label>
		<input type="text" name="keterangan" id="keterangan" placeholder="Contoh : Penjualan Pulpen">
		<br>
		<label for="id_pelanggan">Pelanggan : </label>
		<select name="id_pelanggan" id="id_pelanggan">
			<option value="" disabled selected>>> PILIH PELANGGAN <<</option>
			<?php foreach ($pelanggan as $row): ?>
				<option value="<?=$row->id_pelanggan;?>"><?=$row->nama_pelanggan;?></option>
			<?php endforeach;?>
		</select>
		<br>
		<label for="id_pegawai">Pegawai : </label>
		<select name="id_pegawai" id="id_pegawai">
			<option value="" disabled selected>>> PILIH PEGAWAI <<</option>
			<?php foreach ($pegawai as $row): ?>
				<option value="<?=$row->id_pegawai;?>"><?=$row->nama_pegawai;?></option>
			<?php endforeach;?>
		</select>
		<br>
		<button type="submit" name="submit">Add Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
