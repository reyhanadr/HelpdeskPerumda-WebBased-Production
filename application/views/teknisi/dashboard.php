<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">25</h2>
                        <div class="m-b-5">TOTAL REQUEST FIXED</div><i class="ti-shopping-cart widget-stat-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">25</h2>
                        <div class="m-b-5">TOTAL REQUEST PENDING</div><i class="fa fa-money widget-stat-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-danger color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">25</h2>
                        <div class="m-b-5">TOTAL REQUEST NOT FIXED</div><i class="ti-user widget-stat-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">5</h2>
                        <div class="m-b-5">PERANGKAT YANG DIMILIKI</div><i class="ti-bar-chart widget-stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Request</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item">option 1</a>
                                <a class="dropdown-item">option 2</a>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID Request</th>
                                    <th>Karyawan</th>
                                    <th>Perangkat</th>
                                    <th>Status</th>
                                    <th width="91px">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="invoice.html">AT2584</a>
                                    </td>
                                    <td>@Jack</td>
                                    <td>Mouse Logitech</td>
                                    <td>
                                        <span class="badge badge-success">Fixed</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="invoice.html">AT2575</a>
                                    </td>
                                    <td>@Amalia</td>
                                    <td>Speaker Airboom</td>
                                    <td>
                                        <span class="badge badge-success">Fixed</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="invoice.html">AT1204</a>
                                    </td>
                                    <td>@Emma</td>
                                    <td>Printer Epson</td>
                                    <td>
                                        <span class="badge badge-default">Pending</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="invoice.html">AT7578</a>
                                    </td>
                                    <td>@James</td>
                                    <td>Laptop Asus Vivobook</td>
                                    <td>
                                        <span class="badge badge-warning">Not Fixed</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="invoice.html">AT0158</a>
                                    </td>
                                    <td>@Ava</td>
                                    <td>Keyboard Asus</td>
                                    <td>
                                        <span class="badge badge-default">Pending</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="invoice.html">AT0127</a>
                                    </td>
                                    <td>@Noah</td>
                                    <td>Webcam Logitech</td>
                                    <td>
                                        <span class="badge badge-success">Fixed</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Statistics</div>
                    </div>
                    <div class="ibox-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <canvas id="doughnut_chart" style="height:160px;"></canvas>
                            </div>
                            <div class="col-md-6">
                                <div class="m-b-20 text-success"><i class="fa fa-circle-o m-r-10"></i>Desktop
                                    52%</div>
                                <div class="m-b-20 text-info"><i class="fa fa-circle-o m-r-10"></i>Tablet 27%
                                </div>
                                <div class="m-b-20 text-warning"><i class="fa fa-circle-o m-r-10"></i>Mobile 21%
                                </div>
                            </div>
                        </div>
                        <ul class="list-group list-group-divider list-group-full">
                            <li class="list-group-item">Fixed
                                <span class="float-right text-success"><i class="fa fa-caret-up"></i> 24%</span>
                            </li>
                            <li class="list-group-item">Pending
                                <span class="float-right text-success"><i class="fa fa-caret-up"></i> 12%</span>
                            </li>
                            <li class="list-group-item">Not Fixed
                                <span class="float-right text-danger"><i class="fa fa-caret-down"></i> 4%</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>