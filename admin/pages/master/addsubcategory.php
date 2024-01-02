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
    
    $msg = addsubcategory($category,$subcategory,$status,$getid);
   
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
                        <a href="<?php echo $sitename; ?>master/subcategory.htm"><button type="button" class="btn btn-default">Back to Listings Page</button>
                        </a>

                    </div>

                    <h4 class="page-title"><?php
                        if (isset($_REQUEST['pid'])) {
                            echo "Edit";
                        } else {
                            echo "Add";
                        }
                        ?> Subcategory</h4>
                    <ol class="breadcrumb">
                      
                        <li class="breadcrumb-item">Subcategory List</li>
                        <li class="breadcrumb-item active"><?php
                            if (isset($_REQUEST['pid'])) {
                                echo "Edit";
                            } else {
                                echo "Add";
                            }
                            ?> Subcategory</li>
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
                                            <select name="category" id="cid" class="form-control" required onchange="getsubcategoryp(this.value,<?php echo $idss ?>)" >
                                                <option value="0">Select Category</option>
                                                <?php
												  $idss = rand(3, 6) . time();
                                                
												 $sel = pFETCH("SELECT * FROM `category` WHERE `status`=?", 1);

                                            while ($fdepart = $sel->fetch(PDO::FETCH_ASSOC)) {
                                            
                                                    ?>
                                                    <option value="<?php echo $fdepart['id']; ?>"
                                                    <?php
                                                    if ($fdepart['id'] == getsubcategory('category', $_REQUEST['pid'])) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $fdepart['category']; ?></option>
                                                        <?php } ?>
                                            </select>
                                        </div>
                                      <div class="col-md-6">
							  
                            <label>Subcategory Name<span style="color:#FF0000;"> *</span></label>
                           <input type="text" required="required" name="subcategory" placeholder="Enter Subcategory Name"  id="subcategory" class="form-control" value="<?php echo getsubcategory('subcategory', $_REQUEST['pid']); ?>">
                            
                            
                          </div>
									 </div>

			  <br>
			  
              <div class="row">
<div class="col-md-6">
                           <label>Status</label>
                         <select name="status" class="form-control">
                         <option value="1" <?php if(getsubcategory('status', $_REQUEST['pid'])=='1') { ?> selected="selected"<?php } ?>>Active</option>      
                         <option value="0" <?php if(getsubcategory('status', $_REQUEST['pid'])=='0') { ?> selected="selected"<?php } ?>>Inactive</option>      
                          </select>

                       </div>




					</div>
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

