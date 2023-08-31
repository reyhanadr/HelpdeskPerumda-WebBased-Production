                <div class="content-wrapper">
                    <!-- START PAGE CONTENT-->
                    <div class="page-heading">
                        <h1 class="page-title">Kumpulan Pesan</h1>
                    </div>
                    <div class="page-content fade-in-up">
                        <div class="row">
                            <div class="col-lg-12 col-md-8">
                                <div class="ibox" id="mailbox-container">
                                    <div class="mailbox-header">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="d-none d-lg-block inbox-title"><i class="fa fa-envelope-o m-r-5"></i> Pesan (15)</h5>
                                            <form class="mail-search" action="javascript:;">
                                                <div class="input-group">
                                                    <input class="form-control" type="text" placeholder="Cari Pesan">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-info">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="d-flex justify-content-between inbox-toolbar p-t-20">
                                            <div class="d-flex">
                                                <label class="ui-checkbox ui-checkbox-info check-single p-t-5 m-r-20">
                                                    <input type="checkbox" data-select="all">
                                                    <span class="input-span"></span>
                                                </label>
                                                <div id="inbox-actions">
                                                    <button class="btn btn-default btn-sm" data-toggle="tooltip" data-original-title="Akhiri Pesan Live"><i class="fa fa-trash-o"></i></button>
                                                </div>
                                                <span class="counter-selected m-l-5" hidden="">Selected
                                                    <span class="font-strong text-warning counter-count">3</span>
                                                </span>
                                            </div>
                                            <div>
                                                <span class="p-r-10 font-13">1-50 of 420</span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mailbox clf">
                                        <table class="table table-hover table-inbox" id="table-inbox">
                                            <tbody class="rowlinkx" data-link="row">
                                                <?php
                                                    $previous_history_id = null;

                                                    foreach ($list_chat as $chat):
                                                        if ($chat->history_id != $previous_history_id):
                                                    ?>
                                                        <tr data-id="<?= $chat->history_id ?>">
                                                            <td class="check-cell rowlink-skip">
                                                                <label class="ui-checkbox ui-checkbox-info check-single">
                                                                    <input class="mail-check" type="checkbox">
                                                                    <span class="input-span"></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <li class="media">
                                                                    <a href="" style="width: 45px; height: 45px; overflow: hidden; border-radius: 50%; margin-right:20px">
                                                                        <img style="width: 100%; height: 100%; object-fit: cover;" src="<?= base_url() ?>/assets/img/users/<?= $chat->foto_user?>" style="width:40px;">
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <h6 class="media-heading"><?= $chat->sender_nama ?></h6><small><?= $chat->nama_departemen?> </small>
                                                                    </div>
                                                                </li>
                                                            </td>
                                                            <td class="mail-message"><?= $chat->message ?></td>
                                                            <td class="hidden-xs"></td>
                                                            <td class="text-right">
                                                                <li class="media">
                                                                    <div class="media-body">
                                                                        <h6 >
                                                                            <?= $chat->created_at ?>
                                                                        </h6>
                                                                        <small>
                                                                            <?php if ($chat->status === 'open'): ?>
                                                                                <span class="badge badge-success">Live Chat Terbuka</span>
                                                                                <button 
                                                                                    class="btn btn-default btn-xs combined-button" 
                                                                                    data-target="#myModal" 
                                                                                    data-original-title="Terima Chat" 
                                                                                    data-nama = "<?= $chat->sender_nama ?>"
                                                                                    data-sesi="<?= $chat->sesi_pesan ?>">

                                                                                    <i class="fa-solid fa-check-to-slot font-14"></i>
                                                                                </button>
                                                                            <?php elseif ($chat->status === 'taken'): ?>
                                                                                <!-- Teks atau tampilan lain sesuai kebutuhan jika status tidak sama dengan 'open' -->
                                                                                <span class="badge badge-default">Live Chat Telah Diambil Alih Oleh <?= $chat->receiver_nama?></span>
                                                                                    <?php if ($this->session->userdata('user_id') == $chat->receiver_id): ?>
                                                                                        <a href="<?php echo base_url(); ?>index.php/KelolaPesan/chatroom/<?= $chat->sesi_pesan ?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Lihat Chat">
                                                                                            <i class="fa-solid fa-eye font-14"></i>
                                                                                        </a>
                                                                                    <?php endif; ?>


                                                                            <?php else:?>
                                                                                <span class="badge badge-danger">Live Chat Telah Berakhir</span>

                                                                            <?php endif; ?>
                                                                        </small>
                                                                    </div>
                                                                </li>
                                                            </td>

                                                        </tr>
                                                    <?php
                                                        endif;
                                                        $previous_history_id = $chat->history_id;
                                                    endforeach;
                                                ?>
                                                    <!-- The Modal -->
                                                    <div class="modal" id="myModal">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Terima Chat Dari <span id="nama_sender"></span></h4>
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                </div>

                                                                <!-- Modal body -->
                                                                <div class="modal-body">
                                                                    <p>Terima Live Chat untuk Sesi Pesan: <span id="sesi_pesan"></span></p>
                                                                </div>

                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                    <a id="terimaButton" class="btn btn-primary" href="">Terima Pesan</a>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                            </tbody>

                                        </table>
                                        <ul class="pagination justify-content-end m-t-0 m-r-10">
                                            <li class="page-item">
                                                <a class="page-link" href="javascript:;" aria-label="Previous">
                                                    <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                                </a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="javascript:;">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript:;">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript:;">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript:;">4</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript:;" aria-label="Next"><i class="fa fa-angle-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>