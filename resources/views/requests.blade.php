@extends('layouts.master')
@section('main_content')

    <!--End header Area-->
    <div class="container-fluid order-box my-4 p-b-100">

        <section class="row p-b-100">

            <div class="col-md-12 px-5">
                <article class="db-new-content js-db-cont">

                    <header class="order-header mb-4">


                        <h1 class="header-title">Buyer Requests</h1>
                    </header>

                    <div class="manage-orders">


                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a href="#active-requests" data-toggle="tab" class="nav-link active">Active</a></li>
                            <li class="nav-item"><a href="#sent-offers" data-toggle="tab" class="nav-link">Sent Offers</a></li>
                            <div class="request-offers float-right">

                                <form id="" action="" method="get">
                                    <small class="offers-left"><span class="offers-left">0</span> offers left today</small>
                                </form>
                            </div>

                        </ul>

                    </div>

                    <div class="tab-content orders-tab-content">
                        <div id="active-requests" class="container tab-pane active show"><br>
                            <table class="orders-table">
                                <thead>
                                <tr class="table-header"><td colspan="9">Buyer Requests</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center">Date</td>
                                    <td class="text-center" colspan="2">Buyer</td>

                                    <td class="text-center">Request</td>
                                    <td class="text-center">Offers</td>
                                    <td class="text-center">Duration</td>
                                    <td class="text-center" colspan="1">Budget</td>
                                </tr>
                                <tr class="last">
                                    <td colspan="9">You must have active gigs in order to see new buyer requests!</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div id="sent-offers" class="container tab-pane fade"><br>
                            <table class="orders-table">
                                <thead>
                                <tr class="table-header"><td colspan="9">Offer submitted for buyer requests</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center" colspan="2">Offer</td>
                                    <td class="text-center">Duration</td>
                                    <td class="text-center">Price</td>
                                    <td class="text-center">Request</td>

                                </tr>
                                <tr class="last">
                                    <td colspan="9">You must have active gigs in order to see new buyer requests!</td>
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

