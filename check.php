<?php 
if($_GET['title']=='bytitle'){
	$var=$_GET['searchtitle'];
header("Location:Part04_Search.php?title=$var");	
}
else if($_GET['title']=='desc'){
	$var=$_GET['searchdesc'];
header("Location:Part04_Search.php?desc=$var");
}
else if(isset($_REQUEST["homesearch"])){
	$var=$_GET['homesearch'];
header("Location:Part04_Search.php?title=$var");
}
else if($_GET['title']=='nofilter'){
header("Location:Part04_Search.php?nofilter=true");	
}
else{
	header("Location:Part04_Search.php?error");	
}
?>
