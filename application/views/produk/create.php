<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Data Produk</title>
</head>
<body>
	<h3>Add Data Produk</h3>
	<form method="POST" action="<?=base_url('/produk/store');?>">
		<label for="id_produk">ID Produk : </label>
		<input type="text" name="id_produk" id="id_produk" placeholder="Contoh : P001">
		<br>
		<label for="nama_produk">Nama Produk : </label>
		<input type="text" name="nama_produk" id="nama_produk" placeholder="Contoh : John Doe">
		<br>
		<label for="satuan">Satuan : </label>
		<input type="text" name="satuan" id="satuan" placeholder="Contoh : Kg">
		<br>
		<button type="submit" name="submit">Add Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
