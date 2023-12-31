<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Mailbox</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Mailbox</li>
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
                <div class="ibox" id="mailbox-container">
                    <div class="mailbox-header">
                        <div class="d-flex justify-content-between p-t-10 p-b-10 p-l-10 p-r-10">
                            <h5 class="d-none d-lg-block inbox-title"><i class="fa fa-envelope-o"></i>
                                Inbox
                                (15)
                            </h5>
                            <form class="mail-search" action="javascript:;">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Search email">
                                    <div class="input-group-btn">
                                        <button class="btn btn-info">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="d-flex justify-content-between inbox-toolbar p-t-10 p-b-20 p-l-10 p-r-10">
                            <div class="d-flex">
                                <label class="ui-checkbox ui-checkbox-info check-single p-t-5 m-r-20">
                                    <input type="checkbox" data-select="all">
                                    <span class="input-span"></span>
                                </label>
                                <div id="inbox-actions">
                                    <button class="btn btn-default btn-sm" data-toggle="tooltip"
                                        data-original-title="Mark as read"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-default btn-sm" data-toggle="tooltip"
                                        data-original-title="Mark as important"><i class="fa fa-star-o"></i></button>
                                    <button class="btn btn-default btn-sm" data-toggle="tooltip"
                                        data-original-title="Reply"><i class="fa fa-reply"></i></button>
                                    <button class="btn btn-default btn-sm" data-toggle="tooltip"
                                        data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                                </div>
                                <span class="counter-selected m-l-5" hidden="">Selected
                                    <span class="font-strong text-warning counter-count">3</span>
                                </span>
                            </div>
                            <div>
                                <span class="p-r-10 font-13">1-50 of 420</span>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-default"><i class="fa fa-chevron-left"></i></button>
                                    <button class="btn btn-default"><i class="fa fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mailbox clf">
                        <table class="table table-hover table-inbox" id="table-inbox">
                            <tbody class="rowlinkx" data-link="row">
                                <tr data-id="1">
                                    <td class="check-cell rowlink-skip">
                                        <label class="ui-checkbox ui-checkbox-info check-single">
                                            <input class="mail-check" type="checkbox">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="mail_view.html">Emma Johnson</a>
                                    </td>
                                    <td class="mail-message">Fusce suscipit semper erat, vel solo.</td>
                                    <td class="hidden-xs"></td>
                                    <td class="mail-label hidden-xs"><i class="fa fa-circle text-success"></i></td>
                                    <td class="text-right">5.22 AM</td>
                                </tr>
                                <tr class="unread" data-id="2">
                                    <td class="check-cell">
                                        <label class="ui-checkbox ui-checkbox-info">
                                            <input class="mail-check" type="checkbox">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="mail_view.html">Olivia Smith</a>
                                    </td>
                                    <td class="mail-message">Mauris in sem at quam elementum sagittis vel.</td>
                                    <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                    <td class="mail-label hidden-xs"><i class="fa fa-circle text-warning"></i></td>
                                    <td class="text-right">4.10 AM</td>
                                </tr>
                                <tr class="unread" data-id="3">
                                    <td class="check-cell">
                                        <label class="ui-checkbox ui-checkbox-info">
                                            <input class="mail-check" type="checkbox">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="mail_view.html">Noah Williams</a>
                                    </td>
                                    <td class="mail-message">Neque porro quisquam est qui dolorem ipsum quia</td>
                                    <td class="hidden-xs"></td>
                                    <td class="mail-label hidden-xs"></td>
                                    <td class="text-right">1.20 AM</td>
                                </tr>
                                <tr data-id="4">
                                    <td class="check-cell">
                                        <label class="ui-checkbox ui-checkbox-info">
                                            <input class="mail-check" type="checkbox">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="mail_view.html">Sophia Jones</a>
                                    </td>
                                    <td class="mail-message">Lorem ipsum dolor sit.</td>
                                    <td class="hidden-xs"></td>
                                    <td class="mail-label hidden-xs"></td>
                                    <td class="text-right">Jan 10</td>
                                </tr>
                                <tr data-id="5">
                                    <td class="check-cell">
                                        <label class="ui-checkbox ui-checkbox-info">
                                            <input class="mail-check" type="checkbox">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="mail_view.html">Jacob Brown</a>
                                    </td>
                                    <td class="mail-message">Nam vitae magna sollicitudin, fringilla neque sit.</td>
                                    <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                    <td class="mail-label hidden-xs"></td>
                                    <td class="text-right">Dec 18</td>
                                </tr>
                                <tr data-id="6">
                                    <td class="check-cell">
                                        <label class="ui-checkbox ui-checkbox-info">
                                            <input class="mail-check" type="checkbox">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="mail_view.html">James Davis</a>
                                    </td>
                                    <td class="mail-message">Donec eget diam quis lectus auctor.</td>
                                    <td class="hidden-xs"></td>
                                    <td class="mail-label hidden-xs"></td>
                                    <td class="text-right">Dec 12</td>
                                </tr>
                                <tr data-id="7">
                                    <td class="check-cell">
                                        <label class="ui-checkbox ui-checkbox-info">
                                            <input class="mail-check" type="checkbox">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="mail_view.html">Ava Wilson</a>
                                    </td>
                                    <td class="mail-message">Duis hendrerit tellus tellus, ut lobortis quam.</td>
                                    <td class="hidden-xs"></td>
                                    <td class="mail-label hidden-xs"><i class="fa fa-circle text-success"></i></td>
                                    <td class="text-right">Sep 7</td>
                                </tr>
                                <tr class="unread" data-id="8">
                                    <td class="check-cell">
                                        <label class="ui-checkbox ui-checkbox-info">
                                            <input class="mail-check" type="checkbox">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="mail_view.html">Ethan Taylor</a>
                                    </td>
                                    <td class="mail-message">Neque porro quisquam est qui dolorem ipsum quia dolor</td>
                                    <td class="hidden-xs"></td>
                                    <td class="mail-label hidden-xs"></td>
                                    <td class="text-right">Sep 1</td>
                                </tr>
                                <tr data-id="9">
                                    <td class="check-cell">
                                        <label class="ui-checkbox ui-checkbox-info">
                                            <input class="mail-check" type="checkbox">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="mail_view.html">Emily Thomas</a>
                                    </td>
                                    <td class="mail-message">Proin dictum sem felis, eu.</td>
                                    <td class="hidden-xs"></td>
                                    <td class="mail-label hidden-xs"></td>
                                    <td class="text-right">July 8</td>
                                </tr>
                                <tr data-id="10">
                                    <td class="check-cell">
                                        <label class="ui-checkbox ui-checkbox-info">
                                            <input class="mail-check" type="checkbox">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="mail_view.html">Noah Moore</a>
                                    </td>
                                    <td class="mail-message">Phasellus massa velit, sodales non sollicitudin nec.</td>
                                    <td class="hidden-xs"></td>
                                    <td class="mail-label hidden-xs"></td>
                                    <td class="text-right">July 6</td>
                                </tr>
                                <tr data-id="11">
                                    <td class="check-cell">
                                        <label class="ui-checkbox ui-checkbox-info">
                                            <input class="mail-check" type="checkbox">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="mail_view.html">Mia Anderson</a>
                                    </td>
                                    <td class="mail-message">Pellentesque rutrum auctor magna vel facilisis. Aliquam.
                                    </td>
                                    <td class="hidden-xs"></td>
                                    <td class="mail-label hidden-xs"><i class="fa fa-circle text-danger"></i></td>
                                    <td class="text-right">June 15</td>
                                </tr>
                                <tr data-id="12">
                                    <td class="check-cell">
                                        <label class="ui-checkbox ui-checkbox-info">
                                            <input class="mail-check" type="checkbox">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="mail_view.html">Amelia Harris</a>
                                    </td>
                                    <td class="mail-message">In ac imperdiet nulla. Proin interdum enim.</td>
                                    <td class="hidden-xs"></td>
                                    <td class="mail-label hidden-xs"></td>
                                    <td class="text-right">June 8</td>
                                </tr>
                                <tr data-id="13">
                                    <td class="check-cell">
                                        <label class="ui-checkbox ui-checkbox-info">
                                            <input class="mail-check" type="checkbox">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="mail_view.html">Sofia Jackson</a>
                                    </td>
                                    <td class="mail-message">Morbi et lacus malesuada, cursus est non yet.</td>
                                    <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                    <td class="mail-label hidden-xs"></td>
                                    <td class="text-right">April 27</td>
                                </tr>
                                <tr class="unread" data-id="14">
                                    <td class="check-cell">
                                        <label class="ui-checkbox ui-checkbox-info">
                                            <input class="mail-check" type="checkbox">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="mail_view.html">Daniel Garcia</a>
                                    </td>
                                    <td class="mail-message">Suspendisse potenti. Donec in vestibulum tortor. Duis.</td>
                                    <td class="hidden-xs"></td>
                                    <td class="mail-label hidden-xs"></td>
                                    <td class="text-right">April 25</td>
                                </tr>
                                <tr data-id="15">
                                    <td class="check-cell">
                                        <label class="ui-checkbox ui-checkbox-info">
                                            <input class="mail-check" type="checkbox">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="mail_view.html">Lucas Martin</a>
                                    </td>
                                    <td class="mail-message">Curabitur id ultrices erat. Praesent rhoncus augue.</td>
                                    <td class="hidden-xs"></td>
                                    <td class="mail-label hidden-xs"></td>
                                    <td class="text-right">April 25</td>
                                </tr>
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
                                <a class="page-link" href="javascript:;" aria-label="Next"><i
                                        class="fa fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->