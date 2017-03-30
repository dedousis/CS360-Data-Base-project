<!DOCTYPE html>
<html>
<head>
	<title>Account Created</title>
</head>


<?php

	$servername = "localhost";
	$username ="root";
	$db = "ccc";
	$Name;
	$ID;
	$type;
	$flag=0;
	

if($_POST['name']!='Name' and $_POST['name']!='' and $_POST['ID']!='Password' and $_POST['ID']!='' and $_POST['Amount']!='Amount' and $_POST['Amount']!='' and !empty($_POST['Type'])){
	if($_POST["Create_Account"]){
		//Create connection
		$conn = mysqli_connect($servername,$username,"",$db);
		//Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$Name=$_POST["name"];
		$ID=$_POST["ID"];
		$Amount=$_POST["Amount"];
		$type=$_POST["Type"];
		if($type=="Consumer")
		{
			if($Amount>0){
				$sql="SELECT Consumer_num FROM consumer WHERE consumer.Consumer_num='$ID'";
				if($result = mysqli_query($conn, $sql)){
					if(mysqli_num_rows($result)==0){
						echo '<b><i>Account Successfully Created </b></i><br><br>';
						echo "Name: " 	.$Name."<br>";
						echo "ID: "		.$ID."<br>";
						echo "Type: "	.$type."<br>";
						echo "Amount: " .$Amount."<br>";
						$sql= "INSERT INTO Consumer(Consumer_num,Name,Expiration_Date,Balance,Debit,Credit_Limit)
						VALUES('$ID','$Name','2027-01-15','$Amount','0','500')"	;
						if(mysqli_query($conn,$sql))
						{
							echo"New Account created<br>";
						}else{echo"Error<br>";}
						
					}else{
						echo "Error! Consumer already exists"."<br>";
						header("Location:sign_up.html");
					}
				}else{echo "Error<br>";}
			}else{
				header("Location:sign_up.html");
			}
		}elseif($type=="Company"){
			if($Amount>0){
				$sql="SELECT Company_num FROM company WHERE company.Company_num='$ID'";
				if($result = mysqli_query($conn, $sql)){
					if(mysqli_num_rows($result)==0){
						echo '<b><i>Account Successfully Created </b></i><br><br>';
						echo "Name: " 	.$Name."<br>";
						echo "ID: "		.$ID."<br>";
						echo "Type: "	.$type."<br>";
						echo "Amount: " .$Amount."<br>";
						$sql= "INSERT INTO Company(Company_num,Name,Expiration_Date,Balance,Debit,Credit_Limit)
						VALUES('$ID','$Name','2027-01-15','$Amount','0','5000')"	;
						if(mysqli_query($conn,$sql))
						{
							echo"New Account created<br>";
						}else{echo"Error<br>";}
						
					}else{
						echo "Error! Company already exists"."<br>";
						header("Location:sign_up.html");
					}
				}else{echo "Error<br>";}
			}else{
				header("Location:sign_up.html");
			}
		}elseif($type=="Merchant"){
			$sql="SELECT Merchant_num FROM merchant WHERE merchant.Merchant_num='$ID'";
			if($result = mysqli_query($conn, $sql)){
				if(mysqli_num_rows($result)==0){
					echo '<b><i>Account Successfully Created </b></i><br><br>';
					echo "Name: " 	.$Name."<br>";
					echo "ID: "		.$ID."<br>";
					echo "Type: "	.$type."<br>";
					$sql= "INSERT INTO Merchant(Merchant_num,Name,Debit,Total_Profit,Share)
					VALUES('$ID','$Name','0','0','0.2')"	;
					if(mysqli_query($conn,$sql))
					{
						echo"New Account created<br>";
					}else{echo"Error<br>";}
					
				}else{
					echo "Error! Merchant already exists"."<br>";
					header("Location:sign_up.html");
				}
			}else{echo "Error<br>";}
			
		}
	}
}else{
	header("Location:sign_up.html");
}

mysqli_close($conn);
$url="http://127.0.0.1/project/Connect.html";
header("Refresh:2;url=$url");
?>


</body>
</html>