<?php
/**
*using mysqli_connect for database connection
*/

$databaseHost='localhost';
$databaseName='si_manufaktur';
$databaseUsername='root';
$databasePassword='';

$mysqli=mysqli_connect($databaseHost,  $databaseUsername, $databasePassword, $databaseName);
if ($mysqli) {
    echo "";
    } else {
    echo "server tidak konek";
    }
?>