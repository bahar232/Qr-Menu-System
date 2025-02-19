<?php
include 'inc/database.php';
session_start();
if(!isset($_SESSION['giris'])) {
    header('Location: login.php');
    exit;
}


if (isset($_POST['kategori_ekle_buton'])) {
    if (
        isset($_POST['kategori_adi']) &&
        isset($_POST['kategori_adi_en']) 
       
    ) {
        $kategoriAdi = $_POST['kategori_adi'];
        $kategoriAdien = $_POST['kategori_adi_en'];
      

      
       

        $kategoriEkle = $db->prepare("INSERT INTO kategoriler (kategori_adi,kategori_adi_en) VALUES (?, ?)");
        $kategoriEkle->execute([$kategoriAdi, $kategoriAdien]);

        if ($kategoriEkle->rowCount()) {
            echo '<script>alert("kategori başarıyla eklendi.");</script>';
            header('Location: add-category.php');
        } else {
            echo '<script>alert("kategori eklenirken bir hata oluştu.");</script>';
        }
    } else {
        print_r($_POST);
      
        echo '<script>alert("Tüm alanları doldurun.");</script>';
    }
}


?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Kategori Ekle | Yönetim Paneli</title>
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
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Kategori Ekle</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item">
                                        <a href="#">Yönetim Paneli</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#">Kategori Yönetimi</a>
                                    </li>
                                    <li class="breadcrumb-item active">Kategori Ekle</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-plus-circle"></i>
                                        <span class="ml-1">Kategori Ekle</span>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <form enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Kategori Adı:</label>
                                                    <input type="text" name="kategori_adi" class="form-control" placeholder="kategori isim giriniz.">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kategori(ingilizce) Adı:</label>
                                                    <input type="text" name="kategori_adi_en" class="form-control" placeholder="kategori isim(ingilizce) giriniz.">
                                                </div>     
                                                
                                               
                                            </div>
                                   
                                        </div>
                                        <div class="float-right">
                                            <button type="reset" class="btn btn-danger mr-2">
                                                <i class="fas fa-trash"></i>
                                                <span class="ml-1">Temizle</span>
                                            </button>
                                            <button type="submit" name="kategori_ekle_buton" class="btn btn-success">
                                                <i class="fas fa-arrow-right"></i>
                                                <span class="ml-1">Kategori Ekle</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
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
