<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Data Pelunasan Pembelian Barang</title>
</head>
<body>
	<h3>Edit Data Pelunasan Pembelian Barang</h3>
	<form method="POST" action="<?=base_url('/pelunasanpembelianbarang/update/' . $data->id_pelunasan_pembelian_barang);?>">
		<label for="keterangan">Keterangan : </label>
		<input type="text" name="keterangan" id="keterangan" value="<?=$data->keterangan;?>">
		<br>
		<label for="id_penerimaan_pembelian_header">Pilih Penerimaan : </label>
		<select name="id_penerimaan_pembelian_header" id="id_penerimaan_pembelian_header">
			<option value="" disabled selected>-- Pilih Penerimaan --</option>
			<?php foreach ($penerimaan as $p): ?>
				<option value="<?=$p->id_penerimaan_pembelian_header;?>" <?=$data->id_penerimaan_pembelian_header == $p->id_penerimaan_pembelian_header ? "selected" : "";?>><?=$p->no_penerimaan;?> - <?=$p->total_penerimaan;?> - <?=$p->nama_supplier;?> - <?=$p->tgl_penerimaan;?></option>
			<?php endforeach;?>
		</select>
		<br>
		<label for="id_pembayaran">Pilih Pembayaran : </label>
		<select name="id_pembayaran" id="id_pembayaran">
			<option value="" disabled selected>-- Pilih Pembayaran --</option>
			<?php foreach ($pembayaran as $p): ?>
				<option value="<?=$p->id_pembayaran;?>" <?=$data->id_pembayaran == $p->id_pembayaran ? "selected" : "";?>><?=$p->no_pembayaran;?> - <?=$p->tgl_pembayaran;?></option>
			<?php endforeach;?>
		</select>
		<br>
		<label for="nominal_pembayaran">Nominal Pembayaran : </label>
		<input type="number" name="nominal_pembayaran" id="nominal_pembayaran" value="<?=$data->nominal_pembayaran;?>">
		<br>
		<button type="submit" name="submit">Edit Data</button>
	</form>
	<button onclick="history.go(-1)">Back</button>
</body>
</html>
