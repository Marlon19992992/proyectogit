<?php
session_start();
session_unset(); // limpia variables
session_destroy();
header("Location: login.php"); // mejor redirigir al login
exit();
?>
