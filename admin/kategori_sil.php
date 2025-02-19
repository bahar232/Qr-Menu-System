<?php
include 'inc/database.php';

if(isset($_GET['id'])) {
    $kategoriId = $_GET['id'];
    
    // Kategori verilerini silme sorgusu
    $silmeSorgusu = $db->prepare("DELETE FROM kategoriler WHERE id = :kategoriId");
    $silmeSorgusu->bindParam(':kategoriId', $kategoriId);
    
    if ($silmeSorgusu->execute()) {
        // Kategori başarıyla silindi
        header('Location: categories.php'); // Kategori listesi sayfasına yönlendirme
    } else {
        // Silme işlemi başarısız oldu
        echo "Kategori silinemedi!";
    }
} else {
    echo "Geçersiz kategori ID";
}
?>
