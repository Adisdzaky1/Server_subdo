<?php
session_start(); // memulai session
// menghapus semua variabel session
session_unset(); 
// menghapus session
session_destroy(); 
// redirect ke halaman login
header("Location: ../login.php");
exit();
?>
