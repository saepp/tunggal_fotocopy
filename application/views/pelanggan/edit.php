<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Data Pelanggan</title>
</head>
<body>
	<h3>Edit Data Pelanggan</h3>
	<form method="POST" action="<?=base_url('/pelanggan/update/' . $data->id_pelanggan);?>">
		<input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?=$data->id_pelanggan;?>">
		<label for="nama_pelanggan">Nama Pelanggan : </label>
		<input type="text" name="nama_pelanggan" id="nama_pelanggan" value="<?=$data->nama_pelanggan;?>">
		<br>
		<label for="alamat_pelanggan">Alamat Pelanggan : </label>
		<input type="text" name="alamat_pelanggan" id="alamat_pelanggan" value="<?=$data->alamat_pelanggan;?>">
		<br>
		<label for="jenis_kelamin_pelanggan">Alamat Pelanggan : </label>
		<input type="radio" name="jenis_kelamin_pelanggan" id="lakilaki" value="Laki - Laki" <?=$data->jenis_kelamin_pelanggan == "Laki - Laki" ? "checked" : ""?>>
		<label for="lakilaki">Laki - Laki</label>
		<input type="radio" name="jenis_kelamin_pelanggan" id="perempuan" value="Perempuan" <?=$data->jenis_kelamin_pelanggan == "Perempuan" ? "checked" : ""?>>
		<label for="perempuan">Perempuan</label>
		<br>
		<label for="no_telp_pelanggan">Nomor Telepon Pelanggan : </label>
		<input type="number" name="no_telp_pelanggan" id="no_telp_pelanggan" value="<?=$data->no_telp_pelanggan;?>">
		<br>
		<button type="submit" name="submit">Edit Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
