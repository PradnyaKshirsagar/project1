<?php 
	require_once("lib/function.php");
	$db = new login_function();
	
	$flag 			= 0;
	$success_msg 	= 0;
	
	if(!isset($_SESSION['current_login_admin']))
	{
		header("Location:index.php");
	}
	if(isset($_SESSION['current_login_admin']))
	{
		$email	=	$_SESSION['current_login_admin'];
	}

	$flag = 0;
	$contact_no_error="";
	$success_msg=0;
	if(!isset($_SESSION['current_login_admin']))
	{
		header("Location:index.php");
	}
	if(isset($_SESSION['current_login_admin']))
	{
		$email	=	$_SESSION['current_login_admin'];
	}
	 if(isset($_GET['delete_id']))
	{
		 $del_id	=	$_GET['delete_id'];
		 $db-> delete_charging_point_info($del_id);
		 $success_msg	=	1;
	}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title> Charging Points Report</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/line-awesome.min.css" rel="stylesheet" />
    <link href="css/themify-icons.css" rel="stylesheet" />
    <link href="css/animate.min.css" rel="stylesheet" />
    <link href="css/toastr.min.css" rel="stylesheet" />
    <link href="css/bootstrap-select.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  
    <!-- PLUGINS STYLES-->
    <!-- THEME STYLES-->
    <link href="css/main.min.css" rel="stylesheet" />
	 <link href="datatable/datatables.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
<style>
.col-md-12
{
	width:100%;
	margin:auto;
	margin-top:20px;
}
table,th
{
	text-align:center;
	text-transform:uppercase;
}
table,td
{
	text-align:left;
	text-transform:uppercase;
}
@media only screen and (max-width: 600px) {
	.col-md-12
	{
		width:100%;
	}
	.alert
	{
		width:100%;
	}
	.side-row
	{
		width:49%;
		display:inline-table;
	}
}
.content-wrapper {
    position: relative;
    background-color: #f2f3fa;
    margin-left: 230px;
    padding: 0 15px 60px 15px;
    -webkit-transition: margin .2s ease-in-out;
    -o-transition: margin .2s ease-in-out;
    transition: margin .2s ease-in-out;
    min-height: 1400px; 
}
.txt
{
	text-align:left;
	color:#232B99;
	font-size:12px;
	margin-right:10px;
	font-weight:bold;
	height:40px;
}
</style>

<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
</head>
<body class="fixed-navbar">

<div class="page-wrapper">

<?php include('header.php'); ?>
<?php include('side-bar.php'); ?>

<div class="content-wrapper">
<div class="page-content fade-in-up">

 <?php 
	if($success_msg == 1)
	{
	?>
	<script type="text/javascript">
		alert("Record Deleted Successfully");
		window.location="charging-points-report.php";
	</script>
<?php 
	} 
	if($success_msg == 2)
	{
	?>
	<script type="text/javascript">
		alert("Registration Approved Successfully.");
	</script>
<?php 
	} 
?>

<div class="ibox" style="border-radius:5px; padding:7px;">

<div class="ibox-body" style="padding:7px; padding-top:0px;">
	
	<div class="ibox-head">
		<div class="ibox-title"><i class="fas fa-user-tie" style="margin-right:10px;"></i>Report</div>
		<a href="add-charging.points.php" class="btn btn-primary btn-air"><i class="fas fa-plus">&nbsp;&nbsp;</i>NEW Charging Points</a>
	</div>
	
	<br />
		
	<div class="flexbox mb-4">
		<div class="input-group-icon input-group-icon-left mr-3">
			<span class="input-icon input-icon-right font-16"><i class="fas fa-search"></i></span>
			<input class="form-control form-control-rounded form-control-solid" id="key-search" type="text" placeholder="Search ...">
		</div>
	</div>
	
