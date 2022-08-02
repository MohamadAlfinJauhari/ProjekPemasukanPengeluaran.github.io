<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Edit Pemasukan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<?php
// include database connection file
include_once("koneksi.php");

//check if from submitted for users update, then redirect to homepage after update
if(isset($_POST['update']))
{
    $id=$_POST['id'];
    $tanggal = $_POST['tanggal'];
    $nomor_transaksi = $_POST['nomor_transaksi'];
    $keterangan = $_POST['keterangan'];
    $total = $_POST['total'];

    //update user data
    $result=mysqli_query($mysqli,"UPDATE tb_pemasukanumum SET tanggal='$tanggal',nomor_transaksi='$nomor_transaksi',keterangan='$keterangan',total='$total' WHERE id=$id");

    //redirect to homepage to display updated users in list
    header("Location:datatranspemasukanumum.php");
}
?>

<?php
// display selected user data based on id
//getting id from url
$id=$_GET['id'];

//fetch user data based on id
$result=mysqli_query($mysqli,"SELECT * FROM tb_pemasukanumum WHERE id='$_GET[id]'");

while($data=mysqli_fetch_array($result))
{
    $tanggal = $data['tanggal'];
    $nomor_transaksi = $data['nomor_transaksi'];
    $keterangan = $data['keterangan'];
    $total = $data['total'];
}
?>
<html>
<head>
    <title>Edit Pemasukan</title>
</head>
<body>
<div class="container border p-3">
    <h2 class="alert alert-info text-center fw-bolder mt-3">EDIT TRANSAKSI PEMASUKAN</h2>
    <form  method="POST" id="forminput" enctype="multipart/form-data">
    <a href="tambahpemasukanumum.php">Home</a>
    <br/><br/>

    <form name="update_user" method="post" action="editpemasukanumum.php">
        <table border="0">
            <tr>
            <td>Tanggal</td>
            <td><input type="date" name="tanggal" value=<?php echo $tanggal; ?>></td>
            </tr>
            <tr>
            <td>Nomor Transaksi</td>
            <td><input type="text" name="nomor_transaksi" value=<?php echo $nomor_transaksi; ?>></td>
            </tr>
            <tr>
            <td>Keterangan</td>
            <td><input type="text" name="keterangan" value=<?php echo $keterangan; ?>></td>
            </tr>
            <tr>
            <td>Total Pembayaran</td>
            <td><input type="text" name="total" value=<?php echo $total; ?>></td>
            </tr>
                <tr>
                    <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
</table>
</form>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>