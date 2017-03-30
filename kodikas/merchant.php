<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>CCC</title>
	<style>
body {
	height: 100%;
	position: relative;
	font-family: Arial, Helvetica, sans-serif;
	color: #888;
	font-size: 13px;
	line-height: 20px;
	min-width: 998px;
	border-top:3px solid #919191;
	background:url(images/BG.jpg) repeat;
}

h1 {
    color: black;
    text-align: center;
	
}
#wrapper {	
	padding: 70px 0 0 0px;
	height: 100%;
}
#wrapper {
	width: 350px;
	margin:auto;
	position: relative;
}

#wrappertop {
	background:url(images/wrapper_top.png) no-repeat;
	height:22px;
}

#wrappermiddle {
	background:url(images/wrapper_middle.png) repeat-y;
	height:300px;
}

#wrapperbottom {
	background:url(images/wrapper_bottom.png) no-repeat;
	height:22px;
}

#wrapper h2 {
	margin-left:20px;
	font-size:20px;
	font-weight:bold;
	font-family:Myriad Pro;
	text-transform:uppercase;
	position:absolute;
	text-shadow: #fff 2px 2px 2px;
}

#username_input {
	margin-left:25px;
	position:absolute;
	width:300;
	height:50px;
	margin-top:40px;
}

#username_inputleft {
	float:left;
	background:url(images/input_left.png) no-repeat;
	width:12px;
	height:50px;
}

#username_inputmiddle {
	float:left;
	background:url(images/input_middle.png) repeat-x;
	width:276px;
	height:50px;
}

#username_inputright {
	float:left;
	background:url(images/input_right.png) no-repeat;
	width:12px;
	height:50px;
}

#url{
	display:block;
	width:276px;
	height:45px;
	background:transparent;
	border:0;
	color:#bdbdbd;
	font-family:helvetica, sans-serif;
	font-size:14px;
	padding-left:20px;
}

#url_user {
	position:absolute;
	display:block;
	margin-top:-28px;
	float:left;
	padding-right:10px;
}

#password_input {
	margin-left:25px;
	position:absolute;
	width:300;
	height:50px;
	margin-top:100px;
}

#password_inputleft {
	float:left;
	background:url(images/input_left.png) no-repeat;
	width:12px;
	height:50px;
}

#password_inputmiddle {
	float:left;
	background:url(images/input_middle.png) repeat-x;
	width:276px;
	height:50px;
}

#password_inputright {
	float:left;
	background:url(images/input_right.png) no-repeat;
	width:12px;
	height:50px;
}

#url_password {
	display:block;
	position:absolute;
	margin-top:-32px;
	float:left;
	margin-left:4px;
}

#submit{
	float:left;
	position:relative;
	padding:0;
	margin-top:160px;
	margin-left:25px;
	width:300px;
	height:40px;
	border:0;
}

#submit1 {
	position:absolute;
	z-index: 10;
	border:0;
}

#submit2 {
	position:absolute;
	margin-top:0px;
	border:0;
}

#links_left{
	float:left;
	position:relative;
	padding-top:5px;
	margin-left:25px;
}

#links_left a{
	color:#bbb;
	font-size:11px;
	text-decoration:none;
	transition: color 0.5s linear;
	-moz-transition: color 0.5s linear;
	-webkit-transition: color 0.5s linear;
	-o-transition: color 0.5s linear;
}

#links_left a:hover{
	color:#292929;
}

#links_right{
	float:right;
	position:relative;
	padding-top:5px;
	margin-right:25px;
}

#links_right a{
	color:#bbb;
	font-size:11px;
	text-decoration:none;
	transition: color 0.5s linear;
	-moz-transition: color 0.5s linear;
	-webkit-transition: color 0.5s linear;
	-o-transition: color 0.5s linear;
}

#links_right a:hover{
	color:#292929;
}
#share-buttons img {

position: static;
    border: 300px solid #73AD21; 
    width: 35px;
padding: 5px;
border: 0;
box-shadow: 0;
display: inline;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}

#button
{
 background-color: black;
 color: white;
 padding: 7px;
 border-radius: 8px;
 width :70;
 border:1px solid 313531;
}



</style>
</head>


<ul>
  <li><a href="index.html">Home</a></li>
  <li><a href="https://www.nationalbankservices.com/about">About Us</a></li>
  <li><a href="https://www.nationalbankservices.com/">Services</a></li>
  <li><a href="Connect.html">Log out</a></li>
  <li style="float:right"><a class="active" href="https://www.facebook.com/droserosvoskos/?fref=ts">Buldozes </a></li> 
</ul>

<body>

	<header>
		<h1>	Welcome Merchant</h1>
		<h1><?php echo $_SESSION["Name"]."<br>";?></h1>
	</header>
	
<div id="share-buttons">
    
</div>
<div id="wrapper">
	<div id="wrappertop"></div>
		<div id="wrappermiddle">
			<center><?php
			$Name=$_SESSION["Name"];
			$ID=$_SESSION["ID"];
			$type=$_SESSION["Type"];
			$servername = "localhost";
			$username ="root";
			$db = "ccc";
			//Create connection
			$conn = mysqli_connect($servername,$username,"",$db);
			
			if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
			}
			$sql="SELECT Total_Profit,Debit FROM merchant WHERE merchant.Merchant_num=".$ID;
			$result=mysqli_query($conn, $sql);
			$row=mysqli_fetch_assoc($result);
			$_SESSION["Total_Profit"]=$row["Total_Profit"];
			$_SESSION["Debit"]=$row["Debit"];
			echo "ID: ".$ID."<br>  Total_Profit: ".$_SESSION["Total_Profit"]."<br> Debit: ".$_SESSION["Debit"]."<br><br>";
			?>
			<?php echo "<br>";?>
			<form action="Payment_merchant.php" method="POST">
			<input id="button" type="submit" name="Payment" value="Payment" style="width: 300px; height: 40px;"/>
			</form>
			<?php echo "<br>";?>
			<form action="Transaction_merchant.php" method="POST">
			<input id="button" type="submit" name="Transaction" value="Transaction" style="width: 300px; height: 40px;"/>
			</form>
			<?php echo "<br>";?>
			<form action="" method="POST">
			<input id="button" type="submit" name="deletebutton" value="Delete Account" style="width: 300px; height: 40px;"/>
			</form>
			<?php
			if(isset($_POST['deletebutton'])){
				if ($_POST['deletebutton']){
					$debit="SELECT Debit FROM merchant WHERE merchant.Merchant_num=".$ID;
					$result = mysqli_query($conn, $debit);
					$row=mysqli_fetch_assoc($result);
					
					if($row["Debit"]==0)
					{
						$sql="DELETE FROM merchant WHERE merchant.Merchant_num=".$ID;
						$result = mysqli_query($conn, $sql);
						if($result)
						{
							echo("<script>location.href = 'http://127.0.0.1/project/Connect.html';</script>");
						}else{
							echo "Error<br>";
						}
						mysqli_close($conn);
					}else{
						echo "<br> Account can not be deleted due to Debit:".$row["Debit"]."<br>";
					}
				}
			}

			?></center>
		</div>
	<div id="wrapperbottom"></div>		
</div>

</body>
</html>