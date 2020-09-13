<?php
include("headerbuy.php");
?>
<?php
$port=3308;
$con = mysqli_connect("localhost","root","","onlinemart",$port);
$itemidc = $_GET['post_i'];
$usersnamec = $_SESSION['username'];
$getpurchasec = "SELECT * FROM userdetails WHERE username = '$usersnamec'";
$run_postc = mysqli_query($con, $getpurchasec);
$rowssc = mysqli_fetch_array($run_postc);
$historyc = $rowssc['cart'];
$historyupdc = $historyc . $itemidc . ",";   
$update_historyc = "UPDATE userdetails SET cart = '$historyupdc'  WHERE username = '$usersnamec'";
$run_historyc = mysqli_query($con,$update_historyc);
if($run_historyc){
    echo"<script>alert('THIS PRODUCT HAS BEEN ADDED TO YOUR CART')</script>";
    echo "<script>window.open('dashboard.php','_self')</script>";
}
else{
    echo "Not inserted" . mysqli_error($con);

}
?>