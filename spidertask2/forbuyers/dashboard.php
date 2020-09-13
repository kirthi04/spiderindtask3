<?php
include("headerbuy.php");
?>
<html>
    <head>
</head>
<style>
    body{
        background-color: rgb(61, 58, 56,0.3);
        
    }
    </style>
<body>
<?php
 $port=3308;
 $userr = $_SESSION['username'];
 $con = mysqli_connect("localhost","root","","onlinemart",$port);
 $arrayofcategory=array("fashion","footware","home","electricals","games","books","food","stationary");
 
 $getpurchasedd = "SELECT * FROM userdetails WHERE username = '$userr'";
$runpurchasedd = mysqli_query($con, $getpurchasedd);
$rowgetd = mysqli_fetch_array($runpurchasedd);
$historyd = $rowgetd['history'];
$storingd= (explode(")",$historyd));
echo"<h1 style='margin-left: 10px; text-align: center; text-shadow: 2px 2px 4px #000000;  font-size: 40px'>RECENT</h2>";
if(count($storingd)>5){
for(  $j=(count($storingd)-2); $j>(count($storingd)-6);  $j--)
 {
     displaypurd($storingd[$j]);
 }echo"<br><br>";
}
 else if(count($storingd)==5){
    for(  $j=(count($storingd)-2) ; $j>=0; $j--)
    {
        displaypurd($storingd[$j]);
    }
    echo"<br><br>";
 }
 else if(count($storingd)==1){
    echo"<br><br>";
 }
 else{
    for(  $j=(count($storingd)-2) ; $j>=0; $j--)
    {
        displaypurd($storingd[$j]);
    }
    echo"<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
 }
 for( $i=0 ; $i<8 ; $i++)
 {
      arrayitems($arrayofcategory[$i]);
 }
 function displaypurd($getidanddated){
    $port=3308;
    $con = mysqli_connect("localhost","root","","onlinemart",$port);
     $iddate= (explode(",",$getidanddated));
    $getadditems1 = "SELECT * FROM  items  WHERE image_id = '$iddate[0]' ";
       $addeditems1 = mysqli_query($con, $getadditems1);
    $row_pending1 = mysqli_fetch_array($addeditems1);
    //   $itm_id1 = $row_pending1['image_id'];
       $pathimage1 = $row_pending1['imagepath'];
       $itmprice1 = $row_pending1['price'];
    //   $itmqun1 = $row_pending1['quantitiy'];
       $itmdesc1 = $row_pending1['item_description'];
       $itmname1 = $row_pending1['item_name'];
   echo"<div  style=' margin: 30px; margin-top: 30px; border: 3px solid black; float: left; width: 300px; height: 430px ;  background-color: white; '>
         <img src='../image/$pathimage1'   style='width: 100%;  height: 40%;'>
      <h1 style='text-align: center'>$itmname1</h1><h4 style='padding-left: 10px'>$itmdesc1</h4>
      <h3 style='padding-left: 10px'><b>PRICE: $itmprice1</b></h3>
      <h3 style='padding-left: 10px'><b>DATE OF PURCHASE: $iddate[1]</b></h3>
    </div>"; 
    }
function arrayitems($precategory){
    $precategory=strtoupper($precategory);
    $forstyling = 0;
    echo"<br>";
    echo"<h1 style='margin-left: 10px; text-align: center; text-shadow: 2px 2px 4px #000000;  font-size: 40px'>$precategory</h2>";
    $port=3308;
 $userr = $_SESSION['username'];
 $con = mysqli_connect("localhost","root","","onlinemart",$port);
 $getadditems1 = "SELECT * FROM  items  WHERE category='$precategory' ";
    $addeditems1 = mysqli_query($con, $getadditems1);
 while($row_pending1 = mysqli_fetch_array($addeditems1)){
    $itm_id1 = $row_pending1['image_id'];
    $pathimage1 = $row_pending1['imagepath'];
    $itmprice1 = $row_pending1['price'];
    $itmqun1 = $row_pending1['quantitiy'];
    $itmdesc1 = $row_pending1['item_description'];
    $itmname1 = $row_pending1['item_name'];
    if((intval($itmqun1))>0){
echo"<div  style=' margin: 30px; margin-top: 30px; border: 3px solid black; float: left; width: 300px; height: 430px ;  background-color: white; '>
      <img src='../image/$pathimage1'   style='width: 100%;  height: 40%;'>
   <h1 style='text-align: center'>$itmname1</h1><h4 style='padding-left: 10px'>$itmdesc1</h4>
   <h3 style='padding-left: 10px'><b>PRICE: $itmprice1</b></h3>
   <h4 style='padding-left: 10px'>QUANTITY: $itmqun1</h4>
<a style='text-decoration: none ; text-align: right'  href ='buynow.php?post_i=$itm_id1' ><button style=' background-color: rgb(221, 106, 12); color: white;
   padding: 6px 11px; border: none;border-radius: 4px; cursor: pointer; margin-left: 50px'>BUY NOW</button></a>
<a style='text-decoration: none ; text-align: right'  href ='addtocart.php?post_i=$itm_id1' ><button style=' background-color: rgb(221, 106, 12); color: white;
  padding: 6px 11px; border: none;border-radius: 4px; cursor: pointer; margin-top: -30px'>ADD TO CART</button></a>
 </div>"; }
 else{
 echo"<div  style=' margin: 30px; margin-top: 30px; border: 3px solid black; float: left; width: 300px; height: 430px ;  background-color: white; opacity:0.6 '>
    <img src='../image/$pathimage1'   style='width: 100%;  height: 40%;'>
 <h1 style='text-align: center'>$itmname1</h1><h4 style='padding-left: 10px'>$itmdesc1</h4>
 <h3 style='padding-left: 10px'><b>PRICE: $itmprice1</b></h3>
 <h4 style='padding-left: 10px'>QUANTITY: $itmqun1</h4>
<button style=' background-color: rgb(221, 106, 12); color: white;
 padding: 8px 11px; border: none;border-radius: 4px; cursor: pointer; margin-left: 100px' disabled>SOLD OUT</button>
</div>";
 }
  $forstyling++;
}
if((($forstyling)%4)!=0){
    for($j=0;$j<=($forstyling/4);$j++){
   echo"<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>"; }}
else{
    echo"<br><br>";
}
}
    ?>
    </body>
    </html>