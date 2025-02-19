<?php
include 'inc/database.php';
session_start();
if(!isset($_SESSION['giris'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['yonetici_ekle_buton'])) {
    if (
        isset($_POST['isim']) &&
        isset($_POST['soyisim']) &&
        isset($_POST['eposta']) &&
        isset($_POST['sifre'])
    ) {
        $isim = $_POST['isim'];
        $soyisim = $_POST['soyisim'];
        $eposta = $_POST['eposta'];
        $sifre = password_hash($_POST['sifre'], PASSWORD_DEFAULT);

        $yoneticiEkle = $db->prepare("INSERT INTO yoneticiler (isim, soyisim, eposta, sifre) VALUES (?, ?, ?, ?)");
        $yoneticiEkle->execute([$isim, $soyisim, $eposta, $sifre]);

        if ($yoneticiEkle->rowCount()) {
            echo '<script>alert("Yönetici başarıyla eklendi.");</script>';
            header('Location: add-user.php');
        } else {
            echo '<script>alert("Yönetici eklenirken bir hata oluştu.");</script>';
        }
    } else {
        echo '<script>alert("Tüm alanları doldurun.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Yönetici Ekle | Yönetim Paneli</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include 'inc/navbar.php'; ?>
    <?php include 'inc/sidebar.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Yönetici Ekle</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Yönetim Paneli</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Kullanıcı yönetimi</a>
                            </li>
                            <li class="breadcrumb-item active">Yönetici Ekle</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Yönetici Ekle</h3>
                </div>
                <form method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="isim">İsim</label>
                            <input type="text" class="form-control" name="isim" id="isim" placeholder="İsim">
                        </div>
                        <div class="form-group">
                            <label for="soyisim">Soyisim</label>
                            <input type="text" class="form-control" name="soyisim" id="soyisim" placeholder="Soyisim">
                        </div>
                        <div class="form-group">
                            <label for="eposta">E-posta</label>
                            <input type="email" class="form-control" name="eposta" id="eposta" placeholder="E-posta">
                        </div>
                        <div class="form-group">
                            <label for="sifre">Şifre</label>
                            <input type="password" class="form-control" name="sifre" id="sifre" placeholder="Şifre">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="yonetici_ekle_buton" class="btn btn-primary">Gönder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'inc/footer.php'; ?>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/select2/js/select2.full.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script>
    $(function () {
        $('.select2').select2({
            theme: 'bootstrap4'
        });
    });
</script>
</body>
</html>

