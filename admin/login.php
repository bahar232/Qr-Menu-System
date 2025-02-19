<?php
require 'inc/database.php';
session_start();
if (isset($_SESSION['giris'])) {
    header('Location: index.php');
    exit;
}

$girisDurum = null;
$girisDurumMesaj = null;

if(isset($_POST['giris_buton'])) {
    if (isset($_POST['giris_eposta']) && isset($_POST['giris_sifre'])) {
        $girisEposta = $_POST['giris_eposta'];
        $girisSifre = md5($_POST['giris_sifre']);

        $yoneticiSorgu = $db->prepare("SELECT * FROM yoneticiler WHERE eposta = ? AND sifre = ? LIMIT 1");
        $yoneticiSorgu->execute([$girisEposta, $girisSifre]);
        if ($yoneticiSorgu->rowCount()) {
            $yoneticiGetir = $yoneticiSorgu->fetch();
            
            $_SESSION['giris'] = 1;
            $_SESSION['eposta'] = $girisEposta;
            $_SESSION['isim'] = $yoneticiGetir['isim'];
            $_SESSION['soyisim'] = $yoneticiGetir['soyisim'];

            $girisDurum = 1;
            $girisDurumMesaj = 'Başarıyla giriş yapıldı.';
            header('Location: index.php');
        } else {
            $girisDurum = 0;
            $girisDurumMesaj = 'Hatalı eposta veya şifre girdiniz.';
        }
    } else {
        $girisDurum = 0;
        $girisDurumMesaj = 'Eksik bilgiler girdiniz.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>AdminLTE 3 | Log in</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
        <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
        <link rel="stylesheet" href="dist/css/adminlte.min.css" />
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="index2.html">
                    <b>Admin</b>LTE
                </a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Yönetim paneline giriş yap.</p>
                    <?php if ($girisDurum == 1) { ?>
                    <div class="alert alert-success p-2">
                        <span><?= $girisDurumMesaj; ?></span>
                    </div>
                    <?php } else if ($girisDurum = 0) { ?>
                    <div class="alert alert-danger p-2">
                        <span><?= $girisDurumMesaj; ?></span>
                    </div>
                    <?php } ?>
                    <form method="post">
                        <div class="input-group mb-3">
                            <input type="email" name="giris_eposta" class="form-control" placeholder="E-Posta Adresi" />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="giris_sifre" class="form-control" placeholder="Şifre" />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="giris_buton" class="btn btn-primary btn-block">Giriş Yap</button>
                    </form>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
    </body>
</html>
