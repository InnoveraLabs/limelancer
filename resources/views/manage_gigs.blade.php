@extends('layouts.master')
@section('main_content')

    <!--End header Area-->
    <div class="container-fluid order-box my-4 p-b-100">
        <section class="row p-b-100">

            <div class="col-md-12 px-5">
                <article class="db-new-content js-db-cont">

                    <header class="order-header mb-4">


                        <div class="search-orders float-right">

                            <form id="order-search-form" action="" method="get">
                                <input id="query" name="act_search_query" type="search" value="" placeholder="Search My History...">
                                <a href="" class="btn btn-gig-search"></a>
                            </form>
                        </div>

                        <h1 class="header-title">Gigs</h1>
                    </header>

                    <div class="manage-orders">
                        <ul class="nav nav-tabs">

                            <li class="nav-item"><a href="#active-orders" data-toggle="tab" class="nav-link">Active</a></li>
                            <li class="nav-item"><a href="#late-orders" data-toggle="tab" class="nav-link">Pending approval</a></li>
                            <li class="nav-item"><a href="#delivered-orders" data-toggle="tab" class="nav-link">Requires Modification</a></li>
                            <li class="nav-item"><a href="#completed-orders" data-toggle="tab" class="nav-link">Draft</a></li>
                            <li class="nav-item"><a href="#cancelled-orders" data-toggle="tab" class="nav-link">Denied</a></li>
                            <li class="nav-item"><a href="#starred-orders" data-toggle="tab" class="nav-link">Paused</a></li>

                        </ul>

                    </div>

                    <div class="tab-content orders-tab-content">
                        <div id="priority-orders" class="container tab-pane"><br>
                            <table class="orders-table">
                                <thead>
                                <tr class="table-header"><td colspan="9">Priority Orders</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center" colspan="2">Buyer</td>
                                    <td class="text-center">Gig</td>
                                    <td class="text-center">Due on</td>
                                    <td class="text-center">Total</td>
                                    <td class="text-center">Note</td>
                                    <td class="text-center" colspan="1">Status</td>
                                </tr>
                                <tr class="last">
                                    <td colspan="9">No priority orders to show.</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div id="active-orders" class="container tab-pane active show"><br>
                            <table class="orders-table">
                                <thead>
                                <tr class="table-header"><td colspan="9">Active Orders</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center" width="10%">
                                        <input type="checkbox" class="custom-control-lebel">
                                    </td>
                                    <td class="text-center" colspan="2" width="45%">Gig</td>
                                    <td class="text-center">Due on</td>
                                    <td class="text-center">Total</td>
                                    <td class="text-center">Note</td>
                                    <td class="text-center" colspan="1">Status</td>
                                </tr>
                                @foreach($services as $gig)
                                    <tr>
                                    <td class="text-center" colspan="1">
                                        <input type="checkbox" class="custom-control-lebel">
                                    </td>
                                    <td class="text-center" width="10%">
                                        @if(!empty($gig->galleries->first()->featured_image))
                                        <img src="/storage/{{ $gig->galleries->first()->featured_image }}" alt="" width="60" height="60">
                                        @else
                                            <img class="no-image" alt="" width="60" height="60">
                                        @endif
                                    </td>
                                    <td width="35%">
                                        <a href="{{ route('user.service_details', $gig->gig_slug) }}">{{ $gig->title }}</a></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center" colspan="1"></td>
                                    </tr>
                                @endforeach
                                <tr class="last">
                                    <td colspan="9">No priority orders to show.</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div id="new-orders" class="container tab-pane fade"><br>
                            <table class="orders-table">
                                <thead>
                                <tr class="table-header"><td colspan="9">New Orders</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center" colspan="2">Buyer</td>
                                    <td class="text-center">Gig</td>
                                    <td class="text-center">Due on</td>
                                    <td class="text-center">Total</td>
                                    <td class="text-center">Note</td>
                                    <td class="text-center" colspan="1">Status</td>
                                </tr>
                                <tr class="last">
                                    <td colspan="9">No priority orders to show.</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div id="delivered-orders" class="container tab-pane fade"><br>
                            <table class="orders-table">
                                <thead>
                                <tr class="table-header"><td colspan="9">Delivered Orders</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center" colspan="2">Buyer</td>
                                    <td class="text-center">Gig</td>
                                    <td class="text-center">Due on</td>
                                    <td class="text-center">Total</td>
                                    <td class="text-center">Note</td>
                                    <td class="text-center" colspan="1">Status</td>
                                </tr>
                                <tr class="last">
                                    <td colspan="9">No priority orders to show.</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div id="late-orders" class="container tab-pane fade"><br>
                            <table class="orders-table">
                                <thead>
                                <tr class="table-header"><td colspan="9">Late Orders</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center" colspan="2">Buyer</td>
                                    <td class="text-center">Gig</td>
                                    <td class="text-center">Due on</td>
                                    <td class="text-center">Total</td>
                                    <td class="text-center">Note</td>
                                    <td class="text-center" colspan="1">Status</td>
                                </tr>
                                <tr class="last">
                                    <td colspan="9">No priority orders to show.</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div id="completed-orders" class="container tab-pane fade"><br>
                            <table class="orders-table">
                                <thead>
                                <tr class="table-header"><td colspan="9">Completed Orders</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center" colspan="2">Buyer</td>
                                    <td class="text-center">Gig</td>
                                    <td class="text-center">Due on</td>
                                    <td class="text-center">Total</td>
                                    <td class="text-center">Note</td>
                                    <td class="text-center" colspan="1">Status</td>
                                </tr>
                                <tr class="last">
                                    <td colspan="9">No priority orders to show.</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div id="cancelled-orders" class="container tab-pane fade"><br>
                            <table class="orders-table">
                                <thead>
                                <tr class="table-header"><td colspan="9">Cancelled Orders</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center" colspan="2">Buyer</td>
                                    <td class="text-center">Gig</td>
                                    <td class="text-center">Due on</td>
                                    <td class="text-center">Total</td>
                                    <td class="text-center">Note</td>
                                    <td class="text-center" colspan="1">Status</td>
                                </tr>
                                <tr class="last">
                                    <td colspan="9">No priority orders to show.</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div id="starred-orders" class="container tab-pane fade"><br>
                            <table class="orders-table">
                                <thead>
                                <tr class="table-header"><td colspan="9">Starred Orders</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center" colspan="2">Buyer</td>
                                    <td class="text-center">Gig</td>
                                    <td class="text-center">Due on</td>
                                    <td class="text-center">Total</td>
                                    <td class="text-center">Note</td>
                                    <td class="text-center" colspan="1">Status</td>
                                </tr>
                                <tr class="last">
                                    <td colspan="9">No priority orders to show.</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>

                </article>

            </div>
        </section>
        <script>
            $(document).ready(function(){
                $(".manage-orders .nav-tabs .nav-link:active .pointer").css("left", "2%");
            });
        </script>


    </div>

@endsection

