<?php
try {
	$db = new PDO('mysql:host=localhost;dbname=kafe;', 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die('Hata: ' . $e->getMessage());
}
