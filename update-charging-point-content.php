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
		
	//$cust_name="";
	
	
	if(!isset($_SESSION['current_login_admin']))
	{
		header("Location:/index.php");
	}
	if(isset($_SESSION['current_login_admin']))
	{
		$email	=	$_SESSION['current_login_admin'];
	}
	if(isset($_POST['add']))
	{
		$station_name  	 = $_POST['station_name'];
		$person_name = $_POST['person_name'];
		$primary_contact	 		 = $_POST['primary_contact'];
		$c_email		 = $_POST['c_email'];
		$city		 = $_POST['city_name'];
		$state        = $_POST['state'];
		$country = $_POST['country'];
		$pincode         = $_POST['pincode'];
		
		$latitude       = $_POST['latitude'];
		$longitutde     = $_POST['longitutde'];
		$open_time      = $_POST['open_time'];
		$close_time     = $_POST['close_time'];
		$user_id        = $_POST['user_id'];
		$password	 	= $_POST['password'];
		
		if(strlen($primary_contact)!=10)
		{
			
			$contact_no_error="Please Enter 10 Digit Mobile Number";
			$flag = 1;
		}
		
		
			/*if(!is_numeric($primary_contact))
		{
			$contact_no_error	=	"Please enter numeric contact no";
			$flag				=	1;
		}
		else if(strlen($primary_contact)<10 OR strlen($primary_contact)>10)
		{
			$contact_no_error	=	"Please enter valid 10 digit contact no";
			$flag				=	1;
		}
		if(!is_numeric($other_contact))
		{
			$contact_no_error	=	"Please enter numeric contact no";
			$flag				=	1;
		}
		else if(strlen($other_contact)<10 OR strlen($other_contact)>10)
		{
			$contact_no_error	=	"Please enter valid 10 digit contact no";
			$flag				=	1;
		}*/
		$valid_formats = array("jpg","png","gif","bmp","jpeg","pdf","JPEG","JPG","BMP","PNG","GIF","PDF");
	
		/*if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{	
			//$name 				= 	$_FILES['logo']['name'];
			//$size 				= 	$_FILES['logo']['size'];

			if(strlen($name))
				{				
					list($txt, $ext) = explode(".", $name);
					
					if(in_array($ext,$valid_formats))
					{
						$files	=	array();

						function generateRandomString4($length = 10) {
							$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
							$charactersLength = strlen($characters);
							$randomString = '';
							for ($i = 0; $i < $length; $i++) 
							{
								$randomString .= $characters[rand(0, $charactersLength - 1)];
							}
							return $randomString;
						}
						
						$current_random_string = generateRandomString4();
						
						$logo = $current_random_string.".".strtolower($ext);						

						$tmp = $_FILES['logo']['tmp_name'];
						
						$img_Dir = "logo/";
						
						if(!file_exists($img_Dir))
						{
							mkdir($img_Dir);
						}
						
						if(move_uploaded_file($tmp,$img_Dir.$logo))
						{
							
						}
						else
						{
							$image_error4	=	"failed" ;
							$flag				=	1;
						}	
					}
					else
					{
						$image_error4	= "Invalid file format";
						$flag				=	1;	
					}	
				}	
		}*/
		if($flag==0)
		{
			$db->update_my_story_content($station_name,$person_name,$primary_contact, $c_email ,$city,$state,$country,  $pincode, $latitude ,$longitutde , $open_time,$close_time,$user_id , $password	,$update_id);
			$succ_flag = 1 ;
		}
		
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
<?php include('side-bar.php'); ?>
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
			<div class="ibox-title"><i class="fas fa-user-tie" style="margin-right:10px;"></i>UPDATE CHARGING POINTS</div>
		</div>
		
		<div class="ibox-body">
			<div class="row">
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Charging Station Name</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-user"></i></span>
						<input type="text" name="station_name" class="form-control form-control-air" value="<?php echo $station_name; ?>" placeholder="Enter Charging Station Name"  required />
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Contact Person Name</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-user"></i></span>
						<input type="text" name="person_name" class="form-control form-control-air" value="<?php echo $person_name ?>" placeholder="Enter Contact Person Name"  required />
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Contact Person Mobile Number</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-phone"></i></span>
						<input type="number" name="primary_contact" class="form-control form-control-air" value="<?php echo $primary_contact; ?>" placeholder="Enter Contact Person Mobile Number"   required />
						<span style="color:red;"><?php echo $contact_no_error; ?></span>
					</div>
				</div>
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Enter Email Id</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-info"></i></span>
						<input type="email" name="c_email" class="form-control form-control-air" value="<?php echo $c_email; ?>" placeholder="Enter Email ID"   />
					</div>
				</div>
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>City</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-building"></i></span>
						<input type="text" name="city_name" class="form-control form-control-air" value="<?php echo $city; ?>" name="project_name" placeholder="Enter City Name"   />
					</div>
				</div>
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>State</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-building"></i></span>
						<input type="text" name="state" class="form-control form-control-air" value="<?php echo $state; ?>" name="address" placeholder="State"   />
					</div>
				</div>
				 
				 <div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Country </b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-phone"></i></span>
						<input type="text" name="country" class="form-control form-control-air" value="<?php echo $country; ?>" placeholder="Enter Country Name"   />
					</div>
				</div>
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Pin Code</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-info"></i></span>
						<input type="text" name="pincode" class="form-control form-control-air" value="<?php echo $pincode; ?>" placeholder="Enter Pin Code"   />
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Latitude</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-info"></i></span>
						<input type="text" name="latitude" class="form-control form-control-air" value="<?php echo $latitude; ?>" placeholder="Enter Latitude"   />
					</div>
				</div>
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Longitude</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-info"></i></span>
						<input type="text" name="longitutde" class="form-control form-control-air" value="<?php echo $longitutde; ?>" placeholder="Enter Longitude"   />
					</div>
				</div>
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Open Time</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-info"></i></span>
						<input type="text" name="open_time" class="form-control form-control-air" value="<?php echo $open_time; ?>" placeholder="Enter Open Time"   />
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Close Time</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-info"></i></span>
						<input type="text" name="close_time" class="form-control form-control-air" value="<?php echo $close_time; ?>" placeholder="Enter Close Time"   />
					</div>
				</div>
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>User ID</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-info"></i></span>
						<input type="text" name="user_id" class="form-control form-control-air" value="<?php echo $user_id; ?>" placeholder="Enter User ID"   />
					</div>
				</div>
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Password</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-address-book"></i></span>
						<input type="password" name="password" class="form-control form-control-air" value="<?php echo $password; ?>" placeholder="User ID"   />
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
			
				<div class="col-sm-12 form-group mb-12" style="text-align:center; padding-left:0px; padding-right:0px; padding-top:20px;">
					<div class="col-sm-4 form-group mb-4" style="margin:auto;">
						<button class="btn btn-pink btn-air" type="submit" name="add" style="width:100%;">UPDATE DETAILS</button>
					</div>
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