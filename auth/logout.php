<?php require_once "../database/config.php";
        session_start();
        session_destroy();
 echo "<script>window.location='../auth';</script>";

 ?>