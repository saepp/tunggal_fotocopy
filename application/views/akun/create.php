<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Data Akun</title>
</head>
<body>
	<h3>Add Data Akun</h3>
	<form method="POST" action="<?=base_url('/akun/store');?>">
		<label for="nama_akun">Nama Akun : </label>
		<input type="text" name="nama_akun" id="nama_akun" placeholder="Contoh : Kas">
		<br>
		<label for="header_akun">Header Akun : </label>
		<input type="text" name="header_akun" id="header_akun" placeholder="Contoh : 1">
		<br>
		<label for="kode_akun">Kode Akun : </label>
		<input type="text" name="kode_akun" id="kode_akun" placeholder="Contoh : 111">
		<br>
		<button type="submit" name="submit">Add Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
