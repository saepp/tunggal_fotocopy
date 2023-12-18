<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Data Pegawai</title>
</head>
<body>
	<h3>Add Data Pegawai</h3>
	<form method="POST" action="<?=base_url('/pegawai/store');?>">
		<label for="nama_pegawai">Nama Pegawai : </label>
		<input type="text" name="nama_pegawai" id="nama_pegawai" placeholder="Contoh : John Doe">
		<br>
		<label for="alamat_pegawai">Alamat Pegawai : </label>
		<input type="text" name="alamat_pegawai" id="alamat_pegawai" placeholder="Contoh : Jl. Bojongsoang No. 1">
		<br>
		<label for="no_telp_pegawai">Nomor Telepon Pegawai : </label>
		<input type="number" name="no_telp_pegawai" id="no_telp_pegawai" placeholder="Contoh : 081234567890">
		<br>
		<label for="jenis_kelamin_pegawai">Jenis Kelamin Pegawai : </label>
		<input type="radio" name="jenis_kelamin_pegawai" id="lakilaki" value="Laki - Laki" checked>
		<label for="lakilaki">Laki - Laki</label>
		<input type="radio" name="jenis_kelamin_pegawai" id="perempuan" value="Perempuan">
		<label for="perempuan">Perempuan</label>
		<br>
		<label for="posisi_pegawai">Posisi Pegawai : </label>
		<input type="text" name="posisi_pegawai" id="posisi_pegawai" placeholder="Contoh : Kasir">
		<br>
		<button type="submit" name="submit">Add Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
