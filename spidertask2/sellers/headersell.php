<?php
$port=3308;
$con = mysqli_connect("localhost","root","","onlinemart",$port);

?>
<?php
session_start();
?>
<html>
<head>
    <title>DASHBOARD</title>
</head>
<style>
   ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
margin-top: 0px;
margin-left: -10px;
margin-right: -10px;
background-attachment: fixed; 
}

li {
  float: left;
  border-right:1px solid #bbb;
  background-attachment: fixed; 
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 18px 20px;
  text-decoration: none;
}
.hopu{
  display: inline;
  color: white;
  text-align: center;
  padding: 10px 12px;
  text-decoration: none;
  background-color: #333;
  margin-top: 5px;
  margin-bottom: 0px;
}
li a:hover:not(.active) {
  background-color: #111;
}
button{
  background-color: #333;
  color: white;
  border: 0px solid #333;
  display: inline; 
}
button:hover{
  background-color: black;
}
.active {
  background-color: #4CAF50;
}
#frimg {
  background-image: url('../header1.jpg');
  background-repeat: no-repeat; 
  background-size: 100% 100%;
}
</style>
<body>
<?php
if(!$_SESSION['loggedIn']){
  echo "<script>alert('login to continue');</script>";
  echo "<script>window.open('../loginasign.php','_self')</script>";
}
 $user = $_SESSION['username'];
 $get_user = "SELECT * FROM   userdetails WHERE  username='$user' ";
 $run_user = mysqli_query($con,$get_user);
 $row = mysqli_fetch_array($run_user);
 $userid1 = $row['user_idd'];
 $firname1 = $row['fname'];
  $lasname1 = $row['lname'];
  $maili1 = $row['mailid'];
  $pass1 = $row['passwords'];
?>
<div id="frimg"><br><br><br><br><br><br><br><br>
</div>
<ul>
<li><a href="newitems.php">ADD NEW ITEMS</a> </li>
<li><a href="addeditems.php ">ADDED TIEMS</a> </li>
<li><a href="statistics.php">STATISTICS</a> <li>
<li><a href="../logout.php">LOG OUT</a> </li>
<li style="float:right"><a > <?php
echo"$user";
?></a> <li> 
</ul>

</body>

</html>