<html>
<body>
<?php
$port=3308;
$con = mysqli_connect("localhost","root","","onlinemart",$port);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  $firname = $_POST['fname'];
  $lasname = $_POST['lname'];
  $maili = $_POST['usermail'];
  $username = $_POST['uname'];
  $pass = $_POST['password'];
  $roles = $_POST['role'];
  function checkletters( $string ) {
    return preg_match( "/[a-zA-Z]/", $string );
}
function checknumbers( $string ) {
    return preg_match( '/\d/', $string );
}
  $checki = "SELECT  mailid,username  FROM  userdetails  WHERE  mailid='$maili'  OR  username='$username' ";
  $queryin = mysqli_query($con, $checki);
  
$check_user = mysqli_num_rows($queryin);
if((checknumbers($pass)) && (checkletters($pass))) {
if($check_user == 1)
{
  echo "<script>alert('username or mailid already exists')</script>";
   echo "<script>window.open('signup.php','_self')</script>";
}
else{
  $saving = "insert into  userdetails (fname ,lname ,mailid ,username  ,passwords , rolee ) values('$firname','$lasname','$maili','$username','$pass','$roles')";
   if(mysqli_query($con,$saving)){
   echo "<script>alert('YOUR ACCOUNT HAS BEEN COMPLETED LOGIN WITH YOUR DETAILS TO CONTINUE')</script>";
   echo "<script>window.open('signin.php','_self')</script>";
  } 
  else{
   echo "Not inserted" . mysqli_error($con);
  }}}
  else{
    echo "<script>alert('YOUR PASSWORD DID NOT SATISFY THE PATTERN MENTIONED TRY A NEW ONE')</script>";
    echo "<script>window.open('signup.php','_self')</script>";
  }
?>