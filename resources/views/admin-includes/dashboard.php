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
                    <div class="chart uchart" data-percent="<?php echo $count_sellers; ?>" data-scale-color="#ffb400"><?php echo $count_sellers; ?></div>
                    <h5>Users</h5>
                  </div>
                  <div class="box">
                    <div class="chart gigchart" data-percent="<?php echo $count_proposals; ?>" data-scale-color="#ffb400"><?php echo $count_proposals; ?></div>
                    <h5>Gigs Pending</h5>
                  </div>
                  <div class="box">
                    <div class="chart orderchart" data-percent="<?php echo $count_orders; ?> " data-scale-color="#ffb400"><?php echo $count_orders; ?> </div>
                    <h5>Active orders</h5>
                  </div>
                  <div class="box">
                    <div class="chart reqchart"  data-percent="<?php echo $count_support_tickets; ?> " data-scale-color="#ffb400"><?php echo $count_support_tickets; ?> </div>
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
                          <div class="sparknmbr"><?php echo $count_orders; ?></div>
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
                          <div class="sparknmbr"><?php echo $count_proposals;?></div>
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
					  <?php $count_pause_proposals = $db->count("proposals",array("proposal_status" => "pause"));?>
                        <div class="sparkcount">
                          <div class="sparknmbr"><?php echo $count_pause_proposals?></div>
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
                          <div class="sparknmbr"><?php echo $count_support_tickets; ?></div>
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
                          <div class="sparknmbr"><?php echo $count_requests; ?></div>
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
                          <div class="sparknmbr"><?php echo $count_referrals; ?></div>
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
				<?php 
				$totalSale = $db->query("SELECT SUM(amount) AS total FROM sales $filter_q")->fetch()->total;
	$allProfit = $db->query("SELECT SUM(profit) AS total FROM sales $filter_q")->fetch()->total;
	$expenses = $db->query("SELECT SUM(amount) AS total FROM expenses $filter_q")->fetch()->total;
	$shoppingBalance = $db->query("SELECT SUM(current_balance) AS total FROM seller_accounts")->fetch()->total;
	$netProfit = $allProfit - $expenses;

  if(empty($totalSale)){$totalSale=0;}
  if(empty($allProfit)){$allProfit=0;}
  if(empty($expenses)){$expenses=0;}
  if(empty($shoppingBalance)){$shoppingBalance=0;}
				
				?>
                  <div class="col-md-4">
                    <div class="sparkbox">
                      <div class="barch">
                        <span class="inlinebar">1,3,4,5,3,5</span>                   
                      </div>
                      <div class="sparkinfo">
                        <div class="sparkcount">
                          <div class="sparknmbr"><?= $s_currency.$totalSale; ?></div>
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
                          <div class="sparknmbr"><?= $s_currency.$expenses; ?></div>
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
                          <div class="sparknmbr"><?= $s_currency.$netProfit; ?></div>
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
                  <span><?php echo date('M d,Y H:i A')?></span>
                </li>
                <li>
                  Last login:
                  <span><?php echo date('M d,Y H:i A', $_SESSION['loggedin_time']);?></span>
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
                  <a href="index?view_proposals">Gigs pending approval (<?php echo $count_proposals;?>)</a>
                </li>
				<li><a href="index?buyer_requests">Buyer requests (<?php echo $count_requests;?>)</a></li>
              </ul>
            </div>
          </div>
          <div class="sidebar">
            <div class="sidehead1">
              <i class="fa fa-eye"></i>
              <span>Waiting for Review</span>
            </div>
            <div class="scontent1">
              <a href="index?inbox_conversations">Total messages (<?php if(!isset($total_records)) {$total_records=0;} echo $total_records ;?>)</a>
            </div>
          </div>
          <div class="sidebar">
            <div class="sidehead2">
              <i class="fa fa-user"></i>
              <span>Recently Registered Users</span>
            </div>
            <div class="scontent2">
              <?php 
			  
			  $get_sellers = $db->query("select * from sellers where seller_level=1 order by 1 DESC LIMIT 5");
                
                while($row_sellers = $get_sellers->fetch()){

                $seller_id=$row_sellers->seller_id;
                $seller_user_name = $row_sellers->seller_user_name;
				echo '<a href="index?single_seller='.$seller_id.'">'.$seller_user_name.'</a>';
				
				echo '<span>,&nbsp;</span>';
				}
				
				?>
            </div>
          </div>
          <div class="sidebar">
            <div class="sidehead3">
              <i class="fa fa-user-circle"></i>
              <span>Limelancer.com</span>
            </div>
            <div class="scontent1">
            <?php $get_app = $db->select("app_info");
$row_app = $get_app->fetch();
$current_version = $row_app->version;
$r_date = $row_app->r_date;?>
              <ul>
                <li>
                  Script version <?php echo $current_version; ?>
                </li>
                <li>
                  PHP version <?php echo phpversion(); ?>
                </li>
                <li>
                  Current Selected Language: <strong><?= $currentLanguage; ?></strong>
                </li>
               
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Eof main section -->