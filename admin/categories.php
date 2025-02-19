<?php
include 'inc/database.php';
session_start();
if(!isset($_SESSION['giris'])) {
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Kategori Liste | Yönetim Paneli</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
        <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <link rel="stylesheet" href="dist/css/adminlte.min.css" />
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <?php include 'inc/navbar.php'; ?>
            <?php include 'inc/sidebar.php'; ?>
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Kategori Liste</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Yönetim Paneli</a></li>
                                    <li class="breadcrumb-item active">Kategoriler</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kategori</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">#</th>
                                        <th style="width: 40%">Kategori Adı (Türkçe)</th>
                                        <th style="width: 40%">Kategori Adı (İngilizce)</th>
                                        <th style="width: 19%" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $kategoriler = $db->query("SELECT * FROM kategoriler ORDER BY kategori_adi ASC");
                                    $kategoriler = $kategoriler->rowCount() > 0 ? $kategoriler->fetchAll() : null;
                                    $rowNumber = 1; // Satır numarasını takip etmek için bir değişken

                                    foreach ($kategoriler as $kategori) { ?>
                                        <tr>
                                            <td><?= $rowNumber++; ?></td>
                                            <td><?= $kategori['kategori_adi']; ?></td>
                                            <td><?= $kategori['kategori_adi_en']; ?></td>
                                            <td class="project-actions text-center">
                                                <a class="btn btn-info btn-sm" href="#">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="kategori_sil.php?id=<?= $kategori['id'] ?>">
                                                    <i class="fas fa-trash"></i>
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.content -->
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
