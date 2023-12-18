<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Data Pemesanan Pembelian</title>
</head>
<body>
	<h3>Edit Data Pemesanan Pembelian</h3>
	<form method="POST" action="<?=base_url('/pemesananpembelian/update/' . $data->id_pemesanan_pembelian_header);?>">
		<label for="keterangan">Keterangan : </label>
		<input type="text" name="keterangan" id="keterangan" value="<?=$data->keterangan?>">
		<br>
		<label for="status">Status : </label>
		<select name="status" id="status">
			<option value="" disabled selected><< PILIH STATUS PEMESANAN >></option>
			<option value="Proses" <?=$data->status == "Proses" ? "selected" : ""?>>Proses</option>
			<option value="Selesai" <?=$data->status == "Selesai" ? "selected" : ""?>>Selesai</option>
		</select>
		<br>
		<label for="tgl_jatuh_tempo">Tanggal Jatuh Tempo : </label>
		<input type="date" name="tgl_jatuh_tempo" id="tgl_jatuh_tempo" value="<?=$data->tgl_jatuh_tempo?>">
		<br>
		<label for="alamat_pengiriman">Alamat Pengiriman : </label>
		<input type="text" name="alamat_pengiriman" id="alamat_pengiriman" value="<?=$data->alamat_pengiriman?>">
		<br>
		<label for="id_supplier">Nama Supplier : </label>
		<select name="id_supplier" id="id_supplier">
			<option value="" disabled selected>>> PILIH SUPPLIER <<</option>
			<?php foreach ($supplier as $row): ?>
				<option value="<?=$row->id_supplier;?>" <?=$row->id_supplier == $data->id_supplier ? "selected" : ""?>><?=$row->nama_supplier;?></option>
			<?php endforeach;?>
		</select>
		<br>
		<button type="submit" name="submit">Add Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
