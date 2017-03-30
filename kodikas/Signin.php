<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Account</title>
</head>
<body>

<?php

$servername = "localhost";
$username ="root";
$db = "ccc";


$flag=0;


if($_POST['name']!='Name' and $_POST['name']!='' and $_POST['ID']!='Password' and $_POST['ID']!='' and !empty($_POST['Type'])){
	if($_POST["sign_in"]){
		//Create connection
		$conn = mysqli_connect($servername,$username,"",$db);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$Name=$_POST["name"];
		$ID=$_POST["ID"];
		$type=$_POST["Type"];
		$_SESSION["Name"]=$Name;
		$_SESSION["ID"]=$ID;
		$_SESSION["Type"]=$type;
		if(!(($Name=="admin")&&($ID==1))){
			if($type=="Consumer"){
				$sql="SELECT * FROM consumer WHERE consumer.Consumer_num='$ID' AND consumer.Name='$Name'";
				if($result = mysqli_query($conn, $sql)){
					if(mysqli_num_rows($result)!=0){
						header("Location:consumer.php");	
					}else{
						header("Location:Connect.html");	
					}
				}else {echo "Error";}		
			}elseif($type=="Company"){
				$sql="SELECT * FROM company WHERE company.Company_num='$ID' AND company.Name='$Name'";
				if($result = mysqli_query($conn, $sql)){
					if(mysqli_num_rows($result)!=0){
						header("Location:company.php");	
					}else{
						header("Location:Connect.html");	
					}
				}else {echo "Error";}		
				
			}elseif($type=="Merchant")
			{
				$sql="SELECT * FROM merchant WHERE merchant.Merchant_num='$ID' AND merchant.Name='$Name'";
				if($result = mysqli_query($conn, $sql)){
					if(mysqli_num_rows($result)!=0){
						header("Location:merchant.php");	
					}else{
						header("Location:Connect.html");	
					}
				}else {echo "Error";}		
				
			}
		}else{
			header("Location: CCC.php");
		}
	}
}else{
	header("Location:Connect.html");
}


mysqli_close($conn);
?>


</body>
</html>