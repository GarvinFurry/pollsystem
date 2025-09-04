<?php
 session_start(); 
  if(!isset($_SESSION['type']) || $_SESSION['type']!='1')
  {
    header("Location: index.php");
    die();
  }
  if(isset($_POST['title'])){

  	include "includes/dbcon.php";
  	$sql="INSERT INTO `poll`( `title`, `desc`, `active`, `section`,`date`,`updatedby`) VALUES ('".$_POST['title']."','".$_POST['desc']."',1,'".$_POST['section']."',NOW(),'".$_SESSION['id']."')";
  	if(mysqli_query($con,$sql))
  		{echo"<script>alert('Poll added');</script>";}else{
  			echo"<script>alert('Something went wrong');</script>";
  		}
  	mysqli_close($con);
  }
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" href="css/pollstyle.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<form action="" method="post">
<label for="RM"><center><small> <i class="fa fa-info"></i> Polls are shown to your respective <b> section members </b>only!</small></center></label><hr>
  <div class="row">
    
    <input type="text" name="title" id="fancy-text" autocomplete="off"/>
    <label for="fancy-text">Title</label>
  </div>
   <div class="row">
    <textarea name="desc" id="fancy-textarea"></textarea>
    <label for="fancy-textarea">Description</label>
  </div>

  
  <input type="hidden" name="section" value="<?php echo $_SESSION['section'];?>">

 
  
  <button type="submit" tabindex="0">Submit</button>
</form>

<script>

</script>

</body>
</html>