<?php include ('../config/config.inc.php');
global $db;
$table=$_REQUEST['table'];
$or=$_REQUEST['order'];
$res_id=$_REQUEST['id'];

$row = FETCH_all("SELECT * FROM ".$table." WHERE `id`=?", $res_id);
$orderbyid=$row['order'];

$row11 = FETCH_all("SELECT * FROM ".$table." WHERE `order`=? ", $or);
$orderit=$row11['id'];


if($orderbyid < $or)

{
	
	$orderss=pFETCH("SELECT * FROM ".$table." WHERE (`order` BETWEEN ? AND ?) ",$orderbyid , $or);
	while ($re_i = $orderss->fetch(PDO::FETCH_ASSOC))
	{

		if($res_id!=$re_i['id'])

		{

             	$upo=$re_i['order']-1;
           $resa = $db->prepare("UPDATE ".$table." SET `order`=? WHERE `id`=?");
            $resa->execute(array(trim($upo), $re_i['id']));
			
			
         }

	}

}


if($orderbyid > $or)

{
	
	
	$orderss=pFETCH("SELECT * FROM ".$table." WHERE (`order` BETWEEN ? AND ? ) ", $or , $orderbyid);
	while ($re_i = $orderss->fetch(PDO::FETCH_ASSOC))
	{
		


		if($res_id!=$re_i['id'])

		{

			
     			$upo=$re_i['order']+1;


 $resa = $db->prepare("UPDATE ".$table." SET `order`=? WHERE `id`=?");
            $resa->execute(array(trim($upo), $re_i['id']));
			
			
			

		}

	}

}
 
 $resa = $db->prepare("UPDATE ".$table." SET `order`=? WHERE `id`=?");
 $resa->execute(array($or, $res_id));

?>