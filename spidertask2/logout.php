<?php
session_start();

session_destroy();

echo "<script>window.open('loginasign.php','_self')</script>";

?>