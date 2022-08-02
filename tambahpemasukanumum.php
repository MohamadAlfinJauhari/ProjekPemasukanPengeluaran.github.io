<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Transaksi Pemasukan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="container border p-3">
    <h2 class="alert alert-info text-center fw-bolder mt-3">TRANSAKSI PEMASUKAN</h2>
    <form  method="POST" id="forminput" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" placeholder="Masukan tanggal saat ini">   
        </div>
        <div class="form-group mb-3">
            <label>Nomor Transaksi</label>
            <input type="text" name="nomor_transaksi" class="form-control" placeholder="Masukan nomor transaksi">   
        </div>
        <div class="form-group mb-3">
            <label>Keterangan Penerimaan</label>
            <input type="text" name="keterangan" class="form-control" placeholder="Masukan transaksi penerimaan">   
        </div>
        <div class="form-group mb-3">
            <label>Total Pembayaran</label>
            <input type="text" name="total" class="form-control" placeholder="Masukan total penerimaan">   
        </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-1">
                <span class="input-group-text">Rp</span>
                </div>
                <div class="col-md-3">
                <input type="text" class="form-control" name="total"><br><br>
                </div>
        <div>
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            <a href="tambahpemasukanumum.php" class="btn btn-danger">Input Lagi</a>
            <a href="datatranspemasukanumum.php" class="btn btn-warning">Daftar Pemasukan</a>
        </div>
    </form>
    </div>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
<?php
// Cek data jika sdh di submit, insert data ke dalam tabel
if(isset($_POST['submit'])){
    $tanggal = $_POST['tanggal'];
    $nomor_transaksi = $_POST['nomor_transaksi'];
    $keterangan = $_POST['keterangan'];
    $total = $_POST['total'];
    // HUbungkan dengan file config.php
    include_once("koneksi.php");
            
    // menambah data kedalam tabel 
    $result = mysqli_query($mysqli, "INSERT INTO tb_pemasukanumum(tanggal,nomor_transaksi,keterangan,total) VALUES('$tanggal','$nomor_transaksi','$keterangan','$total')");
}
?>
  </body>
</html>