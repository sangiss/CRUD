<?php
//error_reporting(0);
?>
<html>
<body>
<form action="" method="post">
 
     	<label>photo:</label>
    	<input type="file" class="form-control" name="uploadfile"  value=""/>
		<input type="submit" class="form-control" name="submit"  value=" Upload file"/>
		</form>
		
</body>
</html>
<?php
		
		//$folder="upload/";
		//$_FILES["uploadfile"];
	//	print_r(['uploadfile']); //display array name;
		if(isset($_POST['uploadfile']))
		{
		$filename=$_FILES["uploadfile"]["name"];
	 	$tempname=$_FILES["uploadfile"]["tmp_name"];
		$folder="upload/".$filename;
		//echo $folder;
		move_uploaded_file($tempname,$folder);
	
		echo "<img src='$folder' height='100' width='100'/>";
		}
		//<img src="upload/1.jpg" height="100" width="100"/>*/
	?>	
		
		
		
		