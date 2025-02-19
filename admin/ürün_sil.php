<?php
include 'inc/database.php';
session_start();
if (!isset($_SESSION['giris'])) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['sil'])) {
    $urunId = $_GET['sil'];
    $urunSorgu = $db->prepare("SELECT * FROM urunler WHERE id = ?");
    $urunSorgu->execute([$urunId]);
    $urun = $urunSorgu->fetch(PDO::FETCH_ASSOC);

    if ($urun) {
        
        if (!empty($urun['urun_gorsel_1'])) {
            unlink('dist/img/urunler/' . $urun['urun_gorsel_1']);
        }
        if (!empty($urun['urun_gorsel_2'])) {
            unlink('dist/img/urunler/' . $urun['urun_gorsel_2']);
        }
        if (!empty($urun['urun_gorsel_3'])) {
            unlink('dist/img/urunler/' . $urun['urun_gorsel_3']);
        }

        $urunSilSorgu = $db->prepare("DELETE FROM urunler WHERE id = ?");
        $urunSilSorgu->execute([$urunId]);

        if ($urunSilSorgu->rowCount()) {
            echo '<script>alert("Ürün başarıyla silindi.");</script>';
        } else {
            echo '<script>alert("Ürün silinirken bir hata oluştu.");</script>';
        }
    }
}


header('Location: products.php');
exit;
