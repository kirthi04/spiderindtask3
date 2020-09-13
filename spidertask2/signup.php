<html>
    <head>
        <title>SIGNUP PAGE</title>
    </head>
    <style>
        input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  opacity: 0.5;

}
input[type=submit]:hover{
opacity: 1;
}
input{
    background-color: rgb(77, 75, 75);
}
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  width: 500px;
  padding: 20px;
 margin-left: 730px;
  margin-top: -660px;
  color: white;
  background-color: black;
  font-size: 15px;
 
}
body{
    background-color: rgb(77, 75, 75);
    border: 3px solid black;
}
img{
    margin-left: 180px;
    margin-top: 10px;
}
h2{
    text-align: center;
    text-shadow: 1px 1px 2px black, 0 0 25px white, 0 0 5px white;
}

    </style>
    <body>
        
        <h2>ENTER YOUR DETAILS TO CREATE A NEW ACCOUNT</h2>
        <div id="wholebox">
        <img src="forsignup.jpg" width="550px" height="660px">
    <div class="container">
        <form action="userdetails.php" method="POST"><pre>
FIRST NAME    :   <input type="text" name= "fname"  style="width:300px"><br> <br> 
LAST  NAME    :   <input type="text" name= "lname"  style="width:300px"><br><br>   
EMAIL-ID      :   <input type="mail" name= "usermail"  style="width:300px"><br><br>   
USER  NAME    :   <input type="text" name= "uname"  style="width:300px"><br><br> 
PASSWORD      :   <input type="password" name= "password" style="width:300px" >
<pre>                 (Use 5 or more char with mix of alphabets 
                                             and numbers)</pre> 
<fieldset>
<legend>CHOOSE YOUR ROLE</legend><label for="role1">
<input type="radio" id="role1" name="role" value="buyer" >BUYER
</label>
<label for="role2">
<input type="radio" id="role2" name="role" value="seller"> SELLER
</label>
</fieldset>  
 </pre><input type="submit" id="submitbutton">
</form>
</div>
</div>

</body>
</html