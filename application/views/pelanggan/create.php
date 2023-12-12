<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Data Pelanggan</title>
</head>
<body>
	<h3>Add Data Pelanggan</h3>
	<form method="POST" action="<?=base_url('/pelanggan/store');?>">
		<label for="id_pelanggan">ID Pelanggan : </label>
		<input type="text" name="id_pelanggan" id="id_pelanggan" placeholder="Contoh : P001">
		<br>
		<label for="nama_pelanggan">Nama Pelanggan : </label>
		<input type="text" name="nama_pelanggan" id="nama_pelanggan" placeholder="Contoh : John Doe">
		<br>
		<label for="alamat_pelanggan">Alamat Pelanggan : </label>
		<input type="text" name="alamat_pelanggan" id="alamat_pelanggan" placeholder="Contoh : Jl. Bojongsoang No. 1">
		<br>
		<label for="no_telp_pelanggan">Nomor Telepon Pelanggan : </label>
		<input type="number" name="no_telp_pelanggan" id="no_telp_pelanggan" placeholder="Contoh : 081234567890">
		<br>
		<button type="submit" name="submit">Add Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
