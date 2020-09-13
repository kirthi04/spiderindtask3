<?php
include("headerbuy.php");
?>
<h1 style=" text-align: center;
    text-shadow: 1px 1px 2px black, 0 0 25px pink, 0 0 15px pink;">PURCHASE HISTORY</h1>
<?php
$port=3308;
$con = mysqli_connect("localhost","root","","onlinemart",$port);
$buyername = $_SESSION['username'];
$getpurchased = "SELECT * FROM userdetails WHERE username = '$buyername'";
$runpurchased = mysqli_query($con, $getpurchased);
$rowget = mysqli_fetch_array($runpurchased);
$history = $rowget['history'];
$storing= (explode(")",$history));
for( $j=0 ; $j<(count($storing)-1) ; $j++)
 {
     displaypur($storing[$j]);
 }
 function displaypur($getidanddate){
    $port=3308;
    $con = mysqli_connect("localhost","root","","onlinemart",$port);
     $iddate= (explode(",",$getidanddate));
    $getadditems1 = "SELECT * FROM  items  WHERE image_id = '$iddate[0]' ";
       $addeditems1 = mysqli_query($con, $getadditems1);
    $row_pending1 = mysqli_fetch_array($addeditems1);
    //   $itm_id1 = $row_pending1['image_id'];
       $pathimage1 = $row_pending1['imagepath'];
       $itmprice1 = $row_pending1['price'];
    //   $itmqun1 = $row_pending1['quantitiy'];
       $itmdesc1 = $row_pending1['item_description'];
       $itmname1 = $row_pending1['item_name'];
   echo"<div  style=' margin: 30px; margin-top: 30px; border: 3px solid black; float: left; width: 300px; height: 430px ;  background-color: rgb(66, 172, 172); '>
         <img src='../image/$pathimage1'   style='width: 100%;  height: 40%;'>
      <h1 style='text-align: center'>$itmname1</h1><h4 style='padding-left: 10px'>$itmdesc1</h4>
      <h3 style='padding-left: 10px'><b>PRICE: $itmprice1</b></h3>
      <h3 style='padding-left: 10px'><b>DATE OF PURCHASE: $iddate[1]</b></h3>
    </div>"; 
    }
 
 