<?php
include("headerbuy.php");
?>
<?php
$port=3308;
$con = mysqli_connect("localhost","root","","onlinemart",$port);
$itemid = $_GET['post_i'];
$usersname = $_SESSION['username'];
$getpurchase = "SELECT * FROM userdetails WHERE username = '$usersname'";
$run_post = mysqli_query($con, $getpurchase);
$rowss = mysqli_fetch_array($run_post);
$history = $rowss['history'];
$forcart = $rowss['cart'];
$dstoringforcart = (explode(",",$forcart));
$todaydate = date("Y-m-d") ;
 $getitemsquan = "SELECT * FROM  items  WHERE image_id='$itemid' ";
    $addeditems = mysqli_query($con, $getitemsquan);
 $rowforpro = mysqli_fetch_array($addeditems);
    $oldqnt = $rowforpro['quantitiy'];
    $newqnt = (intval($oldqnt))-1;
    $update_quantity = "UPDATE items SET quantitiy = '$newqnt'  WHERE image_id = '$itemid'";
    $run_update = mysqli_query($con,$update_quantity);
  //  $historyupd = "";
$historyupd = $history . $itemid . "," . $todaydate . ")";   
$update_history = "UPDATE userdetails SET history = '$historyupd'  WHERE username = '$usersname'";
$run_history = mysqli_query($con,$update_history);

if (($key = array_search($itemid, $dstoringforcart)) !== false) {
    unset($dstoringforcart[$key]);
}
$dstoringforcartfinal = implode(",",$dstoringforcart);
$update_historycart = "UPDATE userdetails SET cart = '$dstoringforcartfinal'  WHERE username = '$usersname'";
$run_historycart = mysqli_query($con,$update_historycart);
if($run_historycart){
    echo"<script>alert('your post has been updated')</script>";
   
}
else{
    echo "Not inserted" . mysqli_error($con);
}


?>