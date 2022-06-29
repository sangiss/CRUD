<?php

include ("conn.php");
	
	$del="delete from ragistration where uid='".$_REQUEST["id"]."'";
	$ss=mysqli_query( $conn,$del);
	
	$no=mysqli_affected_rows($conn);
	
	if($no>0)
	{
		echo '<script>alert("Record Deleted");</script>';
		echo '<script>location.href="view.php"</script>';	
	}

?>