<?php
$port=3308;
$con = mysqli_connect("localhost","root","","onlinemart",$port);
$res = "CREATE TABLE userdetails (user_idd int NOT NULL PRIMARY KEY,
    fname text NOT NULL,
    lName text NOT NULL,
    mailid varchar(40) NOT NULL,
    username varchar(20) NOT NULL,
    passwords varchar(20) NOT NULL,
    rolee varchar(10) NOT NULL,
    history varchar(1000) NOT NULL,
    cart varchar(1000) NOT NULL
)";
$result = mysqli_query($con, $res);


if($result){
    echo "The table was created successfully!<br>";
}
else{
    echo "The table was not created successfully because of this error ---> ". mysqli_error($con);
}
$res2 =   "CREATE TABLE items (image_id int NOT NULL PRIMARY KEY,
item_name varchar(30) NOT NULL,
item_description varchar(500) NOT NULL,
quantitiy int(20) NOT NULL,
price int(20) NOT NULL,
imagepath varchar(200) NOT NULL,
category varchar(30) NOT NULL,
sellername varchar(30) NOT NULL,
peopleboughtid varchar(1000) NOT NULL
)"; 
$result2 = mysqli_query($con, $res2);

if($result2){
    echo "The table was created successfully!<br>";
}
else{
    echo "The table was not created successfully because of this error ---> ". mysqli_error($con);
}

?>