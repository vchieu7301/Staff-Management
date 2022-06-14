<?php
    if(isset($_POST['name']))
    {
        $name = $_POST['name'];
    }else {
        $name = "";
    }
    
?>

<?php
                $servername = "localhost";
                 $username = "root";
                 $password = "";
                 $dbname = "staffmanagement";

                 $conn = new mysqli($servername, $username, $password, $dbname);

                 if (!$conn) {
                     die("Kết nối thất bại: " . mysqli_connect_error());
                 }
    if(isset($_POST["btn_export"])){
        
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        
        $query = "SELECT * FROM m_user WHERE NAME LIKE '%".$name."%' ";
        $codef = '1';
		$codet = '9999';

		if ($_POST['code1'] != ''){
			$codef = $_POST['code1'];
		}

		if ($_POST['code2'] != ''){
			$codet = $_POST['code2'];
		}
        if (isset($_POST['chkdelete'])){

			$sql = $query."AND code >= $codef AND code <= $codet AND USEFLAG = 1";
		}
        if (!isset($_POST['chkdelete'])){

			$sql = $query." AND code >= $codef AND code <= $codet";
		}

        $result = mysqli_query($conn,$sql);
        $output = fopen("php://output","w")or die('Error404');
        fputcsv($output,array('STAFFCODE','SATFFNAME','BRIRTHDAY','TEL1','TEL2','TEL3','ZIPNO','ADDESS1','ADDRESS2','NOTE'));
        while($row = mysqli_fetch_assoc($result)){
         
            fputcsv($output,$row);
        }
        fclose($output);
    }
?>