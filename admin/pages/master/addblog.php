<?php
$menu = "13";
$thispageid = 17;
$franchisee = 'yes';
include ('../../config/config.inc.php');
include ('../../require/header.php');


if (isset($_REQUEST['submit'])) {
    @extract($_REQUEST);
    $getid = $_REQUEST['banid'];
    $ip = $_SERVER['REMOTE_ADDR'];
    
    $pimage = get_blog('image', $_REQUEST['banid']);
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0)
    {
        $allowed = array("JPG" => "image/JPG", "JPEG" => "image/JPEG","jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename1 = time().$_FILES["image"]["name"];
        $filetype = $_FILES["image"]["type"];
        $filesize = $_FILES["image"]["size"];
        $ext = pathinfo($filename1, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
        if(in_array($filetype, $allowed))
        {
                move_uploaded_file($_FILES["image"]["tmp_name"], $filename . "../../../images/category/" . $filename1);
                echo "Your file was uploaded successfully.";
    
        } 
        else
        {
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } 
    else {
        $filename1 = $pimage;
    }
    
	
    $msg = addblog($blog_title,$blog_content,$status,$getid);
   
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
                        <a href="<?php echo $sitename; ?>master/blog.htm"><button type="button" class="btn btn-default">Back to Listings Page</button>
                        </a>

                    </div>

                    <h4 class="page-title"><?php
                        if (isset($_REQUEST['banid'])) {
                            echo "Edit";
                        } else {
                            echo "Add";
                        }
                        ?> Blog</h4>
                    <ol class="breadcrumb">
                      
                        <li class="breadcrumb-item">Blog List</li>
                        <li class="breadcrumb-item active"><?php
                            if (isset($_REQUEST['banid'])) {
                                echo "Edit";
                            } else {
                                echo "Add";
                            }
                            ?> Blog</li>
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
                            <label>Blog Title<span style="color:#FF0000;"> *</span></label>
                           <input type="text" required="required" name="blog_title" placeholder="Category Name" id="category" class="form-control" value="<?php echo get_blog('blog_title', $_REQUEST['banid']); ?>">
                            
                            
                          </div>
                      
                          <div class="col-md-6">
                            <label>Status</label>
                          
                          <select name="status" class="form-control">
                         <option value="1" <?php if(get_blog('status', $_REQUEST['banid'])=='1') { ?> selected="selected"<?php } ?>>Active</option>      
                         <option value="0" <?php if(get_blog('status', $_REQUEST['banid'])=='0') { ?> selected="selected"<?php } ?>>Inactive</option>      
                          </select></div>  
                            
                         
                        </div>
						<br>
						 <div class="row">
                            <div class="col-sm-12">
                            <label>Blog Content</label>

                                <textarea class="form-control" name="blog_content"><?php echo get_blog('blog_content', $_REQUEST['banid']); ?></textarea>
                            </div>
                         </div>
				<br>
				
					<br>
						  
                        <br>
                      
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
                        <div class="col-md-6">
                            <a href="<?php echo $sitename; ?>master/blog.htm">Back to Listings page</a>
                        </div>
                       
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
