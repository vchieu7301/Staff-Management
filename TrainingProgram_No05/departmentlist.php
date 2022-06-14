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
            <h2>Danh Sách Department</h2>
            <thead>
                <th >CD</th>
                <th >Name</th>
                <th>Number Of People</th>
            </thead>  
            <tbody>     
                       
            <?php
			$con = mysqli_connect("localhost","root","","staff_management");
			if(!$con)
            {
                die("Kết nối thất bại");
                exit();
            }
			$sql = "SELECT DE.CODE, DE.NAME, COUNT(US.DEPARTMENT_CODE) AS NUM FROM (m_user AS US RIGHT JOIN m_department AS DE ON US.DEPARTMENT_CODE=DE.CODE) WHERE DE.USEFLAG=1 GROUP BY DE.CODE, DE.NAME";
            $result = mysqli_query($con,$sql);
		while($data = mysqli_fetch_array($result))
        
        {?>
			
            <tr>
                <td ondblclick="location.href=ledit"><?php echo $data['CODE'];?></td>
                <td ondblclick="location.href=ledit"><?php echo $data['NAME'];?></td>
                <td><?php echo $data['NUM'];?></td>
			</tr> 
          
			
		<?php } ?>

        
        </tbody>      
        </table>
            <div style="margin-top: 10px;">
                <input class="btn" type="button" value="Mới" name="btn_add" class="input" onclick="location.href='addde.php';"> 
                <input class="btn" type="button" value="Chỉnh Sửa" name="btn_edit"  id="btn_edit" onclick="location.href=ledit" >
                <input class="btn" type="button" value="Xoá" name="btn_delete"id="btn_delete" onclick="location.href=ldelete">
                <input class="btn" type="button" value="Back" name="btn_back" onclick="location.href='index.php';"> 

            </div>
        </div>

        <script type="text/javascript">
        function selectedRow(){
                
                var index,
                    table = document.getElementById("tb");
            
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
                        ledit='editde.php?id='+id;
                        ldelete='deletede.php?id='+id;
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