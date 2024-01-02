<?php
$menu = "4";
$thispageid = 17;
$franchisee = 'yes';
include ('../../config/config.inc.php');
include ('../../require/header.php');
// error_reporting(1);
// ini_set('display_errors','1');
// error_reporting(E_ALL);
if($_REQUEST['delid']!='')
{
 global $db;
 $c=$_REQUEST['delid'];
        $get = $db->prepare("DELETE FROM `unitprice` WHERE `id` = ? ");
        $get->execute(array($c));	
		$url=$sitename.'master/'.$_REQUEST['pid'].'/editproduct.htm';
	  echo "<script>alert('Unit Deleted Successfully');window.location.assign('".$url."')</script>";
			
}
if (isset($_REQUEST['submit'])) {
    @extract($_REQUEST);
    $getid = $_REQUEST['pid'];
    $ip = $_SERVER['REMOTE_ADDR'];

    $pimage = getproduct('image', $_REQUEST['pid']);
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0)
    {
        $allowed = array("JPG" => "image/JPG", "JPEG" => "image/JPEG", "jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename1 = time().str_replace(' ','-',$_FILES["image"]["name"]);
        $filetype = $_FILES["image"]["type"];
        $filesize = $_FILES["image"]["size"];
        $ext = pathinfo($filename1, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
        if(in_array($filetype, $allowed))
        {
                move_uploaded_file($_FILES["image"]["tmp_name"], $filename . "../../../images/product/" . $filename1);
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

    
    $msg = addproduct($featured,$bestsell,$subcategory,$sdescription,$meta_title,$meta_keyword,$meta_desc,$price,$sprice,$name,$filename1,$category,$today_special,$description,$status,$getid);
   
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
                        <a href="<?php echo $sitename; ?>master/product.htm"><button type="button" class="btn btn-default">Back to Listings Page</button>
                        </a>

                    </div>

                    <h4 class="page-title"><?php
                        if (isset($_REQUEST['pid'])) {
                            echo "Edit";
                        } else {
                            echo "Add";
                        }
                        ?> Product</h4>
                    <ol class="breadcrumb">
                      
                        <li class="breadcrumb-item">Products List</li>
                        <li class="breadcrumb-item active"><?php
                            if (isset($_REQUEST['pid'])) {
                                echo "Edit";
                            } else {
                                echo "Add";
                            }
                            ?> Product</li>
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
              
               <div class="row" id="<?php echo $ids ?>" style="margin-bottom: 10px">
                                        <div class="col-md-6">
                                            <label>Category <span style="color:#FF0000;">*</span></label>                                  
                                            <select name="category" id="cid" class="form-control" required onchange="getsubcategory(this.value)" >
                                                <option value="0">Select Category</option>
                                                <?php
												  $idss = rand(3, 6) . time();
                                                
												 $sel = pFETCH("SELECT * FROM `category` WHERE `status`=?", 1);

                                            while ($fdepart = $sel->fetch(PDO::FETCH_ASSOC)) {
                                            
                                                    ?>
                                                    <option value="<?php echo $fdepart['id']; ?>"
                                                    <?php
                                                    if ($fdepart['id'] == getproduct('category', $_REQUEST['pid'])) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $fdepart['category']; ?></option>
                                                        <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Subcategory <span style="color:#FF0000;">*</span></label>
                                             <select name="subcategory" id="subcategory" class="form-control" required  >
                                                <option value="0">Select Subcategory</option>
                                                <?php
                                                 if(getproduct('subcategory', $_REQUEST['pid'])!='') { 
                                                
                                                 $sel = pFETCH("SELECT * FROM `subcategory` WHERE `status`=? AND `category`=?", 1,getproduct('category', $_REQUEST['pid']));

                                            while ($fdepart = $sel->fetch(PDO::FETCH_ASSOC)) {
                                            
                                                    ?>
                                                    <option value="<?php echo $fdepart['id']; ?>"
                                                    <?php
                                                    if ($fdepart['id'] == getproduct('subcategory', $_REQUEST['pid'])) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $fdepart['subcategory']; ?></option>
                                                        <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
							  
                            <label>Product Name<span style="color:#FF0000;"> *</span></label>
                           <input type="text" required="required" name="name" placeholder="Enter Name"  id="brand_name" class="form-control" value="<?php echo getproduct('productname', $_REQUEST['pid']); ?>">
                            
                            
                          </div>
									 </div>

			  <br>
			  
				  <div class="row">
				   <div class="col-md-6">
                            <label>Price<span style="color:#FF0000;"> *</span></label>
                           <input type="text" required="required" name="price" placeholder="Enter Price"  id="brand_name" class="form-control" value="<?php echo getproduct('price', $_REQUEST['pid']); ?>">
                            
                            
                          </div>
						  
						   <div class="col-md-6">
                            <label>Special Price<span style="color:#FF0000;"> *</span></label>
                           <input type="text" required="required" name="sprice" placeholder="Enter Price"  id="brand_name" class="form-control" value="<?php echo getproduct('sprice', $_REQUEST['pid']); ?>">
                            
                            
                          </div>
						  
				  </div>
				  <br>
                            <div class="row">
                           <div class="col-md-6">
                            <label>Image <span style="color:#FF0000;"> *(Recommended Size 600 Pixels Width and 600 Pixels Height)</span></label>
                           <input  type="file" value="<?php echo getproduct('image', $_REQUEST['pid']); ?>" <?php if(getproduct('image', $_REQUEST['pid'])=='') { ?> required="required" <?php } ?> name="image" class="form-control" >

                       </div>
              
                   <?php if (getproduct('image', $_REQUEST['pid']) != '') { ?>
                    <div class="col-md-6 col-sm-6 col-xs-12" id="delimage">
                    <label> </label>
                    <img src="<?php echo $fsitename; ?>images/product/<?php echo getproduct('image', $_REQUEST['pid']); ?>" style="padding-bottom:10px;" height="100" />
                    <button type="button" style="cursor:pointer;" class="btn btn-danger" name="del" id="del" onclick="javascript:deleteimage('<?php echo getproduct('image', $_REQUEST['pid']); ?>', '<?php echo $_REQUEST['pid']; ?>', 'products', '../images/product/', 'image', 'id');"><i class="fa fa-close">&nbsp;Delete Image</i></button>
                    </div>
                    <?php } ?>
                         </div>
                        <br>
                      
					  <div class="row">
                     <div class="col-md-12">
                            <label>Short Description</label>
                           <textarea name="sdescription" class="form-control"><?php echo getproduct('sdescription', $_REQUEST['pid']); ?></textarea> 
                            
                          </div>
                      </div>
                      <br>

					<div class="row">
					 <div class="col-md-12">
                            <label>Description</label>
                           <textarea name="description" id="editor" class="form-control"><?php echo getproduct('description', $_REQUEST['pid']); ?></textarea> 
                            
                          </div>
                      </div>
                      <br>
                      <div class="row">
						  <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                     <label>Availibility</label>
                           <input type="checkbox" name="today_special" id="brand_name" class="form-control" value="1" <?php if(getproduct('today_special', $_REQUEST['pid'])=='1') { ?> checked="checked" <?php } ?>>
                                </div>
                                <div class="col-md-4">
                                     <label>Featured</label>
                           <input type="checkbox" name="featured" id="brand_name" class="form-control" value="1" <?php if(getproduct('featured', $_REQUEST['pid'])=='1') { ?> checked="checked" <?php } ?>>
                                </div>
                                <div class="col-md-4">
                                     <label>Best Selling</label>
                           <input type="checkbox" name="bestsell" id="brand_name" class="form-control" value="1" <?php if(getproduct('bestsell', $_REQUEST['pid'])=='1') { ?> checked="checked" <?php } ?>>
                                </div>
                            </div>
						  

                       </div>

<div class="col-md-6">
                           <label>Status</label>
                         <select name="status" class="form-control">
                         <option value="1" <?php if(getproduct('status', $_REQUEST['pid'])=='1') { ?> selected="selected"<?php } ?>>Active</option>      
                         <option value="0" <?php if(getproduct('status', $_REQUEST['pid'])=='0') { ?> selected="selected"<?php } ?>>Inactive</option>      
                          </select>

                       </div>




					</div>
					<br>
						<div class="row">
				<div class="col-md-6">
				<label>Meta Title</label>
				<textarea name="meta_title" class="form-control" required="required"><?php echo getproduct('meta_title', $_REQUEST['pid']); ?></textarea>
				</div>
				<div class="col-md-6">
				<label>Meta Keyword</label>
				<textarea name="meta_keyword" class="form-control" required="required"><?php echo getproduct('meta_keyword', $_REQUEST['pid']); ?></textarea>
				</div>
				</div>
				<br>
				<div class="row">
				<div class="col-md-12">
				<label>Meta Description</label>
				<textarea name="meta_desc" class="form-control" required="required"><?php echo getproduct('meta_desc', $_REQUEST['pid']); ?></textarea>
				</div>
				</div>
					<br>
					<br>

					
                    <div class="row">
                        
                      <div class="col-md-6">
                          <br>
                            <button type="submit" name="submit" id="submit" class="btn btn-success" style="float:left;"><?php
                                if ($_REQUEST['pid'] != '') {
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
                            <a href="<?php echo $sitename; ?>master/banner.htm">Back to Listings page</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                            
<script type="text/javascript">

    function delrec(elem, id) {
        if (confirm("Are you sure want to delete this Details?")) {
            $(elem).parent().remove();
            window.location.href = "<?php echo $sitename; ?>master/<?php echo $_REQUEST['pid']; ?>/editproduct.htm?delid=" + id;
        }
    }


    $(document).ready(function (e) {

        $('#add_task').click(function () {


            var data = $('#firsttasktr').clone();
            var rem_td = $('<td />').html('<i class="fa fa-trash fa-2x" style="color:#F00;cursor:pointer;"></i>').click(function () {
                if (confirm("Do you want to delete the Details?")) {
                    $(this).parent().remove();
                    re_assing_serial();

                }
            });
            $(data).attr('id', '').show().append(rem_td);
            $(data).find('td').each(function (e) {
                $(this).find('input[name="unit[]"]').val('');
                $(this).find('input[name="price[]"]').val('');
                $(this).find('input[name="sprice[]"]').val('');
            });
            data = $(data);
            $('#task_table tbody').append(data);
             var tbl = $('#task_table tbody');
              tbl.find('tr').each(function () {
        $(this).find('input[type=text]').bind("keyup", function () {
            calculateSum();
        });
            
 });
            re_assing_serial();

        });

    });

 
    function del_addi(elem) {
        if (confirm("Are you sure want to remove this?")) {
            elem.parent().parent().remove();
            additionalprice();
        }
    }

    function re_assing_serial() {
        $("#task_table tbody tr").not('#firsttasktr').each(function (i, e) {
            //$(this).find('td').eq(0).html(i + 1+1);
        });
        $("#worker_table tbody tr").not('#firstworkertr').each(function (i, e) {
            $(this).find('td').eq(0).html(i + 1);
        });
    }

</script>
<script>
    function getsubcategory(a)
    {
        $.ajax({
            url: "<?php echo $sitename; ?>ajaxfunction.php",
            data: {category: a},
            success: function (data) {
              $("#subcategory").html(data);
            }
        });
    }
   
</script> 

