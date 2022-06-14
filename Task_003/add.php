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
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "staffmanagement";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(array_key_exists('add', $_POST)){
				if($_POST['staffcode'] != '' && $_POST['staffname'] != ''){
					$code = $_POST['staffcode'];
					$name = $_POST['staffname'];
					$birthday = $_POST['birthday'];
					$tel1 = $_POST['tel1'];
					$tel2 = $_POST['tel2'];
					$tel3 = $_POST['tel3'];
					$zipno = $_POST['zipno'];
					$address1 = $_POST['address1'];
					$address2 = $_POST['address2'];
					$note = $_POST['note'];

					// kiểm tra nhân viên đã tồn tại
					$check = "SELECT CODE FROM M_USER";
					$result = mysqli_query($conn,$check);
					while($row = mysqli_fetch_array($result)) {
						if($code == $row['CODE']){
							echo '<script>alert("Mã nhân viên đã tồn tại!")</script>';
						}
					}
					
					// chạy query
					$sql = "INSERT INTO M_USER VALUES($code, '$name', '$birthday', '$tel1', '$tel2','$tel3', '$zipno', '$address1', '$address2', '$note', 1)";
					if($conn->query($sql) === TRUE){
						header('Location: index.php');
					
					}
				}else{
					echo '<script>alert("Oppp !!!\nTa có lỗi rồi")</script>';
				}
			}

			?>

			

	<?php	
		}
		$conn->close();
	?>

	<?php

	// xử lý nút cancel
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(array_key_exists('cancel', $_POST)){
				header('Location: index.php');
			}
		}

	?>
<body>

	<form action="" method="post">
		<table>
			<tr>	
				<td style="width: 100px;">Staffcode</td>
				<td><input type="number" name="staffcode" placeholder="Mã nhân viên">
			</tr>
			<tr>	
				<td>Staffname</td>
				<td><input type="text" name="staffname" placeholder="Tên nhân viên"></td>
			</tr>
			<tr>	
				<td>Birthday</td>
				<td><input type="text" name="birthday" placeholder="ngày/tháng/năm" value=''></td>
			</tr>
			<tr>	
				<td>Tel 1</td>
				<td><input type="number" name="tel1" placeholder="Số điện thoại" value=''></td>
			</tr>
			<tr>	
				<td>Tel 2</td>
				<td><input type="number" name="tel2" placeholder="Số điện thoại khác(nếu có)" value=''></td>
			</tr>
			
			<tr>	
				<td>Tel 3</td>
				<td><input type="number" name="tel3" placeholder="Số điện thoại khác(nếu có)" value=''></td>
			</tr>
			<tr>	
				<td>ZIP No</td>
				<td><input type="number" name="zipno" placeholder="ZIP No" value=''></td>
			</tr>
			<tr>	
				<td>Address1</td>
				<td><input type="text" name="address1" placeholder="Địa chỉ nhà" value=''></td>
			</tr>
			<tr>
				<td>Address2</td>
				<td><input type="text" name="address2" placeholder="Địa chỉ nhà khác (nếu có)" value=''></td>
			</tr>

			<tr>	
				<td>Note</td>
				<td><textarea name="note" rows="2"></textarea></td>
			</tr>
			<tr style="text-align: right;">
				<td></td>
				<td>
					<input type="submit" name="add" value="ADD" class="input">
					<input type="submit" name="cancel" value="CANCEL" class="input">
				</td>
			</tr>
		</table>
	</form>


</body>
</html>
