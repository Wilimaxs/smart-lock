<?php
error_reporting(0);

//$status=$_POST['kode'];

include"konek.php";

$edit=mysqli_query($konek,"update kondisi set status='HIDUP'");

?>