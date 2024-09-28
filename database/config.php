<?php  
date_default_timezone_set('Asia/Jakarta');
// session_start();
$con = mysqli_connect('localhost:3307','root','','db_eposyandu'); 
if (!$con) 
{
    die('Connect Error: ' . mysqli_connect_errno());
}
?>
