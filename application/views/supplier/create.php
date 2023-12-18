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
		<label for="nama_supplier">Nama Supplier : </label>
		<input type="text" name="nama_supplier" id="nama_supplier" placeholder="Contoh : Kiky">
		<br>
		<label for="alamat_supplier">Alamat Supplier : </label>
		<input type="text" name="alamat_supplier" id="alamat_supplier" placeholder="Contoh : Jl. Bojongsoang No. 1">
		<br>
		<label for="no_telp_supplier">Nomor Telepon Supplier : </label>
		<input type="number" name="no_telp_supplier" id="no_telp_supplier" placeholder="Contoh : 081234567890">
		<br>
		<label for="nama_cp_supplier">Contact Person Supplier : </label>
		<input type="text" name="nama_cp_supplier" id="nama_cp_supplier" placeholder="Contoh : Jane Doe">
		<br>
		<label for="no_telp_cp_supplier">Nomor Contact Person Supplier : </label>
		<input type="number" name="no_telp_cp_supplier" id="no_telp_cp_supplier" placeholder="Contoh : 081234567890">
		<br>
		<button type="submit" name="submit">Add Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
