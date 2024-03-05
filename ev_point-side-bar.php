<style>
.table-responsive
{
	font-size:11px !important;
}
tr th
{
	background-color:#DE1559 !important;
	color:#FFFFFF !important;
	font-size:12px;
}
tr td
{
	color:#000000 !important;
	font-size:12px;
}
.company_logo
{
	color:#DAAADB !important;
	font-size:12px !important;
	width:200px !important;
}
.company_logo:hover
{
	text-decoration:underline;
	color:#98E0AD !important;
}
.label_marg
{
	margin-bottom:4px !important;
	font-size:12px;
	color:#232B99;
	text-transform:uppercase;
}
.form-control
{
	color:#333 !important;
	text-transform:uppercase;
}
.ibox-title
{
	font-size:22px !important;
	color:#DE1559 !important;
}
.content-wrapper
{
	padding-top:65px !important;
	background-image:url('images/back6.jpg');
	background-size:100% 100%;
	background-repeat: no-repeat;
	min-height:1000px !important;
}
.ibox .ibox-head {
	border-bottom: 1px dotted #f75a5f !important;
}
.mb-4
{
	margin-bottom:4px !important;
	font-size:12px;
	color:#232B99;
}
.mb6
{
	margin-bottom:4px !important;
	font-size:12px;
	color:red;
}
hr 
{
	
	border-bottom: 1px dotted #232B99 !important;

}
</style>
<header class="header">
	<div class="page-brand" style="background-color:#000;">
		<a href="index.html">
			<span class="brand" style="font-size:20px;">EV-Point</span>
			<span class="brand"></span>
		</a>
	</div>
	<div class="flexbox flex-1">
		<!-- START TOP-LEFT TOOLBAR-->
		<ul class="nav navbar-toolbar">
			<li>
				<a class="nav-link sidebar-toggler js-sidebar-toggler" href="javascript:;">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
			</li>
			
		</ul>
		
	</div>
</header>
<nav class="page-sidebar" id="sidebar" style="background-color:#333333;">
	<div id="sidebar-collapse">
		<ul class="side-menu metismenu">
		    <li>
				<a href="ev-point-dashboard.php"><i class="sidebar-item-icon fas fa-home"></i>
				<span class="nav-label">Dashboard</span></a>
			</li>
			 <li>
			 <?php
				$update_id = $db->get_id_from_login_mob_no($_SESSION['current_login_admin']);
			 ?>
				<a href="ev-profile.php?update_id=<?php echo $update_id; ?>"><i class="sidebar-item-icon far fa-arrow-alt-circle-right"></i>
				<span class="nav-label">Profile</span></a>
			</li>
			<li>
				<a href="ev-change-password.php"><i class="sidebar-item-icon far fa-arrow-alt-circle-right"></i>
				<span class="nav-label">Change Password</span></a>
			</li>
		
			<li>
                        <a href="ev-point-login.php?logout"><i
                                    class="sidebar-item-icon far fa-arrow-alt-circle-right"></i>
                              <span class="nav-label">Logout</span></a>
                  </li>
		</ul>
	</div>
</nav>