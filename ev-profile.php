<?php 
require_once('lib/function.php');

$db=new login_function();
if(isset($_GET['update_id']))
{
  	$update_id = $_GET['update_id'];
	$_SESSION['update_id']=$update_id;
}
  $update_id =$_SESSION['update_id'];

if(isset($_SESSION['current_login_admin']))
{
	$current_login_admin	=	$_SESSION['current_login_admin'];
}
if(!isset($_SESSION['current_login_admin']))
{	
	header("location:index.php");
}
	
	$flag 				= 	0;
	$contact_no_error	=	"";
	$image_error		=	"";
	$succ_flag 			= 	0;
	//$name				=	"";
	$station_name			=	"";
	$person_name		=	"";
	$primary_contact	=	"";
	$c_email			=	"";
	$city ="";
	$state="";
	$country="";
	$pincode="";
	$latitude="";
	$longitutde="";
	$open_time="";
	$close_time="";
	$user_id="";
	$password			=	"";
	$logo				=	"";
	
	if(!isset($_SESSION['current_login_admin']))
	{
		header("Location:/index.php");
	}
	if(isset($_SESSION['current_login_admin']))
	{
		$email	=	$_SESSION['current_login_admin'];
	}
	
	$upadate_data=array();
	$upadate_data = $db->get_charging_point_from_id($update_id);
	if(!empty($upadate_data))
	{
		$station_name =  $upadate_data[1];
	    $person_name= $upadate_data[2];
	    $primary_contact =	$upadate_data[3];
	    $c_email = $upadate_data[4];
	    $city	=  $upadate_data[5];
		$state   = $upadate_data[6];
		$country =  $upadate_data[7];
	    $pincode  = $upadate_data[8];
	    $latitude        =	$upadate_data[9];
	    $longitutde   = $upadate_data[10];
	    $open_time=  $upadate_data[11];
		$close_time    = $upadate_data[12];
		$user_id   = $upadate_data[13];
	    $password	=  $upadate_data[14];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>EV charging points</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/line-awesome.min.css" rel="stylesheet" />
    <link href="css/themify-icons.css" rel="stylesheet" />
    <link href="css/animate.min.css" rel="stylesheet" />
    <link href="css/toastr.min.css" rel="stylesheet" />
    <link href="css/bootstrap-select.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  
    <!-- THEME STYLES-->
    <link href="css/main.min.css" rel="stylesheet" />
	<link href="datatable/datatables.min.css" rel="stylesheet" />

	<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
	<script src="js/wow.min.js"></script>
	<script>
	function validateForm() {
	  var a = document.forms["myForm"]["customer_name"].value;
	  var c = document.forms["myForm"]["primary_contact"].value;
	 
	 if (a == "") {
		alert("Enter Customer Name");
		return false;
	  }
	 
	  if (c == "") {
		alert("Enter Mobile Number");
		return false;
	  }
	  
	}
	</script>
	

</head>
<body class="fixed-navbar">
  
<div class="page-wrapper" style="min-height:500px;">
<?php include('header.php'); ?>
<?php include('ev_point-side-bar.php'); ?>
<div class="content-wrapper">
<div class="row" style="padding:0px; margin:0px; margin-top:15px; border-radius:15px;">
				<?php
					if($succ_flag == 1)
					{
					?>
					<div class="alert alert-success">

						Registration Successfully.
						</div>
					<?php
					}
					if($succ_flag == 2)
					{
					?>
					<div class="alert alert-warning">

						Failed to Register.
						</div>
					<?php
					}
					?>
<div class="ibox" style="border-radius:5px; padding:7px;">
	 <form class="form-pink" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" name="myForm" onsubmit="return validateForm()" autocomplete="off" enctype="multipart/form-data">
		
		<div class="ibox-head">
			<div class="ibox-title"><i class="fas fa-user-tie" style="margin-right:10px;"></i>Profile</div>
		</div>
		
		<div class="ibox-body">
			<div class="row">
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Charging Station Name</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-user"></i></span>
						<input type="text" name="station_name" class="form-control form-control-air" value="<?php echo $station_name; ?>" placeholder="Enter Charging Station Name"  required readonly />
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Contact Person Name</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-user"></i></span>
						<input type="text" name="person_name" class="form-control form-control-air" value="<?php echo $person_name ?>" placeholder="Enter Contact Person Name"  required readonly />
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Contact Person Mobile Number</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-phone"></i></span>
						<input type="number" name="primary_contact" class="form-control form-control-air" value="<?php echo $primary_contact; ?>" placeholder="Enter Contact Person Mobile Number"  readonly required />
						<span style="color:red;"><?php echo $contact_no_error; ?></span>
					</div>
				</div>
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Enter Email Id</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-info"></i></span>
						<input type="email" name="c_email" class="form-control form-control-air" value="<?php echo $c_email; ?>" readonly placeholder="Enter Email ID"   />
					</div>
				</div>
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>City</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-building"></i></span>
						<input type="text" name="city_name" class="form-control form-control-air" value="<?php echo $city; ?>" readonly name="project_name" placeholder="Enter City Name"   />
					</div>
				</div>
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>State</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-building"></i></span>
						<input type="text" name="state" class="form-control form-control-air" value="<?php echo $state; ?>" readonly name="address" placeholder="State"   />
					</div>
				</div>
				 
				 <div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Country </b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-phone"></i></span>
						<input type="text" name="country" class="form-control form-control-air" value="<?php echo $country; ?>" readonly placeholder="Enter Country Name"   />
					</div>
				</div>
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Pin Code</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-info"></i></span>
						<input type="text" name="pincode" class="form-control form-control-air" value="<?php echo $pincode; ?>" readonly placeholder="Enter Pin Code"   />
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Latitude</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-info"></i></span>
						<input type="text" name="latitude" class="form-control form-control-air" value="<?php echo $latitude; ?>" readonly placeholder="Enter Latitude"   />
					</div>
				</div>
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Longitude</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-info"></i></span>
						<input type="text" name="longitutde" class="form-control form-control-air" value="<?php echo $longitutde; ?>" readonly placeholder="Enter Longitude"   />
					</div>
				</div>
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Open Time</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-info"></i></span>
						<input type="text" name="open_time" class="form-control form-control-air" value="<?php echo $open_time; ?>" readonly placeholder="Enter Open Time"   />
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Close Time</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-info"></i></span>
						<input type="text" name="close_time" class="form-control form-control-air" value="<?php echo $close_time; ?>" readonly placeholder="Enter Close Time"   />
					</div>
				</div>
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>User ID</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-info"></i></span>
						<input type="text" name="user_id" class="form-control form-control-air" value="<?php echo $user_id; ?>" readonly placeholder="Enter User ID"   />
					</div>
				</div>
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Password</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-address-book"></i></span>
						<input type="password" name="password" class="form-control form-control-air" value="<?php echo $password; ?>" readonly placeholder="User ID"   />
					</div>
				</div>
				
				<!--<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Upload Photo</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-upload"></i></span>
						<input class="form-control form-control-air" type="file" name="logo" >
						<span style="color:red;"><?php echo $image_error; ?></span>
					</div>-->
				</div>
			
			
			</div>
			<center><a href="charging-points-report.php" style="color:red;font-weight:bold;">Back To List</a></center>
		</div>
	</form>
	</div>
</div>
</div>

</div>
</div>
<?php include('footer.php'); ?>
</div>
    </div>
    <?php //include('search.php'); ?>
   
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/metisMenu.min.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script src="js/idle-timer.min.js"></script>
    <script src="js/toastr.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
	<script src="datatable/datatables.min.js"></script>
    <script src="js/app.min.js"></script>
	
</body>
</html>