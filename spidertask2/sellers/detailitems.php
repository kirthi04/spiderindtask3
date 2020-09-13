<?php
include("headersell.php");
?>
<?php
$port=3308;
$con = mysqli_connect("localhost","root","","onlinemart",$port);
$productidd = $_GET['post_i'];
$customername = $_SESSION['username'];
$getdetailpurchase = "SELECT * FROM items WHERE image_id = '$productidd'";
$rundetailpurchase = mysqli_query($con, $getdetailpurchase);
$getdetail = mysqli_fetch_array($rundetailpurchase);
$purchasedetail = $getdetail['peopleboughtid'];
$storingdetail = (explode(",",$purchasedetail));
for( $j=0 ; $j<(count($storingdetail)-1) ; $j++)
 {
     displaypurdetail($storingdetail[$j]);
 }
 function displaypurdetail($getdetailofcustomer){
    $port=3308;
    $con = mysqli_connect("localhost","root","","onlinemart",$port);
    $gettin = "SELECT * FROM  userdetails  WHERE user_idd = '$getdetailofcustomer' ";
       $addedcustomerdetail = mysqli_query($con, $gettin);
    $row_pending1 = mysqli_fetch_array($addedcustomerdetail);
       $pathimage1 = $row_pending1['mailid'];
       $itmprice1 = $row_pending1['username'];
   echo"<div  style=' margin: 15px; margin-top: 30px; border: 3px solid black; float: left; width: 460px; height: 180px ;'>
      <h1 style='text-align: center'>USERNAME: $itmprice1</h1>
      <h3 style='padding-left: 10px'><b>E-MAIL: $pathimage1</b></h3>
    </div>"; 
    }?>