<?php date_default_timezone_set('Asia/Kolkata');
include ('../../config/config.inc.php');
date_default_timezone_set('Asia/Kolkata');
//ini_set('display_errors','1');
//error_reporting(E_ALL);
function mres($value) {
    $search = array("\\", "\x00", "\n", "\r", "'", '"', "\x1a");
    $replace = array("\\\\", "\\0", "\\n", "\\r", "\'", '\"', "\\Z");
    return str_replace($search, $replace, $value);
}

if ($_REQUEST['types'] == 'blog_table') {
$aColumns = array('id', 'blog_title','status');
$sIndexColumn = "id";
//$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
$sTable = "blog_tbl";
}

if ($_REQUEST['types'] == 'bannertable') {
$aColumns = array('id', 'banner_name','status');
$sIndexColumn = "id";
//$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
$sTable = "banner";
}


if ($_REQUEST['types'] == 'bookingappointmenttable') {
$aColumns = array('id', 'name','mobilenumber','city','date', 'time');
$sIndexColumn = "id";
//$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
$sTable = "appointment_booking_tbl";
}

if ($_REQUEST['types'] == 'producttable') {
    $aColumns = array('id','category','productname','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "products";
}


if ($_REQUEST['types'] == 'settingtable') {
    $aColumns = array('id','mobile','email');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "setting";
}

if ($_REQUEST['types'] == 'complainttable') {
    $aColumns = array('id', 'type');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "complaint";
}

if ($_REQUEST['types'] == 'categorytable') {
    $aColumns = array('id', 'category','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "category";
}

if ($_REQUEST['types'] == 'subcategorytable') {
    $aColumns = array('id', 'category','subcategory','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "subcategory";
}


if ($_REQUEST['types'] == 'modelstable') 
{
    $aColumns = array('id', 'model_name','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "models";
}

if ($_REQUEST['types'] == 'registersstable') 
{

    $aColumns = array('id','address_name','address_mobileno','address_email');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "register";
}



if ($_REQUEST['types'] == 'complaintstable') 
{
    $aColumns = array('id', 'type','name');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";brandstable modelstable
    $sTable = "complaints";
}

if ($_REQUEST['types'] == 'jobtable') {
    $aColumns = array('id', 'job','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner"; complaintstable
    $sTable = "job";
}


if ($_REQUEST['types'] == 'experiencetable') {
    $aColumns = array('id', 'experience','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "experience";
}


if ($_REQUEST['types'] == 'employeetable') {
    $aColumns = array('id','manager','name', 'mobileno', 'username', 'password','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "employee";
}
if ($_REQUEST['types'] == 'supervisortable') {
    $aColumns = array('id', 'name', 'mobileno', 'username', 'password','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "supervisor";
}
if ($_REQUEST['types'] == 'managertable') {
    $aColumns = array('id','supervisor', 'name', 'mobileno', 'username', 'password','status');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "manager";
}


if ($_REQUEST['types'] == 'panchayattable') {
    $aColumns = array('id', 'district_name','block_name','panchayat_name');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "village";
}
if ($_REQUEST['types'] == 'blocktable') {
    $aColumns = array('id', 'district_name','block_name');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "village";
}


if ($_REQUEST['types'] == 'registertable') {
    $aColumns = array('id', 'date','name');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "contact_form";
}
if ($_REQUEST['types'] == 'formtable') {
    $aColumns = array('id', 'date','type','userid','mobileno','mailid');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "forms";
}

if ($_REQUEST['types'] == 'employeeformtable') {
    $aColumns = array('id', 'date','manager','type','userid','mobileno','mailid');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "forms";
}

if ($_REQUEST['types'] == 'managerformtable') {
    $aColumns = array('id', 'date','manager','type','userid','mobileno','mailid');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "forms";
}



if ($_REQUEST['types'] == 'nmanagerformtable') {
    $aColumns = array('id', 'date','type','userid','mobileno','mailid');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "forms";
}


if ($_REQUEST['types'] == 'formtable1') {
    $aColumns = array('id', 'date','userid');
    $sIndexColumn = "id";
    //$editpage = ($_REQUEST['db_table_for'] == 'live') ? "editbanner" : "editbanner";
    $sTable = "forms";
}
/* Declaration table name start here */



$aColumns1 = $aColumns;

function fatal_error($sErrorMessage = '') {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    die($sErrorMessage);
}

$sLimit = "";

if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
    $sLimit = "LIMIT " . intval($_GET['iDisplayStart']) . ", " . intval($_GET['iDisplayLength']);
}
 if ($_REQUEST['types'] == 'categorytable' || $_REQUEST['types'] == 'producttable') {
   $sOrder = "ORDER BY `order` ASC ";
    }
    else
    {
    $sOrder = "ORDER BY `$sIndexColumn` DESC";
    }
    

if (isset($_GET['iSortCol_0'])) {
    $sOrder = "ORDER BY  ";
    if (in_array("order", $aColumns)) {
        $sOrder .= "`order` asc, ";
    } else if (in_array("Order", $aColumns)) {
        $sOrder .= "`Order` asc, ";
    }
    for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
        if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
            $sOrder .= "`" . $aColumns[intval($_GET['iSortCol_' . $i])] . "` " . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
        }
        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY ") {
            $sOrder = " ";
        }
    }
}

$sWhere = "";


if ($sWhere != '') {

     $sWhere = "WHERE `$sIndexColumn`!='' $sWhere";    
  
}
else
{ 
  
   
      if ($_REQUEST['types'] == 'blocktable') {
   $sWhere = " WHERE `block_code`!='' "; 
    }
      if ($_REQUEST['types'] == 'panchayattable') {
   $sWhere = " WHERE `panchayat_code`!='' "; 
    }
    
	if ($_REQUEST['types'] == 'formtable') {
		if($_REQUEST['formid']!='') { 
   $sWhere = "WHERE `userid`='".$_REQUEST['formid']."' AND `type`='".$_SESSION['usertype']."'";    
		}
	if($_SESSION['GRUID']!='1') { 
  	$sWhere = "WHERE `supervisor`='".$_SESSION['usertypeid']."' AND `type`='supervisor'";  	    
		}
		
		
    }
    	if ($_REQUEST['types'] == 'employeeformtable') {
    	    if($_SESSION['usertype']=='supervisor') {
    	 $sWhere = "WHERE `supervisor`='".$_SESSION['usertypeid']."' AND `type`='employee' ";  	    
    	    }
    	    if($_SESSION['usertype']=='manager') {
    	 $sWhere = "WHERE `manager`='".$_SESSION['usertypeid']."' AND `type`='employee' ";  	    
    	    }
    	    if($_SESSION['usertype']=='employee') {
    	 $sWhere = "WHERE `employee`='".$_SESSION['usertypeid']."' AND `type`='employee'";  	    
    	    }
    	}
    	
    	if ($_REQUEST['types'] == 'managerformtable') {
    	    if($_SESSION['usertype']=='supervisor') {
    	 $sWhere = "WHERE `supervisor`='".$_SESSION['usertypeid']."' AND `type`='manager' ";  	    
    	    }
    	     if($_SESSION['usertype']=='manager') {
    	 $sWhere = "WHERE `manager`='".$_SESSION['usertypeid']."' AND `type`='manager'";  	    
    	    }
    	  
    	}
    		if ($_REQUEST['types'] == 'nmanagerformtable') {
    	    if($_SESSION['usertype']=='supervisor') {
    	 $sWhere = "WHERE `supervisor`='".$_SESSION['usertypeid']."' AND `type`='manager' ";  	    
    	    }
    	     if($_SESSION['usertype']=='manager') {
    	 $sWhere = "WHERE `manager`='".$_SESSION['usertypeid']."' AND `type`='manager'";  	    
    	    }
    	  
    	}
    	
    	
    	
    
}

  if ($_REQUEST['types'] == 'pendingordertable') {
   $sWhere = " WHERE (`deliver_status`!='Delivered' OR `deliver_status` IS NULL)"; 
    }
	
	
    if ($_REQUEST['types'] == 'assignedordertable') {
   $sWhere = " WHERE `final_amount` IS NULL AND `driver_id`!='0' "; 
    }
	if ($_REQUEST['types'] == 'completedordertable') {
   $sWhere = " WHERE `deliver_status`='Delivered' "; 
    }
    if ($_REQUEST['types'] == 'formtable1') {
   $sWhere = " WHERE `userid`='".$_SESSION['GRUID']."' AND `type`='".$_SESSION['usertype']."' "; 
    }
   $sQuery = "SELECT SQL_CALC_FOUND_ROWS `" . str_replace(",", "`,`", implode(",", $aColumns)) . "` FROM $sTable $sWhere $sOrder $sLimit ";



$rResult = $db->prepare($sQuery);
$rResult->execute();

 $sQuery = "SELECT FOUND_ROWS()";

$rResultFilterTotal = $db->prepare($sQuery);
$rResultFilterTotal->execute();

$aResultFilterTotal = $rResultFilterTotal->fetch();
$iFilteredTotal = $aResultFilterTotal[0];

$sQuery = "SELECT COUNT(" . $sIndexColumn . ") FROM $sTable";
$rResultTotal = $db->prepare($sQuery);
$rResultTotal->execute();

$aResultTotal = $rResultTotal->fetch();
$iTotal = $aResultTotal[0];

$output = array(
    "sEcho" => intval($_GET['sEcho']),
    "iTotalRecords" => $iTotal,
    "iTotalDisplayRecords" => $iFilteredTotal,
    "aaData" => array()
);

$ij = 1;
$k = $_GET['iDisplayStart'];

while ($aRow = $rResult->fetch(PDO::FETCH_ASSOC)) {
    $k++;
    $row = array();
    $row1 = '';
    for ($i = 0; $i < count($aColumns1); $i++) {
        if ($_REQUEST['types'] == 'registertable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'date') {
                $row[] = date('d-m-Y', strtotime($aRow[$aColumns1[$i]]));
            } 
			else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
        
        else if ($_REQUEST['types'] == 'employeeformtable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif($aColumns1[$i] == 'mobileno')
                {
                  $row[] = "000".$aRow[id];
                  $row[] = $aRow[$aColumns1[$i]];
                } elseif ($aColumns1[$i] == 'date') {
                $row[] = date('d-M-Y', strtotime($aRow[$aColumns1[$i]]));
            }elseif ($aColumns1[$i] == 'manager') {
                $row[] =getmanager('name',$aRow[$aColumns1[$i]]);
            }elseif ($aColumns1[$i] == 'userid') {
                if(getusers('type',$aRow[$aColumns1[$i]])=='supervisor')
                {
                   $row[] = getsupervisor('name',getusers('typeid',$aRow[$aColumns1[$i]])); 
                }
                elseif(getusers('type',$aRow[$aColumns1[$i]])=='manager')
                {
                   $row[] = getmanager('name',getusers('typeid',$aRow[$aColumns1[$i]])); 
                }
                else
                {
                    $row[] = getemployee('name',getusers('typeid',$aRow[$aColumns1[$i]]));  
                }
                
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
        else if ($_REQUEST['types'] == 'managerformtable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'date') {
                $row[] = date('d-M-Y', strtotime($aRow[$aColumns1[$i]]));
            }
            elseif($aColumns1[$i] == 'mobileno')
                {
                  $row[] = "000".$aRow[id];
                  $row[] = $aRow[$aColumns1[$i]];
                }
            elseif ($aColumns1[$i] == 'userid') {
                if(getusers('type',$aRow[$aColumns1[$i]])=='supervisor')
                {
                   $row[] = getsupervisor('name',getusers('typeid',$aRow[$aColumns1[$i]])); 
                }
                elseif(getusers('type',$aRow[$aColumns1[$i]])=='manager')
                {
                   $row[] = getmanager('name',getusers('typeid',$aRow[$aColumns1[$i]])); 
                }
                else
                {
                    $row[] = getemployee('name',getusers('typeid',$aRow[$aColumns1[$i]]));  
                }
                
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }  
        else if ($_REQUEST['types'] == 'vendortable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'date') {
                $row[] = date('d-M-Y', strtotime($aRow[$aColumns1[$i]]));
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
         else if ($_REQUEST['types'] == 'enquirytable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }
            elseif ($aColumns1[$i] == 'date') {
                $row[] = date('d-M-Y', strtotime($aRow[$aColumns1[$i]]));
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
         else if ($_REQUEST['types'] == 'nmanagerformtable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'date') {
                $row[] = date('d-M-Y', strtotime($aRow[$aColumns1[$i]]));
            }
            elseif($aColumns1[$i] == 'mobileno')
                {
                  $row[] = "000".$aRow[id];
                  $row[] = $aRow[$aColumns1[$i]];
                }
            elseif ($aColumns1[$i] == 'userid') {
                if(getusers('type',$aRow[$aColumns1[$i]])=='supervisor')
                {
                   $row[] = getsupervisor('name',getusers('typeid',$aRow[$aColumns1[$i]])); 
                }
                elseif(getusers('type',$aRow[$aColumns1[$i]])=='manager')
                {
                   $row[] = getmanager('name',getusers('typeid',$aRow[$aColumns1[$i]])); 
                }
                else
                {
                    $row[] = getemployee('name',getusers('typeid',$aRow[$aColumns1[$i]]));  
                }
                
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
        else if ($_REQUEST['types'] == 'formtable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'date') {
                $row[] = date('d-M-Y', strtotime($aRow[$aColumns1[$i]]));
            } elseif($aColumns1[$i] == 'mobileno')
                {
                  $row[] = "000".$aRow[id];
                  $row[] = $aRow[$aColumns1[$i]];
                }elseif ($aColumns1[$i] == 'userid') {
                if(getusers('type',$aRow[$aColumns1[$i]])=='supervisor')
                {
                   $row[] = getsupervisor('name',getusers('typeid',$aRow[$aColumns1[$i]])); 
                }
                elseif(getusers('type',$aRow[$aColumns1[$i]])=='manager')
                {
                   $row[] = getmanager('name',getusers('typeid',$aRow[$aColumns1[$i]])); 
                }
                else
                {
                    $row[] = getemployee('name',getusers('typeid',$aRow[$aColumns1[$i]]));  
                }
                
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
        
        else if ($_REQUEST['types'] == 'formtable1') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'date') {
                $row[] = date('d-M-Y', strtotime($aRow[$aColumns1[$i]]));
            }elseif($aColumns1[$i] == 'mobileno')
                {
                  $row[] = "000".$aRow[id];
                  $row[] = $aRow[$aColumns1[$i]];
                }elseif ($aColumns1[$i] == 'userid') {

                $row[] = getusers('name',$aRow[$aColumns1[$i]]);
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }else if ($_REQUEST['types'] == 'districttable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }else if ($_REQUEST['types'] == 'supervisortable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
		else if ($_REQUEST['types'] == 'subcategorytable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } elseif ($aColumns1[$i] == 'category') {
                $row[] = getcategory('category',$aRow[$aColumns1[$i]]);
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
		else if ($_REQUEST['types'] == 'producttable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'category') {
                $row[] = getcategory('category',$aRow[$aColumns1[$i]]);
            }
            elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } 
			 elseif ($aColumns1[$i] == 'subcategory') {
                $row[] = getsubcategory('subcategory',$aRow[$aColumns1[$i]]);
            }
			elseif ($aColumns1[$i] == 'order') {
				$orderval = '<select name="order" id="order" class="form-control" onChange="changeorder(this.value,'.$aRow[id].')">';

				$category=pFETCH("SELECT * FROM `products` WHERE `id`!=? ORDER BY `order` ASC",0);
				while ($categorylist = $category->fetch(PDO::FETCH_ASSOC))
				{
					if($aRow[$aColumns1[$i]]==$categorylist['order']) { $sele='selected="selected"'; } else { $sele=''; }
                 $orderval.='<option value="'.$categorylist['order'].'" '. $sele.'>'.$categorylist['order'].'</option>';					
				}		
                $orderval.='</select>';
				
                $row[] = $orderval;
            }  else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
		else if ($_REQUEST['types'] == 'categorytable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
		 else if ($_REQUEST['types'] == 'pendingordertable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'date') {
                $row[] = date('d-m-Y g:i a',strtotime($aRow[$aColumns1[$i]]));
		 } elseif ($aColumns1[$i] == 'customer_id') {
                $row[] = getcustomer('address_name',$aRow[$aColumns1[$i]]);
				$row[] = getcustomer('address_mobileno',$aRow[$aColumns1[$i]]);
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
		
        else if ($_REQUEST['types'] == 'assignedordertable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'date') {
                $row[] = date('d-m-Y',strtotime($aRow[$aColumns1[$i]]));
		 } elseif ($aColumns1[$i] == 'customer_id') {
                $row[] = getcustomer('name',$aRow[$aColumns1[$i]]);
		 } elseif ($aColumns1[$i] == 'driver_id') {
                $row[] = getdriver('name',$aRow[$aColumns1[$i]]);
		 }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
         else if ($_REQUEST['types'] == 'jobtable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
         else if ($_REQUEST['types'] == 'experiencetable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
        else if ($_REQUEST['types'] == 'employeetable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'manager') {
                $row[] = getmanager('name',$aRow[$aColumns1[$i]]);
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
        else if ($_REQUEST['types'] == 'managertable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'supervisor') {
                $row[] = getsupervisor('name',$aRow[$aColumns1[$i]]);
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
        else if ($_REQUEST['types'] == 'blocktable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } 
            else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
		 else if ($_REQUEST['types'] == 'completedordertable') {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            }  elseif ($aColumns1[$i] == 'deliver_date') {
                $row[] = date('d-m-Y g:i a',strtotime($aRow[$aColumns1[$i]]));
		 } elseif ($aColumns1[$i] == 'customer_id') {
                $row[] = getcustomer('address_name',$aRow[$aColumns1[$i]]);
				 $row[] = getcustomer('address_mobileno',$aRow[$aColumns1[$i]]);
		 } 
		 elseif ($aColumns1[$i] == 'grand_total') {
                $row[] = 'Rs. '.$aRow[$aColumns1[$i]];
		 }else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
   	else {
            if ($aColumns1[$i] == $sIndexColumn) {
                $row[] = $k;
            } elseif ($aColumns1[$i] == 'Status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } elseif ($aColumns1[$i] == 'status') {
                $row[] = $aRow[$aColumns1[$i]] ? "Active" : "Inactive";
            } else {
                $row[] = $aRow[$aColumns1[$i]];
            }
        }
    }

    /* Edit page  change start here */
  
    if (($_REQUEST['types'] == 'registertable') || ($_REQUEST['types'] == 'pendingordertable') || ($_REQUEST['types'] == 'assignedordertable') || ($_REQUEST['types'] == 'completedordertable') || ($_REQUEST['types'] == 'employeeformtable')  || ($_REQUEST['types'] == 'formtable1') ) {
        $row[] = "<i class='fa fa-eye' onclick='javascript:viewthis(" . $aRow[$sIndexColumn] . ");' style='cursor:pointer;'> </i>";
    }
    
    else {
        if($_REQUEST['types'] != 'ordertable')
        {
        $row[] = "<i class='fa fa-edit' onclick='javascript:editthis(" . $aRow[$sIndexColumn] . ");' style='cursor:pointer;'> Edit </i>";
        }
        
    }

    $row[] = '<input type="checkbox"  name="chk[]" id="chk[]" value="' . $aRow[$sIndexColumn] . '" />';



    $output['aaData'][] = $row;
    $ij++;
}

echo json_encode($output);
?>
 
