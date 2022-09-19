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

                        <h1 class="header-title">Manage Orders</h1>
                    </header>

                    <div class="manage-orders">


                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a href="#priority-orders" data-toggle="tab" class="nav-link active">Active</a></li>
                            <li class="nav-item"><a href="#delivered-orders" data-toggle="tab" class="nav-link">Delivered</a></li>
                            <li class="nav-item"><a href="#completed-orders" data-toggle="tab" class="nav-link">Completed</a></li>
                            <li class="nav-item"><a href="#cancelled-orders" data-toggle="tab" class="nav-link">Cancelled</a></li>
                            <li class="nav-item"><a href="#starred-orders" data-toggle="tab" class="nav-link">Starred</a></li>

                        </ul>

                    </div>

                    <div class="tab-content orders-tab-content">


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
                                        <td class="text-center">Seller</td>
                                        <td class="text-center">Price</td>
                                        <td class="text-center">Note</td>
                                        <td class="text-center" colspan="1">Status</td>
                                    </tr>
                                @forelse($getBuyersOrder as $order)

                                    <tr>
                                    <tr>
                                        <td class="text-center" colspan="1">
                                            <input type="checkbox" class="custom-control-lebel">
                                        </td>
                                        <td class="text-center" width="10%">
                                            <img src="{{ asset('/public/service/'.$order->service->galleries[0]->featured_image) }}" alt="" width="60" height="60">
                                        </td>
                                        <td width="35%">
                                            <a href="">{{ $order->service->title }}</a></td>
                                        <td class="text-center">{{ $order->service->user->name }}</td>
                                        <td class="text-center">
                                            @foreach($order->service->pricing as $price)
                                                    @if($price->id === $order->pricing_id)
                                                        ${{ $price->price }}
                                                    @endif
                                            @endforeach
                                        </td>
                                        <td class="text-center"></td>
                                        <td class="text-center" colspan="1">
                                            @if($order->order_status == 0)
                                                <span class="badge badge-pill badge-info">Pending</span>
                                            @endif
                                            @if($order->order_status == 1)
                                                <span class="badge badge-pill badge-info">Delivered</span>
                                            @endif
                                        </td>
                                    </tr>
                                    </tr>
                                @empty
                                    <tr class="last">
                                        <td colspan="9">No priority orders to show.</td>
                                    </tr>
                                @endforelse

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

