@extends('layouts.master')
@section('main_content')

<!--End header Area-->
<div class="container-fluid order-box my-4 p-b-100">

      <div class="row p-b-100">
       
         <div class="col-md-12 px-5">
	

            <header class="order-header mb-4">
                


                <h1 class="header-title">Earnings</h1>
            </header>
			<section class="analytics-bar mt-4">
			<div class="topbar-stats empty-state">
			<ul>
			<li><h4>Net Income</h4><span class="stats-amount">$0</span></li>
			<li><h4>Withdrawn</h4><span class="stats-amount">0</span></li>
			<li><h4>Used for Purchases</h4><span class="stats-amount">$0</span></li>
			<li><h4>Pending Clearance</h4><span class="stats-amount">$0</span></li>
			<li><h4>Available for Withdrawal</h4><span class="stats-amount">$0</span></li>
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

