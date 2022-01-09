<?php
session_start();
session_unset();
session_status();
header("Location:login.php");
?>