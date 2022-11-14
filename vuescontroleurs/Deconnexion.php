<?php
session_start();
session_destroy();
header('Location:formConnexion.php');
exit;
?>