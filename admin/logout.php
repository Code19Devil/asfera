<?php
session_start();
$baseURL=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http').'://'.$_SERVER['SERVER_NAME'].'/';
session_destroy();
header("Location: $baseURL ");
?>
