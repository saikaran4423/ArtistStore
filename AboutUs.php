<!DOCTYPE html>
<!-- 
Name: Sai Karan Dasari, Project3 Due Date:11/20/2016
Reference:http://stackoverflow.com/questions/25023199/bootstrap-open-image-in-modal
Reference:http://www.w3schools.com/bootstrap/,https://getbootstrap.com/components/#navbar
-->
<html lang="en">
  <head>
  <meta charset="utf-8"></meta>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
    <title>Strap</title>
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
        <li><a href="default.php">Home </a></li>
        <li class="active"><a href="AboutUs.php">About Us <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Part01_ArtistsDataList.php">Artist Data List(Part 1)</a></li>
            <li><a href="Part02_SingleArtist.php?id=19">Single Artist(Part 2)</a></li>
            <li><a href="Part03_SingleWork.php?id=394">Single Work(Part 3)</a></li>
            <li><a href="Part04_Search.php">Advanced Search(Part 4)</a></li>  
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

<div class="content">
<h1> Welcome to Project 3</h1>
<h3>This is the third Project for Sai Karan Dasari for CSE 5335</h3>
<h3>Due Date: 11/16/2016</h3>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>