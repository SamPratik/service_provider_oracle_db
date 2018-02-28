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
    
    <?php
    if(!empty($_SESSION)) {
		if($_SESSION["flag"] == "customer") {
	?>
    
    <li class="active"><a href="home.php">Home</a></li>
    <li><a href="customerProfile.php" style="color:white; font-size:20px; margin-left: 650px; margin-top:3px;">Profile</a></li>
    <li><a href="customerComplain.php" style="color:white; font-size:20px;margin-top:3px;">Complain</a></li>
    
    <?php
		}//-------if(!empty($_SESSION))-------
	}//----------if($_SESSION["flag"] == "customer")---------
	?>
    
  <?php if(empty($_SESSION)) { ?>
  
    <ul class="nav navbar-nav navbar-right">
      <li><a href="custReg.php" style="font-size:20px">Customer Registration</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size:20px">Worker Registration
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="driverReg1.php">Driver</a></li>
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
      
		  <?php if($_SESSION["flag"] == "customer") { ?>
              <li><a href="logout.php" 
              style="font-size:20px; color:white;"><span class="glyphicon glyphicon-log-in" ></span> Logout</a></li>
          <?php } ?> 
          
          <?php if($_SESSION["flag"] == "accountant") { ?>
              <li style=" margin-left: 860px;"><a href="logout.php" 
              style="font-size:20px; color:white;"><span class="glyphicon glyphicon-log-in" ></span> Logout</a></li>
          <?php } ?> 
          
          <?php if($_SESSION["flag"] == "manager") { ?>
              <li style=" margin-left: 860px;"><a href="logout.php" 
              style="font-size:20px; color:white;"><span class="glyphicon glyphicon-log-in" ></span> Logout</a></li>
          <?php } ?> 
      
      <?php } ?><!----------if(!empty($_SESSION))------->
      
    </ul>
  </div>
</nav>


</div>











