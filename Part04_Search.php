<?php

//Name: Sai Karan Dasari, Project3 Due Date:11/20/2016
//Reference:http://stackoverflow.com/questions/25023199/bootstrap-open-image-in-modal
//Reference:http://www.w3schools.com/bootstrap/,https://getbootstrap.com/components/#navbar
$message='';
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password,'wdm');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta charset="utf-8"></meta>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
.highlight { background-color: yellow; }
.title1 { display:none }
.desc1 { display:none }
.formclass{
	padding: 10px;
	background-color:#f2f2f2;
}
.main{
	padding-top:20px;
}
strong{
	color:red;
}
.results{
	padding-top:20px;
}


</style>
<link rel="stylesheet" href="css/search.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="default.php">Project 3</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="default.php">Home</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Part01_ArtistsDataList.php">Artist Data List(Part 1)</a></li>
            <li><a href="Part02_SingleArtist.php?id=19">Single Artist(Part 2)</a></li>
            <li><a href="Part03_SingleWork.php?id=394">Single Work(Part 3)</a></li>
            <li><a href="Part04_Search.php">Search(Part 4)</a></li>  
          </ul>
        </li>
      </ul>
	  
      <form method="GET" action="check.php" class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="homesearch">
        </div>
        <input type="submit" class="btn btn-info" value="Search">
      </form>
      <p class="navbar-text navbar-right">Sai Karan Dasari</p>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-12">
          <header>
          <h2>Search Results</h2>
          </header>
		  <div class="well">
		  <form method="GET" class="formclass" action="check.php" role="search"> 
		  
         
             <p> <input type="radio" id="r1" name="title" value="bytitle"<?php echo isset($_REQUEST["title"])?'checked':'';?>>Filter by Title</p>
              <div id="searchtext" class="title1">
			    <input type="text" class="form-control" id="searchtitle" name="searchtitle" value="<?php echo isset($_REQUEST["title"])?$_GET["title"]:'' ?>"><br/>
			  </div>    
		  
             <p><input type="radio" id="r2" name="title" value="desc"<?php echo isset($_REQUEST["desc"])?'checked':'';?>>Filter by Description</p>
             <div id="searchtext" class="desc1">
			    <input type="text" class="form-control" id="searchdesc" name="searchdesc" value="<?php echo isset($_REQUEST["desc"])?$_GET["desc"]:'' ?>"><br/>
			 </div>
			 
              <p><input type="radio" id="r3" name="title" value="nofilter"<?php echo isset($_REQUEST["nofilter"])?'checked':'';?>>No filter</p>
             
			  <input type="submit" class="btn btn-primary" value="Filter">
			  
			  </form>
         </div>
        </div>
	</div>
</div>

<?php

  if(isset($_REQUEST["title"])){
	  $searchval=$_GET["title"];
	  $sql = "SELECT Title,ImageFileName,Description,ArtWorkID FROM artworks
        WHERE Title LIKE '% {$searchval} %' OR Title LIKE '{$searchval} %' OR Title LIKE '% {$searchval}'";
	$result = $conn->query($sql);
	if($result->num_rows>0){
	
?>
<div class="container">
<div class="main">
<?php while($row = $result->fetch_assoc()){?>
<div class="row">
<div class="col-md-2">
<p><a href="Part03_SingleWork.php?id=<?php echo $row['ArtWorkID']; ?>">
<?php echo "<img src='images(1)/images/art/works/square-medium/".$row["ImageFileName"].".jpg'/>";?></a></p>
</div>
<div class="col-md-10" style="float:left;">
<p><a href="Part03_SingleWork.php?id=<?php echo $row['ArtWorkID']; ?>"><?php echo $row["Title"];?></p></a>
<p><?php echo $row["Description"];?></p>
</div>
</div>
<?php }?>
</div>
</div>
<?php }else{?>
	<div class=" container results">
	<h3>No Results Found</h3>
	</div>
  <?php } }else if(isset($_REQUEST["desc"])){
	$searchval1=$_GET["desc"];
	  $sql1 = "SELECT Title,ImageFileName,Description,ArtWorkID FROM artworks
        WHERE Description LIKE '% {$searchval1} %' OR Description LIKE '{$searchval1} %' OR Description LIKE '% {$searchval1}'";
	$result = $conn->query($sql1);
	if($result->num_rows>0){
	?>

<div class="container">
<div class="main">
<?php while($row = $result->fetch_assoc()){?>
<div class="row">
<div class="col-sm-2">
<p><a href="Part03_SingleWork.php?id=<?php echo $row['ArtWorkID']; ?>">
<?php echo "<img src='images(1)/images/art/works/square-medium/".$row["ImageFileName"].".jpg'/>";?></a></p>
</div>
<div class="col-sm-10" style="float:left;">
<p><a href="Part03_SingleWork.php?id=<?php echo $row['ArtWorkID']; ?>"><?php echo $row["Title"];?></p></a>
<p><?php echo str_ireplace($searchval1,"<span class=\"highlight\">$searchval1</span>",$row["Description"]); ?></p>
</div>
</div>
<?php }?>
</div>
</div>	
<?php }else{?>
	<div class=" container results">
	<h3>No Results Found</h3>
	</div>
  <?php } } 
else if(isset($_REQUEST["nofilter"])){
	$sql = "SELECT Title,ImageFileName,Description,ArtWorkID FROM artworks";
	$result = $conn->query($sql);
	?>

	
<div class="container">
<div class="main">
<?php while($row = $result->fetch_assoc()){?>
<div class="row">
<div class="col-xs-2">
<p><a href="Part03_SingleWork.php?id=<?php echo $row['ArtWorkID']; ?>">
<?php echo "<img src='images(1)/images/art/works/square-medium/".$row["ImageFileName"].".jpg'/>"?></a></p>
</div>
<div class="col-xs-10" style="float:left;">
<p><a href="Part03_SingleWork.php?id=<?php echo $row['ArtWorkID']; ?>"><?php echo $row["Title"];?></p></a>
<p><?php echo $row["Description"]; ?></p>
</div>
</div>
<?php }?>
</div>
</div>
 <?php }
else if(isset($_REQUEST["error"])){?>
<div class="container">
<br><p> <h3>Please select <strong>atleast one</strong> search criteria and Filter again</h3></p>
</div>
<?php }?>


<script>
$(document).ready(function () {
    $(".title1").hide();
	$(".desc1").hide();
    $("#r1").click(function () {
        $(".title1").show();
		$(".desc1").hide();
    });
    $("#r2").click(function () {
        $(".desc1").show();
		$(".title1").hide();
    });
	$("#r3").click(function () {
        $(".desc1").hide();
		$(".title1").hide();
    });
	if($('#r1').is(':checked')) {
		$(".title1").show();
		$(".desc1").hide();
		}
		if($('#r2').is(':checked')) {
		$(".desc1").show();
		$(".title1").hide();
		}
});
</script>
    
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>