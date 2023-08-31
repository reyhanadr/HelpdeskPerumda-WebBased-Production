<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div style="width: 45px; height: 45px; overflow: hidden; border-radius: 50%;">
                <img src="<?php echo base_url(); ?>./assets/img/users/<?php echo $users->foto_user ?>" alt="User Foto"
                    style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="admin-info">
                <div class="font-strong">
<<<<<<< HEAD
                    <?php echo $users->nama ?>
                </div><small>
                    <?php echo $users->nama_kategori ?>
=======
                    <?php echo $users->nama; ?>
                </div><small>
                    <?php echo $users->nama_role; ?> <?php echo $users->nama_kategori; ?>
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
                </small>
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li class="<?= ($active_menu === 'Dashboard') ? 'active' : ''; ?>">
                <a href="<?= base_url('index.php/Teknisi/Dashboard'); ?>"><i
                        class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">Terkait Pengelolaan</li>
            <li class="<?= ($active_menu === 'kelolaRequest') ? 'active' : ''; ?>">
                <a href="<?= base_url('index.php/Teknisi/KelolaRequest'); ?>"><i
                        class="sidebar-item-icon fa-solid fa-code-pull-request"></i>
                    <span class="nav-label">Kelola Request</span>
                </a>
            </li>
            <li class="<?= ($active_menu === 'kelolaPerangkat') ? 'active' : ''; ?>">
                <a href="<?= base_url('index.php/Teknisi/KelolaPerangkat'); ?>"><i
                        class="sidebar-item-icon fa-solid fa-desktop"></i>
<<<<<<< HEAD
                    <span class="nav-label">Daftar Perangkat</span>
                </a>
            </li>

            <li class="heading">Terkait Pesan</li>
            <li class="<?= ($active_menu === 'pesan-view') ? 'active' : ''; ?>">
                <a href="<?= base_url('index.php/KelolaPesan'); ?>">
                <i class="sidebar-item-icon fa fa-envelope"></i>
                    <span class="nav-label">Daftar Pesan</span>
                </a>
            </li>

            <!-- <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-envelope"></i>
                    <span class="nav-label">Daftar Pesan</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level">
                    <li class="<?= ($active_menu === 'pesan-masuk') ? 'active' : ''; ?>">
                        <a href="<?= base_url('index.php/Teknisi/pesanmasuk'); ?>">
                            <span class="nav-label">Pesan Masuk</span>
                        </a>
                    </li>
                    <li class="<?= ($active_menu === 'pesan-view') ? 'active' : ''; ?>">
                        <a href="<?= base_url('index.php/Teknisi/pesanview'); ?>">
                            <span class="nav-label">Lihat Pesan</span>
                        </a>
                    </li>
                    <li class="<?= ($active_menu === 'pesan-kirim') ? 'active' : ''; ?>">
                        <a href="<?= base_url('index.php/Teknisi/pesankirim'); ?>">
                            <span class="nav-label">Kirim Pesan</span>
                        </a>
                    </li>
                </ul>
            </li> -->



=======
                    <span class="nav-label">Kelola Perangkat</span>
                </a>
            </li>

>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
            <li class="heading">Terkait Profil</li>
            <li class="<?= ($active_menu === 'kelolaprofil') ? 'active' : ''; ?>">
                <a href="<?= base_url('index.php/Teknisi/Profil'); ?>"><i
                        class="sidebar-item-icon fa-solid fa-user"></i>
                    <span class="nav-label">Kelola Profil</span>
                </a>
            </li>
        </ul>
        </li>
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->