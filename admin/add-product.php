<?php
include 'inc/database.php';
session_start();
if(!isset($_SESSION['giris'])) {
    header('Location: login.php');
    exit;
}

function resimDosyaYukle($fileName) {
    $dosyaUzantisi = pathinfo($_FILES[$fileName]['name'], PATHINFO_EXTENSION);
    $dosyaBoyutu = $_FILES[$fileName]['size'];
    $yeniDosyaAdi = time() . rand(111, 999) . '.' . $dosyaUzantisi;
    $yuklemeYeri = 'dist/img/urunler/' . $yeniDosyaAdi;

    if ($dosyaBoyutu > 1000000) {
        echo '<script>alert("Dosya boyutu 10 mbyi aşıyor.");</script>';
        return false;
    }

    if ($dosyaUzantisi != 'jpg' && $dosyaUzantisi != 'png') { # Dosya uzantı kontrolü
        echo '<script>alert("Sadece jpg ve png uzantılı dosyalar yüklenebilir.");</script>';
        return false;
    } else {
        $sonuc = move_uploaded_file($_FILES[$fileName]['tmp_name'], $yuklemeYeri);
        if ($sonuc) {
            echo '<script>alert("Dosya yükleme başarılı");</script>';
            return $yeniDosyaAdi;
        } else {
            echo '<script>alert("Dosya yüklenemedi.");</script>';
            return false;
        }
    }
}

if (isset($_POST['urun_ekle_buton'])) {
    if (
        isset($_POST['urun_adi']) &&
        isset($_POST['urun_fiyati']) &&
        isset($_POST['urun_aciklama']) &&
        isset($_POST['urun_adi_en']) &&
        isset($_POST['urun_alerjik_nedenler']) &&
        isset($_POST['urun_kategori']) &&
        isset($_FILES['urun_gorsel_1']) &&
        isset($_FILES['urun_gorsel_2']) &&
        isset($_FILES['urun_gorsel_3'])
    ) {
        $urunAdi = $_POST['urun_adi'];
        $urunAdiEn = $_POST['urun_adi_en'];
        $urunFiyati = $_POST['urun_fiyati'];
        $urunAciklama = $_POST['urun_aciklama'];
        $urunAlerjikNedenler = $_POST['urun_alerjik_nedenler'];
        $urunKategori = $_POST['urun_kategori'];

        $urunGorsel1Yukle = resimDosyaYukle('urun_gorsel_1');
        $urunGorsel2Yukle = resimDosyaYukle('urun_gorsel_2');
        $urunGorsel3Yukle = resimDosyaYukle('urun_gorsel_3');

        $urunGorsel1 = $urunGorsel1Yukle !== false ? $urunGorsel1Yukle : '';
        $urunGorsel2 = $urunGorsel2Yukle !== false ? $urunGorsel2Yukle : '';
        $urunGorsel3 = $urunGorsel3Yukle !== false ? $urunGorsel3Yukle : '';

        $urunEkle = $db->prepare("INSERT INTO urunler (urun_adi, urun_adi_en, urun_fiyat, urun_aciklama, urun_gorsel_1, urun_gorsel_2, urun_gorsel_3, urun_alerjik_nedenler, kategori_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $urunEkle->execute([$urunAdi, $urunAdiEn, $urunFiyati, $urunAciklama, $urunGorsel1, $urunGorsel2, $urunGorsel3, $urunAlerjikNedenler, $urunKategori]);

        if ($urunEkle->rowCount()) {
            echo '<script>alert("Ürün başarıyla eklendi.");</script>';
            header('Location: urunler.php');
        } else {
            echo '<script>alert("Ürün eklenirken bir hata oluştu.");</script>';
        }
    } else {
        print_r($_POST);
        print_r($_FILES);
        echo '<script>alert("Tüm alanları doldurun.");</script>';
    }
}

$kategorilerSorgu = $db->query("SELECT * FROM kategoriler ORDER BY kategori_adi ASC");
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Ürün Ekle | Yönetim Paneli</title>
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
                                <h1>Ürün Ekle</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item">
                                        <a href="#">Yönetim Paneli</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#">Ürün Yönetimi</a>
                                    </li>
                                    <li class="breadcrumb-item active">Ürün Ekle</li>
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
                                        <span class="ml-1">Ürün Ekle</span>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <form enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Ürün Adı:</label>
                                                    <input type="text" name="urun_adi" class="form-control" placeholder="Ürün adı girin.">
                                                </div>
                                                <div class="form-group">
                                                    <label>Ürün Fiyatı:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">€</span>
                                                        </div>
                                                        <input type="text" name="urun_fiyati" class="form-control" placeholder="Ürün fiyatı girin.">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ürün Açıklama:</label>
                                                    <textarea name="urun_aciklama" class="form-control" rows="3"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ürün Alerjik Nedenleri:</label>
                                                    <textarea name="urun_alerjik_nedenler" class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Ürün Adı (İngilizce):</label>
                                                    <input type="text" name="urun_adi_en" class="form-control" placeholder="Ürün adı (ingilizce) girin.">
                                                </div>
                                                <div class="form-group">
                                                    <label>Ürün Kategorisi:</label>
                                                    <select class="form-control select2" name="urun_kategori" style="width: 100%;">
                                                        <?php if ($kategorilerSorgu->rowCount()) { ?>
                                                        <?php foreach($kategorilerSorgu->fetchAll() AS $kategori) { ?>
                                                        <option value="<?= $kategori['id']; ?>"><?= $kategori['kategori_adi']; ?></option>
                                                        <?php } ?>
                                                        <?php } else { ?>
                                                        <option value="NULL" selected disabled>Kategori Bulunamadı!</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ürün Görselleri:</label>
                                                    <br>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile" name="urun_gorsel_1">
                                                        <label class="custom-file-label" for="customFile">Ürün Görsel 1</label>
                                                    </div>
                                                    <br><br>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile" name="urun_gorsel_2">
                                                        <label class="custom-file-label" for="customFile">Ürün Görsel 2</label>
                                                    </div>
                                                    <br><br>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile" name="urun_gorsel_3">
                                                        <label class="custom-file-label" for="customFile">Ürün Görsel 3</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            <button type="reset" class="btn btn-danger mr-2">
                                                <i class="fas fa-trash"></i>
                                                <span class="ml-1">Temizle</span>
                                            </button>
                                            <button type="submit" name="urun_ekle_buton" class="btn btn-success">
                                                <i class="fas fa-arrow-right"></i>
                                                <span class="ml-1">Ürün Ekle</span>
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
