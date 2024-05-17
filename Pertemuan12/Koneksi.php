<?php
$dbhost1 ="localhost";
$dbuser1="root";
$dbpass1 ="";
$dbname1="dbberita";

//lakukan koneksi dengan mysql
$connection=mysqli_connect($dbhost1,$dbuser1,$dbpass1,$dbname1);
if(!$connection)
{
echo"Tidak dapat terhubung dengan database";
}else{
    echo"terhubung";
}

?>