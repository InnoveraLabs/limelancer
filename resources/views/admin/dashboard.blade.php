@extends('layouts.admin-master')
@section('content')
    <div id="content-wrapper">
        <!-- main section -->
        <div class="container-fluid">
            <div class="row chrtsec">
                <div class="col-md-9 chrtcontainer">
                    <div class="chrtsechead">
                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                        <span> Overview</span>

                        <a class=" pull-right" href="#"></a>
                    </div>
                    <div class="uess">
                        <div>
                            <h4>Users Engagement</h4>
                        </div>
                        <div class="pchart">
                            <div class="box">
                                <div class="chart uchart" data-percent="" data-scale-color="#ffb400"></div>
                                <h5>Users</h5>
                            </div>
                            <div class="box">
                                <div class="chart gigchart" data-percent="" data-scale-color="#ffb400"></div>
                                <h5>Gigs Pending</h5>
                            </div>
                            <div class="box">
                                <div class="chart orderchart" data-percent="" data-scale-color="#ffb400"> </div>
                                <h5>Active orders</h5>
                            </div>
                            <div class="box">
                                <div class="chart reqchart"  data-percent="" data-scale-color="#ffb400"></div>
                                <h5>Requests posted</h5>
                            </div>
                        </div>
                    </div>
                    <div class="sparkcontainer">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="sparkbox">
                                    <div class="barch">

                                        <span class="inlinebar">2,3,0,0,1,0</span>
                                    </div>
                                    <div class="sparkinfo">
                                        <div class="sparkcount">
                                            <div class="sparknmbr"></div>
                                            <div class="sparkparcent"></div>
                                        </div>
                                        <div>
                                            <h4>Active Orders</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sparkbox">
                                    <div class="barch">

                                        <span class="inlinebar">0,2,1,0,3,1</span>
                                    </div>
                                    <div class="sparkinfo">
                                        <div class="sparkcount">
                                            <div class="sparknmbr"></div>
                                            <div class="sparkparcent"></div>
                                        </div>
                                        <div>
                                            <h4>Pending Gigs</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sparkbox">
                                    <div class="barch">
                                        <span class="inlinebar">0,0,0,0,0,0</span>
                                    </div>
                                    <div class="sparkinfo">

                                        <div class="sparkcount">
                                            <div class="sparknmbr"></div>
                                            <div class="sparkparcent"></div>
                                        </div>
                                        <div>

                                            <h4>Paused Gigs</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="sparkbox">
                                    <div class="barch">
                                        <span class="inlinebar">0,0,0,0,0,0</span>
                                    </div>
                                    <div class="sparkinfo">
                                        <div class="sparkcount">
                                            <div class="sparknmbr"></div>
                                            <div class="sparkparcent">0%</div>
                                        </div>
                                        <div>
                                            <h4>Open Tickets</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sparkbox">
                                    <div class="barch">
                                        <span class="inlinebar">1,0,3,5,2,5</span>
                                    </div>
                                    <div class="sparkinfo">
                                        <div class="sparkcount">
                                            <div class="sparknmbr"></div>
                                            <div class="sparkparcent">0%</div>
                                        </div>
                                        <div>
                                            <h4>Buyer Requests</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sparkbox">
                                    <div class="barch">
                                        <span class="inlinebar">2,0,0,1,0,0</span>
                                    </div>
                                    <div class="sparkinfo">
                                        <div class="sparkcount">
                                            <div class="sparknmbr"></div>
                                            <div class="sparkparcent">0%</div>
                                        </div>
                                        <div>
                                            <h4>Referrels</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="sparkbox">
                                    <div class="barch">
                                        <span class="inlinebar">1,3,4,5,3,5</span>
                                    </div>
                                    <div class="sparkinfo">
                                        <div class="sparkcount">
                                            <div class="sparknmbr"></div>
                                            <div class="sparkparcent"></div>
                                        </div>
                                        <div>
                                            <h4>Total Sales</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sparkbox">
                                    <div class="barch">
                                        <span class="inlinebar">1,0,4,0,3,5</span>
                                    </div>
                                    <div class="sparkinfo">
                                        <div class="sparkcount">
                                            <div class="sparknmbr"></div>
                                            <div class="sparkparcent"></div>
                                        </div>
                                        <div>
                                            <h4>Expenses</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sparkbox">
                                    <div class="barch">
                                        <span class="inlinebar">1,3,4,5,3,5</span>
                                    </div>
                                    <div class="sparkinfo">
                                        <div class="sparkcount">
                                            <div class="sparknmbr"></div>
                                            <div class="sparkparcent"></div>
                                        </div>
                                        <div>
                                            <h4>Net Profit</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sidebar">
                        <div class="sidehead1">
                            <i class="fa fa-clock-o"></i>
                            <span>Timings</span>
                        </div>
                        <div class="scontent1">
                            <ul>
                                <li>
                                    Current Time:
                                    <span style="font-weight: bold;">{{ date('l jS \\of F Y h:i:s A') }}</span>
                                </li>
                                <li>
                                    Last login:
                                    <span></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="sidehead2">
                            <i class="fa fa-exclamation-triangle"></i>
                            <span>Action to Be Taken</span>
                        </div>
                        <div class="scontent2">

                            <ul>
                                <li>
                                    <a href="index?view_proposals">Gigs pending approval ()</a>
                                </li>
                                <li><a href="index?buyer_requests">Buyer requests ()</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="sidehead1">
                            <i class="fa fa-eye"></i>
                            <span>Waiting for Review</span>
                        </div>
                        <div class="scontent1">
                            <a href="index?inbox_conversations">Total messages ()</a>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="sidehead2">
                            <i class="fa fa-user"></i>
                            <span>Recently Registered Users</span>
                        </div>
                        <div class="scontent2">

                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="sidehead3">
                            <i class="fa fa-user-circle"></i>
                            <span>Limelancer.com</span>
                        </div>

                        <ul>
                            <li>
                                Script version
                            </li>
                            <li>
                                PHP version <?php echo phpversion(); ?>
                            </li>
                            <li>
                                Current Selected Language: </strong>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Eof main section -->
@endsection
