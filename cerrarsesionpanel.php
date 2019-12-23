<?php
  $sesion = session_start();
  $sesion = session_unset();
  $sesion = session_destroy();
  header("Location: login.php");
?>
