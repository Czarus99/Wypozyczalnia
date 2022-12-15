<?php
session_start();


session_destroy();
header('Location: ' . '/Wypozyczalnia/index.php');
?>