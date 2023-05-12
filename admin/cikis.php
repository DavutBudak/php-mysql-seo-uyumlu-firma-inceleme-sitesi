
<?php
include "admin_init.php";

?>
<?php
session_start();
unset($_SESSION['admin_login']);
header("Refresh:0; url=giris.php");
?>
