<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="styleno1.css">
    </head>
    <body>

        <?php
        include './banner.php';
        include './db.php';

        if(isset($_GET['id'])){
        $staffcode = $_GET['id'];
        $sql = "SELECT * from m_user WHERE STAFFCODE = '$staffcode'";
        $result = mysqli_query($conn,$sql);      
        while($nv = mysqli_fetch_assoc($result))
        {
            $staffcode = $nv['STAFFCODE'];
            $staffname = $nv['STAFFNAME'];
            $birthday = $nv['BIRTHDAY'];
            $tel1 = $nv['TEL1'];
            $tel2 = $nv['TEL2'];
            $zip = $nv['ZIP'];
            $address1 = $nv['ADDRESS1'];
            $address2 = $nv['ADDRESS2'];
            $note = $nv['NOTE'];
        }
    }
        ?>  
        

        <form action="edit.php" method="post">
        <table border="1">
        <tr>
            <td colspan="2"><h3>Chỉnh Sửa</h3></td> 
            </tr>
            <tr>
                <td>StaffCode:</td>
                    <td><input type="text" readonly="readonly" value="<?php echo $staffcode ?>" name="staffcode" size="30"></td>
            </tr> 

            <tr>          
                <td>StaffName:</td>
                    <td><input type="text" value="<?php echo $staffname ?>" name="staffname" placeholder="Nguyễn Văn A" size="30" pattern="^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]+$" required title="Staffname không chấp nhận các kí đặc biệt và kí tự số"></td>
            </tr>

            <tr>
                <td>Birthday:</td>
                    <td><input type="text" value="<?php echo $birthday ?>"  placeholder="01-01-1999" name="birthday" size="30" title="Ngày sinh không hợp lệ"></td>
            </tr>

            <tr>
                <td>Tel1:</td>
                    <td><input type="number" value="<?php echo $tel1 ?>" placeholder="Số điện thoại"  name="tel1" size="30" title="Số điện thoại không hợp lệ"></td>
            </tr>

            <tr>
                <td>Tel2:</td> 
                    <td><input type="number" value="<?php echo $tel2 ?>" placeholder="Số điện thoại khác (nếu có)"  name="tel2" size="30" title="Số điện thoại không hợp lệ"></td>
            </tr>

            <tr>
                <td>Zip:</td>
                    <td><input type="number" value="<?php echo $zip ?>" name="zip" placeholder="Zip no" size="30"></td>
            </tr>

            <tr>
                <td>Address1:</td>
                    <td><input type="text" value="<?php echo $address1 ?>"  placeholder="Địa chỉ 1" name="address1" size="30"></td>
            </tr>
            
            <tr>
                <td>Address2:</td>
                    <td><input type="text" value="<?php echo $address2 ?>"  placeholder="Địa chỉ 2" name="address2" size="30"></td>
            </tr>

            <tr>
                <td>Note:</td>
                    <td><input type="text" value="<?php echo $note ?>" placeholder="Ghi chú" name="note" size="30"></td>
            </tr>
            
            <tr>
                <td colspan="2" align="center"><input class="btn" type="submit" name="btn_edit" value="Save">
            
                 <input class="btn" type="button" name="btn_cancel" onclick="cancel()" value="Cancel"></td>
            </tr>
            </table>
        </form>
       


        <?php
        include './footer.php';
        if(isset($_POST['btn_edit']))
        {
            if(isset($_POST['staffcode'])&&isset($_POST['staffname'])&&isset($_POST['birthday'])&&isset($_POST['tel1'])
            &&isset($_POST['tel2'])&&isset($_POST['zip'])&&isset($_POST['address1'])&&isset($_POST['address2'])&&isset($_POST['note']))
            {   
                
                include 'db.php';

                $staffcode = $_POST['staffcode'];
                $staffname = $_POST['staffname'];
                $birthday = $_POST['birthday'];
                $tel1 = $_POST['tel1'];
                $tel2 = $_POST['tel2'];
                $zip = $_POST['zip'];
                $address1 = $_POST['address1'];
                $address2 = $_POST['address2'];
                $note = $_POST['note'];
                
                $sql = "UPDATE m_user SET STAFFNAME = '$staffname', BIRTHDAY ='$birthday',TEL1 ='$tel1', TEL2 = '$tel2', ZIP ='$zip', ADDRESS1 ='$address1', ADDRESS2 ='$address2',NOTE ='$note' WHERE STAFFCODE = '$staffcode' ";
                $result = mysqli_query($conn,$sql);
                
                if($result==true)
                {
                    echo "<script type='text/javascript'>alert('Sửa thành công');</script>";
                    echo "<script type='text/javascript'>window.location='index.php';</script>";
                }
                else{
                    echo'<Script>alert("Chỉnh sửa thất bại")</Script>';
                    mysqli_close($conn);
                }
            }else{
                echo "<script type='text/javascript'>alert('Vui lòng điền đầy đủ thông tin');</script>";
            }
        }
    ?>

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