<?php
// include database connection file 
include_once("koneksi.php");

//get id from URL to delete that users
$id=$_GET['id'];

//delete user row from table based on given id
$result=mysqli_query($mysqli,"DELETE FROM tb_pengeluaranbiaya WHERE id=$id");

//after delete redirect to Home, so that latest user list will be displayed.
header("location:datatranspengeluaranbiaya.php");
?>