<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi Pemasukan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="mt-3 border p-3 text-wrap">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> <br>
        <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark"> 
            <th>NO</th>
            <th>TANGGAL</th>
            <th>NOMOR FAKTUR</th>
            <th>KODE BARANG</th>
            <th>NAMA CUSTOMER</th>    
            <th>NAMA BARANG</th>
            <th>JUMLAH BARANG</th>
            <th>TOTAL PEMBAYARAN</th>
        </thead>   

        <?php
            include "koneksi.php";
            $no = 1;
            $query = mysqli_query($mysqli, 'SELECT * FROM tb_penjualan');
            while ($data = mysqli_fetch_array($query)) {
        ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['tgl_jual']; ?></td>
            <td><?php echo $data['no_faktur']; ?></td>
			<td><?php echo $data['kode_barang']; ?></td>
			<td><?php echo $data['nama_customer']; ?></td>
            <td><?php echo $data['rincian_pemesanan']; ?></td>
            <td><?php echo $data['qty']; ?></td>
            <td><?php echo $data['total']; ?></td>
		</tr>
		<?php 
        ini_set("display_errors","Off");
        $total = $total+$data['total'];
        } 
        ?>

        <tr>
            <td colspan="4" style="text-align: left; font-size: 17px; color: maroon;">Total Pemasukan :</td>
            <td style="font-size: 17px; text-align: right; "><font style="color: green;"><?php echo " Rp." . number_format($total).",-"; ?></font></td>
        </tr>
    </table>
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>