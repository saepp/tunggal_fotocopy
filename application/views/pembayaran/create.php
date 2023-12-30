<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Data Pembayaran</title>
</head>
<body>
	<h3>Add Data Pembayaran</h3>
	<form method="POST" action="<?=base_url('/pembayaran/store');?>">
		<label for="metode_pembayaran">Metode Pembayaran : </label>
		<select name="metode_pembayaran" id="metode_pembayaran">
			<option value="Cash">Cash</option>
			<option value="Transfer Bank">Transfer Bank</option>
			<option value="QRIS">QRIS</option>
			<option value="Virtual Account">Virtual Account</option>
		</select>
		<br>
		<label for="id_penjualan_barang_header">Penjualan Header : </label>
		<select name="id_penjualan_barang_header" id="id_penjualan_barang_header">
			<?php foreach ($data as $row): ?>
				<option value="<?=$row->id_penjualan_barang_header;?>"><?=$row->no_penjualan;?></option>
			<?php endforeach;?>
		</select>
		<br>
		<button type="submit" name="submit">Add Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
