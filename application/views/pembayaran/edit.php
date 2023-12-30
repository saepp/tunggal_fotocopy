<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Data Pembayaran</title>
</head>
<body>
	<h3>Edit Data Pembayaran</h3>
	<form method="POST" action="<?=base_url('/pembayaran/update/' . $data->id_pembayaran);?>">
		<label for="status_pembayaran"> Status Pembayaran : </label>
		<select name="status_pembayaran" id="status_pembayaran">
			<option value="Gagal" <?=$data->status_pembayaran == "Gagal" ? "selected" : "";?>>Gagal</option>
			<option value="Menunggu Pembayaran" <?=$data->status_pembayaran == "Menunggu Pembayaran" ? "selected" : "";?>>Menunggu Pembayaran</option>
			<option value="Berhasil" <?=$data->status_pembayaran == "Berhasil" ? "selected" : "";?>>Berhasil</option>
			</select>
		<br>
		<button type="submit" name="submit">Edit Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
