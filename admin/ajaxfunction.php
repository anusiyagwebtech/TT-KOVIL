<?php

include 'config/config.inc.php';
//Checking login
if (( $_SESSION['BY'] == '') && ( $_SESSION['TYPE'] == '')) {
//    header("location:" . $sitename);
    echo json_encode($_REQUEST);
//    exit;
}

if ($_REQUEST['category'] != '') {
    ?>
   <option value="">Select </option>
        <?php

        $query1 = $db->prepare("SELECT * FROM `subcategory` WHERE category = ? ");
$query1->execute(array($_REQUEST['category']));
while ($cate = $query1->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <option value="<?php echo $cate['id']; ?>"><?php echo $cate['subcategory']; ?></option>
    <?php } }
 
 ?>