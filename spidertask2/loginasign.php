<html>
<head>
<title>FRONT PAGE</title>
</head>
<style>
h1{
    text-align: center;
    margin-top:20px;
  color: rgba(43, 40, 42, 0.952);
  text-shadow: 1px 1px 2px black, 0 0 25px rgb(221, 202, 33), 0 0 5px rgb(235, 238, 51);

}
 .newd {
    border: 5px solid rgb(221, 202, 33);
    width: 550px;
    height:310px;
    border-radius: 10px;
    background-color: "black";
    color: white;
    margin-left: 470px;
    margin-top: 200px;
    background-color: rgb(13, 14, 12);
  padding-left: 20px;
  font-size: 16px;
}
body{
 background-image: url("onlineshopping3.png");
    background-repeat: no-repeat;
    background-size: cover; 
}
.firstone{
    margin-top:15px;
    font-size: 16px;
}
.secondone{
    margin-top:30px;
    font-size: 16px;
}
.button {
  background-color: #e90c0c;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}

.button:hover {opacity: 1}
</style>
<body>
    <h1>WELCOME TO THIS SHOPPING WEBSITE</h1>
   
    <form action="loginasign.php" method="POST">
    <div class="newd"><br>
   <h2> NEW USER:</h2> <button name="signup" class="firstone button">SIGNUP</button><br>
    <?php if(isset($_POST['signup'])){
        echo "<script>window.open('signup.php','_self')</script>";
    } ?>
   <h2> ALREADY HAVE AN ACCOUNT:</h2> <button class ="secondone button" name="signin"> SIGNIN</button>
    <?php if(isset($_POST['signin'])){
        echo "<script>window.open('signin.php','_self')</script>";
    } ?>
</div>    
</form>

</body>
</html>