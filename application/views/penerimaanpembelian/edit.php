<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Data Penerimaan Pembelian</title>
</head>
<body>
	<h3>Edit Data Penerimaan Pembelian</h3>
	<form method="POST" action="<?=base_url('/penerimaanpembelian/update/' . $data->id_penerimaan_pembelian_header);?>">
		<label for="keterangan">Keterangan : </label>
		<input type="text" name="keterangan" id="keterangan" value="<?=$data->keterangan?>">
		<br>
        <label for="id_pemesanan_pembelian_header">Nama Pemesanan : </label>
		<select name="id_pemesanan_pembelian_header" id="id_pemesanan_pembelian_header" value="<?=$data->id_pemesanan_pembelian_header?>">
			<option value="" disabled selected>>> PILIH PEMESANAN <<</option>
			<?php foreach ($pemesanan_pembelian_header as $row): ?>
				<option value="<?=$row->id_pemesanan_pembelian_header;?>" <?= $row->id_pemesanan_pembelian_header == $data->id_pemesanan_pembelian_header ? "selected" : "" ?>><?=$row->no_pemesanan;?></option>
			<?php endforeach;?>
		</select>
		<button type="submit" name="submit">Add Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
