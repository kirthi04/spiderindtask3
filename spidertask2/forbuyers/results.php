<?php
include("headerbuy.php");
?>
<html>
    <head></head>
    <style>
        body{
            background-image: radial-gradient(white, rgba(255, 166, 221, 0.952));
        }
        .qwerty{
            font-size: 30px;
  transition: font-size 4s;
        }
    .qwerty:hover {
  font-size: 38px;
}
    </style>
    <body>
<?php
$port=3308;
$con = mysqli_connect("localhost","root","","onlinemart",$port);
$removable = array("is","was","it","i","the","as","in","a","of","we","me","to","you","for");
$searched = $_POST['queryy'];
$searchedsmall = strtolower($searched);
$searchedarray = (explode(" ",$searchedsmall));
for($i=0;$i<(count($searchedarray));$i++){
    for($j=0; $j<(count($removable)) ;$j++){
        if($searchedarray[$i]==$removable[$j]){
            unset($searchedarray[$i]);
$searchedarray = array_values ( $searchedarray );
}
    }
}
$getallitems = "SELECT * FROM  items ";
$loopcount = 0;
$rungetitems = mysqli_query($con, $getallitems);
while($row_posts = mysqli_fetch_array($rungetitems)){
   $eachname = 0;
   $eachdesc = 0;
    $itemidd = $row_posts['image_id'];
    $itemname = $row_posts['item_name'];
    $itemname = strtolower($itemname);    
    $itemname = (explode(" ",$itemname)); 
    $itemdescription = $row_posts['item_description'];
    $itemdescription = strtolower($itemdescription);    
    $itemdescription = (explode(" ",$itemdescription)); 
    for($i=0;$i<(count($searchedarray));$i++){
        for($j=0; $j<(count($itemdescription)) ;$j++){
            if($searchedarray[$i]==$itemdescription[$j]){  
               $eachdesc++;}
            }
    for($q=0; $q<(count($itemname)) ;$q++){
                if($searchedarray[$i]==$itemname[$q]){  
                   $eachname+=2;}
                }
}
$savecount =$eachdesc + $eachname;
if($savecount>0){
$trackingid[$loopcount]=$itemidd.")".$savecount;
$loopcount++;}}

for($i=0;$i<($loopcount);$i++){
for($j=0;$j<($loopcount);$j++){
    $newthing = explode(")",$trackingid[$i]);
    $newthing2 = explode(")",$trackingid[$j]);
    if($newthing2[1]<$newthing[1]){
       $temp =  $trackingid[$i];
$trackingid[$i]=$trackingid[$j];
$trackingid[$j]=$temp;
    }
}
}
for($k=0;$k<$loopcount;$k++){
    $searchedid = explode(")",$trackingid[$k]);
    $finallid = $searchedid[0];
    $getadditems1 = "SELECT * FROM  items  WHERE image_id='$finallid' ";
    $addeditems1 = mysqli_query($con, $getadditems1);
 $row_pending1 = mysqli_fetch_array($addeditems1);
   
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
<a style='text-decoration: none ; text-align: right'  href ='buynow.php?post_i=$finallid' ><button style=' background-color: rgb(221, 106, 12); color: white;
   padding: 6px 11px; border: none;border-radius: 4px; cursor: pointer; margin-left: 50px'>BUY NOW</button></a>
<a style='text-decoration: none ; text-align: right'  href ='addtocart.php?post_i=$finallid' ><button style=' background-color: rgb(221, 106, 12); color: white;
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
}
?>