<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Keuangan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
    require ('koneksi.php');

    $manufaktur = mysqli_query($mysqli, "SELECT * FROM si_manufaktur");

    $pembayaranutang = mysqli_query($mysqli, "SELECT total FROM tb_pembelian where tgl_beli = CURDATE()");
    $pembayaranutang = mysqli_fetch_array($pembayaranutang);

    $pengeluaranbiaya = mysqli_query($mysqli, "SELECT total_bayar FROM tb_pengeluaranbiaya where tanggal = CURDATE()");
    $pengeluaranbiaya = mysqli_fetch_array($pengeluaranbiaya);
    
    $pemasukanjual = mysqli_query($mysqli, "SELECT total FROM tb_penjualan where tgl_jual = CURDATE()");
    $pemasukanjual = mysqli_fetch_array($pemasukanjual);

    $pemasukanumum = mysqli_query($mysqli, "SELECT total FROM tb_pemasukanumum where tanggal = CURDATE()");
    $pemasukanumum = mysqli_fetch_array($pemasukanumum);
    

    $pengeluaran1=mysqli_query($mysqli,"SELECT * FROM tb_pembelian");
    while ($keluar1=mysqli_fetch_array($pengeluaran1)){
    $arraykeluar1[] = $keluar1['total'];
    }
    $jumlahkeluar = array_sum($arraykeluar1);

    $pengeluaran2=mysqli_query($mysqli,"SELECT * FROM tb_pengeluaranbiaya");
    while ($keluar2=mysqli_fetch_array($pengeluaran2)){
    $arraykeluar2[] = $keluar2['total_bayar'];
    }
    $jumlahkeluarbiaya = array_sum($arraykeluar2);

    $pemasukan1=mysqli_query($mysqli,"SELECT * FROM tb_penjualan");
    while ($masuk1=mysqli_fetch_array($pemasukan1)){
    $arraymasuk1[] = $masuk1['total'];
    }
    $jumlahmasuk = array_sum($arraymasuk1);

    $pemasukan2=mysqli_query($mysqli,"SELECT * FROM tb_pemasukanumum");
    while ($masuk2=mysqli_fetch_array($pemasukan2)){
    $arraymasuk2[] = $masuk2['total'];
    }
    $jumlahmasukumum = array_sum($arraymasuk2);


    $jumlahpemasukan = $jumlahmasuk + $jumlahmasukumum;
    $jumlahpengeluaran = $jumlahkeluar + $jumlahkeluarbiaya;
    $uang = $jumlahmasuk + $jumlahmasukumum - $jumlahkeluar - $jumlahkeluarbiaya;
    ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Keuangan</h1>
    </div>
    <div class="mt-3 border p-3 text-wrap">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        </form> <br>
        <table class="table table-striped table-hover table-bordered">
        <!-- Content Row -->
        <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan Dari Penjualan</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?=number_format($pemasukanjual['0'],2,',','.');?></div>
            </div>
            <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
        </div>
        </div> &nbsp Mingguan : Rp. 
        <?php
        echo number_format($jumlahmasuk,2,',','.');
        ?>
    </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan Umum</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?=number_format($pemasukanumum['0'],2,',','.');?></div>
            </div>
            <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
        </div>
        </div> &nbsp Mingguan : Rp. 
        <?php
        echo number_format($jumlahmasukumum,2,',','.');
        ?>
    </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pengeluaran Dari Utang</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?=number_format($pembayaranutang['0'],2,',','.');?></div>
            </div>
            <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
        </div>
        </div> &nbsp Mingguan : Rp. 
        <?php
        echo number_format($jumlahkeluar,2,',','.');
        ?>
    </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pengeluaran Biaya Lain - Lain</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?=number_format($pengeluaranbiaya['0'],2,',','.');?></div>
            </div>
            <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
        </div>
        </div> &nbsp Mingguan : Rp. 
        <?php
        echo number_format($jumlahkeluarbiaya,2,',','.');
        ?>
    </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Pemasukan</div>
            <div class="row no-gutters align-items-center">
                <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp.<?=number_format($jumlahpemasukan,2,',','.');?></div>
                </div>   
            </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Pengeluaran</div>
            <div class="row no-gutters align-items-center">
                <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp.<?=number_format($jumlahpengeluaran,2,',','.');?></div>
                </div>   
            </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Nominal Akhir</div>
            <div class="row no-gutters align-items-center">
                <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp.<?=number_format($uang,2,',','.');?></div>
                </div>   
            </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>
</html>