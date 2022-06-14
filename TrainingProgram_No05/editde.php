<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="styleno5.css">
    </head>
    <body>

        <?php
        include './banner.php';
        include './db.php';

        if(isset($_GET['id'])){
        $code = $_GET['id'];
        $sql = "SELECT * from m_department WHERE CODE = '$code'";
        $result = mysqli_query($conn,$sql);      
        while($nv = mysqli_fetch_assoc($result))
        {
            $code = $nv['CODE'];
            $name = $nv['NAME'];
            $tel = $nv['TEL'];
            $mailaddress = $nv['MAILADDRESS'];
            $description = $nv['DESCRIPTION'];
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
                <td>Code:</td>
                    <td><input type="number"  readonly="readonly" value="<?php echo $code ?>" name="code" size="30"></td>
            </tr> 

            <tr>          
                <td>Name:</td>
                    <td><input type="text" value="<?php echo $name ?>" name="name" placeholder="Tên Phòng Ban" size="30" pattern="^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]+$" required title="Name không chấp nhận các kí đặc biệt và kí tự số"></td>
            </tr>

            <tr>
                <td>Tel:</td> 
                    <td><input type="number" value="<?php echo $tel ?>" name="tel" placeholder="Số điện thoại" size="30"></td>
            </tr>

            <tr>
                <td>MailAddress:</td>
                    <td><input type="email" value="<?php echo $mailaddress ?>" placeholder="example@yahoo.com "  name="mailaddress" size="30"></td>
            </tr>

            <tr>
                <td>Description:</td>
                <td><input type="text" value="<?php echo $description ?>"  name="description" placeholder="Mô tả" size="30"></td>
            </tr>

            <tr>
                <td>Note:</td>
                    <td><input type="text" value="<?php echo $note ?>" name="note" placeholder="Ghi chú" size="30"></td>
            </tr>
            
            <tr>
                <td colspan="2" align="center"><input class="btn" type="submit" value="Save">
            
                 <input class="btn" type="button" name="btn_cancel" onclick="cancel()" value="Cancel"></td>
            </tr>
            </table>
        </form>
       


        <?php
        include './footer.php';
        if(isset($_POST['code'])&&isset($_POST['name'])&&isset($_POST['tel'])&&isset($_POST['mailaddress'])&&isset($_POST['description'])&&isset($_POST['note']))
        {   
            
        include 'db.php';

        
        $code = $_POST['code'];
        $name = $_POST['name'];
        $tel = $_POST['tel'];
        $mailaddress = $_POST['mailaddress'];
        $description = $_POST['description'];
        $note = $_POST['note'];

            


            $sql = "UPDATE m_department SET NAME = '$name',TEL = '$tel',MAILADDRESS ='$mailaddress',DESCRIPTION = '$description',NOTE ='$note' WHERE CODE = '$code' ";
            $result = mysqli_query($conn,$sql);
            
            if($result!=null)
            {
                echo "<script type='text/javascript'>alert('Sửa thành công');</script>";
                echo "<script type='text/javascript'>window.location='departmentlist.php';</script>";
            }
            else
            echo'<Script>alert("Chỉnh sửa thất bại")</Script>';
            mysqli_close($conn);
        }
        ?>
       <script>
            function cancel() {
                if(confirm('Bạn có muốn thoát khi chưa lưu ?')==true)
                {
                    window.location = "departmentlist.php";
                }else{

                }
            }
         </script>
        
        
    </body>
    
</html>