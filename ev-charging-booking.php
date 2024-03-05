<?php 
require_once('lib/function.php');

$db=new login_function();

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
	// $station_name			=	"";
	// $person_name		=	"";
	// $primary_contact	=	"";
	// $c_email			=	"";
	// $city ="";
	// $state="";
	// $country="";
	// $pincode="";
	// $latitude="";
	// $longitutde="";
	// $open_time="";
	// $close_time="";
	// $user_id="";
	// $password			=	"";
	// $logo				=	"";
		$user_id="";
  $charging_point ="";
  $booking_date="";
  $booking_time="";
  $status="";
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
    $user_id 	 = $_SESSION['current_login_admin'];
    $charging_point  	 = $_POST['charging_point'];
    $booking_date  	 = $_POST['booking_date'];
    $booking_type  	 = $_POST['booking_type'];
 
		$valid_formats = array("jpg","png","gif","bmp","jpeg","pdf","JPEG","JPG","BMP","PNG","GIF","PDF");
	
		if($flag==0)
		{
			$db->add_ev_booking($user_id ,$charging_point,$booking_date,$booking_type);
			$succ_flag = 1 ;
		}
		
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>EV charging booking</title>
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
<?php include('user-side-bar.php'); ?>
<div class="content-wrapper">
    <div class="row" style="padding:0px; margin:0px; margin-top:15px; border-radius:15px;">
				<?php
					if($succ_flag == 1)
					{
					?>
					<div class="alert alert-success">
						Booking Successful... Your Booking Number is 						
						<?php
							echo $count_of_booking = $db->get_count_of_book($booking_date);
						?>
						
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
			<div class="ibox-title"><i class="fas fa-user-tie" style="margin-right:10px;"></i>EV CHARGING BOOKING</div>
		</div>
		
		<div class="ibox-body">
			<div class="row">
				
				<div class="col-sm-12 col-md-12 col-lg-12 form-group mb-12">
					<label class="form-group mb-4 set-row label_marg"><b>Charging Point</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-user"></i></span>
						<select name="charging_point" class="form-control form-control-air">
						<option value="Select">Select</option>
						
							
			<?php
			$report_details = $db->get_charging_points_records();
			if(!empty($report_details))
			{
				$counter =0;
				foreach($report_details as $record)
				{
					$id				=	$report_details[$counter][0];
					$station_name	=	$report_details[$counter][1];
			?>
	<option value="<?php echo $id; ?>"><?php echo $station_name; ?></option>
			<?php			
							
					$counter++;
				}
			}
			?>
			
							
						</select>
					</div>
				</div>
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Booking For</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-user"></i></span>
						<select name="booking_type" class="form-control form-control-air">
							<option value="Select">Select</option>
							<option value="CNG">CNG</option>
							<option value="EV Charging">EV Charging</option>
						</select>
					</div>
				</div>
				
				<div class="col-sm-6 col-md-6 col-lg-6 form-group mb-6">
					<label class="form-group mb-4 set-row label_marg"><b>Booking Date</b></label>
					<div class="input-group-icon input-group-icon-left  set-row">
						<span class="input-icon input-icon-left"><i class="fas fa-user"></i></span>
						<input type="date" name="booking_date" class="form-control form-control-air" value="<?php echo $booking_date ?>" placeholder="Enter Contact Person Name"  required />
					</div>
				</div>
			
				<div class="col-sm-12 form-group mb-12" style="text-align:center; padding-left:0px; padding-right:0px; padding-top:20px;">
					<div class="col-sm-4 form-group mb-4" style="margin:auto;">
						<button class="btn btn-pink btn-air" type="submit" name="add" style="width:100%;">SAVE DETAILS</button>
					</div>
				</div>
			</div>
			<center><a href="ev-booking-report.php" style="color:red;font-weight:bold;">Back To List</a></center>
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