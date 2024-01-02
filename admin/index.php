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

                <p class="text-muted page-title-alt">Welcome to Wisdom Tooth</p>
                    <!-- <p class="text-muted page-title-alt">Welcome to <?php echo getusers('name',$_SESSION['GRUID']); ?>!</p> -->
                </div>
            </div>
	<div class="row">
      <!--  <div class="col-md-6 col-lg-6 col-xl-6">
                 <a href="<?php echo $sitename; ?>master/category.htm">
                   <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-warning pull-left">
                            <i class="md-group-add text-white"></i>
                        </div>
                        <div class="text-right">
                                    <h3 class="text-dark"><span class="counter">
                               <?php
													   
                            $stmt = $db->prepare("SELECT * FROM `category` WHERE `id`!='0' ");
                               
                           $stmt->execute();
                           echo $sel = $stmt->rowCount();
                                ?> 
                                            
                                </span></h3>
                            <p class="text-muted mb-0"><strong>Total Category</strong></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
             
			 </a>
                </div> -->
         <!--  <div class="col-md-6 col-lg-6 col-xl-6">
            <a href="<?php echo $sitename; ?>master/product.htm">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-info pull-left">
                            <i class="fa fa-shopping-cart text-white"></i>
                        </div>
                        <div class="text-right">
                                    <h3 class="text-dark"><span class="counter">
                               <?php
                          $stmt = $db->prepare("SELECT * FROM `products` WHERE `id`!='0' ");
                          $stmt->execute();
                          echo $sel = $stmt->rowCount();
                                ?> 
                                            
                                </span></h3>
                            <p class="text-muted mb-0"><strong>Total Products</strong></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
              </a>
			  
                </div>
</div>	 -->
	</div>

<?php include 'require/footer.php'; ?>      