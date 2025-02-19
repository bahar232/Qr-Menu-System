<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index.php" class="brand-link">
        <img src="dist/img/rest.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8;" />
        <span class="brand-text font-weight-light">Yönetim Paneli</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/kullanıcı.png" class="img-circle elevation-2" alt="User Image" />
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $_SESSION['isim'] . ' ' . $_SESSION['soyisim']; ?></a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <span>Waffel oder Becher</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <span>Ürün Yönetimi</span>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="products.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ürün Listesi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add-product.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ürün Ekle</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <span>Kategori Yönetimi</span>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="categories.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori Listesi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add-category.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori Ekle</p>
                            </a>
                        </li>
                      
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <span>Kullanıcı Yönetimi</span>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="users.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Yönetici Listesi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add-user.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Yönetici Ekle</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Siteyi görüntüle</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
    <a href="../index.php" class="nav-link">
        <i class="far fa-eye nav-icon"></i> <!-- far fa-eye ikonunu ekledik -->
        <p>Siteyi görüntüle</p>
    </a>
</li>

                
                <li class="nav-header">OTURUMU SONLANDIR</li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <span>Çıkış Yap</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>