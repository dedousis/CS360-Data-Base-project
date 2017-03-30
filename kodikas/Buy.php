<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Consumer</title>
</head>
<body>

<?php
	$ClientName=$_SESSION["Name"];
	$ClientID=$_SESSION["ID"];
	$type=$_SESSION["Type"];
	echo "Welcome user: "."<h1>".$ClientName."</h1>"." with ID: ".$ClientID."<br><br> Select a Merchant to Buy:<br><br>";
	
	$servername = "localhost";
	$username ="root";
	$db = "ccc";
	//Create connection
	$conn = mysqli_connect($servername,$username,"",$db);
	
	if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
	}
	
	$sql= "SELECT Name from merchant";
	$result = mysqli_query($conn, $sql);
	while($row=mysqli_fetch_assoc($result)){
		echo "<u> ".$row["Name"]."</u><br>";
	}
	echo "<br><br>";
?>

<form action="" method="post">
Merchant_name: <input type="text" name="Merchant_name"><br>
Amount: <input type="text" name="Amount"><br>
Transaction Type:	<input type="radio" name="Transaction_Type" value="Credit">Credit 
					<input type="radio" name="Transaction_Type" value="Debit"> Debit<br>
<input type="submit" name="Buy" value="Buy">
</form>

<?php
$flag=0;
	if(isset($_POST['Merchant_name'])){
		if ($_POST['Buy']){
			$Tran_type=$_POST["Transaction_Type"];
			echo "Transaction Type = " .$Tran_type . "<br>";
			$MerchantName=$_POST["Merchant_name"];
			$Amount= $_POST["Amount"];
			$sql="SELECT Name,Merchant_num FROM merchant";
			$result = mysqli_query($conn, $sql);
			
			while($row=mysqli_fetch_assoc($result))
			{
				if($row["Name"]==$MerchantName){
					$MerchantID=$row["Merchant_num"];
					$flag=1;
					break;
				}
			}
			if($flag==0){
				echo "Wrong Name try again<br>";
				$url="http://127.0.0.1/project/Buy.php";
				header("url=$url");
			}else{
				$sql="SELECT Balance FROM consumer
						WHERE consumer.Consumer_num=".$ClientID;
				$result = mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				if($Amount>$row["Balance"])
				{
					echo "Transaction can not be not enough balance.Try again<br>";
					$url="http://127.0.0.1/project/Buy.php";
				}else{
					$date=date("Y/m/d");
					$trans_id=rand ( 0 ,5000);
					$sql="INSERT INTO transaction(Trans_id,Client_name,Merchant_name,Amount,Date,Type,Merchant_num,Consumer_num,Company_num)
					VALUES('$trans_id','$ClientName','$MerchantName','$Amount','$date','Debit','$MerchantID','$ClientID',NULL)";
					if(mysqli_query($conn,$sql))
					{
						echo"Transaction Successful<br>";
						$Balance=$row["Balance"]-$Amount;
						$sql="UPDATE consumer SET consumer.Balance ='$Balance'WHERE consumer.Consumer_num =".$ClientID;
						if(mysqli_query($conn,$sql))
						{
							echo "Client Updated<br><br>";
							
							$sql="SELECT Total_Profit,Share FROM Merchant
							WHERE merchant.Merchant_num=".$MerchantID;
							$result = mysqli_query($conn,$sql);
							$row=mysqli_fetch_assoc($result);
							$profit=$row["Total_Profit"]; 
							$debit=$Amount * $row["Share"];    //xreos stin CCC						
							$kerdos= $profit + ($Amount - $debit);   //kerdos emporoy
							$sql="UPDATE merchant SET merchant.Total_Profit ='$kerdos' , merchant.Debit = '$debit' WHERE merchant.Merchant_num =".$MerchantID;
							if(mysqli_query($conn,$sql))
							{
								echo "Merchant updated <br>";
							}else{
								echo "Eroor <br>";
							}
						}else{ echo "Error <br>";}
					}else{echo"Error<br>";}
					
				}
			}
			//echo $Amount;
		}
	}
	
	echo "<br><br>";
?>

<form action="Consumer.php" method="post">
<input type="submit" name="Back" value="Back">
</form>


</body>
</html>