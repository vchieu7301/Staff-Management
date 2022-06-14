
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
			margin-left: 10%;
			margin-right: 10%;
		}
		.table{
			width: 800px;
		}
		.table .code{
			width: 100px;
			margin-right: 50px;
			margin-left:20px;
		}
		.table .name{
			width: 600px;
		}
		.table .title{
			background: #9AC0CD;
			color: white;
		}

		.input{
			margin-left: 30px;
			width: 100px;
			padding: 10px 30px;
			color: black;
		}
		option:hover{
			background: #CAE1FF;
		}
		option:after{
			background: #CAE1FF;
		}
	</style>
</head>
<body>
	<form action="" method="post">
		<div class="table">
			<p class="title">
				<b class="code">Staff Code</b>
				<b class="name">Staff Name</b>
			</p>
			<select name="select_data" id="select_data_id" size="20" style="width: 800px;" onclick="EnableButton()" ondblclick="DoubleClick()">

			<script type="text/javascript">
				function EnableButton(){
					document.getElementById('btnEdit').disabled=false;
					document.getElementById('btnDel').disabled=false;
					document.getElementById('btnRefer').disabled=false;
				}
				function DoubleClick(){
					var l = document.getElementById('select_data_id').value;
					var link = 'edit.php?id='+l;
					window.location=link;
				}
			</script>
				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "staffmanagement";

					$conn = new mysqli($servername, $username, $password, $dbname);

					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}


					$sql = 'SELECT CODE, NAME FROM M_USER WHERE USEFLAG=1';
					$result = mysqli_query($conn,$sql);

					//start while............

					while($row = mysqli_fetch_array($result)) {

				?>

				<?php
					$c = $row['CODE'];
					if(strlen($c) == 1){
						$x = '000'.$c;
					}elseif (strlen($c) == 2) {
						$x = '00'.$c;
					}elseif (strlen($c) == 3) {
						$x = '0'.$c;
					}else{
						$x = $c;
					}

				?>
					<option <?php echo 'value="'.$row['CODE'].'"'; ?>;>
						<?php echo '&emsp;&emsp;&emsp;'.$x; ?>&emsp;&emsp;&emsp;&emsp;
						<?php echo $row['NAME']; ?>
					</option>

				<?php

					} //hết while..............
					$conn->close();
				
				?>
			</select>
			
			<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST"){
					if(array_key_exists('edit', $_POST)){
						$code = $_POST['select_data'];
						$link = 'edit.php?id='.$code;
						echo '<script>window.location = "'.$link.'"</script>';
					}
					if(array_key_exists('delete', $_POST)){
						$code = $_POST['select_data'];
						$link = 'delete.php?id='.$code;
						echo '<script>window.location = "'.$link.'"</script>';

					}if ($_SERVER["REQUEST_METHOD"] == "POST"){
						if(array_key_exists('refer', $_POST)){
							$code = $_POST['select_data'];
							$link = 'reference.php?id='.$code;
							echo '<script>window.location = "'.$link.'"</script>';
						}
				}
			}
			?>

		<div>
			<input class="input" type="submit" value="REFERENCE" name="refer" id="btnRefer" disabled>
			<input type="button" value="NEW" name="new" class="input" onclick="location.href='add.php';"> 
			<input type="submit" value="EDIT" name="edit" id="btnEdit" class="input" disabled>		
			<input type="submit" value="DELETE" name="delete" id="btnDel" class="input" disabled>
			<input class="input" type="button" value="EXPORT" name="btn_export"id="btn_export" onclick="location.href='export.php'">
		</div>
		</div>
	</form>
</body>
</html>