<?php 
include("conn.php");
	 

	if(isset($_REQUEST['uid'])==true)
{

  $id=$_GET['uid'];  
 
$sd=mysqli_query("select * from registration where uid='$id'"); 

	$row=mysqli_fetch_array($sd); 
	
	 $gender=$row['gender']; 
	 $hobby=$row['hobbies']; 
 	 $h=explode(',',$hobby); 
	 
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>edit Data</title>
</head>

<body>
</br></br></br>
<div class="row">
<div class="col-lg-3"></div>
<div class="col-lg-7">
<form method="post" enctype="multipart/form-data">
	
    <input type="hidden" name="id" value="<?php echo $_REQUEST["uid"]; ?>" />
    <div class="row">
    		
    	<div class="col-lg-4"><label>Name:</label></div>
    	<div class="col-lg-6"><input type="text" name="uname" 
        value="<?php echo $row['name'];  ?>" class="form-control"/></div>
    </div>
    	
        </br>
        
         <div class="row"> 
   			<div class="col-lg-4"><label>Password:</label> </div>
    		<div class="col-lg-6"><input type="password" maxlength="20"
            value="<?php echo $row['pass'];  ?>" class="form-control" name="upass"  />
        	</div>
        </div>
    </br>
      <div class="row">
      
      	<div class="col-lg-4"><label> Gender:</label></div>
      
    	<div class="col-lg-6">
        <input type="radio" name="gender"  value="male" <?php if($gender=="male"){?> checked <?php }?> />Male
        <input type="radio" name="gender" value="female" <?php if($gender=="female"){?> checked <?php }?>/>Female</div>
    </div>
    	
        </br>
   
    <div class="row">
    
    
    	<div class="col-lg-4"><label> hobbies:</label></div>
    	<div class="col-lg-6"><input type="checkbox" name="ho[]"  value="cricket" 
        <?php if(in_array('cricket',$h)){?>checked<?php }?> />cricket
        <input type="checkbox" name="ho[]" 
        <?php if(in_array('hockey',$h)){?>checked<?php }?>
        value="hockey" />hockey
        <input type="checkbox" name="ho[]" 
       <?php if(in_array('football',$h)){?>checked<?php }?> 
        value="football" />football
        </div>
        </div>
    </br>
    
     <div class="row">
     
     	<div class="col-lg-4"><label> City:</label></div>
    	<div class="col-lg-6">
        
        <input type="text" name="city" class="form-control" 
        value="<?php echo $row['city'];  ?>"  />
        </br>
       
        </div>
        <div class="row">
     	<div class="col-lg-4"><label> Email:</label></div>
    	<div class="col-lg-6"><input type="text" class="form-control" value="<?php echo $row['email'];  ?>" name="email" /></div>
        </div>
    </br>
  
    
     
   
     <div class="row">
     	<div class="col-lg-4"><label> Mobile No.:</label></div>
    	<div class="col-lg-6"><input type="text" cl
		ass="form-control" value="<?php echo $row['mobile'];  ?>" name="mobile" /></div>
        </div>
    </br>
     <div class="row">
     	<div class="col-lg-4"><label> photo:</label></div>
    	<div class="col-lg-6"><input type="file" class="form-control"
         name="photo" />
         
         <img src="upload/<?php echo $row['photo']; ?>" height="80" width="80">
         
         </div>
        </div>
    </br>
    <div class="row"> 
    	<div class="col-lg-4"></div>
    <div class="col-lg-6"><input type="submit" name="up" class="btn btn-info
        " value="submit"></div>
    </div>	
 </form>
 </div>
 </div>  
</body>
<?php
if(isset($_POST['up']))
{ 
	$id=$_REQUEST["id"];
		$name=$_POST['uname']; 
		$pass=$_POST['upass'];
		$email=$_POST['email']; 
		$mobile=$_POST['mobile']; 
		$gender=$_POST['gender'];
		$city=$_POST['city'];
		$hobby=implode(',',$_POST['ho']); 
		
		$image=$_FILES['photo']['name'];
	 	$image_tmp=$_FILES['photo']['tmp_name'];
		
	 $path="upload/".$image;
   	move_uploaded_file($image_tmp,$path);

	 $we="update registration set name='$name',city='$city',email='$email',pass='$pass',mobile='$mobile',hobbies='$hobby',gender='$gender',
	 photo='$image' where uid='$id'";
	$df=mysqli_query($conn,$we); 
	 header("location:view.php");
}
?>
</html>