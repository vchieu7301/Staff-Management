<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="styleno5.css">
    </head>
    <body>

        <?php
        include './banner.php';

        if(isset($_POST['btn_add']))
        {
            if(isset($_POST['staffcode'])&&isset($_POST['staffname'])&&isset($_POST['select_department'])&&isset($_POST['birthday'])&&isset($_POST['tel1'])
            &&isset($_POST['tel2'])&&isset($_POST['tel3'])&&isset($_POST['zip'])&&isset($_POST['address1'])&&isset($_POST['address2'])&&isset($_POST['note'])){
                include './db.php';
                
                $staffcode = $_POST['staffcode'];
                $staffname = $_POST['staffname'];
                $department_code =$_POST['select_department'];
                $birthday = $_POST['birthday'];
                $tel1 = $_POST['tel1'];
                $tel2 = $_POST['tel2'];
                $tel3 = $_POST['tel3'];
                $zip = $_POST['zip'];
                $address1 = $_POST['address1'];
                $address2 = $_POST['address2'];
                $note = $_POST['note'];
               
                $code =$_POST['staffcode'];
                $check = "SELECT STAFFCODE FROM m_user WHERE STAFFCODE = '$code'";
                $rs = mysqli_query($conn,$check);
                while($nv = mysqli_fetch_array($rs))
                {
                    if($_POST['staffcode']==$nv['STAFFCODE']){
                        echo '<script>alert("Staffcode đã tồn tại")</script>';
                    }
                }
                
                    $sql = "INSERT INTO m_user VALUES('$staffcode','$staffname','$department_code','$birthday','$tel1','$tel2','$tel3','$zip','$address1','$address2','$note','1')";
                    $result = mysqli_query($conn,$sql);
                    
                    if($result!=null)
                    {
                        echo "<script type='text/javascript'>alert('Thêm thành công');</script>";
                        echo "<script type='text/javascript'>window.location='index.php';</script>";
                    }else{
                        echo "<script type='text/javascript'>alert('Thêm mới thất bại');</script>";
                        mysqli_close($conn);
                    }
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
                <td>StaffCode:</td>
                    <td><input type="number" name="staffcode" placeholder="01" size="30" min="1" maxlength="6" required title="Staffcode chỉ chấp nhận kí tự số"></td>
            </tr> 

            <tr>          
                <td>StaffName:</td>
                    <td><input type="text" name="staffname" placeholder="Tên Phòng Ban" size="30" pattern="^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]+$" required title="Name không chấp nhận các kí đặc biệt và kí tự số"></td>
            </tr>

            <tr>          
                <td>Department:</td>
                    <td> <select name="select_department">
                            <option value="0" selected>None</option>
                            <?php
                            include './db.php';
                            $sql="SELECT CODE,NAME FROM m_department WHERE USEFLAG=1";
                            $rs=mysqli_query($conn,$sql);
                            while($rows = mysqli_fetch_array($rs))
                            {
                                ?>
                                <option <?php echo 'value="'.$rows['CODE'].'"';?>;>
                                        <?php echo $rows['NAME'];'"'?>
                                </option>
                            <?php
                            }
                            $conn->close();
                            ?>
                        </select> </td>
            </tr>

            <tr>
                <td>Birthday:</td>
                    <td><input type="text" value="01-01-1999" placeholder="01-01-1999" name="birthday" size="30"></td>
            </tr>

            <tr>
                <td>Tel1:</td>
                    <td><input type="number" value="0" placeholder="Số điện thoại" name="tel1" size="30"></td>
            </tr>

            <tr>
                <td>Tel2:</td> 
                    <td><input type="number" value="0" placeholder="Số điện thoại khác(Nếu có)" name="tel2" size="30"></td>
            </tr>

            <tr>
                <td>Tel3:</td> 
                    <td><input type="number" value="0" placeholder="Số điện thoại khác(Nếu có)" name="tel3" size="30"></td>
            </tr>

            <tr>
                <td>Zip:</td>
                    <td><input type="number" value="70000" placeholder="Zip no" name="zip" size="30"></td>
            </tr>

            <tr>
                <td>Address1:</td>
                    <td><input type="text" value="Hồ Chí Minh" placeholder="Địa chỉ 1" name="address1" size="30"></td>
            </tr>
            
            <tr>
                <td>Address2:</td>
                    <td><input type="text"value="Hà Nội" placeholder="Địa chỉ 2" name="address2" size="30"></td>
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