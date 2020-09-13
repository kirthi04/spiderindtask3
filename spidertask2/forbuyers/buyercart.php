<?php
include("headerbuy.php");
?>
<h1 style=" text-align: center;
    text-shadow: 1px 1px 2px black, 0 0 65px blue, 0 0 5px blue;">YOUR CART</h1>
<?php
$port=3308;
$con = mysqli_connect("localhost","root","","onlinemart",$port);
$dbuyername = $_SESSION['username'];
$dgetpurchased = "SELECT * FROM userdetails WHERE username = '$dbuyername'";
$drunpurchased = mysqli_query($con, $dgetpurchased);
$drowget = mysqli_fetch_array($drunpurchased);
$dhistory = $drowget['cart'];
$dstoring= (explode(",",$dhistory));
for( $k=0 ; $k<(count($dstoring)-1) ; $k++)
 {
     ddisplaypur($dstoring[$k]);
 }
 function ddisplaypur($dgetidanddate){
    $port=3308;
    $con = mysqli_connect("localhost","root","","onlinemart",$port);
    $getadditems1 = "SELECT * FROM  items  WHERE image_id = '$dgetidanddate' ";
       $addeditems1 = mysqli_query($con, $getadditems1);
    $row_pending1 = mysqli_fetch_array($addeditems1);
       $pathimage1 = $row_pending1['imagepath'];
       $itmprice1 = $row_pending1['price'];
       $itmdesc1 = $row_pending1['item_description'];
       $itmname1 = $row_pending1['item_name'];
   echo"<div  style=' margin: 30px; margin-top: 30px; border: 3px solid black; float: left; width: 300px; height: 430px ;  background-color: pink; '>
         <img src='../image/$pathimage1'   style='width: 100%;  height: 40%;'>
      <h1 style='text-align: center'>$itmname1</h1><h4 style='padding-left: 10px'>$itmdesc1</h4>
      <h3 style='padding-left: 10px'><b>PRICE: $itmprice1</b></h3>
     
      <a style='text-decoration: none ; text-align: right'  href ='buythrucart.php?post_i=$dgetidanddate' ><button style=' background-color: rgb(221, 106, 12); color: white;
   padding: 6px 11px; border: none;border-radius: 4px; cursor: pointer; margin-left: 100px'>BUY NOW</button></a>
    </div>"; 
    }