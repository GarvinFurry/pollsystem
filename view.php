<?php
 session_start(); 
  if(!isset($_SESSION['type']) || $_SESSION['type']!='1')
  {
    header("Location: index.php");
    die();
  }
 
  	include "includes/dbcon.php";
  	$sql="select poll.id,poll.title,poll.section,count(polldata.pollid) as c from polldata right join poll on poll.id=polldata.pollid where section='".$_SESSION['section']."' group by polldata.pollid ";
  	$result=mysqli_query($con,$sql);
  	mysqli_close($con);
  
?>


<!DOCTYPE html>
<html>
<head>
	<title></title><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="css/pollstyle.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body class="view">
<div class="container">
<table>
  <thead>
<tr>
  <th style="color:#d0d0d0;">Poll</th>
  <th style="color:#d0d0d0;">Section</th>
    <th style="color:#d0d0d0;">Total Count</th>
    <th></th>
</tr>
<thead>
  <tbody>
<?php while($row=mysqli_fetch_assoc($result)){?>
<tr>
  
   <td><?php echo $row['title']."</td><td> ".$row['section']."</td><td> ".$row['c']; ?></td><td><a style="text-decoration: none; color:#c70000;" href="viewdetails.php?id=<?php echo $row['id']."&title=".$row['title']; ?>" >View</a></td>
</tr>
<?php }?>
  
 </tbody>
</table>
 
  </div>
 


<script>

</script>

</body>
</html>