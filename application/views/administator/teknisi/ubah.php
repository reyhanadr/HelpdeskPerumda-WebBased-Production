
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
        <div class="page-heading">
                <h1 class="page-title">Form Edit Data Karyawan</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit Data Teknisi</div>
                    </div>
                    <div class="ibox-body">
                        <form class="form-horizontal" id="form-sample-1" method="post" novalidate="novalidate">
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Id Teknisi</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="karyawan_id" value="<?= $ubah['karyawan_id'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="nama" value="<?= $ubah['nama'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="username" value="<?= $ubah['username'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="email" value="<?= $ubah['email'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="password" value="<?= $ubah['password'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Bidang</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="bidang">
                                        <option value="<?= $ubah['kategori_id'] ?>"><?= $ubah['nama_kategori'] ?></option>
                                        <?php foreach ($kategori as $kategoris): ?>
                                            <?php if ($kategoris['kategori_id'] != $ubah['kategori_id']): ?>
                                                <option value="<?= $kategoris['kategori_id'] ?>"><?= $kategoris['nama_kategori'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-info" type="submit">Submit</button>
                                    <a href="<?= base_url('administator/KelolaTeknisi'); ?>" class="btn btn-default">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>