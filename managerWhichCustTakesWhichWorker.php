<?php session_start(); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Service provider</title>
<link href="Assets/css/bootstrap.min.css" rel="stylesheet">
<link href="Assets/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="Assets/fonts/glyphicons-halflings-regular.woff" rel="stylesheet">
</head>

<body style="background: #E4E4F7; margin-left:80px; margin-right:80px">

<div class="row" style="background: #433E3F">
 <h1 style=" font-family:cursive; font-size:35px; color:chocolate">
 <center>SERVICE PROVIDER</center></h1>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
 
    <div class="item active">
      <img src="chef1.jpg" alt="Chania" style="height:350px; width:100%">
    </div>

    <div class="item">
      <img src="slider-img6.jpg" alt="Chania"  style="height:350px; width:100%">
    </div>

    <div class="item">
      <img src="skillsprofile_work_16847_bigstock_Plumber_10442993.jpg.jpg" alt="Flower"  style="height:350px; width:100%">
    </div>

    <div class="item">
      <img src="slider-img4.jpg" alt="Flower"  style="height:350px; width:100%">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>



<div class="row">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  
    <ul class="nav navbar-nav">
    	<?php
      	if(!empty($_SESSION)) {
			if($_SESSION["flag"] == "accountant") {
		?>
      	<li class="active"><a href="accountantLoggedin.php">Home</a></li>
        
   		<?php } ?><!-----if($_SESSION["flag"] == "accountant")------->
    <?php } ?><!-----if(!empty($_SESSION))------->
      
      <?php if(empty($_SESSION)) { ?>
      	<li class="active"><a href="home.php">Home</a></li>
      <?php  ?>
    </ul>
    <?php } ?>
    
    <?php
    if(!empty($_SESSION)) {
		if($_SESSION["flag"] == "manager") {
	?>
    <li class="active"><a href="managerLoggedin.php">Home</a></li>
    
    <?php
		}//-------if(!empty($_SESSION))-------
	}//----------if($_SESSION["flag"] == "manager")---------
	?>
    
  <?php if(empty($_SESSION)) { ?>
  
    <ul class="nav navbar-nav navbar-right">
      <li><a href="custReg.php" style="font-size:20px">Customer Registration</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size:20px">Worker Registration
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="driverReg.php">Driver</a></li>
          <li><a href="plumberReg.php">Plumber</a></li>
          <li><a href="haReg.php">Home Assistance</a></li>
          <li><a href="networkReg.php">Network</a></li>
          <li><a href="sgReg.php">Security Guard</a></li>
          <li><a href="electricianReg.php">Electrician</a></li>
      
        </ul>
      </li>
      
      <?php } ?> <!---------if(empty($_SESSION))-------->
      
      <?php if(empty($_SESSION)) { ?>
      <li class="dropdown">
      	<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size:20px"><span class="glyphicon glyphicon-log-in" > </span>
         Login<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="custLogin.php">Customer</a></li>
          <li><a href="accountantLogin.php">Accountant</a></li>
      	  <li><a href="managerLogin.php">Manager</a></li>
        </ul>
      </li>
      <?php } ?><!----------if(empty($_SESSION))------->
      
      <?php if(!empty($_SESSION)) { ?>
      <li><a href="managerHistory.php" style="font-size:20px; margin-left:750px; color:white; margin-top:3px;">History</a></li>
      <li><a href="logout.php" style="font-size:20px; color:white;"><span class="glyphicon glyphicon-log-in" ></span> Logout</a></li>
      <?php } ?><!----------if(!empty($_SESSION))------->
      
    </ul>
  </div>
</nav>


</div>


    <div class="row">
    
    <div class="col-lg-5" style="float:left;">
    <h1 style="font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; color:#6E0709" ><center>MANAGER</center></h1> 
        <a class="btn btn-block btn-success" href="managerCustomerTookHa.php" style="margin-bottom:10px; font-size:20px "><strong>HOME ASSISTANCE</strong></a>
        <a class="btn btn-block   btn-success" href="managerCustomerTookDriver.php" style="margin-bottom:10px ;font-size:20px"><strong>DRIVER</strong></a>
        <a class="btn btn-block   btn-success" href="sgServiceForm.php" style="margin-bottom:10px ;font-size:20px"><strong>SECURITY GUARD</strong></a>
        <a class="btn btn-block  btn-success" href="hdServiceForm.php" style="margin-bottom:10px ;font-size:20px"><strong>HOME DECORATOR</strong>
        </a>
        <a class="btn btn-block   btn-success" href="networkServiceForm.php" style="margin-bottom:10px ;font-size:20px"><strong>INTERNET SERVICE</strong></a>
         <a class="btn btn-block  btn-success" href="painterServiceForm.php" style="margin-bottom:10px ;font-size:20px"><strong>PAINTER</strong></a>
          <a class="btn btn-block   btn-success" href="electricianServiceForm.php" style="margin-bottom:10px ;font-size:20px"><strong>ELECTRICIAN</strong></a>
    
    </div>
    
    <div class="col-lg-7" style="float:left;">      
    	<img src="slider-img4.jpg" width="624px;" style="margin-top:67px;">
    
    </div>



<div class="row" style="background: #524A4A; color:#FBF8F8; height:200px; float:left; width:1097px;">
<div class="col-lg-6">
<h1 style="font-size: 19px;"><center>ABOUT US</center></h1>
<h2 style="font-size:19px;"><center>Contact:</center> </h2>
</div>
<div class="col-lg-6">
<h2 style="font-size: 19px;"><center>WHY SERVICE PROVIDER IS BEST ?</center></h2>
<h2 style="font-size:19px;"><center>Hotline: </center></h2>
</div>


</div>

<script src="Assets/js/jquery-1.12.0.min.js"></script>
<script src="Assets/js/bootstrap.min.js"></script>


</body>
</html>
