<?php
include("headersell.php");
?>
<?php
 $port=3308;
 $userr = $_SESSION['username'];
 $con = mysqli_connect("localhost","root","","onlinemart",$port);
 $getadditems = "SELECT * FROM  items  WHERE sellername='$userr' ";
    $addeditems = mysqli_query($con, $getadditems);
 while($row_pending = mysqli_fetch_array($addeditems)){
    $itm_id = $row_pending['image_id'];
    $pathimage = $row_pending['imagepath'];
    $itmprice = $row_pending['price'];
    $itmqun = $row_pending['quantitiy'];
    $itmdesc = $row_pending['item_description'];
    $itmname = $row_pending['item_name'];
    if((intval($itmqun))<0){
$itmqun = 0;
    }
echo"<div  style=' margin: 15px; margin-top: 30px; border: 3px solid black; float: left; width: 460px; height: 500px ;'>
      <img src='../image/$pathimage'   style='width: 100%;  height: 50%;'>
   <h1 style='text-align: center'>$itmname</h1><h4 style='padding-left: 10px'>$itmdesc</h4>
   <h3 style='padding-left: 10px'><b>PRICE: $itmprice</b></h3>
   <h4 style='padding-left: 10px'>QUANTITY: $itmqun</h4>
   <a style='text-decoration: none ; text-align: right'  href ='updateitems.php?post_i=$itm_id' ><button style=' background-color: green; color: white;
   padding: 6px 11px; border: none;border-radius: 4px; cursor: pointer; margin-left: 135px'>UPDATE</button></a>
   <a style='text-decoration: none ; text-align: right'  href ='detailitems.php?post_i=$itm_id' ><button style=' background-color: green; color: white;
   padding: 6px 11px; border: none;border-radius: 4px; cursor: pointer; margin-left: 30px'>DETAILS</button></a>
  </div>";}
    ?>