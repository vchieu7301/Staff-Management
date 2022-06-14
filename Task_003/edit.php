<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		body{
			margin-left: 20%;
			margin-right: 20%;
		}

		form{
			margin-left: 25%;
			margin-right: 25%;
		}
		table{
			width: 100%;
		}
		input{
			width: 100%;
		}
		textarea{
			width: 100%;
		}
		.input{
			width: 100px;
			padding: 10px 30px;
			color: black;
			text-align: center;
			margin-left: 30px;
		}
	</style>
</head>


<body>



	<form action="" method="post">
		<table>
			

			<?php
					$id = $_GET['id'];		

					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "staffmanagement";

					$conn = new mysqli($servername, $username, $password, $dbname);

					if (!$conn) {
						die("Kết nối thất bại: " . mysqli_connect_error());
					}

					$sql = "SELECT * FROM M_USER WHERE CODE='$id'";

					$result = mysqli_query($conn,$sql);


					while($row = mysqli_fetch_assoc($result)){
						$name = $row['NAME'];

						if (!isset($row['BIRTHDAY']))
							$birthday = 'NULL';
						else
							$birthday = $row['BIRTHDAY'];

						if (!isset($row['TEL1']))
							$tel1 = 0;
						else
							$tel1 = $row['TEL1'];

						if (!isset($row['TEL2']))
							$tel2 = 0;
						else
							$tel2 = $row['TEL2'];
							
						if (!isset($row['TEL3']))
							$tel3 = 0;
						else
							$tel3 = $row['TEL3'];

						if (!isset($row['ZIPNO']))
							$zipno = 0;
						else
							$zipno = $row['ZIPNO'];

						if (!isset($row['ADDRESS1']))
							$address1 = 'NULL';
						else
							$address1 = $row['ADDRESS1'];

						if (!isset($row['ADDRESS2']))
							$address2 = 'NULL';
						else
							$address2 = $row['ADDRESS2'];

						if (!isset($row['NOTE']))
							$note = 'NULL';
						else
							$note = $row['NOTE'];
					}
					$conn->close();


					if ($_SERVER["REQUEST_METHOD"] == "POST"){
						if(array_key_exists('save', $_POST)){
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "staffmanagement";

							$conn = new mysqli($servername, $username, $password, $dbname);

							$sname = $_POST['staffname'];
							$sbirth = $_POST['birthday'];
							$stel1 = $_POST['tel1'];
							$stel2 = $_POST['tel2'];
							$stel3 = $_POST['tel3'];
							$szip = $_POST['zipno'];
							$saddr1 = $_POST['address1'];
							$saddr2 = $_POST['address2'];
							$snote = $_POST['note'];

							$sql = "UPDATE M_USER SET NAME = '$sname', BIRTHDAY = '$sbirth', TEL1 = $stel1, TEL2 = $stel2, TEL3 = $stel3, ZIPNO = $szip, ADDRESS1 = '$saddr1', ADDRESS2 = '$saddr2', NOTE = '$snote' WHERE CODE='$id'";
							if (mysqli_query($conn, $sql)) {
							    header('Location: index.php');
							} else {
							    echo "Bị Lỗi Rồi Man " . mysqli_error($conn);
							}

							mysqli_close($conn);
						}

						if(array_key_exists('cancel', $_POST)){
									header('Location: index.php');
						}
					}

				?>

			<tr>	
			<td style="width: 100px;">Staffcode</td>
				<td>
					
					<input type="text" name="staffcode" value="<?php echo $id?>" readonly>	
					
				</td>
			</tr>
			<tr>	
				<td>Staffname</td>
				<td><input type="text" name="staffname" value="<?php echo $name; ?>"></td>
			</tr>
			<tr>	
				<td>Birthday</td>
				<td><input type="text" name="birthday" value="<?php echo $birthday; ?>"></td>
			</tr>
			<tr>	
				<td>Tel</td>
				<td><input type="number" name="tel1" value="<?php echo $tel1; ?>"></td>
			</tr>
			<tr>	
				<td>Tel2</td>
				<td><input type="number" name="tel2" value="<?php echo $tel2; ?>"></td>
			</tr>
			<tr>	
				<td>Tel3</td>
				<td><input type="number" name="tel3" value="<?php echo $tel3; ?>"></td>
			</tr>
			<tr>	
				<td>ZIP No</td>
				<td><input type="number" name="zipno" value="<?php echo $zipno; ?>"></td>
			</tr>
			<tr>	
				<td>Address1</td>
				<td><input type="text" name="address1" value="<?php echo $address1; ?>"></td>
			</tr>
			<tr>
				<td>Address2</td>
				<td><input type="text" name="address2" value="<?php echo $address2; ?>"></td>
			</tr>

			<tr>	
				<td>Note</td>
				<td><textarea name="note" rows="3"><?php echo $note; ?></textarea></td>
			</tr>
			<tr style="text-align: right;">
				<td></td>
				<td>
					<input type="submit" name="save" value="SAVE" style="width: 100px;" class="input">
					<input type="submit" name="cancel" value="CANCEL" class="input">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
