<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="style5.css">
    
    </head>
    <body>
    <?php
        include './banner.php';
        include './db.php';

        $id = $_GET['id'];
        $sql = "SELECT DE.CODE, DE.NAME, COUNT(US.DEPARTMENT_CODE) AS NUM FROM (m_user AS US RIGHT JOIN m_department AS DE ON US.DEPARTMENT_CODE=DE.CODE) WHERE DE.CODE=$id AND DE.USEFLAG=1 GROUP BY DE.CODE, DE.NAME";
        $rs=mysqli_query($conn,$sql);
        while($data=mysqli_fetch_array($rs)){
            $num= $data['NUM'];
        ?>

        <?php
        }
        ?>
        
        <?php
        if($num > 0){
            echo "<script type='text/javascript'>alert('Department đã tồn tại Staff');</script>";
            echo "<script type='text/javascript'>window.location='departmentlist.php';</script>";
        }else{
            
            $sql1 = "UPDATE m_department SET USEFLAG=0 WHERE CODE = '$id'";
            $result = mysqli_query($conn,$sql1);
            if($result!=null)
                    {
                        echo "<script type='text/javascript'>alert('Xoá thành công');</script>";
                        echo "<script type='text/javascript'>window.location='departmentlist.php';</script>";
                    }else{
                        echo "<script type='text/javascript'>alert('Xoá thất bại');</script>";
                        mysqli_close($conn);
                    }
        }
        
        ?>
    </body>
</html>