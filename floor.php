<?php
    $conn=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($conn,"hotel_db");
    
   if(isset($_POST['submit_e']))
   {
      $floor_no=$_POST['floor_no_e'];
      $floor_name=$_POST['floor_name_e'];
      $floor_status=$_POST['status_e'];
      $floor_id=$_POST['floor_id_e'];
       $query="update floor_info set floor_no=$floor_no,floor_name='$floor_name',floor_status=$floor_status where floor_id=$floor_id";
       echo $query;
       $result=mysqli_query($conn,$query);
       if($result)
       {
           ?>
           <script>location.replace('floor.php');</script>
           <?php
       }
   }
   
   if(isset($_GET['uid']))
   {
       $floor_id=$_GET['uid'];
       $query="delete from floor_info where floor_id=$floor_id";
       $result=mysqli_query($conn,$query);
       if($result)
       {
           ?>
           <script>alert('Deleted');location.replace('floor.php?')</script>
           <?php
       }
   }
    if(isset($_POST['submit']))
    {
        $floor_name=$_POST['floor_name'];
        $floor_no=$_POST['floor_no'];
        $floor_status=$_POST['status'];
        
        $query="insert into floor_info(floor_no,floor_status,floor_name)values('$floor_no','$floor_status','$floor_name')";
        
        $result=mysqli_query($conn,$query);
        if($result)
        {
           
            
            echo"<script>alert('Ok');location.replace('floor.php?');</script>";
           
        }
    }
?>
<html>
<body>
    <center>
<table border cellpadding="10" cellspacing="10">
    <form name="frm" method="POST">
<tr>
<td>
Floor No
</td>
<td>:
</td>
<td><input type="text" name="floor_no"></td>
</tr>
<tr>
    <td>
    Floor Name
    </td>
    <td>
    :
    </td>
    <td>
    <input type="text" name="floor_name">
    </td>
    </tr>
    <td>
    Floor Status
    </td>
    <td>:</td>
    <td><select name="status">
        <option value=1>Available</option>
        <option value=0>Unavailable</option>
    </select>
    </td>
    </tr>
    <tr>
    <td>
    <input type="submit" name="submit">
    </td>    
    </tr>
    </form>
    </tr>
    </table>
    <br>
    <table border cellpadding="10" cellspacing="10" width="70%">
    <tr>
        <td>Floor No</td>
        <td size="12">Floor Name &nbsp; &nbsp;</td>
        <td>Floor Status&nbsp; &nbsp;</td>
         </tr>
        <?php
            $query="select * from floor_info order by floor_no";
            $result=mysqli_query($conn,$query);
            if($result)
            {
                while($data=mysqli_fetch_assoc($result))
                {
                    if(isset($_GET['edit']) && $_GET['edit']==$data['floor_id'])
                    {
                        $available='';
                            $unavailable='';
                            if($data['floor_status']==1)
                                $available='selected';
                               else 
                               $unavailable='selected';    
                        ?>
                        
                       <tr> 
                           <form name="frm2" method="POST">
                           <td><input type="text" name="floor_no_e" size="2" value="<?php echo $data['floor_no'];?>"><input type="hidden"name="floor_id_e"value="<?php echo $data['floor_id'];?>"></td>
                           <td><input type="text" name="floor_name_e" size="8" value="<?php echo $data['floor_name'];?>"></td>
                           <td><select name="status_e"><option value=0 <?php echo $unavailable;?>>Unavailable</option>
                           <option value=1 <?php echo $available;?>>Available</option>
                           </select></td>
                           <td><input type="submit" name="submit_e"></td>
                           <td><a href="floor.php?">Cancel</a></td>
                           </form>
                       
                       </tr>
                       
                        <?php
                         }
                        else 
                        {
                           
                              
                            
                        ?>
                    
                    <tr>
                    <td><?php echo $data['floor_no'];?></td>
                    <td><?php echo $data['floor_name'];?></td>
                    <td><?php echo $status=($data['floor_status']==0) ? "unavailable" : "available";?></td>
                    <td><a href="floor.php?uid=<?php echo $data['floor_id']?>">Delete</a></td>
                    <td><a href="floor.php?edit=<?php echo $data['floor_id']?>">Edit</a></td>
                    </tr>
                    <?php
                }
            }
            }
        ?>
   
</table>
</center>
</body>
</html>