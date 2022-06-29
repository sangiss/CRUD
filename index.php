 <?php 
	include("conn.php");
	?>

<?php
if(isset($_POST['submit'])){

	 	$name=$_POST['uname'];   
		$pass=$_POST['upass']; 
		$gender=$_POST['gender'];
		$mob=$_POST["mobile"];
		$city=$_POST['city'];
		$email=$_POST['email'];
	  $hobby=implode(',',$_POST['ho']); 
	 
	 
	  $image=$_FILES['photo']['name'];
	 	$image_tmp=$_FILES['photo']['tmp_name'];
	 
	// echo $image; exit;
	 
		$path="upload/"; 
   	move_uploaded_file($image_tmp,$path.$image);
	
		echo $insert= "insert into registration (name,pass,gender,mob,city,email,hobby,image) values 
		 ('$name','$pass','$gender',$mob,'$city','$email','$hobby','$image')";  
				     
			 
				  $result=mysqli_query($conn,$insert);
		 if($result){
		
		echo '<script type="text/javascript">alert("data has been submitted");</script>';
		echo "<script>window.open('view.php','_self');</script>";
		}else{
			
			echo '<script type="text/javascript">alert("Data has not been submitted");</script>';
			echo "<script>window.open('index.php','_self');</script>";
			}
		
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Latest compiled and minified CSS -->
<!--<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<!-- Optional theme -->
<!--<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">-->

<!-- Latest compiled and minified JavaScript -->
<!--<script src="bootstrap/js/bootstrap.min.js"></script>-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Index Data</title>
</head>

<body>
</br></br></br>
<div class="row">
<div class="col-lg-3"></div>
<div class="col-lg-7">
<form method="post" enctype="multipart/form-data">
	
   
    <div class="row">
    		
    	<div class="col-lg-4"><label>Name:</label></div>
    	<div class="col-lg-6"><input type="text" name="uname" class="form-control"/></div>
    </div>
    	
        </br>
        
         <div class="row"> 
   			<div class="col-lg-4"><label>Password:</label> </div>
    		<div class="col-lg-6"><input type="password" maxlength="20" 
            class="form-control" name="upass"  />
        	</div>
        </div>
    </br>
      <div class="row">
      
      	<div class="col-lg-4"><label> Gender:</label></div>
      
    	<div class="col-lg-7">
        <input type="radio" name="gender"  value="male" checked="checked" />Male
        <input type="radio" name="gender" value="female"checked="checked"/>Female</div>
    </div>
    	
        </br>
   
    <div class="row">
    
    
    	<div class="col-lg-4"><label> hobbies:</label></div>
    	<div class="col-lg-6"><input type="checkbox" 
        name="ho[]" value="cricket" />cricket
        <input type="checkbox" name="ho[]" value="hockey" />hockey
        <input type="checkbox" name="ho[]" value="football" />football
        </div>
        </div>
    </br>
    
     <div class="row">
     
     	<div class="col-lg-4"><label> City:</label></div>
    	<div class="col-lg-6"><select name="city" class="form-control">
        	<option value="" class="form-control" selected="">Select-A-City</option>
        	<option value="RAJKOT" class="form-control">RAJKOT</option>
        	<option value="JAMNAGAR" class="form-control">JAMNAGAR</option>
            <option value="AHMEDABAD" class="form-control">AHMEDABAD</option>
            <option value="ADIPUR" class="form-control">ADIPUR</option>
        </select></div>
        </div>
    </br>
    
     <div class="row">
     
     	<div class="col-lg-4"><label> Email:</label></div>
    	<div class="col-lg-6"><input type="email" class="form-control" name="email" /></div>
        </div>
    </br>
     <div class="row">
     	<div class="col-lg-4"><label> Mobile No.:</label></div>
    	<div class="col-lg-6"><input type="mobile" class="form-control" name="mobile" /></div>
        </div>
    </br>
     <div class="row">
     	<div class="col-lg-4"><label> photo:</label></div>
    	<div class="col-lg-6"><input type="file" class="form-control" name="photo" /></div>
        </div>
    </br>
    <div class="row"> 
    	<div class="col-lg-4"></div>
    <div class="col-lg-6"><input type="submit" name="submit" class="btn btn-info" value="submit"></div>
    </div>	
 </form>
 </div>
 </div>  
</body>
</html>
 