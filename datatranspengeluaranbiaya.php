<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi Pengeluaran Biaya</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="mt-3 border p-3 text-wrap">
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    <a href="tambahpengeluaranbiaya.php" class="btn btn-primary btn-md mb-3 mt-3">Tambah Transaksi Pengeluaran Biaya</a>
    <table class="table table-striped table-hover table-bordered">
    <thead class="table-dark">
        <th>ID</th>
        <th>TANGGAL</th>
        <th>NOMOR TRANSAKSI</th>
        <th>KETERANGAN</th>
        <th>TOTAL PEMBAYARAN</th>
        <th>AKSI</th>
    </thead>
    <?php
        include "koneksi.php";
        $no = 1;
        $query = mysqli_query($mysqli, 'SELECT * FROM tb_pengeluaranbiaya');
        while ($data = mysqli_fetch_array($query)) {
    ?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $data['tanggal']; ?></td>
		<td><?php echo $data['nomor_transaksi']; ?></td>
		<td><?php echo $data['keterangan']; ?></td>
        <td><?php echo $data['total_bayar']; ?></td>
		<td>
			<a class="edit" href="editpengeluaranbiaya.php?id=<?php echo $data['id']; ?>">Edit</a> |
			<a class="hapus" href="deletepengeluaranbiaya.php?id=<?php echo $data['id']; ?>">Hapus</a>					
		</td>
	</tr>
	<?php 
    ini_set("display_errors","Off");
    $total = $total+$data['total_bayar'];
    } 
    ?>

    <tr>
        <td colspan="4" style="text-align: left; font-size: 17px; color: maroon;">Total Pengeluaran Biaya :</td>
        <td style="font-size: 17px; text-align: right; "><font style="color: green;"><?php echo " Rp." . number_format($total).",-"; ?></font></td>
    </tr>
    </table>
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>