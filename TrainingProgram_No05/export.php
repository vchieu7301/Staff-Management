<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="styleno5.css">
    </head>
    <body>
        <?php 
        include "banner.php";
        include './db.php';
        ?>
        <div class="data">
          <form  action = "export.php" method="post" onsubmit="return confirm('Bạn có muốn xuất không ?');">
        <h2>Staff Master CSV export</h2>
        <h3>Export Staff Master với các điều kiện như sau</h3>
        <table border="1" >
        <tr>
            <td>Staff Code</td>
            <td><input type="number" placeholder="Mã nhân viên ban đầu" name="code1" size="30" min="1" maxlength="6" required>
            ~
            <input type="number" placeholder="Mã nhân viên cuối cùng" name="code2" size="30" min="1" maxlength="6" required></td>
        </tr>
        <tr>
            <td>Staff Name</td>
            <td><input type="text" placeholder="Tên nhân viên" name="staffname" size="30" pattern="^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]+$" required title="Staffname không chấp nhận các kí đặc biệt và kí tự số"></td>
        </tr>
        <tr>
            <td>Delete flag</td>
            <td><input type="checkbox" id="chkdelete" name="chkdelete"></td>
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
<?php
    include './db.php';
    if(isset($_POST['staffname']))
    {
        $staffname = $_POST['staffname'];
    }else {
        $staffname = "";
    }

    if(isset($_POST["btn_export"])){

        $sql = "SELECT * FROM m_user WHERE STAFFNAME LIKE '%".$staffname."%' ";
        $codef = '1';
		$codet = '9999';

		if ($_POST['code1'] != ''){
			$codef = $_POST['code1'];
		}

		if ($_POST['code2'] != ''){
			$codet = $_POST['code2'];
		}

		if (isset($_POST['chkdelete'])){

			$sql = $sql." AND STAFFCODE >= $codef AND STAFFCODE <= $codet AND USEFLAG = 1";
		}
		if (!isset($_POST['chkdelete'])){

			$sql = $sql." AND STAFFCODE >= $codef AND STAFFCODE <= $codet";
		}       
		$result = mysqli_query($conn,$sql);

		if (mysqli_query($conn, $sql)) {
            $filename = 'data.csv';			
    		$f = fopen($filename, 'w') or die('Lỗi file!!!');
    		$fields = array('STAFFCODE','SATFFNAME','DEPARTMENT_CODE','BRIRTHDAY','TEL1','TEL2','TEL3','ZIPNO','ADDESS1','ADDRESS2','NOTE'); 		
    		fputcsv($f, $fields);

    		while($row = mysqli_fetch_assoc($result)) {
    			$data = array($row['STAFFCODE'], $row['STAFFNAME'],$row['DEPARTMENT_CODE'], $row['BIRTHDAY'], $row['TEL1'], $row['TEL2'],$row['TEL3'], $row['ZIP'], $row['ADDRESS1'], $row['ADDRESS2'], $row['NOTE']);
    			fputcsv($f, $data); 
            }
            echo '<script>alert("Xuất dữ liệu thành công")</script>';
    		fclose($f); 
        }
    }
?>
        <?php 
        include './footer.php';
        ?>


    </body>
</html>