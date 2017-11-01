<?php
$message='';
$servername = "localhost";
$username = "root";
$password = "";
//Name: Sai Karan Dasari, Project3 Due Date:11/20/2016
//Reference:http://stackoverflow.com/questions/25023199/bootstrap-open-image-in-modal
//Reference:http://www.w3schools.com/bootstrap/,https://getbootstrap.com/components/#navbar
// Create connection
$conn = new mysqli($servername, $username, $password,'wdm');
mysqli_set_charset($conn,'utf-8');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_GET['id'])){
$sql = "SELECT Title,YearOfWork,ImageFileName,ArtWorkID FROM artworks WHERE ArtistID=".$conn->real_escape_string($_GET['id']);
$sql1="SELECT ArtistID,Details,FirstName,LastName,YearOfBirth,YearOfDeath,Nationality,ArtistLink FROM artists WHERE ArtistID=".$conn->real_escape_string($_GET['id']);
//$var=$_GET['name'];
$result = $conn->query($sql);
$result1 = $conn->query($sql1);
if($result1->num_rows>0){
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta charset="utf-8"></meta>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.row1 {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display:         flex;
  flex-wrap: wrap;
}
.row1 > [class*='col-'] {
  display: flex;
  flex-direction: column;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 15px;
}
th {
    background-color: #f2f2f2;
    color: black;
	
}
.tablep{
	padding-top: 15px;
}
.ins{
	padding: 10px;
	margin-left: auto;
    margin-right: auto;
	text-align: center;
}

</style>
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
<?php while($row1 = $result1->fetch_assoc()){?>
<h3><?php echo $row1["FirstName"]." ".$row1["LastName"];?></h3>
<div class="row">
<div class="col-md-3">

<?php
echo "<img style=\"float:left\" class=\"img-thumbnail\" src='images(1)/images/art/artists/medium/".$row1["ArtistID"].".jpg'>";
?>
</div>
<div class="col-md-5">
<p style="clear:both;float:left;">
<?php echo $row1["Details"];
?></p>
<a href="#" class="btn btn-info btn-lg">
<span class="glyphicon glyphicon-heart"></span> Add to Favorites List</a><br/>
<div class="tablep">
<table class="table table-striped">
<tr>
<th colspan="2"><strong>Artist Details</strong></th>
</tr>

<tr>
<td><strong>Date: </strong></td>
<td><?php echo $row1["YearOfBirth"]."-".$row1["YearOfDeath"]?></td>
</tr>
<tr>
<td><strong>Nationality: </strong></td>
<td><?php echo $row1["Nationality"] ?></td>
</tr>
<tr>
<td><strong>More Info: </strong></td>
<td><a href="<?php echo $row1["ArtistLink"]?>"><?php echo $row1["ArtistLink"]?></a></td>
</tr>
</table>
</div>

</div>
</div>
<h3><?php echo "Art by ".$row1["FirstName"]." ".$row1["LastName"]; ?></h3><br/>
<?php }?>
</div>

<div class="page" id="part2">
<div class="container">
<div class="row1">

<?php while($row = $result->fetch_assoc()){?>
<div class="col-md-3">
  <div class="ins">
		<div class="panel panel-primary">
			
			<div class="panel-body">
				<a href="Part03_SingleWork.php?id=<?php echo $row['ArtWorkID']; ?>">
					<?php
					   echo "<img class=\"img-responsive center-block\" alt=\"Image\" src='images(1)/images/art/works/square-thumbs/".$row["ImageFileName"].".jpg'>";
					?>
				</a>
				<a href="Part03_SingleWork.php?id=<?php echo $row['ArtWorkID']; ?>">
				  <?php echo $row["Title"]." ".$row["YearOfWork"] ?>
				</a>
			</div>
			<div class="panel-footer">
					<a href="Part03_SingleWork.php?id=<?php echo $row['ArtWorkID']; ?>" class="btn btn-primary btn-xs">
					<span class="glyphicon glyphicon-plus"></span> View</a>
					<a href="#" class="btn btn-success btn-xs">
					<span class="glyphicon glyphicon-th-large"></span> Wish</a>
					<a href="#" class="btn btn-info btn-xs">
					<span class="glyphicon glyphicon-shopping-cart"></span> Cart</a>
			</div>
		</div>
	</div>
</div> 
<?php } ?>    
</div>
</div>
</div>
<?php
}
else{
	header("Location: http://localhost/project3/Error.php?invalid_artistid");
    die();
}
}
else{
	header("Location: http://localhost/project3/Error.php?invalid_query_param");
    die();
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>