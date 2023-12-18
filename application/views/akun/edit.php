<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Data Akun</title>
</head>
<body>
	<h3>Edit Data Akun</h3>
	<form method="POST" action="<?=base_url('/akun/update/' . $data->id_akun);?>">
		<input type="hidden" name="id_akun" id="id_akun" value="<?=$data->id_akun;?>">
		<label for="nama_akun">Nama Akun : </label>
		<input type="text" name="nama_akun" id="nama_akun" value="<?=$data->nama_akun;?>">
		<br>
		<label for="header_akun">Header Akun : </label>
		<input type="text" name="header_akun" id="header_akun" value="<?=$data->header_akun;?>">
		<br>
		<label for="kode_akun">Kode Akun : </label>
		<input type="number" name="kode_akun" id="kode_akun" value="<?=$data->kode_akun;?>">
		<br>
		<button type="submit" name="submit">Edit Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
