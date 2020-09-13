<?php
include("headersell.php");
?>
<html>
    <head></head>
   <style>
       .homedec{
           margin-left: 320px;

       }
      .butone{
           width: 150px;     
       }
       body {
  font-family: Arial, Helvetica, sans-serif;
 
}
.container {
  padding: 16px;
  background-color: white;
}
input[type=text],input[type=file]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus , input[type=file]{
  background-color: #ddd;
  outline: none;
}
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}
h1{
text-align: center;
}
   </style>
    <body>
 
   <form method="POST" action="" enctype="multipart/form-data"><br>
   <div class="container">
    <h1>ENTER THE DETAILS OF THE ITEM YOU WANT TO ADD</h1>
    <hr>
 <label for="itemname"><b>NAME</b></label>
    <input type="text" placeholder="Enter Name of the product" name="itemname" id="itemname" required>
 <label for="itemdesc"><b>DESCRIPTION</b></label>
    <input type="text" placeholder="Enter Description of the product" name="itemdesc" id="itemdesc" required>
    <label for="price"><b>PRICE</b></label>
    <input type="text" placeholder="Enter price of the product" name="itemprice" id="price" required>    
    <label for="quantity"><b>QUANTITY</b></label>
    <input type="text" placeholder="Enter the quantity" name="itemquantity" id="quantity" required>  
    <label for="cars"><b>ENTER THE CATEGORY:</b></label>
  <select id="category" name="category">
    <option value="fashion">Fashion</option>
    <option value="footware">Footware</option>
    <option value="home">Home Appliances</option>
    <option value="electricals">Electrical Appliances</option>
    <option value="games">Game items</option>
    <option value="books">Books</option>
    <option value="food">Food</option>
    <option value="stationary">Stationary</option>
  </select> <br><br><br>  
  <label for="fileup"><b>SUBMIT THE ITEM'S PICTURE</b></label>
   <input type="file" name="uploadfile" value="" id="fileup"><br>
 <button class="registerbtn" type="submit" name="upload">SUBMIT</button>
   </form>
<?php
 $port=3308;
 $db = mysqli_connect("localhost","root","","onlinemart",$port);
  $msg = ""; 
  if (isset($_POST['upload'])) { 
   $filename = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
        $folder = "../image/".$filename; 
        $itemname = htmlentities($_POST['itemname']);
        $itemdesc = htmlentities($_POST['itemdesc']);
        $price = htmlentities($_POST['itemprice']);
        $quantity = htmlentities($_POST['itemquantity']);         
   $category = htmlentities($_POST['category']);
   if (move_uploaded_file($tempname, $folder))  { 
    $msg = "Image uploaded successfully"; 
}else{ 
    $msg = "Failed to upload image"; 
} 
     
        $sql = "INSERT INTO items (imagepath,category,quantitiy,price,sellername,item_name,item_description) VALUES ('$filename','$category',
        '$quantity','$price','$user','$itemname','$itemdesc')"; 

      $uploadd =   mysqli_query($db, $sql);         
       
        if ($uploadd)  { 
            echo "<script>alert('Your product has been added successfully');</script>"; 
        }else{ 
            echo "Not inserted" . mysqli_error($db);
      } 
  } 

?>

    </body>
</html>