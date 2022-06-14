<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="styleno1.css">
    
    </head>
    <body>
     
        <?php
        include './banner.php';
        include './db.php';
        ?>
        <div class="dsnv">
        <table border="1"  id="tb">
        <h2>Danh Sách TrainingProgram_No01</h2>
        <thead>
                
                <th >StaffCode</th>
                <th >StaffName</th>
            </thead>  
            <tbody>     
                       
            <?php
			$con = mysqli_connect("localhost","root","","staff_management");
			if(!$con)
            {
                die("Kết nối thất bại");
                exit();
            }
			$sql = "SELECT STAFFCODE,STAFFNAME FROM m_user WHERE USEFLAG=1";
            $result = mysqli_query($con,$sql);
		while($data = mysqli_fetch_array($result))
        
        {?>
			
            <tr>
                <td><?php echo $data['STAFFCODE'];?></td>
                <td><?php echo $data['STAFFNAME'];?></td>
			</tr> 
          
			
		<?php } ?>

        
        </tbody>      
        </table>
        <div style="margin-top: 10px;">
            <input class="btn" type="button" value="Mới" name="new" class="input" onclick="location.href='add.php';"> 
            <input class="btn" type="button" value="Chỉnh Sửa" name="edit" id="btn_edit" onclick="location.href=ledit">
            <input class="btn" type="button" value="Xoá" name="delete" id="btn_delete"onclick="location.href=ldelete">

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
        
            function edit(){
                
                        
            }
            
    </script>
    <?php
    include './footer.php';
    ?>
    </body>
</html>