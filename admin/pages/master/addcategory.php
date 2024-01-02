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
    
    $pimage = getcategory('image', $_REQUEST['banid']);
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
    
	
    $msg = addcategory($meta_title,$meta_keyword,$meta_desc,$category,$filename1,$status,$getid);
   
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
                        <a href="<?php echo $sitename; ?>master/category.htm"><button type="button" class="btn btn-default">Back to Listings Page</button>
                        </a>

                    </div>

                    <h4 class="page-title"><?php
                        if (isset($_REQUEST['banid'])) {
                            echo "Edit";
                        } else {
                            echo "Add";
                        }
                        ?> Category</h4>
                    <ol class="breadcrumb">
                      
                        <li class="breadcrumb-item">Category List</li>
                        <li class="breadcrumb-item active"><?php
                            if (isset($_REQUEST['banid'])) {
                                echo "Edit";
                            } else {
                                echo "Add";
                            }
                            ?> Category</li>
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
                            <label>Category<span style="color:#FF0000;"> *</span></label>
                           <input type="text" required="required" name="category" placeholder="Category Name" id="category" class="form-control" value="<?php echo getcategory('category', $_REQUEST['banid']); ?>">
                            
                            
                          </div>
                      
                          <div class="col-md-6">
                            <label>Status</label>
                          
                          <select name="status" class="form-control">
                         <option value="1" <?php if(getcategory('status', $_REQUEST['banid'])=='1') { ?> selected="selected"<?php } ?>>Active</option>      
                         <option value="0" <?php if(getcategory('status', $_REQUEST['banid'])=='0') { ?> selected="selected"<?php } ?>>Inactive</option>      
                          </select></div>  
                            
                         
                        </div>
						<br>
						<div class="row">
				<div class="col-md-6">
				<label>Meta Title</label>
				<textarea name="meta_title" class="form-control" required="required"><?php echo getcategory('meta_title', $_REQUEST['banid']); ?></textarea>
				</div>
				<div class="col-md-6">
				<label>Meta Keyword</label>
				<textarea name="meta_keyword" class="form-control" required="required"><?php echo getcategory('meta_keyword', $_REQUEST['banid']); ?></textarea>
				</div>
				</div>
				<br>
				<div class="row">
				<div class="col-md-12">
				<label>Meta Description</label>
				<textarea name="meta_desc" class="form-control" required="required"><?php echo getcategory('meta_desc', $_REQUEST['banid']); ?></textarea>
				</div>
				</div>
					<br>
						  <div class="row">
                           <div class="col-md-6">
                            <label>Image <span style="color:#FF0000;"> *(Recommended Size 800 Pixels Width and 375 Pixels Height)</span></label>
                           <input  type="file" value="<?php echo getcategory('image', $_REQUEST['banid']); ?>" <?php if(getcategory('image', $_REQUEST['banid'])=='') { ?> required="required" <?php } ?> name="image" class="form-control" >

                       </div>
              
                   <?php if (getcategory('image', $_REQUEST['banid']) != '') { ?>
                    <div class="col-md-6 col-sm-6 col-xs-12" id="delimage">
                    <label> </label>
                    <img src="<?php echo $fsitename; ?>images/category/<?php echo getcategory('image', $_REQUEST['banid']); ?>" style="padding-bottom:10px;" height="100" />
                    <button type="button" style="cursor:pointer;" class="btn btn-danger" name="del" id="del" onclick="javascript:deleteimage('<?php echo getcategory('image', $_REQUEST['banid']); ?>', '<?php echo $_REQUEST['banid']; ?>', 'category', '../../images/category/', 'image', 'id');"><i class="fa fa-close">&nbsp;Delete Image</i></button>
                    </div>
                    <?php } ?>
                         </div>
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
                            <a href="<?php echo $sitename; ?>master/category.htm">Back to Listings page</a>
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
