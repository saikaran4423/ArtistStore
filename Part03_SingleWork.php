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
if(isset($_GET['id'])){
$sql = "SELECT a.ArtistID,a.FirstName,a.LastName,atw.Title,atw.Medium,atw.MSRP,atw.ImageFileName,atw.Description,atw.YearOfWork,atw.Width,atw.Height,atw.OriginalHome FROM artists a inner join artworks atw on a.ArtistID=atw.ArtistID where atw.ArtWorkID=".$conn->real_escape_string($_GET['id']);
$sql1="select sb.SubjectName from artworks atw inner join artworksubjects atwsb on atw.ArtWorkID=atwsb.ArtWorkID inner join subjects sb on sb.SubjectID=atwsb.SubjectID where atw.ArtWorkID=".$conn->real_escape_string($_GET['id']);
$sql2="select gr.GenreName from artworks atw inner join artworkgenres atwg on atw.ArtWorkID=atwg.ArtWorkID inner join genres gr on gr.GenreID=atwg.GenreID where atw.ArtWorkID=".$conn->real_escape_string($_GET['id']);
$sql3="select o.DateCreated from artworks atw inner join orderdetails ord on atw.ArtWorkID=ord.ArtWorkID inner join orders o on o.OrderID=ord.OrderID where atw.ArtWorkID=".$conn->real_escape_string($_GET['id']);
//$var=$_GET['name'];
$result = $conn->query($sql);
$result1=$conn->query($sql1);
$result2=$conn->query($sql2);
$result3=$conn->query($sql3);
//$stmt = $conn->prepare($sql);
if($result->num_rows>0){
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta charset="utf-8"></meta>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>
.price{
	color:RED;
}
table {
    border-collapse: collapse;
    width: 100%;
	
}


td {
    text-align: left;
    padding: 30px;
}
th {
    background-color: #f2f2f2;
    color: black;
	
}
.tablep{
	padding-top: 20px;
}
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-default: 1; /* Sit on top */
    padding-top: 0px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {
	height:auto;
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)}
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)}
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
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


<?php while($row1 = $result->fetch_assoc()){?>

<header>
<h2><?php echo $row1["Title"]?></h2>
</header>
<p>by <a href="Part02_SingleArtist.php?id=<?php echo $row1['ArtistID']; ?>"><?php echo $row1["FirstName"]." ".$row1["LastName"]?></a></p>
<div class="row">
<div class="col-md-4">
<a href="#" id="modal">
<?php
echo "<img id=\"myImg\" alt=\"ArtWorks\" style=\"float:left\" class=\"img-thumbnail\" src='images(1)/images/art/works/medium/".$row1["ImageFileName"].".jpg'>";
?>
</a>
<!-- The Modal -->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $row1["Title"]." (".$row1["YearOfWork"].") by ".$row1["FirstName"]." ".$row1["LastName"]?></h4>
      </div>
      <div class="modal-body">
        <img src="" id="imagepreview" style="width: 100%; height: 100%;" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<div class="col-md-6">
<p style="clear:both">
<?php echo $row1["Description"];
?></p>
<p class="price"><strong><?php echo "$ ".round($row1["MSRP"],2)?></strong></p>
<p>
<a href="#" class="btn btn-info btn-lg">
<span class="glyphicon glyphicon-th-large"></span> Add to Wish List</a>
<a href="#" class="btn btn-info btn-lg">
<span class="glyphicon glyphicon-shopping-cart"></span> Add to Shopping Cart</a><br/>
</p>
<div class="tablep">

<table class="table table-striped">
<tr>
<th colspan="2"><strong>Product Details</strong></th>
</tr>

<tr>
<td><strong>Date: </strong></td>
<td><?php echo $row1["YearOfWork"]?></td>
</tr>
<tr>
<td><strong>Medium: </strong></td>
<td><?php echo $row1["Medium"] ?></td>
</tr>
<tr>
<td><strong>Dimension: </strong></td>
<td><?php echo $row1["Width"]."cm x ".$row1["Height"]."cm"?></td>
</tr>
<tr>
<td><strong>Home: </strong></td>
<td><?php echo $row1["OriginalHome"]?></td>
</tr>
<tr>
<td><strong>Genres: </strong></td>
<td><a href="#"><?php while($row2 = $result2->fetch_assoc())
{ echo $row2["GenreName"]."<br/>";}
?></a></td>
</tr>
<tr>
<td><strong>Subjects: </strong></td>
<td><a href="#"><?php while($row3 = $result1->fetch_assoc()){ echo $row3["SubjectName"]."<br/>";}?></a></td>
</tr>
</table>
</div>
<?php }?>
</div>
<div class="col-md-2">
<table class="table table-striped">
<tr>
<th><strong>Sales</strong></th>
</tr>

<?php while($row4=$result3->fetch_assoc()){?>
<tr>
<td><a href="#"><?php 
	$date = $row4["DateCreated"];
    $final=explode(" ",$date);
	echo $final[0];
	?></a></td>
</tr>
<?php }?>
</tr>
</table>
</div>
</div>
</div>
<?php
}
else{
	header("Location: http://localhost/project3/Error.php?invalid_artWorkID");
    die();
}
}
else{
	header("Location: http://localhost/project3/Error.php?invalid_artwork_query_param");
    die();
}
?>
<script>
// Get the modal
$("#modal").on("click", function() {
   $('#imagepreview').attr('src', $('#myImg').attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>