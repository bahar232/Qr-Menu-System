<?php
include 'inc/database.php';
session_start();
if (!isset($_SESSION['giris'])) {
    header('Location: login.php');
    exit;
}

// Kategorileri veritabanından çek
$kategorilerSorgu = $db->query("SELECT * FROM kategoriler ORDER BY kategori_adi ASC");
$kategoriler = $kategorilerSorgu->rowCount() > 0 ? $kategorilerSorgu->fetchAll() : [];

$seciliKategori = isset($_POST['kategori_id']) ? $_POST['kategori_id'] : null;
$urunler = [];

if (isset($_POST['kategori_sec'])) {
    if ($seciliKategori) {
        $urunlerSorgu = $db->prepare("SELECT * FROM urunler WHERE kategori_id = ?");
        $urunlerSorgu->execute([$seciliKategori]);
        $urunler = $urunlerSorgu->rowCount() > 0 ? $urunlerSorgu->fetchAll() : [];
    } else {
        $urunlerSorgu = $db->query("SELECT * FROM urunler");
        $urunler = $urunlerSorgu->rowCount() > 0 ? $urunlerSorgu->fetchAll() : [];
    }
} else {
    // Sayfa açıldığında tüm ürünleri göster
    $urunlerSorgu = $db->query("SELECT * FROM urunler");
    $urunler = $urunlerSorgu->rowCount() > 0 ? $urunlerSorgu->fetchAll() : [];
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Ürün Listesi | Yönetim Paneli</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"/>
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"/>
    <link rel="stylesheet" href="dist/css/adminlte.min.css"/>
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
                        <h1>Ürün Listesi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Yönetim Paneli</a>
                            </li>
                            <li class="breadcrumb-item active">Ürünler</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ürünler</h3>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <form method="post">
                                        <div class="form-group">
                                            <label>Kategori Seç:</label>
                                            <select class="form-control" name="kategori_id">
                                                <option value="">Tüm Kategoriler</option>
                                                <?php foreach ($kategoriler as $kategori) { ?>
                                                    <option value="<?= $kategori['id']; ?>"
                                                        <?php if ($seciliKategori == $kategori['id']) {
                                                            echo 'selected';
                                                        } ?>>
                                                        <?= $kategori['kategori_adi']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name="kategori_sec">Kategoriyi Seç</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <table id="urunlerTablo" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Ürün Adı</th>
                                    <th>Ürün Fiyatı</th>
                                    <th>Ürün Açıklama</th>
                                    <th>Ürün Alerjik Nedenler</th>
                                    <th>Görsel 1</th>
                                    <th>Görsel 2</th>
                                    <th>Görsel 3</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($urunler as $urun) { ?>
                                    <tr>
                                        <td><?= $urun['urun_adi']; ?></td>
                                        <td><?= $urun['urun_fiyat']; ?> €</td>
                                        <td><?= $urun['urun_aciklama']; ?></td>
                                        <td><?= $urun['urun_alerjik_nedenler']; ?></td>
                                        <td><img src="dist/img/urunler/<?= $urun['urun_gorsel_1']; ?>" width="100" height="100"></td>
                                        <td><img src="dist/img/urunler/<?= $urun['urun_gorsel_2']; ?>" width="100" height="100"></td>
                                        <td><img src="dist/img/urunler/<?= $urun['urun_gorsel_3']; ?>" width="100" height="100"></td>
                                        <td>
                                            <a href="urun_duzenle.php?id=<?= $urun['id']; ?>" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i> Düzenle
                                            </a>
                                            <a href="urun_sil.php?id=<?= $urun['id']; ?>" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Sil
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include 'inc/footer.php'; ?>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script>
    $(function () {
        $("#urunlerTablo").DataTable();
    });
</script>
</body>
</html>
