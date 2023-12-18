<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Data Pegawai</title>
</head>
<body>
	<h3>Edit Data Pegawai</h3>
	<form method="POST" action="<?=base_url('/pegawai/update/' . $data->id_pegawai);?>">
		<input type="hidden" name="id_pegawai" id="id_pegawai" value="<?=$data->id_pegawai;?>">
		<label for="nama_pegawai">Nama Pegawai : </label>
		<input type="text" name="nama_pegawai" id="nama_pegawai" value="<?=$data->nama_pegawai;?>">
		<br>
		<label for="alamat_pegawai">Alamat Pegawai : </label>
		<input type="text" name="alamat_pegawai" id="alamat_pegawai" value="<?=$data->alamat_pegawai;?>">
		<br>
		<label for="no_telp_pegawai">Nomor Telepon Pegawai : </label>
		<input type="number" name="no_telp_pegawai" id="no_telp_pegawai" value="<?=$data->no_telp_pegawai;?>">
		<br>
		<label for="jenis_kelamin_pegawai">Jenis Kelamin Pegawai : </label>
		<input type="radio" name="jenis_kelamin_pegawai" id="lakilaki" value="Laki - Laki" <?=$data->jenis_kelamin_pegawai == "Laki - Laki" ? "checked" : ""?>>
		<label for="lakilaki">Laki - Laki</label>
		<input type="radio" name="jenis_kelamin_pegawai" id="perempuan" value="Perempuan" <?=$data->jenis_kelamin_pegawai == "Perempuan" ? "checked" : ""?>>
		<label for="perempuan">Perempuan</label>
		<br>
		<label for="posisi_pegawai">Posisi Pegawai : </label>
		<input type="text" name="posisi_pegawai" id="posisi_pegawai" value="<?=$data->posisi_pegawai;?>">
		<br>
		<button type="submit" name="submit">Edit Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
