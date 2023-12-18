<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Data Pemesanan Pembelian</title>
</head>
<body>
	<h3>Add Data Pemesanan Pembelian</h3>
	<form method="POST" action="<?=base_url('/pemesananpembelian/store');?>">
		<label for="keterangan">Keterangan : </label>
		<input type="text" name="keterangan" id="keterangan" placeholder="Contoh : Pemesanan Pulpen">
		<br>
		<label for="tgl_jatuh_tempo">Tanggal Jatuh Tempo : </label>
		<input type="date" name="tgl_jatuh_tempo" id="tgl_jatuh_tempo">
		<br>
		<label for="alamat_pengiriman">Alamat Pengiriman : </label>
		<input type="text" name="alamat_pengiriman" id="alamat_pengiriman" placeholder="Contoh : Jl. Bojongsoang No.1">
		<br>
		<label for="satuan">Satuan : </label>
		<input type="text" name="satuan" id="satuan" placeholder="Contoh : Kg">
		<br>
		<label for="id_supplier">Nama Supplier : </label>
		<select name="id_supplier" id="id_supplier">
			<option value="" disabled selected>>> PILIH SUPPLIER <<</option>
			<?php foreach ($supplier as $row): ?>
				<option value="<?=$row->id_supplier;?>"><?=$row->nama_supplier;?></option>
			<?php endforeach;?>
		</select>
		<button type="submit" name="submit">Add Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
