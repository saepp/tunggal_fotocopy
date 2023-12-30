<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Jurnal Penjualan</title>
</head>
<body>
	<h3>Jurnal Pembelian</h3>
	<table border="1">
		<tr>
			<th>No Pembayaran</th>
			<th>Tanggal</th>
			<th>Kode</th>
			<th>Nama Akun</th>
			<th>Debet</th>
			<th>Credit</th>
		</tr>
		<?php if (count($data) > 0):
    $nojurnal[0] = "";
    $n = 1;
    ?>
				<?php foreach ($data as $row): ?>
				<?php $nojurnal[$n] = $row->no_pembayaran;
    if ($nojurnal[$n] != $nojurnal[$n - 1]) {
        $nomor = $nojurnal[$n];
        $tgl = date('d F Y', strtotime($row->tgl_pembayaran));
    } else {
        $nomor = "";
        $tgl = "";
    }
    ?>
				<tr>
					<td><?=$nomor;?></td>
					<td><?=$tgl;?></td>
					<td><?=$row->kode_akun;?></td>
					<?php if ($row->posisi_dr_cr == 'credit'): ?>
							<td>&nbsp; &nbsp; &nbsp;<?=$row->nama_akun;?></td>
					<?php else: ?>
				<td><?=$row->nama_akun;?></td>
			<?php endif;?>
				<td><?=$row->posisi_dr_cr == 'debit' ? $row->nominal : '';?></td>
				<td><?=$row->posisi_dr_cr == 'credit' ? $row->nominal : '';?></td>
			</tr>
		<?php $n++;endforeach;?>
	<?php endif;?>
	</table>
</body>
</html>
