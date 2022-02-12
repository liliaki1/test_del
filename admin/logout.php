<?php session_start();
session_destroy(); //данные сессии уничтожаются
header('Location: index.php');
exit;