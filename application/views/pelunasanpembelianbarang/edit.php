<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Data Pelunasan Pembelian Barang</title>
</head>
<body>
	<h3>Edit Data Pelunasan Pembelian Barang</h3>
	<form method="POST" action="<?=base_url('/pelunasanpembelianbarang/update/' . $data->id_pelunasan_pembelian_barang);?>">
		<label for="keterangan">Keterangan : </label>
		<input type="text" name="keterangan" id="keterangan" value="<?=$data->keterangan;?>">
		<br>
		<button type="submit" name="submit">Edit Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
