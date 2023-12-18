<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Data Supplier</title>
</head>
<body>
	<h3>Edit Data Supplier</h3>
	<form method="POST" action="<?=base_url('/supplier/update/' . $data->id_supplier);?>">
		<input type="hidden" name="id_supplier" id="id_supplier" value="<?=$data->id_supplier;?>">
		<label for="nama_supplier">Nama Supplier : </label>
		<input type="text" name="nama_supplier" id="nama_supplier" value="<?=$data->nama_supplier;?>">
		<br>
		<label for="alamat_supplier">Alamat Supplier : </label>
		<input type="text" name="alamat_supplier" id="alamat_supplier" value="<?=$data->alamat_supplier;?>">
		<br>
		<label for="no_telp_supplier">Nomor Telepon Supplier : </label>
		<input type="number" name="no_telp_supplier" id="no_telp_supplier" value="<?=$data->no_telp_supplier;?>">
		<br>
		<label for="nama_cp_supplier">Contact Person Supplier : </label>
		<input type="text" name="nama_cp_supplier" id="nama_cp_supplier" value="<?=$data->nama_cp_supplier;?>">
		<br>
		<label for="no_telp_cp_supplier">Nomor Contact Person Supplier : </label>
		<input type="number" name="no_telp_cp_supplier" id="no_telp_cp_supplier" value="<?=$data->no_telp_cp_supplier;?>">
		<br>
		<button type="submit" name="submit">Edit Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
