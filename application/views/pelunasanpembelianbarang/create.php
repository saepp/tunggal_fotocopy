<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Data Pelunasan Pembelian Barang</title>
</head>
<body>
	<h3>Add Data Pelunasan Pembelian Barang</h3>
	<form method="POST" action="<?=base_url('/pelunasanpembelianbarang/store');?>">
		<label for="keterangan">Keterangan : </label>
		<input type="text" name="keterangan" id="keterangan" placeholder="Contoh : Pelunasan Pembelian Buku">
		<br>
		<label for="id_penerimaan_pembelian_header">Pilih Penerimaan : </label>
		<select name="id_penerimaan_pembelian_header" id="id_penerimaan_pembelian_header">
			<option value="" disabled selected>-- Pilih Penerimaan --</option>
			<?php foreach ($penerimaan as $p): ?>
				<option value="<?=$p->id_penerimaan_pembelian_header;?>"><?=$p->no_penerimaan;?> - <?=$p->total_penerimaan;?> - <?=$p->nama_supplier;?> - <?=$p->tgl_penerimaan;?></option>
			<?php endforeach;?>
		</select>
		<br>
		<label for="nominal_pembayaran">Nominal Pembayaran : </label>
		<input type="number" name="nominal_pembayaran" id="nominal_pembayaran" placeholder="Contoh : 10.000">
		<br>
		<button type="submit" name="submit">Add Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
