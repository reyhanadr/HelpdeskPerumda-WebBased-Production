<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Kirim Pesan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Kirim Pesan</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <a class="btn btn-info btn-block" href="<?= base_url('index.php/Teknisi/pesankirim'); ?>">
                    <i class="fa fa-edit"></i>Tulis Pesan</a><br>
                <h6 class="m-t-10 m-b-10">FOLDERS</h6>
                <ul class="list-group list-group-divider inbox-list">
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-inbox"></i> Inbox (6)
                            <span class="badge badge-warning badge-square pull-right">17</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-envelope-o"></i> Sent</a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-star-o"></i> Important
                            <span class="badge badge-success badge-square pull-right">2</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-file-text-o"></i> Drafts</a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-trash-o"></i> Trash</a>
                    </li>
                </ul>
                <h6 class="m-t-10 m-b-10">LABELS</h6>
                <ul class="list-group list-group-divider inbox-list">
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-circle-o font-13 text-success"></i> Support</a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-circle-o font-13 text-warning"></i> Business</a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-circle-o font-13 text-info"></i> Work</a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-circle-o font-13 text-danger"></i> System</a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-circle-o font-13 text-muted"></i> Social</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="ibox">
                    <div class="ibox-head d-flex justify-content-between">
                        <h5 class="inbox-title">Kirim Pesan</h5>
                        <div class="inbox-toolbar m-l-20">
                            <button class="btn btn-default btn-sm" data-action="reply" data-toggle="tooltip"
                                data-original-title="Reply"><i class="fa fa-reply"></i></button>
                            <button class="btn btn-default btn-sm" data-action="delete" data-toggle="tooltip"
                                data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <form class="form-horizontal" action="javascript:void(0)" method="POST" if="compose_form">
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">To:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="to" value="example@gmail.com">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Subject:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="subject">
                                </div>
                            </div>
                            <textarea id="summernote" name="message">
                                        <h4>Thank you for your attention</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur velit, corporis iste. Dolorem sapiente at, quibusdam fuga ea voluptatem iste. Cupiditate dignissimos, iure impedit, perferendis in beatae fuga
                                            voluptate, sapiente pariatur, libero ab odit. Placeat saepe sunt ipsam laboriosam temporibus nostrum ea optio, dolore soluta.</p>
                                    </textarea>
                            <input class="btn btn-info m-t-20" type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->