<?php 
require_once('lib/function.php');

$db		=	new login_function();

	if(isset($_SESSION['current_login_admin']))
	{
		$current_login_admin	=	$_SESSION['current_login_admin'];
	}
	
	if(!isset($_SESSION['current_login_admin']))
	{	
		header("location:user_login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Dashboard</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/line-awesome.min.css" rel="stylesheet" />
    <link href="css/themify-icons.css" rel="stylesheet" />
    <link href="css/animate.min.css" rel="stylesheet" />
    <link href="css/toastr.min.css" rel="stylesheet" />
    <link href="css/bootstrap-select.min.css" rel="stylesheet" />
	<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">-->
  
    <!-- PLUGINS STYLES-->
    <!-- THEME STYLES-->
    <link href="css/main.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  
  <meta http-equiv="refresh" content="15">
    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <?php include('header.php'); ?>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <?php include('user-side-bar.php'); ?>
        <!-- END SIDEBAR-->
        <div class="content-wrapper" style="background-image:url('images/back.jpg'); background-size:100% 100%;">
            <!-- START PAGE CONTENT-->
       <?php
		$c_date	=	date("Y-m-d");
		if(isset($_POST['s_date']))	
		{
			$c_date	=	$_POST['s_date'];
			$_SESSION['s_date']	=	$c_date;
		}
		else if(isset($_SESSION['s_date']))
		{
			$c_date	=	$_SESSION['s_date'];
		}
	   ?>
	
	   
	   <div style="font-size:20px; color:white; text-align:center; font-weight:bold; margin-top:15px;">
	   <span style="color:yellow;">User - <?php echo $current_login_admin;?></span><br />
	   Bookings For Date : <?php echo $c_date; ?>
	   
	      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="font-size:15px;">
		<input type="date" name="s_date" value="<?php echo $c_date; ?>" />
		<input type="submit" name="date_s_btn" value="SEARCH" />
	   </form>
	   </div>
	   
	   <div style="border:1px solid #FFF; margin-top:25px;">
		<h3 style="font-size:20px; background-color:#FFFCCC; padding:5px;	 text-align:center; font-weight:bold; margin-top:15px;">Refueled Vehicles</h3>
		
<?php
			
			$std_data = $db->get_all_booking_from_today_date_completed($c_date);
			
			if(!empty($std_data))
			{
				$counter =0;
				foreach($std_data as $record)
				{ 
					$id =  $std_data[$counter][0];
                    $user_id =  $std_data[$counter][1];
					$charging_point			=	$std_data[$counter][2];
					$booking_date	      =	$std_data[$counter][3];
					$booking_time	=	$std_data[$counter][4];
					$status			=	$std_data[$counter][5];
					
					$date=$std_data[$counter][6];
					$time=$std_data[$counter][7];
					
					
					$station_name =  "";
					$primary_contact =	"";
					$city	=  "";
					$state   = "";
					$country =  "";
					$pincode  = "";
					$upadate_data = array();
					$upadate_data = $db->get_charging_point_from_id($charging_point);
					
					if(!empty($upadate_data))
					{
						$station_name =  $upadate_data[1];
						$primary_contact =	$upadate_data[3];
						$city	=  $upadate_data[5];
						$state   = $upadate_data[6];
						$country =  $upadate_data[7];
						$pincode  = $upadate_data[8];
					}
		?>
		<div style="padding:0px 10px 0px 10px; background-color:white; margin:10px; color:white; display:inline-table; text-align:center; border:1px dashed red; font-weight:bold; border-radius:15px;">
	
		<img src="images/green.jpg" style="height:100px;" />
	
		<br />
		<span style="color:red; font-weight:bold; font-size:18px;"><?php echo $counter+1; ?></span>
		<span style="color:#333;">-<?php echo $user_id; ?></span>
		<br />
		
		</div>

           <?php
					$counter++;
				}
			}
			else
			{
			?>
			<div style="color:white; text-align:center;">No vehicle refilled</div>
			<?php
			}
			?>		
			
			
			<h3 style="font-size:20px; background-color:#FFFCCC; padding:5px;	 text-align:center; font-weight:bold; margin-top:15px;">Vehicles In Queue</h3>
			
			<div style="color:white; text-align:center; font-style:italic;">Note : Consider Approx time for CNG refill is 15 to 20 mins. & 30 mint for EV Charging</div>
			
			 <?php
			$std_data = $db->get_all_booking_from_today_date($c_date);
			
			if(!empty($std_data))
			{
				$counter =0;
				foreach($std_data as $record)
				{ 
					$id =  $std_data[$counter][0];
                    $user_id =  $std_data[$counter][1];
					$charging_point			=	$std_data[$counter][2];
					$booking_date	      =	$std_data[$counter][3];
					$booking_time	=	$std_data[$counter][4];
					$status			=	$std_data[$counter][5];
					
					$date=$std_data[$counter][6];
					$time=$std_data[$counter][7];
					
					
					$station_name =  "";
					$primary_contact =	"";
					$city	=  "";
					$state   = "";
					$country =  "";
					$pincode  = "";
					$upadate_data = array();
					$upadate_data = $db->get_charging_point_from_id($charging_point);
					
					if(!empty($upadate_data))
					{
						$station_name =  $upadate_data[1];
						$primary_contact =	$upadate_data[3];
						$city	=  $upadate_data[5];
						$state   = $upadate_data[6];
						$country =  $upadate_data[7];
						$pincode  = $upadate_data[8];
					}
		?>
		<div style="padding:0px 10px 0px 10px; background-color:white; margin:10px; color:white; display:inline-table; text-align:center; border:1px dashed red; font-weight:bold; border-radius:15px;">
		<?php
			if($user_id==$current_login_admin)
			{
		?>
		<img src="images/blue.jpg" style="height:100px;" />
		<?php
			}
			else
			{
		?>
		<img src="images/red.png" style="height:100px;" />
		<?php		
			}
		?>
		<br />
		<span style="color:red; font-weight:bold; font-size:18px;"><?php echo $counter+1; ?></span>
		<span style="color:#333;">-<?php echo $user_id; ?></span>
		<br />
		
		</div>

           <?php
					$counter++;
				}
			}
			else
			{
			?>
			<div style="color:white; text-align:center;">No vehicle booking to refill</div>
			<?php
			}
			?>
	   </div>
	   
            <!-- END PAGE CONTENT-->
            <?php include('footer.php'); ?>
        </div>
    </div>
    <!-- START SEARCH PANEL-->
    <?php //include('search.php'); ?>
    <!-- END SEARCH PANEL-->
    <!-- BEGIN THEME CONFIG PANEL-->
    
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- New question dialog-->
    
    <!-- End New question dialog-->
    <!-- QUICK SIDEBAR-->
    <?php //include('right-side-bar.php'); ?>
    <!-- END QUICK SIDEBAR-->
    <!-- CORE PLUGINS-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/metisMenu.min.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script src="js/idle-timer.min.js"></script>
    <script src="js/toastr.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <!-- CORE SCRIPTS-->
    <script src="js/app.min.js"></script>
    <!-- PAGE LEVEL SCRIPTS-->
</body>

</html>