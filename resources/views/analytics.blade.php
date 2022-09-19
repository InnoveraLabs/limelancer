@extends('layouts.master')
@section('main_content')

<!--End header Area-->
<div class="container-fluid order-box box-row my-4 p-b-100">

      <div class="row p-b-100">
       
         <div class="col-md-12 px-5">
	

            <header class="order-header mb-4">
                


                <h1 class="header-title">Analytics</h1>
            </header>
			<section class="analytics-bar mt-4">
			<div class="topbar-stats empty-state">
			<ul>
			<li><h4>Total Earnings</h4><span class="stats-amount">$0</span></li>
			<li><h4>Total Completed Orders</h4><span class="stats-amount">0</span></li>
			<li><h4>Avg. Selling Price</h4><span class="stats-amount">$0</span></li>
			<li><h4>Earned in November</h4><span class="stats-amount">$0</span></li>
			</ul>
			</div>
			
			
			</section>


			
     

         </div>
      </div>
    <script>
      $(document).ready(function(){
      $(".manage-orders .nav-tabs .nav-link:active .pointer").css("left", "2%");
      });
   </script>     


</div>

@endsection

