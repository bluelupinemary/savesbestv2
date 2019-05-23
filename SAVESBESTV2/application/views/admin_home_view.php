
<!--ADMIN'S HOME VIEW-->
<body>
      <nav class="navbar navbar-fixed-top">
        <!--start of the navbar title section-->
          <div class="navbar-header lighten-blue">
              <img class="login-img" src="<?php echo base_url();?>devtools/images/bill/uplb.png" height="50px" width="60px"/>
              <img class="login-img" src="<?php echo base_url();?>devtools/images/bill/logo-trans.png" height="50px" width="60px"/>
          </div>
          <!--Shows the logged in username and logout button-->
          <div id="homenavbar" class="row pull-right">
				        <div class="col-md-4">
            				<?php
                        echo "<a href='#'><b>User: $username</b></a>";
            				?>
				           </div>
				       <div class="col-md-4">
      				       <a class="btn btn-primary" href="<?php echo site_url('home/logout')?>" role="button">Logout</a>
        			</div>
          </div>
    </nav>

    <div>
      <div class="container">
      	<div class="row">  <br/><br/>
          <!--the home - dashboard panel; greets the user-->
          <div class="panel panel-info">

				  		<!--div class="panel-heading">
				    		HOME - DASHBOARD
				  		</div-->
				  		<div class="panel-body">
				  			<?php
								if($usertype==1){         //user is an admin
									echo "<h2>Welcome Admin,  <b>".$username."</b>!</h2>";
								}else if($usertype==2){   //user is an officer
									echo "<h2>Welcome Officer,  ".$username."!</h2>";
								}else if($usertype==3){   //user is a meter reader
									echo "<h2>Welcome Reader, ".$username."!</h2>";
								}
							?>
              <br/>
              Notifications:
              <?php  
              echo "<br><span style='color:maroon;font-size:1.1em;'>BILLS NOT IN COLLECTION: </span>"."<a href='".site_url('home/queryBillsToView')."' style='font-weight:bold;'>".$bills_not_paid_count['cnt']."</a>";
            //  echo "<br><span style='color:maroon;font-size:1.1em;'>WITH PARTIAL PAYMENTS: </span>"."<a href='".site_url('home/viewCollectionNotPaid')."' style='font-weight:bold;'>".$payment_not_full['cnt']."</a>";
      

              ?>
              
				  		</div>
			     </div>
      	</div>
      </div> <!--END OF FIRST CONTAINER-->

      <!--START OF MENU CONTAINERS-->
      <div class="container container-small,">
      	<br/><br/>
        <div class="row">
            <!--START OF CONSUMER MENU-->
        		<div class="col-md-3">
          			<div class="panel panel-primary" style="min-height:400px">
    				  		<div class="menu-head panel-heading">
    				    		      <center>CONSUMERS SECTION</center>
    				  		</div>
    				  		<div class="panel-body" style="padding-top:50px">
    				  			<ul class="img-list">
                      <!--li>
      								    <a href="<?php echo site_url('home/listConsumer') ?>">
      								      <img src="<?php echo base_url();?>devtools/images/view_user.png" width="100px" height="100px" alt="image goes here"></img>
      								      <span class="text-content"><span>VIEW CONSUMERS</span></span>
      								    </a>
      								</li-->
    								<li>
    								    <a href="<?php echo site_url('home/addConsumer') ?>">
    								      <img src="<?php echo base_url();?>devtools/images/add_user.png" width="100px" height="100px" alt="image goes here"></img>
    								      <span class="text-content"><span>ADD CONSUMER</span></span>
    								    </a>
    								</li>
    								<li>
    								    <a href="<?php echo site_url('home/editConsumer') ?>">
    								      <img src="<?php echo base_url();?>devtools/images/edit_user.png" width="100px" height="100px" alt="image goes here"></img>
    								      <span class="text-content"><span>EDIT CONSUMER DETAILS</span></span>
    								    </a>
    								</li>
                    <!--li>
                        <a href="<?php echo site_url('home/editConsumer') ?>">
                          <img src="<?php echo base_url();?>devtools/images/coleasee.png" width="100px" height="100px" alt="image goes here"></img>
                          <span class="text-content"><span>ADD A COLEASEE</span></span>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo site_url('home/editConsumer') ?>">
                          <img src="<?php echo base_url();?>devtools/images/inactive_consumers.png" width="100px" height="100px" alt="image goes here"></img>
                          <span class="text-content"><span>VIEW INACTIVE CONSUMERS</span></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('home/editConsumer') ?>">
                          <img src="<?php echo base_url();?>devtools/images/archive.png" width="100px" height="100px" alt="image goes here"></img>
                          <span class="text-content"><span>VIEW ARCHIVED CONSUMERS</span></span>
                        </a>
                    </li-->
    							</ul>

    							<!--	<p> <a class="btn btn-primary btn-lg col" name="register" role="button" href="<?php echo site_url('home/addTeacher') ?>">Add Teacher</a></p>-->

    				  		</div>
  				  	</div>
        		</div> <!--End of Consumer Section-->

             <!--START OF BILLING MENU-->
            <div class="col-md-3">
                <div class="panel panel-primary" style="min-height:400px">
                  <div class="menu-head panel-heading">
                          <center>BILLING SECTION</center>
                  </div>
                  <div class="panel-body" style="padding-top:50px">
                    <ul class="img-list">
                      <!--li>
                          <a href="<?php echo site_url('home/listConsumer') ?>">
                            <img src="<?php echo base_url();?>devtools/images/view_user.png" width="100px" height="100px" alt="image goes here"></img>
                            <span class="text-content"><span>VIEW CONSUMERS</span></span>
                          </a>
                      </li-->
                    <!--li>
                        <a href="<?php echo site_url('home/viewConsumersForReading') ?>">
                          <img src="<?php echo base_url();?>devtools/images/readings.png" width="100px" height="100px" alt="image goes here"></img>
                          <span class="text-content"><span>ADD READING</span></span>
                        </a>
                    </li-->
                     <li>
                        <!--a href="<?php echo site_url('home/viewImportedConsumersBills') ?>"-->
                         <a href="<?php echo site_url('home/queryImportedConsumersBillsByMonthYear') ?>">
                          <img src="<?php echo base_url();?>devtools/images/readings.png" width="100px" height="100px" alt="image goes here"></img>
                          <span class="text-content"><span>VIEW BILLINGS</span></span>
                        </a>
                    </li>
                     <!--li>
                         <a href="<?php echo site_url('home/viewConsumersForYearBalance') ?>">
                          <img src="<?php echo base_url();?>devtools/images/add_year_balance_icon.png" width="100px" height="100px" alt="image goes here"></img>
                          <span class="text-content"><span>ADD YEAR BALANCE</span></span>
                        </a>
                    </li-->
                  </ul>

                  <!--  <p> <a class="btn btn-primary btn-lg col" name="register" role="button" href="<?php echo site_url('home/addTeacher') ?>">Add Teacher</a></p>-->

                  </div>
              </div>
            </div> <!--END OF BILLING SECTION-->

            <!--START OF PAYMENT MONITORING MENU-->
            <div class="col-md-3">
                <div class="panel panel-primary" style="min-height:400px">
                  <div class="menu-head panel-heading">
                          <center>COLLECTION SECTION</center>
                  </div>
                  <div class="panel-body" style="padding-top:50px">
                    <ul class="img-list">
                      <!--li>
                          <a href="<?php echo site_url('home/listConsumer') ?>">
                            <img src="<?php echo base_url();?>devtools/images/view_user.png" width="100px" height="100px" alt="image goes here"></img>
                            <span class="text-content"><span>VIEW CONSUMERS</span></span>
                          </a>
                      </li-->
                   
                     <!--li>
                        <a href="<?php echo site_url('home/editConsumer') ?>">
                          <img src="<?php echo base_url();?>devtools/images/advance_payment.png" width="100px" height="100px" alt="image goes here"></img>
                          <span class="text-content"><span>ADD ADVANCED PAYMENT</span></span>
                        </a>
                    </li-->
                    <li>
                        <a href="<?php echo site_url('home/importConsumerBills') ?>">
                          <img src="<?php echo base_url();?>devtools/images/import-readings.png" width="100px" height="100px" alt="image goes here"></img>
                          <span class="text-content"><span>IMPORT BILLINGS</span></span>
                        </a>
                    </li>
                     <li>
                        <!--a href="<?php echo site_url('home/viewBillingsForCollection') ?>"-->
                        <a href="<?php echo site_url('home/queryBillsToView') ?>">
                          <img src="<?php echo base_url();?>devtools/images/addCollection.png" width="100px" height="100px" alt="image goes here"></img>
                          <span class="text-content"><span>ADD COLLECTION</span></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('home/queryCollectionToView') ?>">
                          <img src="<?php echo base_url();?>devtools/images/edit_collection.png" width="100px" height="100px" alt="image goes here"></img>
                          <span class="text-content"><span>EDIT COLLECTION / ADD SURCHARGE</span></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('home/queryAllCollections') ?>">
                          <img src="<?php echo base_url();?>devtools/images/view_collection.png" width="100px" height="100px" alt="image goes here"></img>
                          <span class="text-content"><span>VIEW ALL COLLECTIONS</span></span>
                        </a>
                    </li>
                   
                  </ul>

                  <!--  <p> <a class="btn btn-primary btn-lg col" name="register" role="button" href="<?php echo site_url('home/addTeacher') ?>">Add Teacher</a></p>-->

                  </div>
              </div>
            </div> <!--END OF BILLING SECTION-->

             <!--START OF REPORTS MENU-->
            <div class="col-md-3">
                <div class="panel panel-primary" style="min-height:400px">
                  <div class="menu-head panel-heading">
                          <center>REPORTS SECTION</center>
                  </div>
                  <div class="panel-body" style="padding-top:50px">
                    <ul class="img-list">
                    <li>
                        <a href="<?php echo site_url('home/viewStatementOfAccount') ?>">
                          <img src="<?php echo base_url();?>devtools/images/statement_of_accounts.png" width="100px" height="100px" alt="image goes here"></img>
                          <span class="text-content"><span>VIEW STATEMENT OF ACCOUNT</span></span>
                        </a>
                    </li>
                    <!--li>
                        <a href="<?php echo site_url('home/editConsumer') ?>">
                          <img src="<?php echo base_url();?>devtools/images/reports.png" width="100px" height="100px" alt="image goes here"></img>
                          <span class="text-content"><span>VIEW REPORTS</span></span>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo site_url('home/editConsumer') ?>">
                          <img src="<?php echo base_url();?>devtools/images/bill_summary.png" width="100px" height="100px" alt="image goes here"></img>
                          <span class="text-content"><span>VIEW BILL SUMMARY</span></span>
                        </a>
                    </li>
                   <li>
                        <!--a href="<?php echo site_url('home/queryCollectionReport') ?>">
                          <img src="<?php echo base_url();?>devtools/images/collection_summary.png" width="100px" height="100px" alt="image goes here"></img>
                          <span class="text-content"><span>VIEW COLLECTION REPORT</span></span>
                        </a>
                    </li--  >
                  </ul>

                  <!--  <p> <a class="btn btn-primary btn-lg col" name="register" role="button" href="<?php echo site_url('home/addTeacher') ?>">Add Teacher</a></p>-->

                  </div>
              </div>
            </div> <!--END OF BILLING SECTION-->

           
        </div><!--END OF SECOND CONTAINER-->

    </div><!--END OF JUMBOTRON-->
