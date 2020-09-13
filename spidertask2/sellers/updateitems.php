<?php
$port=3308;
$con = mysqli_connect("localhost","root","","onlinemart",$port);
$post_idd = $_GET['post_i'];
$get_post = "SELECT * FROM items WHERE image_id = '$post_idd'";
$run_post = mysqli_query($con, $get_post);
$rowi = mysqli_fetch_array($run_post);
    $pathimage = $rowi['imagepath'];
    $itmprice = $rowi['price'];
    $itmqun = $rowi['quantitiy'];
    $itmdesc = $rowi['item_description'];
    $itmname = $rowi['item_name'];
    $imgpth = $rowi['imagepath'];
?>
<style>
body{
    background-color: black;
}
#container{
    margin-left: 400px;
    padding: 16px;
    background: rgba(20, 40, 40, .8);
    width: 630px;
    
}
input[type=text],input[type=file]{
    margin: 15px 0;
  font-size: 16px;
  padding: 10px;
  width: 600px;
  border: 1px solid rgba(10, 180, 180, 1);
  border-top: none;
  border-left: none;
  border-right: none;
  background: rgba(20, 20, 20, .2);
  color: white;
  outline: none;
  
}
h2{
    color: white;
}
input[type=text]:focus , input[type=file]{
  background-color: #ddd;
  outline: none;
}
</style><body>
<center><h2>UPDATE</h2></center>
<form action="" method="POST" enctype="multipart/form-data">
 
<div  id="container">
<label for="itemname"><b>NAME</b></label><br>
    <input type="text"  name="itemname" id="itemname"  value='<?php echo "$itmname"; ?>' required><br><br>
 <label for="itemdesc"><b>DESCRIPTION</b></label><br>
    <input type="text"  name="itemdesc" id="itemdesc" value='<?php echo "$itmdesc"; ?>' required><br><br>
    <label for="price"><b>PRICE</b></label><br>
    <input type="text"  name="itemprice" id="price" value='<?php echo "$itmprice"; ?>' required><br><br>    
    <label for="quantity"><b>QUANTITY</b></label><br>
    <input type="text"  name="itemquantity" id="quantity" value='<?php echo "$itmqun"; ?>' required><br><br>  
    <label for="fileup"><b>SUBMIT THE ITEM'S PICTURE</b></label><br>
   <input type="file" name="uploadfile" style=" background: rgba(20, 20, 20, .2);" id="fileup" value="" ><br><br></div><br><br>
<input type="submit" name="update" value="updatepost" style="width:150px ; height:30px ; background: rgba(20, 40, 40, .8); margin-left: 660px; font-size: 20px;
border: 2px solid rgba(10, 180, 180, 1); ">

</form>
</body>
<?php
 $msg = ""; 
 if(isset($_POST['update']))    { 
 $filenamee = $imgpth;
      $filenamee = $_FILES["uploadfile"]["name"]; 
        $tempnamee = $_FILES["uploadfile"]["tmp_name"];     
            $foldere = "../image/".$filenamee;
            if (move_uploaded_file($tempnamee, $foldere))  { 
                $msg = "Image uploaded successfully"; 
            }else{ 
                $filenamee = $imgpth; 
            }          
    
    $itemname = htmlentities($_POST['itemname']);
    $itemdesc = htmlentities($_POST['itemdesc']);
    $price = htmlentities($_POST['itemprice']);
    $quantity = htmlentities($_POST['itemquantity']);    
    $update_post = "UPDATE items SET quantitiy = '$quantity',imagepath = '$filenamee',price = '$price',item_name='$itemname',
    item_description='$itemdesc' WHERE image_id = '$post_idd'";
    $run_update = mysqli_query($con,$update_post);
    if($run_update){
        echo"<script>alert('your product has been updated')</script>";
        echo "<script>window.open('addeditems.php','_self')</script>";
    } 
    else{
        echo "Not inserted" . mysqli_error($con);
    }
}

?>