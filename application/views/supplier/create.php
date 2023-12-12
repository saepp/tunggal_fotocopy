<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Data Supplier</title>
</head>
<body>
	<h3>Add Data Supplier</h3>
	<form method="POST" action="<?=base_url('/supplier/store');?>">
		<label for="id_supplier">ID Supplier : </label>
		<input type="text" name="id_supplier" id="id_supplier" placeholder="Contoh : P001">
		<br>
		<label for="nama_supplier">Nama Supplier : </label>
		<input type="text" name="nama_supplier" id="nama_supplier" placeholder="Contoh : John Doe">
		<br>
		<label for="alamat_supplier">Alamat Supplier : </label>
		<input type="text" name="alamat_supplier" id="alamat_supplier" placeholder="Contoh : Jl. Bojongsoang No. 1">
		<br>
		<label for="no_telp_supplier">Nomor Telepon Supplier : </label>
		<input type="number" name="no_telp_supplier" id="no_telp_supplier" placeholder="Contoh : 081234567890">
		<br>
		<button type="submit" name="submit">Add Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
