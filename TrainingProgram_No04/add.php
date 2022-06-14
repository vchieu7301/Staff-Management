<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="styleno4.css">
    </head>
    <body>

        <?php
        include './banner.php';

        if(isset($_POST['btn_add']))
        {
            if(isset($_POST['code'])&&isset($_POST['name'])&&isset($_POST['tel'])&&isset($_POST['mailaddress'])&&isset($_POST['description'])&&isset($_POST['note'])){
                include './db.php';
                
                $code = $_POST['code'];
                $name = $_POST['name'];
                $tel = $_POST['tel'];
                $mailaddress = $_POST['mailaddress'];
                $description = $_POST['description'];
                $note = $_POST['note'];

               
                $code =$_POST['code'];
                $check = "SELECT CODE FROM m_department WHERE CODE = '$code'";
                $rs = mysqli_query($conn,$check);
                while($nv = mysqli_fetch_array($rs))
                {
                    if($_POST['code']==$nv['CODE']){
                        echo '<script>alert("Code đã tồn tại")</script>';
                    }
                }
                
                    $sql = "INSERT INTO m_department VALUES('$code','$name','$tel','$mailaddress','$description','$note','1')";
                    $result = mysqli_query($conn,$sql);
                    
                    if($result==true)
                    {
                        echo "<script type='text/javascript'>alert('Thêm mới thành công');</script>";
                        echo "<script type='text/javascript'>window.location='index.php';</script>";
                    }else{
                        echo "<script type='text/javascript'>alert('Thêm mới thất bại');</script>";
                        mysqli_close($conn);
                    }
                    $conn->close();
                    
            }else{
                echo "<script type='text/javascript'>alert('Vui lòng điền đầy đủ thông tin');</script>";
                
            }
            
        }
        
        ?>

        <form action="add.php" method="post">
        <table border="1">
        <tr>
            <td colspan="2"><h3>Thêm Mới</h3></td> 
            </tr>
            <tr>
                <td>Code:</td>
                    <td><input type="number" name="code" placeholder="01" size="30" min="1" maxlength="6" required title="Code không hợp lệ"></td>
            </tr> 

            <tr>          
                <td>Name:</td>
                    <td><input type="text" name="name" placeholder="Tên Phòng Ban" size="30" pattern="^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]+$" required title="Name không chấp nhận các kí đặc biệt và kí tự số"></td>
            </tr>

            <tr>
                <td>Tel:</td> 
                    <td><input type="number" value="0" placeholder="Số điện thoại" name="tel" size="30"></td>
            </tr>

            <tr>
                <td>MailAddress:</td>
                    <td><input type="email" value="" placeholder="example@yahoo.com" name="mailaddress" size="30" title="MailAddress không hợp lệ"></td>
            </tr>

            <tr>
                <td>Description:</td>
                    <td><input type="text" value="NULL" name="description" placeholder="Mô tả" size="30"></td>
            </tr>

            <tr>
                <td>Note:</td>
                    <td><input type="text" value="NULL" placeholder="Ghi chú" name="note" size="30"></td>
            </tr>
            
            <tr>
                <td colspan="2" align="center"><input class="btn" name="btn_add" type="submit" value="Submit">
            
                 <input class="btn" type="button" name="btn_cancel" onclick="cancel()"  value="Cancel"></td>
            </tr>
            </table>
        </form>
        

    

		<script>
            function cancel() {
                if(confirm('Bạn có muốn thoát khi chưa lưu ?')==true)
                {
                    alert('Xoá data thành công');
                    window.location = "index.php";
                }else{

                }
            }
         </script>
    <?php
    include './footer.php';
    ?>
  
    </body>
</html>