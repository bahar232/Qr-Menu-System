<?php
session_start();
unset($_SESSION['giris']);
unset($_SESSION['isim']);
unset($_SESSION['soyisim']);
unset($_SESSION['eposta']);
session_destroy();
header('Location: login.php');
exit;
?>