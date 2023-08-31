<<<<<<< HEAD
<div class="content-wrapper">
=======
                <div class="content-wrapper">
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
                    <!-- START PAGE CONTENT-->
                    <div class="page-heading">
                        <h1 class="page-title">Live Chat Room</h1>
                    </div>
                    <div class="page-content fade-in-up">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox">
                                    <div class="ibox-head">
                                        <div class="ibox-title">
                                            Chat dengan 
                                            <?php if ($users->nama_role === "Teknisi"): ?>
                                                Karyawan
                                            <?php else: ?>
                                                Teknisi
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="ibox-body">
                                        <div class="message">
                                            <!-- Menampilkan Pesan Pengirim/Sender (karyawan) -->
                                            <div class="message">
                                                <?php
                                                $combinedChats = array_merge($chats, $chats_teknisi);
                                                
                                                usort($combinedChats, function($a, $b) {
                                                    return strtotime($a->timestamp) - strtotime($b->timestamp);
                                                });
                                                
                                                $uniqueMessages = []; // Array untuk menyimpan pesan unik
                                                
                                                foreach ($combinedChats as $message) {
                                                    if (!in_array($message->id, $uniqueMessages)) {
                                                        $uniqueMessages[] = $message->id; // Tambahkan id pesan ke array unik
                                                        ?>
                                                        
                                                        <li class="media <?=($message->sender_id == $this->session->userdata('user_id')) ? 'media-right' : '' ?>" id="<?=$message->id ?>">
                                                            <?php if ($message->sender_id != $this->session->userdata('user_id')): ?>
                                                                <a class="" href="javascript:;" style="width: 45px; height: 45px; overflow: hidden; border-radius: 50%; <?=($message->sender_id == $this->session->userdata('user_id')) ? 'margin-left' : 'margin-right' ?>: 8px">
                                                                    <img src="<?php echo base_url(); ?>/assets/img/users/<?=$message->foto_user ?>" style="width: 100%; height: 100%; object-fit: cover; ">
                                                                </a>
                                                            <?php endif; ?>
                                                            <div class="media-body <?=($message->sender_id == $this->session->userdata('user_id')) ? 'text-right' : '' ?>">
                                                                <h6 class="media-heading"><?=$message->nama ?></h6>
                                                                <span><?=$message->message ?></span> <br>
                                                                <span class="badge badge-default m-b-5" style="font-size:8px"><?=$message->timestamp ?></span>
                                                            </div>
                                                            <?php if ($message->sender_id == $this->session->userdata('user_id')): ?>
                                                                <a class="" href="javascript:;" style="width: 45px; height: 45px; overflow: hidden; border-radius: 50%; margin-left: 10px">
                                                                    <img src="<?php echo base_url(); ?>/assets/img/users/<?=$message->foto_user ?>" style="width: 100%; height: 100%; object-fit: cover; ">
                                                                </a>
                                                            <?php endif; ?>
                                                        </li>
                                                        
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>




                                        </div>


                                        <form action="<?php echo site_url('KelolaPesan/kirimPesan'); ?>" method="POST" >
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="sesi_pesan" value="<?= $sesi_pesan ?>" hidden>
                                                <input class="form-control" type="text" name="kategori_id" value="<?= $kategori_id?>" hidden>
                                                <input class="form-control" type="text" name="sender_id" value="<?php echo $this->session->userdata('user_id'); ?>" hidden>  
                                                <input class="form-control" type="text" name="status" value="<?= $get_receiver_status->status ?>" hidden>  

                                                <input class="form-control" type="text" name="receiver_id" hidden
                                                    value="
                                                    <?php if ($get_receiver_status->receiver_id === NULL): ?>NULL
                                                    <?php else: ?>
                                                        <?= $get_receiver_status->receiver_id ?>
                                                    <?php endif; ?>
                                                " >
                                                <textarea class="form-control" type="text" placeholder="Pesan Anda" name="message"> </textarea>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary" type="submit">Kirim Pesan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>