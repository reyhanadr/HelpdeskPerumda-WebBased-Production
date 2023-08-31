
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Kelola Data Teknisi</h1>
            </div>
            <?php
            if ($this->session->flashdata('succes')) { ?>
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                <h6>
                <i class="icon fa fa-check"></i>
                Data Berhasil
                <strong>
                    <?= $this->session->flashdata('succes');   ?>
                </strong>
                </h6>
            </div>
            <?php } ?>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                    <div class="ibox-title">Data Teknisi</div>
                            <a href="<?= base_url('administator/KelolaTeknisi/tambah'); ?>">
                            <button class="btn btn-primary" type="submit">Tambah Data</button>
                            </a>                        
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>Karyawan Id</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Bagian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php

                                foreach ($teknisi as $row) { ?>
                                    <tr>
                                        <td><?= $row->user_id ?></td>
                                        <td><?= $row->karyawan_id ?></td>
                                        <td><?= $row->nama ?></td>
                                        <td><?= $row->username ?></td>
                                        <td><?= $row->email ?></td>
                                        <td><?= $row->nama_kategori ?></td>
                                        <td class="text-center">
                                        <div class="btn-group">
                                        <a href="<?= base_url() ?>administator/KelolaTeknisi/ubah/<?= $row->karyawan_id ?>" class="mr-2">
                                            <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14" aria-hidden="true"></i></button>
                                        </a>
                                        <a href="<?= base_url() ?>administator/KelolaTeknisi/hapus/<?= $row->user_id ?>" class="mr-2" onclick="return confirm('yakin ?')">
                                        <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14" aria-hidden="true"></i></button>
                                        </a>
                                        </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>