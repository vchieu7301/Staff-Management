<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="styleno5.css">
    
    </head>
    <body>
     
        <?php
        include './banner.php';
        include './toppage.php';
        ?>
        <div class="dsnv">
        <table border="1"  id="tb">
        <h3>Danh Sách TrainingProgram_No05</h3>
        <thead>
                
                <th >StaffCode</th>
                <th >StaffName</th>
                <th >Department Code</th>
                <th >Department Name</th>
            </thead>  
            <tbody>     
                       
            <?php
			$con = mysqli_connect("localhost","root","","staff_management");
			if(!$con)
            {
                die("Kết nối thất bại");
                exit();
            }
			$sql = "SELECT US.STAFFCODE, US.STAFFNAME, US.DEPARTMENT_CODE, DE.NAME FROM (m_user AS US LEFT JOIN m_department AS DE ON US.DEPARTMENT_CODE=DE.CODE) WHERE US.USEFLAG=1";
            $result = mysqli_query($con,$sql);
		    while($data = mysqli_fetch_array($result))
        
        {?>
			
            <tr>
                <td ondblclick="location.href=ledit"><?php echo $data['STAFFCODE'];?></td>
                <td ondblclick="location.href=ledit"><?php echo $data['STAFFNAME'];?></td>
                <td><?php echo $data['DEPARTMENT_CODE'];?></td>
                <td><?php echo $data['NAME'];?></td>
			</tr> 
          
			
		<?php } ?>

        
        </tbody>      
        </table>
        <div style="margin-top: 10px;">
            <input class="btn" type="button" value="Mới" name="new" id="btn_add" onclick="location.href='add.php';"> 
            <input class="btn" type="button" value="Chỉnh Sửa" name="edit" id="btn_edit" onclick="location.href=ledit" >
            <input class="btn" type="button" value="Xoá" name="delete" id="btn_delete"onclick="location.href=ldelete">
            <input class="btn" type="button" value="Xuất" name="new" id="btn_export" onclick="location.href='export.php';"> 
            </div>
        </div>
       

        <script type="text/javascript">
        function selectedRow(){
                
                var index,
                    table = document.getElementById("tb");
                    
                    id = 0;
            
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         // remove the background from the previous selected row
                        if(typeof index !== "undefined"){
                           table.rows[index].classList.toggle("selected");
                        }
                        console.log(typeof index);
                        // get the selected row index
                        index = this.rowIndex;
                        // add class selected to the row
                        this.classList.toggle("selected");
                        console.log(typeof index);
                        id=table.rows[index].cells[0].innerHTML;
                        document.getElementById('btn_edit');
                        document.getElementById('btn_delete');
                        ledit='edit.php?id='+id;
                        ldelete='delete.php?id='+id;
                     };
                     
                }
                
            }
            selectedRow();
        
            
    </script>
    <?php
    include './footer.php';
    ?>
    </body>
</html>