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

	
<div id="share-buttons">
    
</div>
<div id="wrapper">
	<center><b><?php
		echo "<h1><u><i>Signed in as CCC</h1></u></i><br>";
		
		
		$servername = "localhost";
		$username ="root";
		$db = "ccc";
		//Create connection
		$conn = mysqli_connect($servername,$username,"",$db);
		
		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}
	?>


	<form action="#" method="post" id="demoForm" class="demoForm">
			<legend>Select Month</legend>
		
			<select name="Month">
				<option value="1">January</option>
				<option value="2">February</option>
				<option value="3">March</option> 
				<option value="4">April</option>
				<option value="5">May</option>
				<option value="6">June</option>
				<option value="7">July</option>
				<option value="8">August</option>
				<option value="9">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select>
			<input type="submit" name="Ok" value="Ok"/>
	</form>


	<?php
	if(isset($_POST['Month'])){
		if ($_POST['Ok']){
			echo "<br>";
			$month=$_POST['Month'];
			$sql="SELECT Merchant_num,Merchant_name,SUM(Amount)AS TOTAL FROM transaction WHERE MONTH(transaction.Date)='$month' AND transaction.Amount<>-1 
			AND transaction.Returned<>1 GROUP BY Merchant_num,Merchant_name ORDER BY TOTAL DESC LIMIT 1";
			if($result=mysqli_query($conn, $sql)){
				if(mysqli_num_rows($result)!=0){
					$row=mysqli_fetch_assoc($result);
					echo "<font color=red size='5pt'><b><u><i>Merchant of the month</b></u></i></font><br>";
					echo "<font color=blue size='4pt'><u>".$row["Merchant_name"]."</u> with ID ".$row["Merchant_num"]." and profit ".$row["TOTAL"].".</font><br>";
					
					$sql="SELECT * FROM merchant
						WHERE merchant.Merchant_num=".$row["Merchant_num"];
					if($result=mysqli_query($conn, $sql)){
						$row=mysqli_fetch_assoc($result);
						$tmp= $row["Debit"]*0.05;
						$debit=$row["Debit"]-$tmp;
						if($debit<0){
							$debit=0;
							$sql="UPDATE merchant SET merchant.Debit ='$debit' WHERE merchant.Merchant_num =".$row["Merchant_num"];
							if(mysqli_query($conn,$sql)){
								echo "Merchant's debit reduced by 0.5%.<br>";
							}
						}else{
							$sql="UPDATE merchant SET merchant.Debit ='$debit' WHERE merchant.Merchant_num =".$row["Merchant_num"];
							if(mysqli_query($conn,$sql)){
								echo "Merchant's debit reduced by 0.5%.<br>";
							}
						}
					}else{
						echo "Error<br>";
					}
				}else{
					echo "No Transactions made this month.<br>";
				}	
			}else{
				echo "Error";
			}
		}
		echo "<br>";
	}
	?></b></center>



	<form action="CCC.php" method="post">
	<input id="button" type="submit" name="Back" value="Back" style="width: 300px; height: 40px;">
	</form>
</div>
</body>
</html>
