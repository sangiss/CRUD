<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
td{
	width:200px;
	}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>view data</title>
</head>

<body>

<?php


?>
<table border="2" align="center" >
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Password</th>
    <th>Gender</th>
    <th>Mobile No.</th>
    <th>city</th>
     <th>email</th>
      <th>Hobby</th>
       <th>Image</th>
    <th>Delete</th>
    <th>Edit</th>
    </tr>
    <?php
	include("conn.php");

   $select = "select * from registration"; 
 $result=mysqli_query($conn,$select);
  while($row=mysqli_fetch_array($result))
  //while($row=mysqli_fetch_array($result))
 {
	?>
	<th>
	<tr>
   
       <td><?php echo $row['id']; ?></td>
	   	 <td><?php echo $row['name'];?></td>
       <td><?php echo $row['pass'];?></td>
       <td><?php echo $row['gender'];?></td>
       <td><?php echo $row['mob']; ?></td>
       <td><?php echo $row['city']; ?></td>
       <td><?php echo $row['email']; ?></td>
       
         <td><?php echo $row['hobby']; ?></td>
         
        <td> <img src="upload/<?php echo $row['photo']; ?>" height="50" /> </td>
         
         <td><a href="delete.php?id=<?php echo $row['uid']; ?>">delete</a></td>
         <td><a href="edit.php?uid=<?php echo $row['uid']; ?>">Edit</a></td>
    </tr>
    <?php 
		}
?>


      <!--   mysqli_free_result($result);
    } else{
        echo "No records found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}?> -->
</table>

</body>
</html>
