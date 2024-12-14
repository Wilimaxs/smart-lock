<?php
error_reporting(0);
include"konek.php";

$tampil=mysqli_query($konek,"select * from kondisi");
$data=mysqli_fetch_array($tampil);

print"$data[status]";
print"$data[waktuawal]";
print"$data[waktuakhir]";

?>