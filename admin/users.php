<?php
include 'inc/database.php';
session_start();
if(!isset($_SESSION['giris'])) {
    header('Location: login.php');
    exit;
}

$yoneticiSorgu = $db->query("SELECT * FROM yoneticiler");

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Yönetici Listesi | Yönetim Paneli</title>
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
                        <h1>Yönetici Listesi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Yönetim Paneli</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Kullanıcı yönetimi</a>
                            </li>
                            <li class="breadcrumb-item active">Yönetici Listesi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Yönetici Listesi</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>İsim</th>
                                <th>Soyisim</th>
                                <th>E-posta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($yoneticiSorgu->fetchAll() as $yonetici) { ?>
                                <tr>
                                    <td><?= $yonetici['id']; ?></td>
                                    <td><?= $yonetici['isim']; ?></td>
                                    <td><?= $yonetici['soyisim']; ?></td>
                                    <td><?= $yonetici['eposta']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
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
