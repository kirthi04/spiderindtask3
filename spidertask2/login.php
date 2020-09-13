<?php
session_start();
$port=3308;
$con = mysqli_connect("localhost","root","","onlinemart",$port);
$email = htmlentities(mysqli_real_escape_string($con, $_POST['username']));
$pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));
$select_user = "SELECT  *  FROM  userdetails  where  username='$email' AND  passwords='$pass' ";
$query = mysqli_query($con, $select_user);
$_SESSION["username"] = $email;
$check_user = mysqli_num_rows($query);
if($check_user == 1)
{$_SESSION['loggedIn'] = true;
   $_SESSION['username'] = $email;
 $row = mysqli_fetch_array($query);
 $userrole = $row['rolee'];
 if($userrole=="buyer"){
    echo "<script>window.open('forbuyers/headerbuy.php','_self')</script>";}
else{
    echo "<script>window.open('sellers/headersell.php','_self')</script>";
}    
}
else {
    echo "alert(usermail or paaword does not match or does not exists)";
    echo "<script>window.open('signin.php','_self')</script>";
}
?>