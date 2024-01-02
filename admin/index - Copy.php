<?php
$dynamic = '1';
$menu = '1';
$index='1';
include ('config/config.inc.php');


include ('require/header.php');
//print_r($_SESSION);
$_SESSION['mobileno']='';
unset($_SESSION['mobileno']);

if($_SESSION['highrisk']!='unshow' && isset($_SESSION['doctorid']))
{
  $_SESSION['highrisk']='show';  
}


?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Page-Title -->
      
            <div class="row">
                <div class="col-sm-12">
                <h4 class="page-title">Dashboard</h4>
                    <p class="text-muted page-title-alt">Welcome to <?php echo getusers('name',$_SESSION['GRUID']); ?>!</p>
                </div>
            </div>
			<div class="row">
             <div class="col-md-6 col-lg-6 col-xl-4">
             
                         <a href="<?php echo $sitename; ?>master/banner.htm">
                             
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-pink pull-left">
                            <i class="fa fa-calendar text-white"></i>
                        </div>
                        <div class="text-right">
                                    <h3 class="text-dark"><span class="counter">
                                 <?php
                             $stmt = $db->prepare("SELECT * FROM `banner` ");
                               
                           $stmt->execute();
                           echo $sel = $stmt->rowCount();
                                ?> 
                                            
                                </span></h3>
                            <p class="text-muted mb-0">No of Banners</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </a>
                </div>
				
				          <div class="col-md-6 col-lg-6 col-xl-4">
             
                   <a href="<?php echo $sitename; ?>master/category.htm">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-purple pull-left">
                            <i class="md-group-add text-white"></i>
                        </div>
                        <div class="text-right">
                                    <h3 class="text-dark"><span class="counter">
                               <?php
                             $stmt = $db->prepare("SELECT * FROM `category` ");
                               
                           $stmt->execute();
                           echo $sel = $stmt->rowCount();
                                ?> 
                                            
                                </span></h3>
                            <p class="text-muted mb-0">No of Categories</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
					</a>
              
                </div>
				
				           <div class="col-md-6 col-lg-6 col-xl-4">
             
                    <a href="<?php echo $sitename; ?>master/product.htm">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-info pull-left">
                            <i class="md-group-add text-white"></i>
                        </div>
                        <div class="text-right">
                                    <h3 class="text-dark"><span class="counter">
                               <?php
                             $stmt = $db->prepare("SELECT * FROM `products`");
                               
                           $stmt->execute();
                           echo $sel = $stmt->rowCount();
                                ?> 
                                            
                                </span></h3>
                            <p class="text-muted mb-0">No of Products</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
              </a>
                </div>
</div>			
<div class="row">
       <div class="col-md-6 col-lg-6 col-xl-4">
             
                   <a href="<?php echo $sitename;?>master/customers.htm">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-warning pull-left">
                            <i class="md-group-add text-white"></i>
                        </div>
                        <div class="text-right">
                                    <h3 class="text-dark"><span class="counter">
                               <?php
                            $stmt = $db->prepare("SELECT * FROM `customer` ");
                               
                           $stmt->execute();
                           echo $sel = $stmt->rowCount();
                                ?> 
                                            
                                </span></h3>
                            <p class="text-muted mb-0">No of Customers</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
              </a>
                </div>
          <div class="col-md-6 col-lg-6 col-xl-4">
                     <a href="<?php echo $sitename; ?>master/pending_orders.htm">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-info pull-left">
                            <i class="typcn typcn-user-add text-white"></i>
                        </div>
                        <div class="text-right">
                                    <h3 class="text-dark"><span class="counter">
                               <?php
                          $stmt = $db->prepare("SELECT * FROM `orders` WHERE `deliver_status`!='Delivered' ");
                          $stmt->execute();
                          echo $sel = $stmt->rowCount();
                                ?> 
                                            
                                </span></h3>
                            <p class="text-muted mb-0">No of Pending Orders</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </a>
                </div>
           <div class="col-md-6 col-lg-6 col-xl-4">
                     <a href="<?php echo $sitename; ?>master/completed_orders.htm">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-purple pull-left">
                            <i class="typcn typcn-user-add text-white"></i>
                        </div>
                        <div class="text-right">
                                    <h3 class="text-dark"><span class="counter">
                               <?php
                          $stmt = $db->prepare("SELECT * FROM `orders` WHERE `deliver_status`='Delivered' ");
                          $stmt->execute();
                          echo $sel = $stmt->rowCount();
                                ?>
                                            
                                </span></h3>
                            <p class="text-muted mb-0">No of Completed Orders</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </a>
                </div>
                                     
</div>
	<?php include 'require/footer.php'; ?>      