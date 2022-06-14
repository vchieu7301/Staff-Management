<!DOCTYPE html>
<html>
    <head>
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
        <?php 
        $servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "staffmanagement";

					$conn = new mysqli($servername, $username, $password, $dbname);

					if (!$conn) {
						die("Kết nối thất bại: " . mysqli_connect_error());
					}
        ?>
        <div class="data">
          <form  action = "export2.php" method="post">
        <h2>Staff Master CSV export</h2>
        <h3>Export Staff Master với các điều kiện như sau</h3>
        <table border="1" >
        <tr>
            <td>Staff Code</td>
            <td><input type="text" name="code1"></td>
            <td>~</td>
            <td><input type="text" name="code2"></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Delete flag</td>
            <td><input type="checkbox" name="chkdelete"></td>
        </tr>   
        </table>
             <input class="btn"  type="submit" name="btn_export" value="Export" ></td>
             <input class="btn"  type="button" name="btn_cancel" value="Cancel" onclick="cancel()" ></td>
        
        </form>
        </div>
        <script>
            function cancel() {
                if(confirm('Bạn có muốn thoát khi chưa lưu ?')==true)
                {
                    window.location = "index.php";
                }else{

                }
            }
         </script>



    </body>
</html>