<div class="table-responsive row">
	<table class="table table-bordered table-hover" id="example" style="overflow-x:auto;overflow-y:auto;" cellpadding=0 cellspacing=0>
		<thead class="thead-default thead-lg">
			<tr>
			    <th>Sr No</th>
				<th>Station Name</th>
				<th>Person Name</th>
				<th>Contact Number</th>
				<th>Email</th>
				<th>City</th>
				<th>State</th>
				<th>Country</th>
				<th>Pincode</th>
				<th>Latitude</th>
				<th>Longitude</th>
				<th>Open Time</th>
				<th>Close Time</th>
				<th>User ID</th>
				<th>Password</th>
				<th >Date</th>
	            <th >Time</th>
				<th>Action</th>
				<th>Action</th>
            </tr>
		</thead>
		<tbody>
		<?php
			$report_details = $db->get_charging_points_records();
			if(!empty($report_details))
			{
				$counter =0;
				foreach($report_details as $record)
				{
					$id				=	$report_details[$counter][0];
					$station_name	=	$report_details[$counter][1];
					$person_name	=	$report_details[$counter][2];
					$mobile_no	=	$report_details[$counter][3];
					$email        =	$report_details[$counter][4];
					$city = $report_details[$counter][5];
					$state=   $report_details[$counter][6];
					$country			=	$report_details[$counter][7];
					$pin_code		 =	$report_details[$counter][8];
					$latitude	=	$report_details[$counter][9];
					$longitude	=	$report_details[$counter][10];
					$open_time	=	$report_details[$counter][11];
					$close_time	=	$report_details[$counter][12];
					$user_id = $report_details[$counter][13];
					$password=  $report_details[$counter][14];
					$date     =   $report_details[$counter][15];
				   $time  =   $report_details[$counter][16];
					
		?>
			 <tr class="odd gradeX">
				<td><?php echo $counter+1; ?></td>
				<td><?php echo $station_name	; ?></td>
				<td><?php echo $person_name	; ?></td>
				<td><?php echo $mobile_no; ?></td>
				<td><?php echo	$email  	; ?></td>
				<td><?php echo $city; ?></td>
				
				<td><?php echo $state; ?></td>
				<td><?php echo $country; ?></td>
				<td><?php echo $pin_code; ?></td>
				<td><?php echo $latitude	; ?></td>
				<td><?php echo $longitude; ?></td>
				<td><?php echo $open_time	; ?></td>
				<td><?php echo $close_time		; ?></td>
				<td><?php echo $user_id 	; ?></td>
				<td><?php echo $password	; ?></td>
				<td><?php echo $date; ?></td>
				<td><?php echo $time; ?></td>
				
				
				<!--<td>
					<?php if($logo != "")
					{
					?>
					<a href="logo/<?php echo $logo; ?>" target="_blank"><img src="logo/<?php echo $logo; ?>" height="50px" width="50px"></a>
					<?php
					}else
					{
					?>
					<img src="logo/no-image.png" height="50px" width="50px"></a>
					<?php
					}
					?>
				</td>-->
				<td class="center"><a href="update-charging-point-content.php?update_id=<?php echo $id;?>"><i class="far fa-edit" style="color:blue;margin-left:20px;"></a></td>
				<td class="center"><a href="charging-points-report.php?delete_id=<?php echo $id;?>" onclick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"style="color:red; margin-left:20px;"></i></a></td>
			</tr> 
			<?php
				$counter++;
				}
			}else
			{
			?>
				<td colspan="7">No Data Found..</td>
			<?php
			}
			?>
		</tbody> 
	</table> 
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
		
	</div>
</div>

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

<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		
<script>

$( function()  {
		$( "#from_date" ) .datepicker({ dateFormat: 'dd-mm-yy'   }) ;
		$( "#to_date" ) .datepicker({ dateFormat: 'dd-mm-yy'   }) ;
		
}  ) ;
		


</script>
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
<script src="datatable/datatables.min.js"></script>
<script src="js/app.min.js"></script>
<script>
$(function() {
	$('#example').DataTable({
		pageLength: 5,
		fixedHeader: true,
		responsive: true,
		"sDom": 'rtip',
		columnDefs: [{
			targets: 'no-sort',
			orderable: false
		}]
	});

	var table = $('#example').DataTable();
	$('#key-search').on('keyup', function() {
		table.search(this.value).draw();
	});
  
});

</script>


	
    <!-- PAGE LEVEL SCRIPTS-->
</body>

</html>