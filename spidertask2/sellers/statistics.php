<?php
include("headersell.php");
?>
<?php
$todaymonth = date("Y-m-d") ;
$onlymonth = explode("-",$todaymonth);
$monthh = intval($onlymonth[1]);
$yearr = intval($onlymonth[2]);
if($monthh == 1){
    $monthh = 12;
    $yearr = $yearr-1;
}
else{
    $monthh = $monthh - 1;
}
$port=3308;
$con = mysqli_connect("localhost","root","","onlinemart",$port);
$gethistory = "SELECT * FROM  userdetails WHERE rolee = 'buyer'";
$runget = mysqli_query($con, $gethistory);
$itemidtrack=0;
while($row_history = mysqli_fetch_array($runget)){
    $forthisbuyer[$itemidtrack]="";
    $fullhistory = $row_history['history'];
    $partition1 = (explode(")",$fullhistory));
    for($i=0;$i<(count($partition1)-1);$i++){
     $onlym = (explode("-",$partition1[$i]));
    if(intval($onlym[1])==$monthh){
         $geactualid = explode(",",$partition1[$i]);
         $geactualid1 = $geactualid[0];
         $forthisbuyer[$itemidtrack] =  $forthisbuyer[$itemidtrack].$geactualid1.",";
     }
   }
   $itemidtrack++;
}
$newarrayfor = "";
for($i=0;$i<$itemidtrack;$i++){
$newarrayfor = $newarrayfor.$forthisbuyer[$i];
}
$newarrayfor2 = substr($newarrayfor, 0, -1);
 $newarrayfor3 = explode(",",$newarrayfor2);
 $finalcate = array(0,0,0,0,0,0,0,0);
for($i=0;$i<count($newarrayfor3);$i++){
    $getadditemsbyid = "SELECT * FROM  items  WHERE image_id='$newarrayfor3[$i]' ";
    $getprocess = mysqli_query($con, $getadditemsbyid);
 $row_gett = mysqli_fetch_array($getprocess);
    $itmcategory = $row_gett['category'];
switch($itmcategory){
    case "fashion":
    $finalcate[0]++;
break;
    case "footware":
        $finalcate[1]++;
    break;
    case "home":
        $finalcate[2]++;
    break;
    case "electricals":
    $finalcate[3]++;
break;
    case "games":
        $finalcate[4]++;
    break;
    case "books":
        $finalcate[5]++;
    break;
    case "food":
        $finalcate[6]++;
    break;
    case "stationary":
        $finalcate[7]++;
    break;
}}
?>
<html>
<body>
<h1 style="text-align: center">CONTRIBUTION OF EACH CATEGORY TO TOTAL SALES IN THE LAST MONTH</h1>    
<canvas id="canvas" style="margin-left: 400px ; margin-top: 60px"></canvas>
    <div id="myLegend" style="margin-left: 850px ; margin-top: -300px"></div>
</body>
<script>
    var mycanvas = document.getElementById("canvas");
mycanvas.width = 350;
mycanvas.height = 350;
var ctx = mycanvas.getContext("2d");
function drawingslice(ctx,x,y,radius, startangle, endangle, color ){
    ctx.fillStyle = color;
    ctx.beginPath();
    ctx.moveTo(x,y);
    ctx.arc(x,y, radius, startangle, endangle);
    ctx.closePath();
    ctx.fill();
}
var category = {
    "fashion": <?php echo $finalcate[0]?>, "footware": <?php echo $finalcate[1]?>,
    "home": <?php echo $finalcate[2]?>, "electricals": <?php echo $finalcate[3]?>,
    "games": <?php echo $finalcate[4]?>, "books": <?php echo $finalcate[5]?>,
    "food": <?php echo $finalcate[6]?>, "stationary": <?php echo $finalcate[7]?>   };
var Piechart = function(options){
    this.options = options;
    this.canvas = options.canvas;
    this.ctx = this.canvas.getContext("2d");
    this.colors = options.colors;
    this.draw = function(){
        var total_value = 0;
        var color_index = 0;
        for (var categ in this.options.data){
            var val = this.options.data[categ];
            total_value += val;
        }if (this.options.legend){
            color_index = 0;
            var legendHTML = "";
            for (categ in this.options.data){
                legendHTML += "<div><span style='display:inline-block;width:20px;background-color:"+this.colors[color_index++]+";'>&nbsp;</span> "+categ+"</div><br>";
            }
            this.options.legend.innerHTML = legendHTML;
        }
 
        var startangle = 0;
        for (categ in this.options.data){
            val = this.options.data[categ];
            var sliceangle = 2 * Math.PI * val / total_value;
 
            drawingslice(
                this.ctx,
                this.canvas.width/2,
                this.canvas.height/2,
                Math.min(this.canvas.width/2,this.canvas.height/2),
                startangle,
                startangle+sliceangle,
                this.colors[color_index%this.colors.length]
            );
            startangle += sliceangle;
            color_index++;
        }
        startangle = 0;
for (categ in this.options.data){
    val = this.options.data[categ];
    sliceangle = 2 * Math.PI * val / total_value;
    var pieRadius = Math.min(this.canvas.width/2,this.canvas.height/2);
    var labelX = this.canvas.width/2 + (pieRadius / 2) * Math.cos(startangle + sliceangle/2);
    var labelY = this.canvas.height/2 + (pieRadius / 2) * Math.sin(startangle + sliceangle/2);
 
    var labelText = Math.round(100 * val / total_value);
    this.ctx.fillStyle = "white";
    this.ctx.font = "bold 15px Arial";
    this.ctx.fillText(labelText+"%", labelX,labelY);
    startangle += sliceangle;
}
 
    }
}    
var myLegend = document.getElementById("myLegend");
var myPiechart = new Piechart(
    {
        canvas:mycanvas,
        data:category,
        colors:["red","blue", "green","yellow","orange","pink","black","brown"],
        legend:myLegend
    }
);
myPiechart.draw();
</script>
</html>