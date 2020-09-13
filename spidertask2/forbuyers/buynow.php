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
$getiduser = $rowss['user_idd'];
$todaydate = date("Y-m-d") ;
 $getitemsquan = "SELECT * FROM  items  WHERE image_id='$itemid' ";
    $addeditems = mysqli_query($con, $getitemsquan);
 $rowforpro = mysqli_fetch_array($addeditems);
    $oldqnt = $rowforpro['quantitiy'];
    $oldpurchase = $rowforpro['peopleboughtid'];
    $newpurchase = $oldpurchase . $getiduser . ",";  
    $newqnt = (intval($oldqnt))-1;
    $update_quantity = "UPDATE items SET quantitiy = '$newqnt' ,peopleboughtid='$newpurchase'  WHERE image_id = '$itemid'";
    $run_update = mysqli_query($con,$update_quantity);
$historyupd = $history . $itemid . "," . $todaydate . ")";   
$update_history = "UPDATE userdetails SET history = '$historyupd'  WHERE username = '$usersname'";
$run_history = mysqli_query($con,$update_history);
if($run_history){
    echo"<script>alert('YOU HAVE PURCHASED THIS ITEM')</script>";
    echo "<script>window.open('dashboard.php','_self')</script>";
}
else{
    echo "Not inserted" . mysqli_error($con);

}
?>