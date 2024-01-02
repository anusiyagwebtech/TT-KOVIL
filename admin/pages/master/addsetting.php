<?php
$menu = "17";
$thispageid = 17;
$franchisee = 'yes';
include ('../../config/config.inc.php');
include ('../../require/header.php');
// error_reporting(1);
// ini_set('display_errors','1');
// error_reporting(E_ALL);

if (isset($_REQUEST['submit'])) {
    @extract($_REQUEST);
    $getid = $_SESSION['GRUID'];
    $ip = $_SERVER['REMOTE_ADDR'];
    
    
    $msg = addsetting($working_time,$emailid,$mobileno,$facebook,$twitter,$youtube,$about,$address,$getid);
   
}

?>
<script type="text/javascript">
 
    function deleteimage(a, b, c, d, e, f) {

        $.ajax({
            type: "POST",
            url: "<?php echo $sitename; ?>config/functions_ajax.php",
            data: {image: a, id: b, table: c, path: d, images: e, pid: f},
            success: function (data) {
               // alert(data);   
                $('#delimage').html(data);
            }

        });
    }

    function deleteimage1(a, b, c, d, e, f) {

        $.ajax({
            type: "POST",
            url: "<?php echo $sitename; ?>config/functions_ajax.php",
            data: {image: a, id: b, table: c, path: d, images: e, pid: f},
            success: function (data) {
                //alert(data);   
                $('#delimage1').html(data);
            }

        });
    }
</script>


<!-- Content Wrapper. Contains page content -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group pull-right m-t-15">
                        <!-- <a href="<?php echo $sitename; ?>master/setting.htm"><button type="button" class="btn btn-default">Back to Listings Page</button>
                        </a> -->

                    </div>

                    <h4 class="page-title"><?php
                        if (isset($_REQUEST['banid'])) {
                            echo "Edit";
                        } else {
                            echo "Add";
                        }
                        ?> Settings</h4>
                    <ol class="breadcrumb">
                      
                        <li class="breadcrumb-item">Settings</li>
                        <li class="breadcrumb-item active"><?php
                            if (isset($_REQUEST['banid'])) {
                                echo "Edit";
                            } else {
                                echo "Add";
                            }
                            ?> Settings</li>
                    </ol>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">

<!-- <p class="text-muted m-b-30 font-13">
    Use the button classes on an <code>&lt;a&gt;</code>, <code>&lt;button&gt;</code>, or <code>&lt;input&gt;</code> element.
</p> -->
                        <div class="row">
                            <div class="col-md-12">
                            <?php echo $msg; ?>

                                <form method="post" autocomplete="off" enctype="multipart/form-data" action="">
                                    <div class="box box-info">
                                        <div class="box-header with-border">

  <span style="float:right; font-size:13px; color: #333333; text-align: right; padding: 8px;"><span style="color:#FF0000;">*</span> Marked Fields are Mandatory<br></span> 
  <br>
                                        </div>
                                        <div class="box-body">
                                            <br>
                                        <?php //echo $msg; ?>
              
              
                          <div class="row">
                              <div class="col-md-6">
                            <label>Emailid<span style="color:#FF0000;"> *</span></label>
                           <input type="text" required="required" name="emailid" class="form-control" placeholder="Emailid" value="<?php echo getsetting('emailid', $_REQUEST['banid']); ?>">
                            
                        </div>
                        <div class="col-md-6">
                            <label>Contact Number<span style="color:#FF0000;"> *</span></label>
                           <input type="text" required="required" name="mobileno" class="form-control" placeholder="Mobileno" value="<?php echo getsetting('mobileno', $_REQUEST['banid']); ?>">
                            </div>
                    </div>
                    <br>    
<div class="row">
                              <div class="col-md-6">
                            <label>Working Time<span style="color:#FF0000;"> *</span></label>
                           <input type="text" required="required" name="working_time" class="form-control" placeholder="Working Hours" value="<?php echo getsetting('working_time', $_REQUEST['banid']); ?>">
                            
                        </div>
						 <div class="col-md-6">
                            <label>Facebook URL<span style="color:#FF0000;"> *</span></label>
                           <input type="text" required="required" name="facebook" class="form-control" placeholder="Facebook URL" value="<?php echo getsetting('facebook', $_REQUEST['banid']); ?>">
                            
                        </div>
						</div>
                         
                        <br>
                      
                      <div class="row">
                              <div class="col-md-6">
                            <label>Twitter URL<span style="color:#FF0000;"> *</span></label>
                           <input type="text" required="required" name="twitter" class="form-control" placeholder="Twitter URL" value="<?php echo getsetting('twitter', $_REQUEST['banid']); ?>">
                            
                        </div>
						 <div class="col-md-6">
                            <label>Youtube URL<span style="color:#FF0000;"> *</span></label>
                           <input type="text" required="required" name="youtube" class="form-control" placeholder="Youtube URL" value="<?php echo getsetting('youtube', $_REQUEST['banid']); ?>">
                            
                        </div>
						</div>
                         
                        <br>
						 <div class="row">
                              <div class="col-md-6">
                            <label>Address<span style="color:#FF0000;"> *</span></label>
                        <textarea name="address" class="form-control"><?php echo getsetting('address', $_REQUEST['banid']); ?></textarea>  
                        </div>
						 <div class="col-md-6">
                            <label>About Us <span style="color:#FF0000;"> *</span></label>
                           <textarea name="about" class="form-control"><?php echo getsetting('about', $_REQUEST['banid']); ?></textarea>  
                         
                        </div>
						</div>
                         
                        <br>
                    <div class="row">
                        
                      <div class="col-md-6">
                          <br>
                            <button type="submit" name="submit" id="submit" class="btn btn-success" style="float:left;"><?php
                                if ($_REQUEST['banid'] != '') {
                                    echo 'UPDATE';
                                } else {
                                    echo 'SUBMIT';
                                }
                                ?></button>
                        </div>
              
                    </div>
                                            <br>
                         
               
                </div><!-- /.box-body -->
                <br><br>
                <div class="box-footer">
                    <div class="row">
                        <!-- <div class="col-md-6">
                            <a href="<?php echo $sitename; ?>master/setting.htm">Back to Listings page</a>
                        </div> -->
                       
                    </div>
                </div>
                    
                                    </div>  </form>
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 


    <!-- /.box -->
</div>
<!-- /.content -->
<!-- /.content-wrapper -->

<?php include ('../../require/footer.php'); ?>

<script>
    function getmanager(a)
    {
        $.ajax({
            url: "<?php echo $sitename; ?>ajaxfunction.php",
            data: {supervisor: a},
            success: function (data) {
              $("#manager").html(data);
            }
        });
    }
   
</script>  
