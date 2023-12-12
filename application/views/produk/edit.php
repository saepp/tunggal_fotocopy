<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Data Produk</title>
</head>
<body>
	<h3>Edit Data Produk</h3>
	<form method="POST" action="<?=base_url('/produk/update/' . $data->id_produk);?>">
		<input type="hidden" name="id_produk" id="id_produk" value="<?=$data->id_produk;?>">
		<label for="nama_produk">Nama Produk : </label>
		<input type="text" name="nama_produk" id="nama_produk" value="<?=$data->nama_produk;?>">
		<br>
		<label for="satuan">Satuan : </label>
		<input type="text" name="satuan" id="satuan" value="<?=$data->satuan;?>">
		<br>
		<button type="submit" name="submit">Edit Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
