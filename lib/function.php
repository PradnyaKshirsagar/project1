<?php
 
date_default_timezone_set("Asia/Kolkata");


session_start();

class login_function
{
	private $con;
   
	function __construct()
	{
		$this->con = new mysqli("localhost","root","","ev_charging");
		//mysqli_set_charset($this->con, 'utf8');
	}
	
        function update_note_for_invoice($note_notice,$update_id)
			{							
			    
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				$other_details  =   "";
				if($stmt_insert = $this->con->prepare("UPDATE `invoice` SET `invoice_note`=?,`other_details`=? WHERE `id`=?"))
				{
					$stmt_insert->bind_param("ssi",$note_notice,$other_details,$update_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
	
	function create_services($service)
	{
		if($stmt_select = $this->con->prepare("INSERT INTO `services`(`services`) VALUES (?)"))
		{	
			
			$stmt_insert->bind_param("s",$service);
	
			if($stmt_insert->execute())
			{
				return true;
				
			}
				return false;
		}
		
	}
	
	function get_password_from_user_name($email)
	{
		if($stmt_select = $this->con->prepare("Select `password` from `entry` where `mo_no` = ? "))
		{	
			$stmt_select->bind_param("s",$email);
		
			$stmt_select->bind_result($result_password);
		
			if($stmt_select->execute())
			{
				if($stmt_select->fetch())
				{
					return $result_password;
				}
			}
					return false;
		}
	}
	
	function get_password_from_user_name_admin($email)
	{
		if($stmt_select = $this->con->prepare("Select `password` from `admin` where `admin_name` = ?"))
		{	
			$stmt_select->bind_param("s",$email);
		
			$stmt_select->bind_result($result_password);
		
			if($stmt_select->execute())
			{
				if($stmt_select->fetch())
				{
					return $result_password;
				}
			}
					return false;
		}
	}
	
	function get_password_from_user_name_students($email)
	{
		if($stmt_select = $this->con->prepare("Select `password` from `entry` where `mo_no` = ? "))
		{	
			$stmt_select->bind_param("s",$email);
		
			$stmt_select->bind_result($result_password);
		
			if($stmt_select->execute())
			{
				if($stmt_select->fetch())
				{
					return $result_password;
				}
			}
					return false;
		}
	}
	
	function get_password_for_ev($email)
	{
		if($stmt_select = $this->con->prepare("Select `password` from `add-charging-points` where `mobile_no` = ? "))
		{	
			$stmt_select->bind_param("s",$email);
		
			$stmt_select->bind_result($result_password);
		
			if($stmt_select->execute())
			{
				if($stmt_select->fetch())
				{
					return $result_password;
				}
			}
					return false;
		}
	}
	
	function get_count_of_book($booking_date)
	{
		if($stmt_select = $this->con->prepare("Select COUNT(`id`) from `ev_booking` where `booking_date`=?"))
		{	
			$stmt_select->bind_param("s",$booking_date);
		
			$stmt_select->bind_result($result_password);
		
			if($stmt_select->execute())
			{
				if($stmt_select->fetch())
				{
					return $result_password;
				}
			}
					return false;
		}
	}
	
	function get_registered_contact_no_stud($contact_no)
	{
		if($stmt_select = $this->con->prepare("Select `id` from `internship_students` where `primary_contact_no` = ? AND `logo`='Online Auto Registration'"))
		{	
			$stmt_select->bind_param("s",$contact_no);
		
			$stmt_select->bind_result($result_id);
		
			if($stmt_select->execute())
			{
				if($stmt_select->fetch())
				{
					return $result_id;
				}
			}
					return false;
		}
	}
	
	function get_max_certificate_id()
	{
		if($stmt_select = $this->con->prepare("Select MAX(`certificate_id`) from `internship_students`"))
		{	
			$stmt_select->bind_result($result_id);
		
			if($stmt_select->execute())
			{
				if($stmt_select->fetch())
				{
					return $result_id;
				}
			}
					return false;
		}
	}
	
	function get_password_from_email_id($email)
	{
		if($stmt_select = $this->con->prepare("Select `password` from `ca` where `ca_id` = ? "))
		{
			$stmt_select->bind_param("s",$email);
		
			$stmt_select->bind_result($result_password);
		
			if($stmt_select->execute())
			{
				if($stmt_select->fetch())
				{
					return $result_password;
				}
			}
			return false;
		}
	}
	
	function get_site_name_from_id($id)
	{
		echo $id;
		if($stmt_select = $this->con->prepare("SELECT `office_name` FROM `construction_sites` WHERE `id`=?"))
		{	
			$stmt_select->bind_param("i",$id);
		
			$stmt_select->bind_result($result_office_name);
		
			if($stmt_select->execute())
			{
				if($stmt_select->fetch())
				{
					echo $result_office_name;
					return $result_office_name;
				}
			}
			return false;
		}
	}
	function get_engineer_name_from_id($id)
	{
		if($stmt_select = $this->con->prepare("SELECT `name` FROM `customers` WHERE `id`=?"))
		{	
			$stmt_select->bind_param("i",$id);
		
			$stmt_select->bind_result($result_name);
		
			if($stmt_select->execute())
			{
				if($stmt_select->fetch())
				{
					return $result_name;
				}
			}
			return false;
		}
	}
	
	
	function get_existing_print_id($id)
	{
		if($stmt_select = $this->con->prepare("Select `certificate_id` from `internship_students` where `id` = ? "))
		{	
			$stmt_select->bind_param("i",$id);
		
			$stmt_select->bind_result($result_password);
		
			if($stmt_select->execute())
			{
				if($stmt_select->fetch())
				{
					return $result_password;
				}
			}
					return false;
		}
	}
	
	function get_existing_id_of_engineer_site($engineer,$site)
	{
		if($stmt_select = $this->con->prepare("SELECT `id` FROM `assigned_site` WHERE `site_id`=? AND `engineer_id`=?"))
		{	
			$stmt_select->bind_param("ss",$site,$engineer);
		
			$stmt_select->bind_result($result_id);
		
			if($stmt_select->execute())
			{
				if($stmt_select->fetch())
				{
					return $result_id;
				}
				else
				{
					$stmt_select->error;
				}
			}
				
			return false;
		}
	}
	
	
	function new_customer($name)
	{							
		$date = date("Y-m-d");
		$time = date("H-i-s A");
		if($stmt_insert = $this->con->prepare("INSERT INTO `subject`( `subject_name`, `date`, `time`) VALUES (?,?,?)"))
		{
			$stmt_insert->bind_param("sss",$name,$date,$time);
			
			if($stmt_insert->execute())
			{
				return true;
			}
				return false;
		} 	
	}
	
	function new_site_add($engineer,$site)
	{	
		$date = date("Y-m-d");
		$time = date("H-i-s A");
		if($stmt_insert = $this->con->prepare("INSERT INTO `assigned_site`(`site_id`, `engineer_id`, `date`, `time`) VALUES (?,?,?,?)"))
		{
			$stmt_insert->bind_param("ssss",$engineer,$site,$date,$time);
			
			if($stmt_insert->execute())
			{
				return true;
			}
			else
			{
				echo $stmt_insert->error;
			}
			return false;
		} 	
	}
	
	function new_site_entry($name,$shop_name,$c_email,$address,$primary_contact,$other_contact,$logo,$description_box)
	{							
		$date = date("Y-m-d");
		$time = date("H-i-s A");
		if($stmt_insert = $this->con->prepare("INSERT INTO `construction_sites`(`name`, `office_name`,`email`, `address`, `primary_contact_no`,`other_contact_no` ,`logo`, `description_box`, `date`, `time`) VALUES (?,?,?,?,?,?,?,?,?,?)"))
		{
			$stmt_insert->bind_param("ssssssssss",$name,$shop_name,$c_email,$address,$primary_contact,$other_contact,$logo,$description_box,$date,$time);
			
			if($stmt_insert->execute())
			{
				return true;
			}
				return false;
		} 	
	}
	
	function new_internship_student($name,$shop_name,$c_email,$address,$primary_contact,$other_contact,$logo,$password)
	{							
		$date = date("Y-m-d");
		$time = date("H-i-s A");
		$cert_id = 0;
		if($stmt_insert = $this->con->prepare("INSERT INTO `internship_students`(`name`, `office_name`,`email`, `address`, `primary_contact_no`,`other_contact_no` ,`logo`, `password`, `date`, `time`,`certificate_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?)"))
		{
			$stmt_insert->bind_param("ssssssssssi",$name,$shop_name,$c_email,$address,$primary_contact,$other_contact,$logo,$password,$date,$time,$cert_id);
			
			if($stmt_insert->execute())
			{
				return true;
			}
				return false;
		} 	
	}
	
	
	function get_all_user_information()
	{	
		if($stmt_insert = $this->con->prepare("SELECT `id`, `subject_name`, `date`, `time` FROM `subject`"))
		{	
			$stmt_insert->bind_result($id,$name,$reg_date,$reg_time);
			
			if($stmt_insert->execute())
			{
					$counter	=	0;
					$details	=	array();
				while($stmt_insert->fetch())
				{
					$details[$counter][0]	=	$id;
					$details[$counter][1]	=	$name;
					$details[$counter][2]	=	$reg_date;
					
					$details[$counter][3]	=	$reg_time;
					/*$details[$counter][5]	=	$primary_contact_no;
					$details[$counter][6]	=	$other_contact_no;
					$details[$counter][7]	=	$logo;
					$details[$counter][8]	=	$password;*/
				$counter++;
				}
				if(!empty($details))	
				{
					return $details;
				}
				return false;
			}	
		}
	}
	
	function get_all_site_information()
	{	
		if($stmt_insert = $this->con->prepare("SELECT `id`,`name`, `office_name`,`email`, `address`, `primary_contact_no`, `other_contact_no`,`logo`,`description_box` FROM `construction_sites`"))
		{	
			$stmt_insert->bind_result($id,$name,$office_name,$email,$address,$primary_contact_no,$other_contact_no,$logo,$password);
			
			if($stmt_insert->execute())
			{
					$counter	=	0;
					$details	=	array();
				while($stmt_insert->fetch())
				{
					$details[$counter][0]	=	$id;
					$details[$counter][1]	=	$name;
					$details[$counter][2]	=	$office_name;
					$details[$counter][3]	=	$email;
					$details[$counter][4]	=	$address;
					$details[$counter][5]	=	$primary_contact_no;
					$details[$counter][6]	=	$other_contact_no;
					$details[$counter][7]	=	$logo;
					$details[$counter][8]	=	$password;
					$counter++;
				}
				if(!empty($details))	
				{
					return $details;
				}
				return false;
			}	
		}
	}
	
	function get_all_assigned_sites()
	{	
		if($stmt_insert = $this->con->prepare("SELECT `id`,`site_id`, `engineer_id`, `date`, `time` FROM `assigned_site`"))
		{	
			$stmt_insert->bind_result($id,$site_id,$engineer_id,$date,$time);
			
			if($stmt_insert->execute())
			{
				$counter	=	0;
				$details	=	array();
				
				while($stmt_insert->fetch())
				{
					$details[$counter][0]	=	$id;
					$details[$counter][1]	=	$site_id;
					$details[$counter][2]	=	$engineer_id;
					$details[$counter][3]	=	$date;
					$details[$counter][4]	=	$time;
					
					$counter++;
				}
				if(!empty($details))	
				{
					return $details;
				}
				return false;
			}	
		}
	}
	
	function get_all_interns_student_information()
	{	
		if($stmt_insert = $this->con->prepare("SELECT `id`,`name`, `office_name`,`email`, `address`, `primary_contact_no`, `other_contact_no`,`logo`,`password` FROM `internship_students`"))
		{	
			$stmt_insert->bind_result($id,$name,$office_name,$email,$address,$primary_contact_no,$other_contact_no,$logo,$password);
			
			if($stmt_insert->execute())
			{
					$counter	=	0;
					$details	=	array();
				while($stmt_insert->fetch())
				{
					$details[$counter][0]	=	$id;
					$details[$counter][1]	=	$name;
					$details[$counter][2]	=	$office_name;
					$details[$counter][3]	=	$email;
					$details[$counter][4]	=	$address;
					$details[$counter][5]	=	$primary_contact_no;
					$details[$counter][6]	=	$other_contact_no;
					$details[$counter][7]	=	$logo;
					$details[$counter][8]	=	$password;
					$counter++;
				}
				if(!empty($details))	
				{
					return $details;
				}
				return false;
			}	
		}
	}
	
	function get_update_details()
	{
		if($stmt_insert= $this->con->prepare("SELECT `id`, `customer_name`, `dob`, `contact_no`, `date`, `time` FROM `update_customer`"))
		{
			$stmt_insert->bind_result($id,$name,$dob,$contact_no,$date,$time);
			if($stmt_insert->execute())
			{
				$counter	=	0;
				$details	=	array();
				while($stmt_insert->fetch())
				{
					$details[$counter][0]	=	$id;
					$details[$counter][1]	=	$name;
					$details[$counter][2]	=	$dob;
					$details[$counter][3]	=	$contact_no;
					$details[$counter][4]	=	$date;
					$details[$counter][5]	=	$time;
					$counter++;
				}
				if(!empty($details))
				{
					return $details;
				}
				return false;
			}
		}
	}
			function get_all_product_info($id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`name`, `office_name`,`email`, `address`, `primary_contact_no`, `other_contact_no`,`logo`,`password` FROM `customers` where `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$id);
					
					$stmt_insert->bind_result($id,$name,$shop_name,$email,$address,$primary_contact,$other_contact,$logo,$password);

					if($stmt_insert->execute())
					{ 
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{ 
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$name;
							$details[$counter][2]	=	$shop_name;
							$details[$counter][3]	=	$email;
							$details[$counter][4]	=	$address;
							$details[$counter][5]	=	$primary_contact;
							$details[$counter][6]	=	$other_contact;
							$details[$counter][7]	=	$logo;
							$details[$counter][8]	=	$password;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			
			function get_all_site_info($id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`name`, `office_name`,`email`, `address`, `primary_contact_no`, `other_contact_no`,`logo`,`description_box` FROM `construction_sites` where `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$id);
					
					$stmt_insert->bind_result($id,$name,$shop_name,$email,$address,$primary_contact,$other_contact,$logo,$description_box);

					if($stmt_insert->execute())
					{ 
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{ 
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$name;
							$details[$counter][2]	=	$shop_name;
							$details[$counter][3]	=	$email;
							$details[$counter][4]	=	$address;
							$details[$counter][5]	=	$primary_contact;
							$details[$counter][6]	=	$other_contact;
							$details[$counter][7]	=	$logo;
							$details[$counter][8]	=	$description_box;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			
			function get_intern_info_from_id($id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`name`, `office_name`,`email`, `address`, `primary_contact_no`, `other_contact_no`,`logo`,`password`,`date`,`certificate_id` FROM `internship_students` where `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$id);
					
					$stmt_insert->bind_result($id,$name,$shop_name,$email,$address,$primary_contact,$other_contact,$logo,$password,$date,$certificate_id);

					if($stmt_insert->execute())
					{ 
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{ 
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$name;
							$details[$counter][2]	=	$shop_name;
							$details[$counter][3]	=	$email;
							$details[$counter][4]	=	$address;
							$details[$counter][5]	=	$primary_contact;
							$details[$counter][6]	=	$other_contact;
							$details[$counter][7]	=	$logo;
							$details[$counter][8]	=	$password;
							$details[$counter][9]	=   $date;
							$details[$counter][10]	=   $certificate_id;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			
			function get_all_customer_info($select_id)
			{
				if($stmt_insert = $this->con->prepare("SELECT `id`,`name`, `office_name`,`email`, `address`, `primary_contact_no`, `other_contact_no`,`logo`,`password` FROM `customers` where `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$select_id);
					
					$stmt_insert->bind_result($id,$name,$shop_name,$email,$address,$primary_contact,$other_contact,$logo,$password);

					if($stmt_insert->execute())
					{ 
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{ 
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$name;
							$details[$counter][2]	=	$shop_name;
							$details[$counter][3]	=	$email;
							$details[$counter][4]	=	$address;
							$details[$counter][5]	=	$primary_contact;
							$details[$counter][6]	=	$other_contact;
							$details[$counter][7]	=	$logo;
							$details[$counter][8]	=	$password;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function get_all_contact($contact_id)
			{
				if($stmt_insert = $this->con->prepare("SELECT `id`, `customer_name`, `dob`, `contact_no`, `date`, `time` FROM `update_customer` WHERE `id`=?"))
				{
					$stmt_insert->bind_param("i",$contact_id);
					$stmt_insert->bind_result($id,$customer_name,$dob,$mobile_no,$date,$time);
					if($stmt_insert->execute())
					{
						$counter	=	0;
						$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$customer_name;
							$details[$counter][2]	=	$dob;
							$details[$counter][3]	=	$mobile_no;
							$details[$counter][4]	=	$date;
							$details[$counter][5]	=	$time;
							$counter++;
						}
						if(!empty($details))
						{
							return $details;
						}
						return false;
					}
				}
			}
			function update_product_information($up_id,$name,$shop_name,$email,$address,$primary_contact,$other_contact,$password)
			{
				$date = date("Y-m-d");
				$time = date("H:i:s A");
						
				if($stmt_select = $this->con->prepare("update `customers` set `name`= ?,`office_name`= ?,`email`=?,`address`= ?,`primary_contact_no`= ? ,`other_contact_no` = ?,`password` = ? where `id` = ?"))
				{
					$stmt_select->bind_param("sssssssi",$name,$shop_name,$email,$address,$primary_contact,$other_contact,$password,$up_id);				
							
					if($stmt_select->execute())
					{					
						return true;
					}
						return false;
				}
				
			}
			
			function update_site_information($up_id,$name,$shop_name,$email,$address,$primary_contact,$other_contact,$password)
			{
				$date = date("Y-m-d");
				$time = date("H:i:s A");
						
				if($stmt_select = $this->con->prepare("update `construction_sites` set `name`= ?,`office_name`= ?,`email`=?,`address`= ?,`primary_contact_no`= ? ,`other_contact_no` = ?,`description_box` = ? where `id` = ?"))
				{
					$stmt_select->bind_param("sssssssi",$name,$shop_name,$email,$address,$primary_contact,$other_contact,$password,$up_id);				
							
					if($stmt_select->execute())
					{					
						return true;
					}
						return false;
				}
				
			}
			
			function update_max_certificate_id($update_certificate_id,$i_id)
			{
				$date = date("Y-m-d");
				$time = date("H:i:s A");
						
				if($stmt_select = $this->con->prepare("update `internship_students` set `certificate_id`= ? where `id` = ?"))
				{
					$stmt_select->bind_param("ii",$update_certificate_id,$i_id);				
							
					if($stmt_select->execute())
					{					
						return true;
					}
						return false;
				}
				
			}
			
			
			function update_customer_information($customer_name,$dob,$mobile_no)
			{
				$date = date("Y-m-d");
				$time = date("H:i:s A");
				
				if($stmt_select = $this->con->prepare("INSERT INTO `update_customer`(`customer_name`, `dob`, `contact_no`, `date`, `time`) VALUES (?,?,?,?,?)"))
				{
					$stmt_select->bind_param("sssss",$customer_name,$dob,$mobile_no,$date,$time);
					
					if($stmt_select->execute())
					{
						return true;
					}
					return false;
				}
			}
			function update_contact_info($customer_name,$dob,$mobile_no,$contact_id)
			{
				$date = date("Y-m-d");
				$time = date("H:i:s");
				
				if($stmt_insert = $this->con->prepare("UPDATE `update_customer` SET `customer_name`=?,`dob`=?,`contact_no`=?,`date`=?,`time`=? WHERE `id`=?"))
				{
					$stmt_insert->bind_param("sssssi",$customer_name,$dob,$mobile_no,$date,$time,$contact_id);
					if($stmt_insert->execute())
					{
						return true;
					}
					return false;
				}
			}
			function delete_user_info($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `customers` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function delete_site_info($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `construction_sites` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function delete_assigned_site_info($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `assigned_site` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
						return true;
					}
					return false;
				}
			}
			function delete_interns_student_info($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `internship_students` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function delete_customer($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `update_customer` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function only_customers()
			{
				if($stmt_insert = $this->con->prepare("SELECT `id`, `name` FROM `customers`"))
				{
					$stmt_insert->bind_result($id,$name);
				
					if($stmt_insert->execute())
					{
						$counter	=	0;
						$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$name;
							$counter++;
						}
					if(!empty($details))	
					{
						return $details;
					}
					return false;
					}	
				}
		
			}
			function new_services($customer_name,$service,$p_name,$amount,$status)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("INSERT INTO `customer_services`(`customer_name`, `service`, `project_name`, `amount` ,`status`, `date`, `time`) VALUES (?,?,?,?,?,?,?)"))
				{
					$stmt_insert->bind_param("sssssss",$customer_name,$service,$p_name,$amount,$status,$date,$time);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_all_service_information()
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`customer_name`, `service`, `project_name`,`amount`,`status` FROM `customer_services`"))
				{	
					$stmt_insert->bind_result($id,$customer_name,$service,$p_name,$amount,$status);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$customer_name;
							$details[$counter][2]	=	$service;
							$details[$counter][3]	=	$p_name;
							$details[$counter][4]	=	$amount;
							$details[$counter][5]	=	$status;
					
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function delete_service_info($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `customer_services` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function get_all_service_info($id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`customer_name`, `service`, `project_name`,`amount` FROM `customer_services` where `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$id);
					
					$stmt_insert->bind_result($id,$customer_name,$service,$p_name,$amount);

					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$customer_name;
							$details[$counter][2]	=	$service;
							$details[$counter][3]	=	$p_name;
							$details[$counter][4]	=	$amount;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function update_service_information($up_id,$customer_name,$service,$p_name,$amount)
			{
				$date = date("Y-m-d");
				$time = date("H:i:s A");
						
				if($stmt_select = $this->con->prepare("update `customer_services` set `customer_name`= ?,`service`= ?,`project_name` = ?,`amount`= ? where `id` = ?"))
				{
					$stmt_select->bind_param("ssssi",$customer_name,$service,$p_name,$amount,$up_id);				
							
					if($stmt_select->execute())
					{					
						return true;
					}
						return false;
				}
				
			}
			function add_services($service)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("INSERT INTO `services`(`services`) VALUES (?)"))
				{
					$stmt_insert->bind_param("s",$service);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function only_services()
			{
				if($stmt_insert = $this->con->prepare("SELECT `id`,`services` FROM `services`"))
				{
					$stmt_insert->bind_result($id,$name);
				
					if($stmt_insert->execute())
					{
						$counter	=	0;
						$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$name;
							$counter++;
						}
					if(!empty($details))	
					{
						return $details;
					}
					return false;
					}	
				}
		
			}
			function get_all_service()
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`services` FROM `services`"))
				{	
					$stmt_insert->bind_result($id,$service);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$service;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function get_all_project_details()
			{
				if($stmt_insert=$this->con->prepare("SELECT `id`, `update_title`, `description`, `status`, `completed_by`, `date`, `time` FROM `save_project`"))
				{
					$stmt_insert->bind_result($id,$update_title,$description,$status,$completed_by,$date,$time);
					
					if($stmt_insert->execute())
					{
						$counter	=	0;
						$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0] 	=	$id;
							$details[$counter][1] 	=	$update_title;
							$details[$counter][2] 	=	$description;
							$details[$counter][3] 	=	$status;
							$details[$counter][4] 	=	$completed_by;
							$details[$counter][5] 	=	$date;
							$details[$counter][6] 	=	$time;
							$counter++;
						}
						if(!empty($details))
						{
							return $details;
						}
						return false;
					}
				}
			}
			function get_project_details_by_id($detail_id)
			{
			
				if($stmt_insert= $this->con->prepare("SELECT `id`, `update_title`, `description`, `status`, `completed_by`, `date`, `time` FROM `save_project` WHERE `id`=?"))
				{
					
					$stmt_insert->bind_param("i",$detail_id);
					$stmt_insert->bind_result($id,$update_title,$description,$status,$completed_by,$date,$time);
					
					if($stmt_insert->execute())
					{
						$counter	=	0;
						$details	=	array();
						while($stmt_insert->fetch())
						{
							
							$details[$counter][0] 	=	$id;
							$details[$counter][1] 	=	$update_title;
							$details[$counter][2] 	=	$description;
							$details[$counter][3] 	=	$status;
							$details[$counter][4] 	=	$completed_by;
							$details[$counter][5] 	=	$date;
							$details[$counter][6] 	=	$time;
							$counter++;
						}
						if(!empty($details))
						{
							return $details;
						}
						return false;
					}
				}
			}
			function update_project_details($update_title,$description,$detail_id)
			{
				$date = date("Y-m-d");
				$time = date("H:i:s A");
				$status = "pending";
				$completed_by =	"-";
				if($stmt_insert =$this->con->prepare("UPDATE `save_project` SET `update_title`=?,`description`=?,`status`=?,`completed_by`=?,`date`=?,`time`=? WHERE `id`=?"))
				{
					$stmt_insert->bind_param("ssssssi",$update_title,$description,$status,$completed_by,$date,$time,$detail_id);
					if($stmt_insert->execute())
					{					
						return true;
					}
						return false;
				}
			}
			function delete_registration_record($delete_id)
			{
				if($stmt=$this->con->prepare("DELETE FROM `save_project` WHERE `id`=?"))
				{ 
					$stmt->bind_param("i",$delete_id);
					if($stmt->execute())
					{ 
						return true;
					}
					else
					{
						return false;
					}
				}
			}
			
			function services($id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`services` FROM `services` where `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$id);
					
					$stmt_insert->bind_result($id,$service);

					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$service;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function updates_services($up_id,$service)
			{
				$date = date("Y-m-d");
				$time = date("H:i:s A");
						
				if($stmt_select = $this->con->prepare("update `services` set `services`= ? where `id` = ?"))
				{
					$stmt_select->bind_param("si",$service,$up_id);				
							
					if($stmt_select->execute())
					{					
						return true;
					}
						return false;
				}
				
			}
			function delete_services($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `services` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function fetch_amount($id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`customer_name`,`service`,`amount` FROM `customer_services` where `customer_name` = ?"))
				{	
					$stmt_insert->bind_param("s",$id);
					
					$stmt_insert->bind_result($id,$customer_name,$service,$amount);

					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$customer_name;
							$details[$counter][2]	=	$service;
							$details[$counter][3]	=	$amount;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function fetch_service_name($service)
			{
				if($stmt_select = $this->con->prepare("Select `services` from `services` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$service);
				
					$stmt_select->bind_result($result_service);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_service;
						}
					}
							return false;
				}
			}
			function add_payment_info($service_no,$cust_id,$customer_name,$service,$service_name,$p_name,$amount,$sms,$email,$status)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("INSERT INTO `payment_report`(`services_id`,`cust_id`,`cust_name`, `service_no`, `service_name`,`project_name`,`paid_amount` ,`sms`,`email`, `status`, `date`, `time`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)"))
				{
					$stmt_insert->bind_param("ssssssssssss",$service_no,$cust_id,$customer_name,$service,$service_name,$p_name,$amount,$sms,$email,$status,$date,$time);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_all_payment_information($c_name,$date_to,$date_from,$service)
			{	
				if($service=="select")
				{
					$service ="";
				}
			
				if($stmt_insert = $this->con->prepare("SELECT `id`, `services_id`, `cust_id`, `cust_name`, `service_no`, `service_name`,`project_name`, `opening_amount`, `paid_amount`, `bal_amount`,`status`, `date`, `time` FROM `payment_report` WHERE `cust_name` LIKE '%$c_name%' AND `date` BETWEEN '$date_from' AND '$date_to' AND `service_name` LIKE '%$service%'"))
				{	
					$stmt_insert->bind_result($id,$services_id,$cust_id,$cust_name,$service_no,$service_name,$p_name,$opening_amount,$paid_amount,$bal_amount,$status,$date,$time);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$services_id;
							$details[$counter][2]	=	$cust_id;
							$details[$counter][3]	=	$cust_name;
							$details[$counter][4]	=	$service_no;
							$details[$counter][5]	=	$service_name;
							$details[$counter][6]	=	$p_name;
							$details[$counter][7]	=	$opening_amount;
							$details[$counter][8]	=	$paid_amount;
							$details[$counter][9]	=	$bal_amount;
							$details[$counter][10]	=	$status;
							$details[$counter][11]	=	$date;
							$details[$counter][12]	=	$time;
						
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function delete_payment_info($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `payment_report` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function fetch_cust_name($customer_name)
			{
				if($stmt_select = $this->con->prepare("Select `name` from `customers` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$customer_name);
				
					$stmt_select->bind_result($result_service);
					
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							 return $result_service;
						}
					}
							return false;
				}
			}
			function fetch_cust_id($customer_name)
			{
				if($stmt_select = $this->con->prepare("Select `id` from `customers` where `name` = ? "))
				{	
					$stmt_select->bind_param("s",$customer_name);
				
					$stmt_select->bind_result($result_service);
					
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							 return $result_service;
						}
					}
							return false;
				}
			}
			function fetch_service_name_by_id($service_id)
			{
				if($stmt_select = $this->con->prepare("Select `services` from `services` where `id` = ? "))
				{	
					$stmt_select->bind_param("s",$service_id);
				
					$stmt_select->bind_result($result_service);
					
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							 return $result_service;
						}
					}
							return false;
				}
			}
			function fetch_service_no_by_cust_id($cust_id,$service)
			{
				if($stmt_select = $this->con->prepare("Select `id` from `customer_services` where `customer_name` = ? AND `service` = ?"))
				{	
					$stmt_select->bind_param("ss",$cust_id,$service);
				
					$stmt_select->bind_result($result_id);
					
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							 return $result_id;
						}
					}
							return false;
				}
			}
			
			function get_notice_comment_of_invoice($id)
			{
				if($stmt_select = $this->con->prepare("Select `invoice_note` from `invoice` where `id` = ?"))
				{	
					$stmt_select->bind_param("i",$id);
				
					$stmt_select->bind_result($result_note);
					
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							 return $result_note;
						}
					}
					return false;
				}
			}
			
			
			function add_expenses($expenses,$amount)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("INSERT INTO `expenses_mgt`(`expenses`,`amount`,`date`,`time`) VALUES (?,?,?,?)"))
				{
					$stmt_insert->bind_param("ssss",$expenses,$amount,$date,$time);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_all_expenses($title,$date_from,$date_to)
			{	
				
				if($stmt_insert = $this->con->prepare("SELECT `id`,`expenses`,`amount`,`date` FROM `expenses_mgt` Where `expenses` LIKE '%$title%' AND `date` BETWEEN '$date_from' AND '$date_to'"))
				{	
					$stmt_insert->bind_result($id,$expenses,$amount,$date);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$expenses;
							$details[$counter][2]	=	$amount;
							$details[$counter][3]	=	$date;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function delete_expenses($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `expenses_mgt` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function fetch_exepense_data($id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`expenses`,`amount`,`date` FROM `expenses_mgt` where `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$id);
					
					$stmt_insert->bind_result($id,$expenses,$amount,$date);

					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$expenses;
							$details[$counter][2]	=	$amount;
							$details[$counter][3]	=	$date;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function update_expenses($up_id,$title,$amount)
			{
				$date = date("Y-m-d");
				$time = date("H:i:s A");
						
				if($stmt_select = $this->con->prepare("update `expenses_mgt` set `expenses`= ?,`amount`= ? where `id` = ?"))
				{
					$stmt_select->bind_param("ssi",$title,$amount,$up_id);				
							
					if($stmt_select->execute())
					{					
						return true;
					}
						return false;
				}
				
			}
			function fetch_services($c_id)
			{
				if($stmt_insert = $this->con->prepare("SELECT `id`, `service` FROM `customer_services` Where `customer_name` =?"))
				{
					$stmt_insert->bind_param("s",$c_id);
				
					$stmt_insert->bind_result($id,$services);
				
					if($stmt_insert->execute())
					{
						$counter	=	0;
						$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$services;
							$counter++;
						}
					if(!empty($details))	
					{
						return $details;
					}
					return false;
					}	
				}
		
			}
			function add_to_the_invoice($c_id,$service,$actual_amount,$discount_amount,$comment,$bill_type)
			{	
			    $invoice_note   =    "";
			    $other_details  =   "";
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("INSERT INTO `tmp_invoice`(`customer_id`, `service`, `actual_amount`, `discount_amount`,`comment`,`bill_type`) VALUES (?,?,?,?,?,?)"))
				{ 
					$stmt_insert->bind_param("ssssss",$c_id,$service,$actual_amount,$discount_amount,$comment,$bill_type);
					
					if($stmt_insert->execute())
					{ 
						return true;
					}
						return false;
				} 	
			}
			function change_user_password($email,$password)
			{ 
				$date = date("Y-m-d");
				$time = date("H:i:s A");
			
				if($stmt_select = $this->con->prepare("update `admin` set `password`='".$password."' where `admin_name` = ?"))
				{
					$stmt_select->bind_param("s",$email);				
				
					if($stmt_select->execute())
					{					
						return true;
					}
						return false;
				}
			}
			
			function change_app_user_password($email,$password)
			{ 
				$date = date("Y-m-d");
				$time = date("H:i:s A");
			
				if($stmt_select = $this->con->prepare("update `entry` set `password`='".$password."' where `mo_no` = ?"))
				{
					$stmt_select->bind_param("s",$email);				
				
					if($stmt_select->execute())
					{					
						return true;
					}
						return false;
				}
			}
			function change_app_user_password_ev($email,$password)
			{ 
				$date = date("Y-m-d");
				$time = date("H:i:s A");
			
				if($stmt_select = $this->con->prepare("update `add-charging-points` set `password`='".$password."' where `mobile_no` = ?"))
				{
					$stmt_select->bind_param("s",$email);				
				
					if($stmt_select->execute())
					{					
						return true;
					}
						return false;
				}
			}
			function get_temp_invoice_info()
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`customer_id`,`service`,`actual_amount`,`discount_amount`,`comment`,`bill_type` FROM `tmp_invoice`"))
				{	
					$stmt_insert->bind_result($id,$c_id,$service,$actual_amount,$discount_amount,$comment,$bill_type);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$c_id;
							$details[$counter][2]	=	$service;
							$details[$counter][3]	=	$actual_amount;
							$details[$counter][4]	=	$discount_amount;
							$details[$counter][5]	=	$comment;
							$details[$counter][6]	=	$bill_type;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function delete_invoice($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `tmp_invoice` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function new_employee($full_name,$email,$primary_contact,$address,$gender,$dob,$city,$state,$country,$pincode,$aadhar_no,$photo,$addhar_attachment,$attachment1,$attachment2,$attachment3,$designation,$joining_date,$technology,$salary,$remark,$location)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("INSERT INTO `employees`(`full_name`, `email`, `contact`, `address`, `gender`, `dob`, `city`, `state`, `country`, `pincode`, `aadhar_no`, `id_size_photo`, `aadhar_attachment`, `attachment1`, `attachment2`, `attachment3`, `designation`, `joining_date`, `working_technology`, `salary`, `remark`,`job_location`, `date`, `time`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
				{
					$stmt_insert->bind_param("ssssssssssssssssssssssss",$full_name,$email,$primary_contact,$address,$gender,$dob,$city,$state,$country,$pincode,$aadhar_no,$photo,$addhar_attachment,$attachment1,$attachment2,$attachment3,$designation,$joining_date,$technology,$salary,$remark,$location,$date,$time);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_all_employee_information($name,$emp_id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`full_name`, `email`, `contact`, `address`, `gender`, `dob`, `city`, `state`, `country`, `pincode`, `aadhar_no`, `id_size_photo`, `aadhar_attachment`, `attachment1`, `attachment2`, `attachment3`, `designation`, `joining_date`, `working_technology`, `salary`, `remark`,`job_location` FROM `employees` WHERE `full_name` LIKE '%$name%' AND `id` LIKE '%$emp_id%'"))
				{	
					$stmt_insert->bind_result($id,$full_name,$email,$primary_contact,$address,$gender,$dob,$city,$state,$country,$pincode,$aadhar_no,$photo,$addhar_attachment,$attachment1,$attachment2,$attachment3,$designation,$joining_date,$technology,$salary,$remark,$location);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$full_name;
							$details[$counter][2]	=	$email;
							$details[$counter][3]	=	$primary_contact;
							$details[$counter][4]	=	$address;
							$details[$counter][5]	=	$gender;
							$details[$counter][6]	=	$dob;
							$details[$counter][7]	=	$city;
							$details[$counter][8]	=	$state;
							$details[$counter][9]	=	$country;
							$details[$counter][10]	=	$pincode;
							$details[$counter][11]	=	$aadhar_no;
							$details[$counter][12]	=	$photo;
							$details[$counter][13]	=	$addhar_attachment;
							$details[$counter][14]	=	$attachment1;
							$details[$counter][15]	=	$attachment2;
							$details[$counter][16]	=	$attachment3;
							$details[$counter][17]	=	$designation;
							$details[$counter][18]	=	$joining_date;
							$details[$counter][19]	=	$technology;
							$details[$counter][20]	=	$salary;
							$details[$counter][21]	=	$remark;
							$details[$counter][22]	=	$location;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function delete_employee_info($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `employees` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function get_all_employee_information_by_id($up_id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`full_name`, `email`, `contact`, `address`, `gender`, `dob`, `city`, `state`, `country`, `pincode`, `aadhar_no`, `id_size_photo`, `aadhar_attachment`, `attachment1`, `attachment2`, `attachment3`, `designation`, `joining_date`, `working_technology`, `salary`, `remark`,`job_location` FROM `employees` WHERE `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$up_id);
					
					$stmt_insert->bind_result($id,$full_name,$email,$primary_contact,$address,$gender,$dob,$city,$state,$country,$pincode,$aadhar_no,$photo,$addhar_attachment,$attachment1,$attachment2,$attachment3,$designation,$joining_date,$technology,$salary,$remark,$location);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$full_name;
							$details[$counter][2]	=	$email;
							$details[$counter][3]	=	$primary_contact;
							$details[$counter][4]	=	$address;
							$details[$counter][5]	=	$gender;
							$details[$counter][6]	=	$dob;
							$details[$counter][7]	=	$city;
							$details[$counter][8]	=	$state;
							$details[$counter][9]	=	$country;
							$details[$counter][10]	=	$pincode;
							$details[$counter][11]	=	$aadhar_no;
							$details[$counter][12]	=	$photo;
							$details[$counter][13]	=	$addhar_attachment;
							$details[$counter][14]	=	$attachment1;
							$details[$counter][15]	=	$attachment2;
							$details[$counter][16]	=	$attachment3;
							$details[$counter][17]	=	$designation;
							$details[$counter][18]	=	$joining_date;
							$details[$counter][19]	=	$technology;
							$details[$counter][20]	=	$salary;
							$details[$counter][21]	=	$remark;
							$details[$counter][22]	=	$location;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function update_employee($up_id,$full_name,$email,$primary_contact,$address,$gender,$dob,$city,$state,$country,$pincode,$aadhar_no,$designation,$joining_date,$technology,$salary,$remark,$location)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("Update `employees` set `full_name` = ?, `email` = ?, `contact` = ?, `address` = ?, `gender` = ?, `dob` = ?, `city` = ?, `state` = ?, `country` = ?, `pincode` = ?, `aadhar_no` = ? ,`designation` = ?, `joining_date` = ?, `working_technology` = ?, `salary` = ?, `remark` = ?, `job_location` = ? Where `id` = ?"))
				{
					$stmt_insert->bind_param("sssssssssssssssssi",$full_name,$email,$primary_contact,$address,$gender,$dob,$city,$state,$country,$pincode,$aadhar_no,$designation,$joining_date,$technology,$salary,$remark,$location,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function update_id_photo($up_id)
			{							
				$id_size_photo = "";
				
				if($stmt_insert = $this->con->prepare("Update `employees` set `id_size_photo` = ? Where `id` =?"))
				{
					$stmt_insert->bind_param("si",$id_size_photo,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_id_photo_name_by_id($id)
			{
				if($stmt_select = $this->con->prepare("Select `id_size_photo` from `employees` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function update_id_size_photo_by_id($up_id,$id_size_photo)
			{									
				if($stmt_insert = $this->con->prepare("Update `employees` set `id_size_photo` = ? Where `id` =?"))
				{
					$stmt_insert->bind_param("si",$id_size_photo,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function update_aadhar_photo($up_id)
			{							
				$id_size_photo = "";
				
				if($stmt_insert = $this->con->prepare("Update `employees` set `aadhar_attachment` = ? Where `id` =?"))
				{
					$stmt_insert->bind_param("si",$id_size_photo,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_aadhar_photo_name_by_id($id)
			{
				if($stmt_select = $this->con->prepare("Select `aadhar_attachment` from `employees` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function update_aadhar_photo_by_id($up_id,$id_size_photo)
			{									
				if($stmt_insert = $this->con->prepare("Update `employees` set `aadhar_attachment` = ? Where `id` =?"))
				{
					$stmt_insert->bind_param("si",$id_size_photo,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function update_attachment1_photo($up_id)
			{							
				$id_size_photo = "";
				
				if($stmt_insert = $this->con->prepare("Update `employees` set `attachment1` = ? Where `id` =?"))
				{
					$stmt_insert->bind_param("si",$id_size_photo,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_attachment1_photo_name_by_id($id)
			{
				if($stmt_select = $this->con->prepare("Select `attachment1` from `employees` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function update_attachment1_photo_by_id($up_id,$id_size_photo)
			{									
				if($stmt_insert = $this->con->prepare("Update `employees` set `attachment1` = ? Where `id` =?"))
				{
					$stmt_insert->bind_param("si",$id_size_photo,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function update_attachment2_photo($up_id)
			{							
				$id_size_photo = "";
				
				if($stmt_insert = $this->con->prepare("Update `employees` set `attachment2` = ? Where `id` =?"))
				{
					$stmt_insert->bind_param("si",$id_size_photo,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_attachment2_photo_name_by_id($id)
			{
				if($stmt_select = $this->con->prepare("Select `attachment2` from `employees` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function update_attachment2_photo_by_id($up_id,$id_size_photo)
			{									
				if($stmt_insert = $this->con->prepare("Update `employees` set `attachment2` = ? Where `id` =?"))
				{
					$stmt_insert->bind_param("si",$id_size_photo,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function update_attachment3_photo($up_id)
			{							
				$id_size_photo = "";
				
				if($stmt_insert = $this->con->prepare("Update `employees` set `attachment3` = ? Where `id` =?"))
				{
					$stmt_insert->bind_param("si",$id_size_photo,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_attachment3_photo_name_by_id($id)
			{
				if($stmt_select = $this->con->prepare("Select `attachment3` from `employees` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function update_attachment3_photo_by_id($up_id,$id_size_photo)
			{									
				if($stmt_insert = $this->con->prepare("Update `employees` set `attachment3` = ? Where `id` =?"))
				{
					$stmt_insert->bind_param("si",$id_size_photo,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_employee_name()
			{
				if($stmt_select = $this->con->prepare("Select `id`, `full_name` from `employees` "))
				{	
					$stmt_select->bind_result($id,$full_name);
				
					if($stmt_select->execute())
					{		
						$data = array();
						$counter = 0;
						while($stmt_select->fetch())
						{
							$data[$counter][0] 	=	$id;
							$data[$counter][1] 	=	$full_name;
							$counter ++;
						}if(!empty($data))
						{
							return $data;
						}
					}
							return false;
				}
			}
			function fetch_designation_by_id($id)
			{
				if($stmt_select = $this->con->prepare("Select `designation` from `employees` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function fetch_name_by_id($id)
			{
				if($stmt_select = $this->con->prepare("Select `full_name` from `employees` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function new_experience_letter_data($full_name,$fetch_name,$exp_date,$duration_from,$duration_to,$text1,$text2,$photo)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("INSERT INTO `experience_certificate`(`emp_id`,`emp_name`, `date_of_letter`, `duration_from`, `duration_to`, `text1`, `text2`, `letter_attachment`, `date`, `time`) VALUES (?,?,?,?,?,?,?,?,?,?)"))
				{
					$stmt_insert->bind_param("ssssssssss",$full_name,$fetch_name,$exp_date,$duration_from,$duration_to,$text1,$text2,$photo,$date,$time);
					
					if($stmt_insert->execute())
					{
						return $stmt_insert->insert_id;
					}
						return false;
				} 	
			}
			function fetch_data_by_id($up_id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`emp_id`,`emp_name`, `date_of_letter`, `duration_from`, `duration_to`, `text1`, `text2` FROM `experience_certificate` WHERE `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$up_id);
					
					$stmt_insert->bind_result($id,$emp_id,$emp_name,$date_of_letter,$duration_from,$duration_to,$text1,$text2);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$emp_id;
							$details[$counter][2]	=	$emp_name;
							$details[$counter][3]	=	$date_of_letter;
							$details[$counter][4]	=	$duration_from;
							$details[$counter][5]	=	$duration_to;
							$details[$counter][6]	=	$text1;
							$details[$counter][7]	=	$text2;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function fetch_cerificate_data($emp_id,$emp_name)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`emp_id`, `date_of_letter`, `duration_from`, `duration_to`, `text1`, `text2` FROM `experience_certificate` Where `emp_id` LIKE '%$emp_id%' AND `emp_name` LIKE '%$emp_name%'"))
				{	
					$stmt_insert->bind_result($id,$emp_name,$date_of_letter,$duration_from,$duration_to,$text1,$text2);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$emp_name;
							$details[$counter][2]	=	$date_of_letter;
							$details[$counter][3]	=	$duration_from;
							$details[$counter][4]	=	$duration_to;
							$details[$counter][5]	=	$text1;
							$details[$counter][6]	=	$text2;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function fetch_name_by_id_for_display($id)
			{
				if($stmt_select = $this->con->prepare("Select `full_name` from `employees` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function delete_experience_data($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `experience_certificate` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function update_experience_letter_data($up_id,$full_name,$exp_date,$duration_from,$duration_to,$text1,$text2)
			{	
				if($stmt_insert = $this->con->prepare("Update `experience_certificate` set `emp_name` = ?, `date_of_letter` = ?, `duration_from` = ?, `duration_to` = ?, `text1` = ?, `text2` = ? Where `id` = ?"))
				{
					$stmt_insert->bind_param("ssssssi",$full_name,$exp_date,$duration_from,$duration_to,$text1,$text2,$up_id);
					
					if($stmt_insert->execute())
					{
						return $stmt_insert->insert_id;
					}
						return false;
				} 	
			}
			function fetch_data_by_id_for_display($up_id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`emp_id`,`emp_name`, `date_of_letter`, `duration_from`, `duration_to`, `text1`, `text2` ,`letter_attachment` FROM `experience_certificate` WHERE `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$up_id);
					
					$stmt_insert->bind_result($id,$emp_id,$emp_name,$date_of_letter,$duration_from,$duration_to,$text1,$text2,$letter_attachment);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$emp_id;
							$details[$counter][2]	=	$emp_name;
							$details[$counter][3]	=	$date_of_letter;
							$details[$counter][4]	=	$duration_from;
							$details[$counter][5]	=	$duration_to;
							$details[$counter][6]	=	$text1;
							$details[$counter][7]	=	$text2;
							$details[$counter][8]	=	$letter_attachment;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function update_letter_attachment($up_id)
			{							
				$id_size_photo = "";
				
				if($stmt_insert = $this->con->prepare("Update `experience_certificate` set `letter_attachment` = ? Where `id` =?"))
				{
					$stmt_insert->bind_param("si",$id_size_photo,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_letter_attachment_name_by_id($id)
			{
				if($stmt_select = $this->con->prepare("Select `letter_attachment` from `experience_certificate` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function update_letter_attachment_photo_by_id($up_id,$id_size_photo)
			{									
				if($stmt_insert = $this->con->prepare("Update `experience_certificate` set `letter_attachment` = ? Where `id` =?"))
				{
					$stmt_insert->bind_param("si",$id_size_photo,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function add_salary($full_name,$fetch_name,$payment,$payment_date,$mode,$photo)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("INSERT INTO `salary`(`emp_id`, `emp_name`, `payment`, `payment_date`, `payment_mode`, `attachment`, `date`, `time`) VALUES (?,?,?,?,?,?,?,?)"))
				{
					$stmt_insert->bind_param("ssssssss",$full_name,$fetch_name,$payment,$payment_date,$mode,$photo,$date,$time);
					
					if($stmt_insert->execute())
					{
						return $stmt_insert->insert_id;
					}
						return false;
				} 	
			}
			function get_all_salary_data($emp_id,$emp_name)
			{			
				if($stmt_insert = $this->con->prepare("SELECT `id`,`emp_id`, `emp_name`, `payment`, `payment_date`, `payment_mode`, `attachment` FROM `salary` Where `emp_id` LIKE '%$emp_id%' AND `emp_name` LIKE '%$emp_name%'"))
				{	
					$stmt_insert->bind_result($id,$emp_id,$emp_name,$payment,$payment_date,$payment_mode,$attachment);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$emp_id;
							$details[$counter][2]	=	$emp_name;
							$details[$counter][3]	=	$payment;
							$details[$counter][4]	=	$payment_date;
							$details[$counter][5]	=	$payment_mode;
							$details[$counter][6]	=	$attachment;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function delete_salary_data($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `salary` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function get_all_salary_data_by_id($up_id)
			{			
				if($stmt_insert = $this->con->prepare("SELECT `id`,`emp_id`, `emp_name`, `payment`, `payment_date`, `payment_mode`, `attachment` FROM `salary` Where `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$up_id);
					
					$stmt_insert->bind_result($id,$emp_id,$emp_name,$payment,$payment_date,$payment_mode,$attachment);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$emp_id;
							$details[$counter][2]	=	$emp_name;
							$details[$counter][3]	=	$payment;
							$details[$counter][4]	=	$payment_date;
							$details[$counter][5]	=	$payment_mode;
							$details[$counter][6]	=	$attachment;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function update_salary($up_id,$full_name,$payment,$payment_date,$mode)
			{							
				
				if($stmt_insert = $this->con->prepare("update `salary` set  `emp_name` = ?, `payment` = ?, `payment_date` = ?, `payment_mode` = ? Where `id` = ?"))
				{
					$stmt_insert->bind_param("ssssi",$full_name,$payment,$payment_date,$mode,$up_id);
					
					if($stmt_insert->execute())
					{
						return $stmt_insert->insert_id;
					}
						return false;
				} 	
			}
			function update_payment_attachment($up_id)
			{							
				$id_size_photo = "";
				
				if($stmt_insert = $this->con->prepare("Update `salary` set `attachment` = ? Where `id` =?"))
				{
					$stmt_insert->bind_param("si",$id_size_photo,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_payment_attachment_name_by_id($id)
			{
				if($stmt_select = $this->con->prepare("Select `attachment` from `salary` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function update_payment_attachment_photo_by_id($up_id,$id_size_photo)
			{									
				if($stmt_insert = $this->con->prepare("Update `salary` set `attachment` = ? Where `id` =?"))
				{
					$stmt_insert->bind_param("si",$id_size_photo,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function fetch_payment_by_id($id)
			{
				if($stmt_select = $this->con->prepare("Select `salary` from `employees` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function new_projects($project_name,$languages,$college_name,$fees,$s_name1,$s_email1,$s_contact1,$s_name2,$s_email2,$s_contact2,$s_name3,$s_email3,$s_contact3,$s_name4,$s_email4,$s_contact4,$s_name5,$s_email5,$s_contact5,$r_date)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("INSERT INTO `projects`(`project_name`, `language`, `c_name`, `fees`, `student1_name`, `student1_email`, `student1_contact`, `student2_name`, `student2_email`, `student2_contact`, `student3_name`, `student3_email`, `student3_contact`, `student4_name`, `student4_email`, `student4_contact`, `student5_name`, `student5_email`, `student5_contact`, `reg_date`, `date`, `time`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
				{
					$stmt_insert->bind_param("ssssssssssssssssssssss",$project_name,$languages,$college_name,$fees,$s_name1,$s_email1,$s_contact1,$s_name2,$s_email2,$s_contact2,$s_name3,$s_email3,$s_contact3,$s_name4,$s_email4,$s_contact4,$s_name5,$s_email5,$s_contact5,$r_date,$date,$time);
					
					if($stmt_insert->execute())
					{
						return $stmt_insert->insert_id;
					}
						return false;
				} 	
			}
			function get_all_project_information($p_name,$p_id,$date_from,$date_to)
			{	
				 $date_from	= Date ("Y-m-d", strtotime($date_from));
				 $date_to	= Date ("Y-m-d", strtotime($date_to));				
				
				if($stmt_insert = $this->con->prepare("SELECT `id`,`project_name`, `language`, `c_name`, `fees`, `student1_name`, `student1_email`, `student1_contact`, `student2_name`, `student2_email`, `student2_contact`, `student3_name`, `student3_email`, `student3_contact`, `student4_name`, `student4_email`, `student4_contact`, `student5_name`, `student5_email`, `student5_contact`, `reg_date` FROM `projects` Where `project_name` LIKE '%$p_name%' AND `id` LIKE '%$p_id%' AND `date` BETWEEN '$date_from' AND '$date_to'"))
				{	
					$stmt_insert->bind_result($id,$project_name,$language,$c_name,$fees,$student1_name,$student1_email,$student1_contact,$student2_name,$student2_email,$student2_contact,$student3_name,$student3_email,$student3_contact,$student4_name,$student4_email,$student4_contact,$student5_name,$student5_email,$student5_contact,$reg_date);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$project_name;
							$details[$counter][2]	=	$language;
							$details[$counter][3]	=	$c_name;
							$details[$counter][4]	=	$fees;
							$details[$counter][5]	=	$student1_name;
							$details[$counter][6]	=	$student1_email;
							$details[$counter][7]	=	$student1_contact;
							$details[$counter][8]	=	$student2_name;
							$details[$counter][9]	=	$student2_email;
							$details[$counter][10]	=	$student2_contact;
							$details[$counter][11]	=	$student3_name;
							$details[$counter][12]	=	$student3_email;
							$details[$counter][13]	=	$student3_contact;
							$details[$counter][14]	=	$student4_name;
							$details[$counter][15]	=	$student4_email;
							$details[$counter][16]	=	$student4_contact;
							$details[$counter][17]	=	$student5_name;
							$details[$counter][18]	=	$student5_email;
							$details[$counter][19]	=	$student5_contact;
							$details[$counter][20]	=	$reg_date;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function delete_college_info($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `projects` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function update_experience_certificate_name($emp_id,$full_name)
			{	
				if($stmt_insert = $this->con->prepare("Update `experience_certificate` set `emp_name` = ? Where `emp_id` = ?"))
				{
					$stmt_insert->bind_param("ss",$full_name,$emp_id);
					
					if($stmt_insert->execute())
					{
						return $stmt_insert->insert_id;
					}
						return false;
				} 	
			}
			function update_emp_name_in_salary($emp_id,$full_name)
			{	
				if($stmt_insert = $this->con->prepare("Update `salary` set `emp_name` = ? Where `emp_id` = ?"))
				{
					$stmt_insert->bind_param("ss",$full_name,$emp_id);
					
					if($stmt_insert->execute())
					{
						return $stmt_insert->insert_id;
					}
						return false;
				} 	
			}
			function get_all_project_information_for_display($up_id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`project_name`, `language`, `c_name`, `fees`, `student1_name`, `student1_email`, `student1_contact`, `student2_name`, `student2_email`, `student2_contact`, `student3_name`, `student3_email`, `student3_contact`, `student4_name`, `student4_email`, `student4_contact`, `student5_name`, `student5_email`, `student5_contact`, `reg_date` FROM `projects` Where `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$up_id);
					
					$stmt_insert->bind_result($id,$project_name,$language,$c_name,$fees,$student1_name,$student1_email,$student1_contact,$student2_name,$student2_email,$student2_contact,$student3_name,$student3_email,$student3_contact,$student4_name,$student4_email,$student4_contact,$student5_name,$student5_email,$student5_contact,$reg_date);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$project_name;
							$details[$counter][2]	=	$language;
							$details[$counter][3]	=	$c_name;
							$details[$counter][4]	=	$fees;
							$details[$counter][5]	=	$student1_name;
							$details[$counter][6]	=	$student1_email;
							$details[$counter][7]	=	$student1_contact;
							$details[$counter][8]	=	$student2_name;
							$details[$counter][9]	=	$student2_email;
							$details[$counter][10]	=	$student2_contact;
							$details[$counter][11]	=	$student3_name;
							$details[$counter][12]	=	$student3_email;
							$details[$counter][13]	=	$student3_contact;
							$details[$counter][14]	=	$student4_name;
							$details[$counter][15]	=	$student4_email;
							$details[$counter][16]	=	$student4_contact;
							$details[$counter][17]	=	$student5_name;
							$details[$counter][18]	=	$student5_email;
							$details[$counter][19]	=	$student5_contact;
							$details[$counter][20]	=	$reg_date;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function update_projects($up_id,$project_name,$languages,$college_name,$fees,$s_name1,$s_email1,$s_contact1,$s_name2,$s_email2,$s_contact2,$s_name3,$s_email3,$s_contact3,$s_name4,$s_email4,$s_contact4,$s_name5,$s_email5,$s_contact5,$r_date)
			{	
				if($stmt_insert = $this->con->prepare("Update `projects` set `project_name` = ?, `language` = ?, `c_name` = ?, `fees` = ?, `student1_name` = ?, `student1_email` = ?, `student1_contact` = ?, `student2_name` = ?, `student2_email` = ?, `student2_contact` = ?, `student3_name` = ?, `student3_email` = ?, `student3_contact` = ?, `student4_name` = ?, `student4_email` = ?, `student4_contact` = ?, `student5_name` = ?, `student5_email` = ?, `student5_contact` = ?, `reg_date` = ? Where `id` =?"))
				{
					$stmt_insert->bind_param("ssssssssssssssssssssi",$project_name,$languages,$college_name,$fees,$s_name1,$s_email1,$s_contact1,$s_name2,$s_email2,$s_contact2,$s_name3,$s_email3,$s_contact3,$s_name4,$s_email4,$s_contact4,$s_name5,$s_email5,$s_contact5,$r_date,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_project_name()
			{
				if($stmt_select = $this->con->prepare("Select `id`, `project_name` from `projects` "))
				{	
					$stmt_select->bind_result($id,$full_name);
				
					if($stmt_select->execute())
					{		
						$data = array();
						$counter = 0;
						while($stmt_select->fetch())
						{
							$data[$counter][0] 	=	$id;
							$data[$counter][1] 	=	$full_name;
							$counter ++;
						}
						if(!empty($data))
						{
							return $data;
						}
					}
							return false;
				}
			}
			function add_project_payment($project_id,$project_name,$amount,$date,$sms,$s_email)
			{							
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("INSERT INTO `project_payment`(`project_id`,`project_name`,`amount`,`date`,`sms`,`email`,`time`) VALUES (?,?,?,?,?,?,?)"))
				{
					$stmt_insert->bind_param("sssssss",$project_id,$project_name,$amount,$date,$sms,$s_email,$time);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function fetch_project_name_by_id($project_id)
			{
				if($stmt_select = $this->con->prepare("Select `project_name` from `projects` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$project_id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function get_project_payment_information($pro_name,$date_to,$date_from,$pro_id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`, `project_id`,`project_name`,`amount`,`date`,`time` FROM `project_payment` WHERE `project_name` LIKE '%$pro_name%' AND `date` BETWEEN '$date_from' AND '$date_to' AND `project_id` LIKE '%$pro_id%'"))
				{	
					$stmt_insert->bind_result($id,$project_id,$project_name,$amount,$date,$time);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$project_id;
							$details[$counter][2]	=	$project_name;
							$details[$counter][3]	=	$amount;
							$details[$counter][4]	=	$date;
							$details[$counter][5]	=	$time;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function delete_project_payment_info($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `project_payment` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function get_project_payment_information_for_display($up_id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`, `project_id`,`project_name`,`amount`,`date` FROM `project_payment` WHERE `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$up_id);
					
					$stmt_insert->bind_result($id,$project_id,$project_name,$amount,$date);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$project_id;
							$details[$counter][2]	=	$project_name;
							$details[$counter][3]	=	$amount;
							$details[$counter][4]	=	$date;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function update_project_payment($up_id,$project_id,$project_name,$amount,$date)
			{	
				if($stmt_insert = $this->con->prepare("Update `project_payment` set `project_id` =? ,`project_name` =?,`amount` =?,`date`=? Where `id` =?"))
				{
					$stmt_insert->bind_param("ssssi",$project_id,$project_name,$amount,$date,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function fetch_final_amount($project_id)
			{
				if($stmt_select = $this->con->prepare("Select `fees` from `projects` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$project_id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function check_id_exist_or_not($project_id)
			{
				if($stmt_select = $this->con->prepare("Select `id` from `project_payment` where `project_id` = ? "))
				{	
					$stmt_select->bind_param("s",$project_id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function update_project_records($project_id,$amount)
			{	
				if($stmt_insert = $this->con->prepare("Update `project_payment` set `amount` =? Where `project_id` =?"))
				{
					$stmt_insert->bind_param("ss",$amount,$project_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function fetch_paid_amount($project_id)
			{
				if($stmt_select = $this->con->prepare("Select `amount` from `project_payment` where `project_id` = ? "))
				{	
					$stmt_select->bind_param("s",$project_id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function add_quotation_info($cust_id,$customer_name,$service,$service_name,$comment,$amount,$d_amount,$bill_type)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("INSERT INTO `tmp_quotation`(`cust_id`, `cust_name`, `service_id`, `service_name`, `comment`, `actual_amount`, `discount_amount`, `date`, `time`,`bill_type`) VALUES (?,?,?,?,?,?,?,?,?,?)"))
				{ 
					$stmt_insert->bind_param("ssssssssss",$cust_id,$customer_name,$service,$service_name,$comment,$amount,$d_amount,$date,$time,$bill_type);
					
					if($stmt_insert->execute())
					{ 
						return true;
					}
						return false;
				} 	
			}
			function fetch_cust_name_by_id($c_id)
			{
				if($stmt_select = $this->con->prepare("Select `name` from `customers` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$c_id);
				
					$stmt_select->bind_result($result_service);
					
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							 return $result_service;
						}
					}
							return false;
				}
			}
			function delete_quotation_info($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `tmp_quotation` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function get_all_quotation_information($c_name,$date_to,$date_from,$service)
			{	
				if($service=="select")
				{
					$service ="";
				}
			
				if($stmt_insert = $this->con->prepare("SELECT `id`, `cust_id`, `cust_name`, `service_id`, `service_name`,`comment`, `actual_amount`, `discount_amount`, `date`, `time` FROM `quotation_cart` WHERE `cust_name` LIKE '%$c_name%' AND `date` BETWEEN '$date_from' AND '$date_to' AND `service_name` LIKE '%$service%'"))
				{	
					$stmt_insert->bind_result($id,$cust_id,$cust_name,$service_no,$service_name,$comment,$actual_amount,$discount_amount,$date,$time);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$cust_id;
							$details[$counter][2]	=	$cust_name;
							$details[$counter][3]	=	$service_no;
							$details[$counter][4]	=	$service_name;
							$details[$counter][5]	=	$comment;
							$details[$counter][6]	=	$actual_amount;
							$details[$counter][7]	=	$discount_amount;
							$details[$counter][8]	=	$date;
							$details[$counter][9]	=	$time;
						
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function get_all_quotation_information_by_id($up_id)
			{		
				if($stmt_insert = $this->con->prepare("SELECT `id`, `cust_id`, `cust_name`, `service_id`, `service_name`, `comment`, `actual_amount`, `discount_amount`, `date`, `time`,`bill_type` FROM `quotation_cart` WHERE `transaction_id` = ?"))
				{	
					$stmt_insert->bind_param("s",$up_id);
					
					$stmt_insert->bind_result($id,$cust_id,$cust_name,$service_no,$service_name,$comment,$actual_amount,$discount_amount,$date,$time,$bill_type);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$cust_id;
							$details[$counter][2]	=	$cust_name;
							$details[$counter][3]	=	$service_no;
							$details[$counter][4]	=	$service_name;
							$details[$counter][5]	=	$comment;
							$details[$counter][6]	=	$actual_amount;
							$details[$counter][7]	=	$discount_amount;
							$details[$counter][8]	=	$date;
							$details[$counter][9]	=	$time;
							$details[$counter][10]	=	$bill_type;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			
			function update_logo($up_id)
			{							
				$id_size_photo = "";
				
				if($stmt_insert = $this->con->prepare("Update `customers` set `logo` = ? Where `id` =?"))
				{
					$stmt_insert->bind_param("si",$id_size_photo,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function update_plan_image($up_id)
			{							
				$id_size_photo = "";
				
				if($stmt_insert = $this->con->prepare("Update `construction_sites` set `logo` = ? Where `id` =?"))
				{
					$stmt_insert->bind_param("si",$id_size_photo,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_logo_name_by_id($id)
			{
				if($stmt_select = $this->con->prepare("Select `logo` from `customers` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			
			function get_site_plan_name_by_id($id)
			{
				if($stmt_select = $this->con->prepare("Select `logo` from `construction_sites` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$id);
				
					$stmt_select->bind_result($result_name);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_name;
						}
					}
							return false;
				}
			}
			function update_logo_image_by_id($up_id,$id_size_photo)
			{									
				if($stmt_insert = $this->con->prepare("Update `customers` set `logo` = ? Where `id` =?"))
				{
					$stmt_insert->bind_param("si",$id_size_photo,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function update_plan_image_by_id($up_id,$id_size_photo)
			{									
				if($stmt_insert = $this->con->prepare("Update `construction_sites` set `logo` = ? Where `id` =?"))
				{
					$stmt_insert->bind_param("si",$id_size_photo,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function fetch_projects()
			{
				if($stmt_insert = $this->con->prepare("SELECT `id`, `project_name` FROM `customer_services` "))
				{
					$stmt_insert->bind_result($id,$project_name);
				
					if($stmt_insert->execute())
					{
						$counter	=	0;
						$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$project_name;
							$counter++;
						}
					if(!empty($details))	
					{
						return $details;
					}
					return false;
					}	
				}
		
			}
			function approve_service_status($app_id)
			{
				$status = "show in company profile";
				if($stmt_select = $this->con->prepare("Update `customer_services` set `status`= ? where `id`=?"))
				{
					$stmt_select->bind_param("si",$status,$app_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function pending_service_status($pen_id)
			{
				$status = "don't show in company profile";
				if($stmt_select = $this->con->prepare("Update `customer_services` set `status`= ? where `id`=?"))
				{
					$stmt_select->bind_param("si",$status,$pen_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function get_all_service_information_for_display()
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`customer_name`, `service`, `project_name`,`amount`,`status` FROM `customer_services` Where `project_name` != ' ' AND `status` = 'show in company profile'  ORDER BY `service` DESC"))
				{
					$stmt_insert->bind_result($id,$customer_name,$service,$p_name,$amount,$status);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$customer_name;
							$details[$counter][2]	=	$service;
							$details[$counter][3]	=	$p_name;
							$details[$counter][4]	=	$amount;
							$details[$counter][5]	=	$status;
					
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function fetch_email_by_id($id)
			{
				if($stmt_select = $this->con->prepare("Select `email` from `customers` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function cancel_service_status($pen_id)
			{
				$status = "cancel";
				if($stmt_select = $this->con->prepare("Update `customer_services` set `status`= ? where `id`=?"))
				{
					$stmt_select->bind_param("si",$status,$pen_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function get_all_service_for_display()
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`services` FROM `services` "))
				{	
					$stmt_insert->bind_result($id,$service);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$service;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function get_all_cancel_payment_information($s_id)
			{
				if($stmt_insert = $this->con->prepare("SELECT `id`, `services_id`, `cust_id`, `cust_name`, `service_no`, `service_name`,`project_name`, `opening_amount`, `paid_amount`, `bal_amount`, `date`, `time` FROM `payment_report` Where `services_id` =?"))
				{	
					$stmt_insert->bind_param("s",$s_id);
					
					$stmt_insert->bind_result($id,$services_id,$cust_id,$cust_name,$service_no,$service_name,$p_name,$opening_amount,$paid_amount,$bal_amount,$date,$time);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$services_id;
							$details[$counter][2]	=	$cust_id;
							$details[$counter][3]	=	$cust_name;
							$details[$counter][4]	=	$service_no;
							$details[$counter][5]	=	$service_name;
							$details[$counter][6]	=	$p_name;
							$details[$counter][7]	=	$opening_amount;
							$details[$counter][8]	=	$paid_amount;
							$details[$counter][9]	=	$bal_amount;
							$details[$counter][10]	=	$date;
							$details[$counter][11]	=	$time;
						
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function get_all_service_information_for_cancel_status()
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id` FROM `customer_services` Where `status` ='cancel' "))
				{	
					$stmt_insert->bind_result($id);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;							
					
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function fetch_status($id)
			{
				if($stmt_select = $this->con->prepare("Select `status` from `customer_services` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function fetch_status_by_cust_id($cust_id)
			{
				if($stmt_select = $this->con->prepare("Select `status` from `customer_services` where `customer_name` = ? "))
				{	
					$stmt_select->bind_param("s",$cust_id);
				
					$stmt_select->bind_result($result_id);
					
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							 return $result_id;
						}
					}
							return false;
				}
			}
			function cancel_service_status_in_payment($pen_id)
			{
				$status = "cancel";
				if($stmt_select = $this->con->prepare("Update `payment_report` set `status`= ? where `services_id`=?"))
				{
					$stmt_select->bind_param("ss",$status,$pen_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function fetch_customer_name_by_id($id)
			{
				if($stmt_select = $this->con->prepare("Select `name` from `customers` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function add_to_the_invoice_cart($insert_id,$c_id,$service_id,$actual_total_amount,$discount_total_amount,$comments,$bill_type)
			{							
				
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("INSERT INTO `invoice_cart`(`transaction_id`,`customer_id`, `service`, `actual_amount`, `discount_amount`,`date` ,`time`,`comment`,`bill_type`) VALUES (?,?,?,?,?,?,?,?,?)"))
				{
					$stmt_insert->bind_param("sssssssss",$insert_id,$c_id,$service_id,$actual_total_amount,$discount_total_amount,$date,$time,$comments,$bill_type);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_temp_invoice_info_for_display()
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`customer_id`, `service`,SUM(`actual_amount`),SUM(`discount_amount`), `comment` FROM `tmp_invoice`"))
				{	
					$stmt_insert->bind_result($id,$c_id,$service,$actual_amount,$discount_amount,$comment);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$c_id;
							$details[$counter][2]	=	$service;
							$details[$counter][3]	=	$actual_amount;
							$details[$counter][4]	=	$discount_amount;
							$details[$counter][5]	=	$comment;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function insert_invoice_details($c_id,$actual_amount,$discount_amount,$comment,$bill_type,$max_invoice_no)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("INSERT INTO `invoice`(`customer_id`, `total_amount`, `discount_amount`,`date` ,`time`,`comment`,`bill_type`,`invoice_no`) VALUES (?,?,?,?,?,?,?,?)"))
				{
					$stmt_insert->bind_param("ssssssss",$c_id,$actual_amount,$discount_amount,$date,$time,$comment,$bill_type,$max_invoice_no);
					
					if($stmt_insert->execute())
					{
						return $stmt_insert->insert_id;
					}
						return false;
				} 	
			}
			function fetch_invoice_cart_data_by_cust_id($c_id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`transaction_id`,`customer_id`,`service`,`actual_amount`,`discount_amount`,`comment`,`bill_type` FROM `invoice_cart` Where `transaction_id` = ?"))
				{	
					$stmt_insert->bind_param("s",$c_id);
					
					$stmt_insert->bind_result($id,$t_id,$c_id,$service,$actual_amount,$discount_amount,$comment,$bill_type);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$t_id;
							$details[$counter][2]	=	$c_id;
							$details[$counter][3]	=	$service;
							$details[$counter][4]	=	$actual_amount;
							$details[$counter][5]	=	$discount_amount;
							$details[$counter][6]	=	$comment;
							$details[$counter][7]	=	$bill_type;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function fetch_invoice_id_by_cust_id($c_id)
			{
				if($stmt_select = $this->con->prepare("Select `customer_id` from `invoice` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$c_id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			
			function fetch_invoice_date_by_cust_id($c_id)
			{
				if($stmt_select = $this->con->prepare("Select `date` from `invoice` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$c_id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			
			function fetch_invoice_report($customer_name,$bill_type,$from_date,$to_date)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`customer_id`,`total_amount`,`discount_amount`,`comment`,`bill_type`,`invoice_no` FROM `invoice` WHERE `customer_id` LIKE '%".$customer_name."%'  AND `bill_type` LIKE '%".$bill_type."%'  AND (`date` BETWEEN ? AND ?)"))
				{	
					$stmt_insert->bind_param("ss",$from_date,$to_date);
					$stmt_insert->bind_result($id,$c_id,$actual_amount,$discount_amount,$comment,$bill_type,$invoice_no);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$c_id;
							$details[$counter][2]	=	$actual_amount;
							$details[$counter][3]	=	$discount_amount;
							$details[$counter][4]	=	$comment;
							$details[$counter][5]	=	$bill_type;
							$details[$counter][6]	=	$invoice_no;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function fetch_services_id_by_cust_id($c_id)
			{
				if($stmt_select = $this->con->prepare("Select `service` from `invoice_cart` where `transaction_id` = ? "))
				{	
					$stmt_select->bind_param("s",$c_id);
				
					$stmt_select->bind_result($service);
				
					if($stmt_select->execute())
					{	$count = 0;
						$data = array();
						while($stmt_select->fetch())
						{	
							$data[$count][0] = $service;
							$count++;
						}
						if(!empty($data))
						{
							return $data;
						}
					}
							return false;
				}
			}
			function fetch_invoice_cart_data_by_transaction_id($tran_id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`transaction_id`,`customer_id`,`service`,`actual_amount`,`discount_amount`,`comment`,`bill_type` FROM `invoice_cart` Where `transaction_id` = ?"))
				{	
					$stmt_insert->bind_param("s",$tran_id);
					
					$stmt_insert->bind_result($id,$t_id,$c_id,$service,$actual_amount,$discount_amount,$comment,$bill_type);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$t_id;
							$details[$counter][2]	=	$c_id;
							$details[$counter][3]	=	$service;
							$details[$counter][4]	=	$actual_amount;
							$details[$counter][5]	=	$discount_amount;
							$details[$counter][6]	=	$comment;
							$details[$counter][7]	=	$bill_type;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function delete_invoice_cart($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `invoice_cart` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function delete_main_invoice_cart($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `invoice` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function delete_invoice_cart_data($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `invoice_cart` where `transaction_id`=?"))
				{
					$stmt_select->bind_param("s",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function update_invoice_details($up_id,$c_id,$actual_amount,$discount_amount,$bill_type)
			{	
				if($stmt_insert = $this->con->prepare("Update `invoice` set `customer_id` = ?, `total_amount` = ?, `discount_amount` = ? , `bill_type`=? Where `id` = ?"))
				{						
				
					$stmt_insert->bind_param("ssssi",$c_id,$actual_amount,$discount_amount,$bill_type,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function update_invoice_cart($up_id,$c_id,$service_id,$actual_total_amount,$discount_total_amount)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("update `invoice_cart` set `customer_id` = ?, `service` = ?, `actual_amount` = ?, `discount_amount` = ? Where `transaction_id` = ?"))
				{
					$stmt_insert->bind_param("sssss",$c_id,$service_id,$actual_total_amount,$discount_total_amount,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_temp_invoice_cart_info($update_id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`customer_id`,`service`,`actual_amount`,`discount_amount`,`comment`,`bill_type` FROM `invoice_cart` Where `transaction_id` = ?"))
				{	
					$stmt_insert->bind_param("s",$update_id);
					
					$stmt_insert->bind_result($id,$c_id,$service,$actual_amount,$discount_amount,$comment,$bill_type);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$c_id;
							$details[$counter][2]	=	$service;
							$details[$counter][3]	=	$actual_amount;
							$details[$counter][4]	=	$discount_amount;
							$details[$counter][5]	=	$comment;
							$details[$counter][6]	=	$bill_type;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function get_total_amount_invoice_cart_info($update_id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`customer_id`,`service`,SUM(`actual_amount`),SUM(`discount_amount`) FROM `invoice_cart` Where `transaction_id` = ?"))
				{	
					$stmt_insert->bind_param("s",$update_id);
					
					$stmt_insert->bind_result($id,$c_id,$service,$actual_amount,$discount_amount);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$c_id;
							$details[$counter][2]	=	$service;
							$details[$counter][3]	=	$actual_amount;
							$details[$counter][4]	=	$discount_amount;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function fetch_invoice_data_for_update($id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`transaction_id`, `customer_id`,`service`,`actual_amount`,`discount_amount` FROM `invoice_cart` Where `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$id);
					
					$stmt_insert->bind_result($id,$t_id,$c_id,$service,$actual_amount,$discount_amount);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$t_id;
							$details[$counter][2]	=	$c_id;
							$details[$counter][3]	=	$service;
							$details[$counter][4]	=	$actual_amount;
							$details[$counter][5]	=	$discount_amount;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function fetch_actual_amount_by_id($c_id)
			{
				if($stmt_select = $this->con->prepare("Select `total_amount` from `invoice` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$c_id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function fetch_discount_amount_by_id($c_id)
			{
				if($stmt_select = $this->con->prepare("Select `discount_amount` from `invoice` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$c_id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function update_amount_invoice_details($up_id,$actual_amount,$discount_amount)
			{	
				if($stmt_insert = $this->con->prepare("Update `invoice` set  `total_amount` = ?, `discount_amount` = ? Where `id` = ?"))
				{						
					$stmt_insert->bind_param("ssi",$actual_amount,$discount_amount,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_all_customer_information_for_sms($cust_name,$cust_id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`name`, `office_name`,`email`, `address`, `primary_contact_no`, `other_contact_no`,`logo` FROM `customers` Where `name` LIKE '%$cust_name%' AND `id` LIKE '%$cust_id%' "))
				{	
					$stmt_insert->bind_result($id,$name,$office_name,$email,$address,$primary_contact_no,$other_contact_no,$logo);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$name;
							$details[$counter][2]	=	$office_name;
							$details[$counter][3]	=	$email;
							$details[$counter][4]	=	$address;
							$details[$counter][5]	=	$primary_contact_no;
							$details[$counter][6]	=	$other_contact_no;
							$details[$counter][7]	=	$logo;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function add_data($record,$language,$message)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("INSERT INTO `sms_panel`(`customer_id`, `language`, `message`,`date` ,`time`) VALUES (?,?,?,?,?)"))
				{
					$stmt_insert->bind_param("sssss",$record,$language,$message,$date,$time);
					
					if($stmt_insert->execute())
					{
						return $stmt_insert->insert_id;
					}
						return false;
				} 	
			}
			function get_all_customer_info_for_agreement($id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`name`, `office_name`,`email`, `address`, `primary_contact_no`, `other_contact_no`,`logo` FROM `customers` where `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$id);
					
					$stmt_insert->bind_result($id,$name,$shop_name,$email,$address,$primary_contact,$other_contact,$logo);

					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$name;
							$details[$counter][2]	=	$shop_name;
							$details[$counter][3]	=	$email;
							$details[$counter][4]	=	$address;
							$details[$counter][5]	=	$primary_contact;
							$details[$counter][6]	=	$other_contact;
							$details[$counter][7]	=	$logo;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function add_bank_details($b_name,$acc_name,$acc_no,$ifsc_code,$branch_name,$other_info)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("INSERT INTO `bank_details`(`bank_name`, `account_name`,`account_no`, `ifsc_code`, `branch_name`,`other_info`, `date`, `time`) VALUES (?,?,?,?,?,?,?,?)"))
				{
					$stmt_insert->bind_param("ssssssss",$b_name,$acc_name,$acc_no,$ifsc_code,$branch_name,$other_info,$date,$time);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_all_bank_information()
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`bank_name`, `account_name`,`account_no`, `ifsc_code`, `branch_name`,`other_info` FROM `bank_details`"))
				{	
					$stmt_insert->bind_result($id,$bank_name,$account_name,$account_no,$ifsc_code,$branch_name,$other_info);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$bank_name;
							$details[$counter][2]	=	$account_name;
							$details[$counter][3]	=	$account_no;
							$details[$counter][4]	=	$ifsc_code;
							$details[$counter][5]	=	$branch_name;
							$details[$counter][6]	=	$other_info;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function delete_bank_details($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `bank_details` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function get_all_bank_information_by_id($up_id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`bank_name`, `account_name`,`account_no`, `ifsc_code`, `branch_name`,`other_info` FROM `bank_details` Where `id` =?"))
				{	
					$stmt_insert->bind_param("i",$up_id);
					
					$stmt_insert->bind_result($id,$bank_name,$account_name,$account_no,$ifsc_code,$branch_name,$other_info);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$bank_name;
							$details[$counter][2]	=	$account_name;
							$details[$counter][3]	=	$account_no;
							$details[$counter][4]	=	$ifsc_code;
							$details[$counter][5]	=	$branch_name;
							$details[$counter][6]	=	$other_info;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function update_bank_details($up_id,$b_name,$acc_name,$acc_no,$ifsc_code,$branch_name,$other_info)
			{	
				if($stmt_insert = $this->con->prepare("update `bank_details` set `bank_name` = ?, `account_name` = ?,`account_no` = ?, `ifsc_code` = ?, `branch_name` = ?,`other_info` = ? Where `id` = ?"))
				{
					$stmt_insert->bind_param("ssssssi",$b_name,$acc_name,$acc_no,$ifsc_code,$branch_name,$other_info,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function only_customers_by_id_and_name($cust_name,$cust_id)
			{
				if($stmt_insert = $this->con->prepare("SELECT `id`, `name` FROM `customers` Where `name` LIKE '%$cust_name%' AND `id` LIKE '%$cust_id%'"))
				{
					$stmt_insert->bind_result($id,$name);
				
					if($stmt_insert->execute())
					{
						$counter	=	0;
						$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$name;
							$counter++;
						}
					if(!empty($details))	
					{
						return $details;
					}
					return false;
					}	
				}
		
			}
			function add_quotation_information()
			{		
				if($stmt_insert = $this->con->prepare("SELECT `id`, `cust_id`, `cust_name`, `service_id`, `service_name`, `comment`, `actual_amount`, `discount_amount`,`bill_type` FROM `tmp_quotation` "))
				{	
					$stmt_insert->bind_result($id,$cust_id,$cust_name,$service_no,$service_name,$comment,$actual_amount,$discount_amount,$bill_type);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$cust_id;
							$details[$counter][2]	=	$cust_name;
							$details[$counter][3]	=	$service_no;
							$details[$counter][4]	=	$service_name;
							$details[$counter][5]	=	$comment;
							$details[$counter][6]	=	$actual_amount;
							$details[$counter][7]	=	$discount_amount;
							$details[$counter][8]	=	$bill_type;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function insert_quotation_details($c_id,$actual_amount,$discount_amount,$bill_type,$max_quotation_no)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("INSERT INTO `quotation`(`cust_id`, `actual_amount`, `discount_amount`,`date` ,`time`,`bill_type`,`quotation_no`) VALUES (?,?,?,?,?,?,?)"))
				{
					$stmt_insert->bind_param("sssssss",$c_id,$actual_amount,$discount_amount,$date,$time,$bill_type,$max_quotation_no);
					
					if($stmt_insert->execute())
					{
						return $stmt_insert->insert_id;
					}
						return false;
				} 	
			}
			function add_quotation_cart($insert_id,$cust_id,$customer_name,$service,$service_name,$comment,$amount,$d_amount,$bill_type)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				
				if($stmt_insert = $this->con->prepare("INSERT INTO `quotation_cart`( `transaction_id`, `cust_id`, `cust_name`, `service_id`, `service_name`, `comment`, `actual_amount`, `discount_amount`, `date`, `time`, `bill_type`) VALUES  (?,?,?,?,?,?,?,?,?,?,?)"))
				{
					$stmt_insert->bind_param("sssssssssss",$insert_id,$cust_id,$customer_name,$service,$service_name,$comment,$amount,$d_amount,$date,$time,$bill_type);
					if($stmt_insert->execute())
					{
						
						return true;
					
					}
						return false;
				} 	
			}
			function fetch_quotation_information()
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`, `cust_id`, `cust_name`, `service_id`, `service_name`,`comment`, SUM(`actual_amount`), SUM(`discount_amount`) FROM `tmp_quotation`"))
				{	
					$stmt_insert->bind_result($id,$cust_id,$cust_name,$service_no,$service_name,$comment,$actual_amount,$discount_amount);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$cust_id;
							$details[$counter][2]	=	$cust_name;
							$details[$counter][3]	=	$service_no;
							$details[$counter][4]	=	$service_name;
							$details[$counter][5]	=	$comment;
							$details[$counter][6]	=	$actual_amount;
							$details[$counter][7]	=	$discount_amount;
							
						
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function get_quotation_information($customer_name,$bill_type)
			{
				if($stmt_insert = $this->con->prepare("SELECT `id`, `cust_id`, `actual_amount`, `discount_amount`,`bill_type`,`quotation_no` FROM `quotation` WHERE `cust_id` LIKE '%".$customer_name."%'  AND `bill_type` LIKE '%".$bill_type."%' "))
				{	
					

					$stmt_insert->bind_result($id,$cust_id,$actual_amount,$discount_amount,$bill_type,$quotation_no);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$cust_id;	
							$details[$counter][2]	=	$actual_amount;
							$details[$counter][3]	=	$discount_amount;
							$details[$counter][4]	=	$bill_type;
							$details[$counter][5]	=	$quotation_no;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function fetch_quotation_services_id_by_cust_id($c_id)
			{
				if($stmt_select = $this->con->prepare("Select `service_id` from `quotation_cart` where `transaction_id` = ? "))
				{	
					$stmt_select->bind_param("s",$c_id);
				
					$stmt_select->bind_result($service);
				
					if($stmt_select->execute())
					{	
						$count = 0;
						$data = array();
						while($stmt_select->fetch())
						{	
							$data[$count][0] = $service;
							$count++;
						}
						if(!empty($data))
						{
							return $data;
						}
					}
							return false;
				}
			}
			function delete_quotation_cart($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `quotation_cart` where `transaction_id`=?"))
				{
					$stmt_select->bind_param("s",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function delete_quotation($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `quotation` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function fetch_quotationcart__information($up_id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`, `cust_id`, `cust_name`, `service_id`, `service_name`,`comment`, SUM(`actual_amount`), SUM(`discount_amount`) FROM `quotation_cart` Where `transaction_id` = ?"))
				{	
					$stmt_insert->bind_param("s",$up_id);
					
					$stmt_insert->bind_result($id,$cust_id,$cust_name,$service_no,$service_name,$comment,$actual_amount,$discount_amount);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$cust_id;
							$details[$counter][2]	=	$cust_name;
							$details[$counter][3]	=	$service_no;
							$details[$counter][4]	=	$service_name;
							$details[$counter][5]	=	$comment;
							$details[$counter][6]	=	$actual_amount;
							$details[$counter][7]	=	$discount_amount;
							
						
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function update_quotation_info($up_id,$cust_id,$amount,$d_amount,$bill_type)
			{								
				if($stmt_insert = $this->con->prepare("update `quotation` set `cust_id` = ?, `actual_amount` = ?, `discount_amount` = ?,`bill_type`=? Where `id` = ?"))
				{
					$stmt_insert->bind_param("ssssi",$cust_id,$amount,$d_amount,$bill_type,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			
			function fetch_qutotation_cart_data_for_update($id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`transaction_id`, `cust_id`,`service_id`,`actual_amount`,`discount_amount` FROM `quotation_cart` Where `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$id);
					
					$stmt_insert->bind_result($id,$t_id,$c_id,$service,$actual_amount,$discount_amount);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$t_id;
							$details[$counter][2]	=	$c_id;
							$details[$counter][3]	=	$service;
							$details[$counter][4]	=	$actual_amount;
							$details[$counter][5]	=	$discount_amount;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function fetch_actual_qutotation_amount_by_id($c_id)
			{
				if($stmt_select = $this->con->prepare("Select `actual_amount` from `quotation` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$c_id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function fetch_discount_qutotation_amount_by_id($c_id)
			{
				if($stmt_select = $this->con->prepare("Select `discount_amount` from `quotation` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$c_id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function update_amount_in_quotation_details($up_id,$actual_amount,$discount_amount)
			{	
				if($stmt_insert = $this->con->prepare("Update `quotation` set  `actual_amount` = ?, `discount_amount` = ? Where `id` = ?"))
				{						
					$stmt_insert->bind_param("ssi",$actual_amount,$discount_amount,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function delete_quotation_cart_by_id($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `quotation_cart` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function get_all_tmp_quotation_information($c_name,$date_to,$date_from,$service)
			{	
				if($service=="select")
				{
					$service ="";
				}
			
				if($stmt_insert = $this->con->prepare("SELECT `id`, `cust_id`, `cust_name`, `service_id`, `service_name`,`comment`, `actual_amount`, `discount_amount`, `date`, `time`,`bill_type` FROM `tmp_quotation` WHERE `cust_name` LIKE '%$c_name%' AND `date` BETWEEN '$date_from' AND '$date_to' AND `service_name` LIKE '%$service%'"))
				{	
					$stmt_insert->bind_result($id,$cust_id,$cust_name,$service_no,$service_name,$comment,$actual_amount,$discount_amount,$date,$time,$bill_type);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$cust_id;
							$details[$counter][2]	=	$cust_name;
							$details[$counter][3]	=	$service_no;
							$details[$counter][4]	=	$service_name;
							$details[$counter][5]	=	$comment;
							$details[$counter][6]	=	$actual_amount;
							$details[$counter][7]	=	$discount_amount;
							$details[$counter][8]	=	$date;
							$details[$counter][9]	=	$time;
							$details[$counter][10]	=	$bill_type;
						
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function check_id_exists_or_not($p_id)
			{
				if($stmt_select = $this->con->prepare("Select `id` from `create_link` where `p_id` = ? "))
				{	
					$stmt_select->bind_param("s",$p_id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function create_update_link($p_name,$s_code)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("INSERT INTO `create_link`(`p_id`, `security_code`, `date`, `time`) VALUES (?,?,?,?)"))
				{
					$stmt_insert->bind_param("ssss",$p_name,$s_code,$date,$time);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_all_created_link($pro_id,$from_date,$to_date)
			{	
				$from_date = date("Y-m-d" , strtotime($from_date));
				$to_date = date("Y-m-d" , strtotime($to_date));
				if($stmt_insert = $this->con->prepare("SELECT `id`,`p_id`, `security_code` FROM `create_link` Where `p_id` LIKE '%$pro_id%' AND `date` BETWEEN '$from_date' AND '$to_date'"))
				{	
					$stmt_insert->bind_result($id,$p_id,$security_code);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$p_id;
							$details[$counter][2]	=	$security_code;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function fetch_customer_id_by_p_id($p_id)
			{
				if($stmt_select = $this->con->prepare("Select `customer_name` from `customer_services` where `id` = ? "))
				{	
					$stmt_select->bind_param("s",$p_id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function fetch_project_name_by_customer_services($project_id)
			{
				if($stmt_select = $this->con->prepare("Select `project_name` from `customer_services` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$project_id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function get_all_created_link_by_id($up_id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`p_id`, `security_code` FROM `create_link` Where `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$up_id);
					
					$stmt_insert->bind_result($id,$p_id,$security_code);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$p_id;
							$details[$counter][2]	=	$security_code;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			
			function update_created_link($up_id,$p_name,$s_code)
			{	
				if($stmt_insert = $this->con->prepare("Update `create_link` set `p_id` = ?, `security_code` = ? Where `id` = ?"))
				{
					$stmt_insert->bind_param("ssi",$p_name,$s_code,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function delete_create_link($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `create_link` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function fetch_project_name_by_college_students($project_id)
			{
				if($stmt_select = $this->con->prepare("Select `project_name` from `projects` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$project_id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function fetch_student_name_by_college_students($project_id)
			{
				if($stmt_select = $this->con->prepare("Select `student1_name`,`student2_name`,`student3_name`,`student4_name`,`student5_name` from `projects` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$project_id);
				
					$stmt_select->bind_result($student1_name,$student2_name,$student3_name,$student4_name,$student5_name);
				
					if($stmt_select->execute())
					{
						$data 		= array();
						if($stmt_select->fetch())
						{
							$data[0]	=	$student1_name;
							$data[1]	=	$student2_name;
							$data[2]	=	$student3_name;
							$data[3]	=	$student4_name;
							$data[4]	=	$student5_name;
							
						}
						if(!empty($data))
						{
							return $data;
						}
					}
							return false;
				}
			}
			function fetch_security_code_by_id($project_id)
			{
				if($stmt_select = $this->con->prepare("Select `security_code` from `create_link` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$project_id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function get_password_from_customer_id($email)
			{
				if($stmt_select = $this->con->prepare("Select `password` from `customers` where `id` = ? "))
				{	
					$stmt_select->bind_param("s",$email);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function change_customer_password($email,$password)
			{ 
				$date = date("Y-m-d");
				$time = date("H:i:s A");
			
				if($stmt_select = $this->con->prepare("update `customers` set `password`='".$password."' where `id` = ?"))
				{
					$stmt_select->bind_param("i",$email);				
				
					if($stmt_select->execute())
					{					
						return true;
					}
						return false;
				}
			}
			function get_all_service_information_for_customer_display($email)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`customer_name`, `service`, `project_name`,`amount`,`status` FROM `customer_services` Where `customer_name` = ?"))
				{	
					$stmt_insert->bind_param("s",$email);
					
					$stmt_insert->bind_result($id,$customer_name,$service,$p_name,$amount,$status);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$customer_name;
							$details[$counter][2]	=	$service;
							$details[$counter][3]	=	$p_name;
							$details[$counter][4]	=	$amount;
							$details[$counter][5]	=	$status;
					
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function get_all_payment_information_for_customer_display($id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`, `services_id`, `cust_id`, `cust_name`, `service_no`, `service_name`,`project_name`, `opening_amount`, `paid_amount`, `bal_amount`,`status`, `date`, `time` FROM `payment_report` Where `services_id` = ? "))
				{	
					$stmt_insert->bind_param("s",$id);
					
					$stmt_insert->bind_result($id,$services_id,$cust_id,$cust_name,$service_no,$service_name,$p_name,$opening_amount,$paid_amount,$bal_amount,$status,$date,$time);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$services_id;
							$details[$counter][2]	=	$cust_id;
							$details[$counter][3]	=	$cust_name;
							$details[$counter][4]	=	$service_no;
							$details[$counter][5]	=	$service_name;
							$details[$counter][6]	=	$p_name;
							$details[$counter][7]	=	$opening_amount;
							$details[$counter][8]	=	$paid_amount;
							$details[$counter][9]	=	$bal_amount;
							$details[$counter][10]	=	$status;
							$details[$counter][11]	=	$date;
							$details[$counter][12]	=	$time;
						
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function fetch_project_name_by_cust_id($email)
			{
				if($stmt_select = $this->con->prepare("Select `project_name` from `customer_services` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$email);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function fetch_total_amount_by_cust_id($email)
			{
				if($stmt_select = $this->con->prepare("Select `amount` from `customer_services` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$email);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function add_project_updates($c_id,$project_id,$updates,$attachment)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				$status = "Pending";
				if($stmt_insert = $this->con->prepare("INSERT INTO `project_updates`(`customer_id`,`project_id`, `update_details`,`attachment`, `status`, `date`, `time`) VALUES (?,?,?,?,?,?,?)"))
				{
					$stmt_insert->bind_param("sssssss",$c_id,$project_id,$updates,$attachment,$status,$date,$time);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_all_updated_services_by_customer_id($c_id,$project_id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`customer_id`,`project_id`,`update_details`,`attachment`,`status`,`date` FROM `project_updates` Where `customer_id` = ? AND `project_id` = ? ORDER BY `id` DESC"))
				{	
					$stmt_insert->bind_param("ss",$c_id,$project_id);
					
					$stmt_insert->bind_result($id,$customer_id,$project_id,$update_details,$attachment,$status,$date);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$customer_id;
							$details[$counter][2]	=	$project_id;
							$details[$counter][3]	=	$update_details;
							$details[$counter][4]	=	$attachment;
							$details[$counter][5]	=	$status;
							$details[$counter][6]	=	$date;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function delete_updates_info($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `project_updates` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function get_all_updated_services_by_customer_id_by_id($c_id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`update_details`,`attachment` FROM `project_updates` Where `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$c_id);
					
					$stmt_insert->bind_result($id,$update_details,$attachment);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;	
							$details[$counter][1]	=	$update_details;
							$details[$counter][2]	=	$attachment;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function update_projects_updates($update_id,$updates)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				$status = "Pending";
				if($stmt_insert = $this->con->prepare("Update `project_updates` set `update_details` = ? Where `id` = ?"))
				{
					$stmt_insert->bind_param("si",$updates,$update_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function update_attachment_in_project_updates($update_id)
			{		
				$actual_image_name = "";					
				if($stmt_insert = $this->con->prepare("Update `project_updates` set `attachment`=? Where `id`=?"))
				{
					$stmt_insert->bind_param("si",$actual_image_name,$update_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_attachment_in_project__updates($update_id)
			{
				if($stmt_select = $this->con->prepare("Select `attachment` from `project_updates` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$update_id);
				
					$stmt_select->bind_result($result_image);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_image;
						}
					}
							return false;
				}
			}
			function update_project_update_attachement($update_id,$actual_image_name)
			{							
				if($stmt_insert = $this->con->prepare("Update `project_updates` set `attachment`=? Where `id`=?"))
				{
					$stmt_insert->bind_param("si",$actual_image_name,$update_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function get_all_updated_services_by_admin_panel($from_date,$to_date)
			{	
				$from_date = date("Y-m-d" , strtotime($from_date));
				$to_date = date("Y-m-d" , strtotime($to_date));
				if($stmt_insert = $this->con->prepare("SELECT `id`,`customer_id`,`project_id`,`update_details`,`attachment`,`status`,`date`,`time` FROM `project_updates` WHERE `date` BETWEEN '$from_date' AND '$to_date' ORDER BY `id` DESC"))
				{	
					$stmt_insert->bind_result($id,$customer_id,$project_id,$update_details,$attachment,$status,$date,$time);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$customer_id;
							$details[$counter][2]	=	$project_id;
							$details[$counter][3]	=	$update_details;
							$details[$counter][4]	=	$attachment;
							$details[$counter][5]	=	$status;
							$details[$counter][6]	=	$date;
							$details[$counter][7]	=	$time;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function get_all_service_information_by_id($id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`customer_name`, `service`, `project_name`,`amount`,`status` FROM `customer_services` Where `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$id);
					
					$stmt_insert->bind_result($id,$customer_name,$service,$p_name,$amount,$status);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$customer_name;
							$details[$counter][2]	=	$service;
							$details[$counter][3]	=	$p_name;
							$details[$counter][4]	=	$amount;
							$details[$counter][5]	=	$status;
					
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function update_project_status_work_in_progress($app_id)
			{
				$status = "Work in Progress";
				if($stmt_select = $this->con->prepare("Update `project_updates` set `status`= ? where `id`=?"))
				{
					$stmt_select->bind_param("si",$status,$app_id);
				
					if($stmt_select->execute())
					{				
							return true;
					}
						return false;
				}
			}
			function update_project_status_pending($app_id)
			{
				$status = "Pending";
				if($stmt_select = $this->con->prepare("Update `project_updates` set `status`= ? where `id`=?"))
				{
					$stmt_select->bind_param("si",$status,$app_id);
				
					if($stmt_select->execute())
					{				
							return true;
					}
						return false;
				}
			}
			function update_project_status_complete($app_id)
			{
				$status = "Complete";
				if($stmt_select = $this->con->prepare("Update `project_updates` set `status`= ? where `id`=?"))
				{
					$stmt_select->bind_param("si",$status,$app_id);
				
					if($stmt_select->execute())
					{				
							return true;
					}
						return false;
				}
			}
			function get_pending_updates_count()
			{
				if($stmt_select = $this->con->prepare("Select COUNT(`id`) from `project_updates` where `status` = 'Pending'"))
				{	
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function get_work_in_progress_updates_count()
			{
				if($stmt_select = $this->con->prepare("Select COUNT(`id`) from `project_updates` where `status` = 'Work in Progress'"))
				{	
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function fetch_quotation_id_by_cust_id($c_id)
			{
				if($stmt_select = $this->con->prepare("Select `cust_id` from `quotation` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$c_id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function fetch_quotation_cart_data_by_cust_id($c_id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`transaction_id`,`cust_id`,`service_id`,`comment`,`actual_amount`,`discount_amount`,`bill_type` FROM `quotation_cart` Where `transaction_id` = ?"))
				{	
					$stmt_insert->bind_param("s",$c_id);
					
					$stmt_insert->bind_result($id,$t_id,$c_id,$service,$comment,$actual_amount,$discount_amount,$bill_type);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$t_id;
							$details[$counter][2]	=	$c_id;
							$details[$counter][3]	=	$service;
							$details[$counter][4]	=	$comment;
							$details[$counter][5]	=	$actual_amount;
							$details[$counter][6]	=	$discount_amount;
							$details[$counter][7]	=	$bill_type;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function new_offer_letter_data($text1)
			{							
				$date = date("Y-m-d");
				$time = date("H-i-s A");
				if($stmt_insert = $this->con->prepare("INSERT INTO `offer_letters`(`text1`, `date`, `time`) VALUES (?,?,?)"))
				{
					$stmt_insert->bind_param("sss",$text1,$date,$time);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function fetch_offer_letter_data()
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`, `text1`, `date`, `time` FROM `offer_letters`"))
				{	
					$stmt_insert->bind_result($id,$text1,$date,$time);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;	
							$details[$counter][1]	=	$text1;
							$details[$counter][2]	=	$date;
							$details[$counter][3]	=	$time;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			function delete_offer_letter_data($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `offer_letters` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			function fetch_gender_by_id($c_id)
			{
				if($stmt_select = $this->con->prepare("Select `gender` from `employees` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$c_id);
				
					$stmt_select->bind_result($result_password);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
							return false;
				}
			}
			function update_offer_letter_data($up_id,$text1)
			{
				if($stmt_insert = $this->con->prepare("Update `offer_letters` set `text1` = ? Where `id` = ?"))
				{
					$stmt_insert->bind_param("si",$text1,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			function fetch_offer_letter_data_by_id($update_id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`, `text1` FROM `offer_letters` Where `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$update_id);
					
					$stmt_insert->bind_result($id,$text1);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;	
							$details[$counter][1]	=	$text1;
							
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			
			function fetch_employee_data_for_offer_letter($id)
			{	
				if($stmt_insert = $this->con->prepare("SELECT `id`,`full_name`, `email`, `contact`, `address`, `gender`, `dob`, `city`, `state`, `country`, `pincode`, `aadhar_no`, `id_size_photo`, `aadhar_attachment`, `attachment1`, `attachment2`, `attachment3`, `designation`, `joining_date`, `working_technology`, `salary`, `remark`,`job_location` FROM `employees` WHERE `id` = ?"))
				{	
					$stmt_insert->bind_param("i",$id);
					
					$stmt_insert->bind_result($id,$full_name,$email,$primary_contact,$address,$gender,$dob,$city,$state,$country,$pincode,$aadhar_no,$photo,$addhar_attachment,$attachment1,$attachment2,$attachment3,$designation,$joining_date,$technology,$salary,$remark,$location);
					
					if($stmt_insert->execute())
					{
							$counter	=	0;
							$details	=	array();
						while($stmt_insert->fetch())
						{
							$details[$counter][0]	=	$id;
							$details[$counter][1]	=	$full_name;
							$details[$counter][2]	=	$email;
							$details[$counter][3]	=	$primary_contact;
							$details[$counter][4]	=	$address;
							$details[$counter][5]	=	$gender;
							$details[$counter][6]	=	$dob;
							$details[$counter][7]	=	$city;
							$details[$counter][8]	=	$state;
							$details[$counter][9]	=	$country;
							$details[$counter][10]	=	$pincode;
							$details[$counter][11]	=	$aadhar_no;
							$details[$counter][12]	=	$photo;
							$details[$counter][13]	=	$addhar_attachment;
							$details[$counter][14]	=	$attachment1;
							$details[$counter][15]	=	$attachment2;
							$details[$counter][16]	=	$attachment3;
							$details[$counter][17]	=	$designation;
							$details[$counter][18]	=	$joining_date;
							$details[$counter][19]	=	$technology;
							$details[$counter][20]	=	$salary;
							$details[$counter][21]	=	$remark;
							$details[$counter][22]	=	$location;
							$counter++;
						}
						if(!empty($details))	
						{
							return $details;
						}
						return false;
					}	
				}
			}
			
			function fetch_bill_type_from_invoice($c_id)
			{
				if($stmt_select = $this->con->prepare("SELECT `bill_type` FROM `invoice` WHERE `id`=?"))
				{	
					$stmt_select->bind_param("i",$c_id);
				
					$stmt_select->bind_result($res_id);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $res_id;
						}
					}
							return false;
				}
			}
			function fetch_bill_type_from_quotation($c_id)
			{
				if($stmt_select = $this->con->prepare("SELECT `bill_type` FROM `quotation` WHERE `id`=?"))
				{	
					$stmt_select->bind_param("i",$c_id);
				
					$stmt_select->bind_result($res_id);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $res_id;
						}
					}
							return false;
				}
			}
			//11-10-2020
			function fetch_customer_id_from_quotation($c_id)
			{
				if($stmt_select = $this->con->prepare("SELECT `cust_id` FROM `quotation` WHERE `id`=?"))
				{	
					$stmt_select->bind_param("i",$c_id);
				
					$stmt_select->bind_result($res_id);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $res_id;
						}
					}
							return false;
				}
			}
			function fetch_customer_id_from_invoice($c_id)
			{
				if($stmt_select = $this->con->prepare("SELECT `customer_id` FROM `invoice` WHERE `id`=?"))
				{	
					$stmt_select->bind_param("i",$c_id);
				
					$stmt_select->bind_result($res_id);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $res_id;
						}
					}
							return false;
				}
			}
			function update_quotation_info1($up_id,$amount,$d_amount,$bill_type)
			{								
				
				if($stmt_insert = $this->con->prepare("update `quotation` set `actual_amount` = ?, `discount_amount` = ?,`bill_type`=? Where `id` = ?"))
				{
					$stmt_insert->bind_param("sssi",$amount,$d_amount,$bill_type,$up_id);
					
					if($stmt_insert->execute())
					{
						
						return true;
					}
						return false;
				} 	
			}
			function update_invoice_details_info($up_id,$actual_amount,$discount_amount,$bill_type)
			{	
				if($stmt_insert = $this->con->prepare("Update `invoice` set `total_amount` = ?, `discount_amount` = ? , `bill_type`=? Where `id` = ?"))
				{						
				
					$stmt_insert->bind_param("sssi",$actual_amount,$discount_amount,$bill_type,$up_id);
					
					if($stmt_insert->execute())
					{
						return true;
					}
						return false;
				} 	
			}
			//22-11
			function get_max_quotation_no($bill_type)
			{
				if($stmt_select = $this->con->prepare("SELECT MAX(`quotation_no`) FROM `quotation` WHERE `bill_type`=?"))
				{	
					$stmt_select->bind_param("s",$bill_type);
				
					$stmt_select->bind_result($qu_no);
				
					if($stmt_select->execute())
					{	
						$count = 0;
						$data = array();
						if($stmt_select->fetch())
						{	
							return $qu_no;
						}
						else
						{
							return false;
						}
					}
							
				}
			}
			function fetch_quotation_no_by_id($c_id)
			{
				if($stmt_select = $this->con->prepare("Select `quotation_no` from `quotation` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$c_id);
				
					$stmt_select->bind_result($res_quotation_no);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $res_quotation_no;
						}
					}
							return false;
				}
			}
			function get_max_invoice_no($bill_type)
			{
				if($stmt_select = $this->con->prepare("SELECT MAX(`invoice_no`) FROM `invoice` WHERE `bill_type`=?"))
				{	
					$stmt_select->bind_param("s",$bill_type);
				
					$stmt_select->bind_result($qu_no);
				
					if($stmt_select->execute())
					{	
						$count = 0;
						$data = array();
						if($stmt_select->fetch())
						{	
							return $qu_no;
						}
						else
						{
							return false;
						}
					}
							
				}
			}
			function fetch_invoice_no_by_id($c_id)
			{
				if($stmt_select = $this->con->prepare("Select `invoice_no` from `invoice` where `id` = ? "))
				{	
					$stmt_select->bind_param("i",$c_id);
				
					$stmt_select->bind_result($res_quotation_no);
				
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $res_quotation_no;
						}
					}
							return false;
				}
			}
			//2-8-21
			function get_quotation_details_by_cust_id($res_sc_id)
		{ 
			if($stmt_insert = $this->con->prepare("SELECT `id`, `cust_id`, `actual_amount`, `discount_amount`, `bill_type`, `quotation_no` FROM `quotation` WHERE `cust_id`=? "))
			{	
				
				$stmt_insert->bind_param("s",$res_sc_id);
				$stmt_insert->bind_result($id,$cust_id,$actual_amount,$discount_amount,$bill_type,$quotation_no);
				
				if($stmt_insert->execute())
				{
						$counter	=	0;
						$details	=	array();
					while($stmt_insert->fetch())
					{
						$details[$counter][0]	=	$id;
						$details[$counter][1]	=	$cust_id;	
						$details[$counter][2]	=	$actual_amount;
						$details[$counter][3]	=	$discount_amount;
						$details[$counter][4]	=	$bill_type;
						$details[$counter][5]	=	$quotation_no;
						$counter++;
					}
					if(!empty($details))	
					{
						return $details;
					}
					return false;
				}	
			}
		}
		function get_quatation_details_by_id()
		{
			if($stmt_insert = $this->con->prepare("SELECT `id`, `cust_id`, `actual_amount`, `discount_amount`, `bill_type`, `quotation_no` FROM `quotation` "))
			{	
				
				$stmt_insert->bind_result($id,$cust_id,$actual_amount,$discount_amount,$bill_type,$quotation_no);
				
				if($stmt_insert->execute())
				{
						$counter	=	0;
						$details	=	array();
					while($stmt_insert->fetch())
					{
						$details[$counter][0]	=	$id;
						$details[$counter][1]	=	$cust_id;	
						$details[$counter][2]	=	$actual_amount;
						$details[$counter][3]	=	$discount_amount;
						$details[$counter][4]	=	$bill_type;
						$details[$counter][5]	=	$quotation_no;
						$counter++;
					}
					if(!empty($details))	
					{
						return $details;
					}
					return false;
				}	
			}
		}
	function add_project_info($cust_id,$project_title,$deadline_date,$select_quotation,$project_description,$project_place)
	{
		$date = date("Y-m-d");
		$time = date("H-i-s A");
		if($stmt_insert = $this->con->prepare("INSERT INTO `client_projects`(`cust_id`, `project_title`, `deadline_date`, `quotation_id`, `project_description`, `date`, `time`,`project_place`) VALUES(?,?,?,?,?,?,?,?)"))
		{
			
			$stmt_insert->bind_param("ssssssss",$cust_id,$project_title,$deadline_date,$select_quotation,$project_description,$date,$time,$project_place);
			
			if($stmt_insert->execute())
			{
				
				return true;
			}
				return false;
		} 	
	}
	function get_project_id($select_quotation)
	{
		if($stmt_select = $this->con->prepare("Select `id` from `client_projects` where `quotation_id` = ? "))
		{	
			$stmt_select->bind_param("s",$select_quotation);
		
			$stmt_select->bind_result($res_quotation_no);
		
					
			if($stmt_select->execute())
			{
				if($stmt_select->fetch())
				{
					return $res_quotation_no;
				}
			}
		}
	}
	function get_project_information($customer_name)
	{
		if($stmt_insert = $this->con->prepare("SELECT `id`, `cust_id`, `project_title`, `deadline_date`, `quotation_id`, `project_description`, `date`, `time`,`project_place` FROM `client_projects` WHERE `cust_id`LIKE '%".$customer_name."%'"))
		{	
			

			$stmt_insert->bind_result($id,$cust_id,$project_title,$deadline_date,$quotation_id,$project_description,$date,$time,$project_place);
			
			if($stmt_insert->execute())
			{
					$counter	=	0;
					$details	=	array();
				while($stmt_insert->fetch())
				{
					$details[$counter][0]	=	$id;
					$details[$counter][1]	=	$cust_id;	
					$details[$counter][2]	=	$project_title;
					$details[$counter][3]	=	$deadline_date;
					$details[$counter][4]	=	$quotation_id;
					$details[$counter][5]	=	$project_description;
					$details[$counter][6]	=	$date;
					$details[$counter][7]	=	$time;
					$details[$counter][8]	=	$project_place;
					$counter++;
				}
				if(!empty($details))	
				{
					return $details;
				}
				return false;
			}	
		}
	}
	function update_project_by_id($edit_id)
	{
		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");
		
		if($stmt_insert=$this->con->prepare("SELECT `id`, `cust_id`, `project_title`, `deadline_date`, `quotation_id`, `project_description`, `date`, `time`, `project_place` FROM `client_projects` WHERE `id`=?"))
		{
				$stmt_insert->bind_param("i",$edit_id);
				$stmt_insert->bind_result($id,$cust_id,$projec_title,$deadline_date,$quotation_id,$project_description,$date,$time,$project_place);	
				if($stmt_insert->execute())
				{
					$data		=	array();
					if($stmt_insert->fetch())
					{
						$data[0]	=	$id;
						$data[1]	=	$cust_id;
						$data[2]	=	$projec_title;
						$data[3]	=	$deadline_date;
						$data[4]	=	$quotation_id;
						$data[5]	=	$project_description;
						$data[6]	=	$date;
						$data[7]	=	$time;
						$data[8]	=	$project_place;
						return	$data;
					}
					return false;
				}
		}
		
	}
	
	function add_project($title,$description)
	{
		$date	=	date("Y-m-d");
		$time	=	date("H:i:s");
		$status = 	"pending";
		$completed_by	=	"-";
		
		if($stmt_insert=$this->con->prepare("INSERT INTO `save_project`(`update_title`, `description`, `status`, `completed_by`, `date`, `time`) VALUES (?,?,?,?,?,?)"))
		{
			$stmt_insert->bind_param("ssssss",$title,$description,$status,$completed_by,$date,$time);
			if($stmt_insert->execute())
			{
				
				return true;
			}
			return false;
		}
	}
	function get_quotation_details_by_qu_id($res_sc_id)
	{
		
		if($stmt_insert = $this->con->prepare("SELECT `id`, `cust_id`, `actual_amount`, `discount_amount`, `bill_type`, `quotation_no` FROM `quotation` WHERE `id`=? "))
		{	
			
			$stmt_insert->bind_param("s",$res_sc_id);
			$stmt_insert->bind_result($id,$cust_id,$actual_amount,$discount_amount,$bill_type,$quotation_no);
			
			if($stmt_insert->execute())
			{
					
					$details	=	array();
				if($stmt_insert->fetch())
				{
					$details[0]	=	$id;
					$details[1]	=	$cust_id;	
					$details[2]	=	$actual_amount;
					$details[3]	=	$discount_amount;
					$details[4]	=	$bill_type;
					$details[5]	=	$quotation_no;
					return $details;
				}
				
				return false;
			}	
		}
	}
	function delete_client_project($del_id)
	{
		if($stmt_select = $this->con->prepare("Delete from `client_projects` where `id`=?"))
		{
			$stmt_select->bind_param("i",$del_id);
		
			if($stmt_select->execute())
			{					
					return true;
			}
				return false;
		}
	}
	function fetch_quotation_date_by_id($c_id)
	{
		if($stmt_select = $this->con->prepare("Select `date` from `quotation` where `id` = ? "))
		{	
			$stmt_select->bind_param("i",$c_id);
		
			$stmt_select->bind_result($res_quotation_no);
		
			if($stmt_select->execute())
			{
				if($stmt_select->fetch())
				{
					return $res_quotation_no;
				}
			}
					return false;
		}
	}
//3-8-21
function get_agreement_information_by_id($ag_id)
{
	if($stmt_insert = $this->con->prepare("SELECT `id`, `cust_id`, `project_title`, `deadline_date`, `quotation_id`, `project_description`, `date`, `time`,`project_place` FROM `client_projects` WHERE `id`=?"))
	{	
		
		$stmt_insert->bind_param("i",$ag_id);
		$stmt_insert->bind_result($id,$cust_id,$project_title,$deadline_date,$quotation_id,$project_description,$date,$time,$project_place);
		
		if($stmt_insert->execute())
		{
				$counter	=	0;
				$details	=	array();
			if($stmt_insert->fetch())
			{
				$details[0]	=	$id;
				$details[1]	=	$cust_id;	
				$details[2]	=	$project_title;
				$details[3]	=	$deadline_date;
				$details[4]	=	$quotation_id;
				$details[5]	=	$project_description;
				$details[6]	=	$date;
				$details[7]	=	$time;
				$details[8]	=	$project_place;
				return $details;
			}
			else
			{
				return false;
			}
		}	
	}
}
 function add_new_client($cust_name,$primary_contact,$project_name,$url,$project_description ,$c_email,$password)
 {
	    $date	=	date("Y-m-d");
		$time	=	date("H:i:s");
	 if($stmt = $this->con->prepare("INSERT INTO `add-client`( `c_name`, `c_contact`, `project_name`, `url`, `project_description`, `email`, `password`, `date`, `time`) VALUES (?,?,?,?,?,?,?,?,?)") )
	 {
		 $stmt->bind_param("sssssssss",$cust_name,$primary_contact,$project_name,$url,$project_description ,$c_email,$password,$date,$time);
		 if($stmt ->execute())
			{
				
				return true;
			}
			else
			{
			return false;
			}
	 }
	 
 } 
 
     function get_all_client_records()
       {
	       if($stmt= $this->con->prepare("SELECT `id`, `c_name`, `c_contact`, `project_name`, `url`, `project_description`, `email`, `password`, `date`, `time` FROM `add-client`"))
		   {
			   $stmt->bind_result($res_id,$res_name,$res_contact,$res_project_name,$res_url,$res_project_description,$res_email,$res_password,$res_date,$res_time);
			    $details	=	array();
				$counter=0;
				if($stmt->execute())
				{
					while($stmt->fetch())
					{
					$details[$counter][0]=$res_id;
					$details[$counter][1]= $res_name;
					$details[$counter][2]= $res_contact;
					$details[$counter][3]= $res_project_name;
					$details[$counter][4]= $res_url;
					$details[$counter][5]=$res_project_description;
					$details[$counter][6]=$res_email;
					$details[$counter][7]=$res_password;
					$details[$counter][8]=$res_date;
					$details[$counter][9]=$res_time;
					
					 $counter++;
					}
					
					if(!empty($details))
					{
						return $details;
					}
					else
						return false;
						
				}
		   }
       }
	   function delete_client_info($del_id)
			{
				if($stmt_select = $this->con->prepare("Delete from `add-client` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			
			function add_charging_points($station_name ,$person_name,	$primary_contact,$c_email,$city,$state,$country,$pincode ,$latitude,$longitutde,$open_time,	$close_time,$user_id ,$password)
              {
	    $date	=	date("Y-m-d");
		$time	=	date("H:i:s");
	                 if($stmt = $this->con->prepare("INSERT INTO `add-charging-points`( `station_name`, `person_name`, `mobile_no`, `email`, `city`, `state`, `country`, `pin_code`, `latitude`, `longitude`, `open_time`, `close_time`, `user_id`, `password`, `date`, `time`)  VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)") )
	        {
		 $stmt->bind_param("ssssssssssssssss",$station_name ,$person_name,	$primary_contact,$c_email,$city,$state,$country,$pincode ,$latitude,$longitutde,$open_time,	$close_time,$user_id ,$password,$date,$time);
		 if($stmt ->execute())
			{
				
				return true;
			}
			else
			{
			return false;
			}
	 }
	 
    } 
	
	 function get_charging_points_records()
       {
	       if($stmt= $this->con->prepare("SELECT `id`, `station_name`, `person_name`, `mobile_no`, `email`, `city`, `state`, `country`, `pin_code`, `latitude`, `longitude`, `open_time`, `close_time`, `user_id`, `password`, `date`, `time` FROM `add-charging-points` "))
		   {
			   $stmt->bind_result($res_id,$reg_station_name,$res_person_name,$res_mobile_no,$res_email,$res_city,$res_state,$res_country,$reg_pin_code,$reg_latitude,$reg_longitude,$reg_open_time,$reg_close_time,$reg_user_id,$reg_password,$res_date,$res_time);
			    $details	=	array();
				$counter=0;
				if($stmt->execute())
				{
					while($stmt->fetch())
					{
					$details[$counter][0]=$res_id;
					$details[$counter][1]= $reg_station_name;
					$details[$counter][2]= $res_person_name;
					$details[$counter][3]= $res_mobile_no;
					$details[$counter][4]= $res_email;
					$details[$counter][5]= $res_city;
					$details[$counter][6]= $res_state;
					$details[$counter][7]=$res_country;
					$details[$counter][8]=$reg_pin_code;
					$details[$counter][9]=$reg_latitude;
					$details[$counter][10]=$reg_longitude;
					$details[$counter][11]= $reg_open_time;
					$details[$counter][12]= $reg_close_time;
					$details[$counter][13]= $reg_user_id;
					$details[$counter][14]= $reg_password;
					$details[$counter][15]= $res_date;
					$details[$counter][16]=$res_time;
					
					 $counter++;
					}
					
					if(!empty($details))
					{
						return $details;
					}
					else
						return false;
						
				}
		   }
       }
 
        function delete_charging_point_info($del_id)
			{
				if($stmt_select = $this->con->prepare("DELETE FROM `add-charging-points` where `id`=?"))
				{
					$stmt_select->bind_param("i",$del_id);
				
					if($stmt_select->execute())
					{					
							return true;
					}
						return false;
				}
			}
			
			    function get_charging_point_from_id($var_update_id)
         	{
		    if($stmt = $this->con->prepare("SELECT `id`, `station_name`, `person_name`, `mobile_no`, `email`, `city`, `state`, `country`, `pin_code`, `latitude`, `longitude`, `open_time`, `close_time`, `user_id`, `password`, `date`, `time` FROM `add-charging-points` WHERE `id`=?"))
		     {
			$stmt->bind_param("i",$var_update_id);
			
			$stmt->bind_result($res_id,$reg_station_name,$res_person_name,$res_mobile_no,$res_email,$res_city,$res_state,$res_country,$reg_pin_code,$reg_latitude,$reg_longitude,$reg_open_time,$reg_close_time,$reg_user_id,$reg_password,$res_date,$res_time);
			
			if($stmt->execute())
			{
				$data=array();
				if($stmt->fetch())
				{
					$data[0]=$res_id;
					$data[1]=$reg_station_name;
					$data[2]=$res_person_name;
					$data[3]=$res_mobile_no;
					$data[4]=$res_email;
					$data[5]=$res_city;
					$data[6]=$res_state;
					$data[7]=$res_country;
					$data[8]=$reg_pin_code;
					$data[9]=$reg_latitude;
					$data[10]=$reg_longitude;
					$data[11]=$reg_open_time;
					$data[12]=$reg_close_time;
					$data[13]=$reg_user_id;
					$data[14]=$reg_password;
					$data[15]=$res_date;
					$data[16]=$res_time;
					
					return $data;
				}
			}
			return false;
		}
	}
	function update_my_story_content($reg_station_name,$res_person_name,$res_mobile_no,$res_email,$res_city,$res_state,$res_country,$reg_pin_code,$reg_latitude,$reg_longitude,$reg_open_time,$reg_close_time,$reg_user_id,$reg_password ,$var_update_id)
	{
		$date = date("y-m-d");
		$time = date("h-i-s a");
		if($stmt = $this->con->prepare("UPDATE `add-charging-points` SET `station_name`=?,`person_name`=?,`mobile_no`=?,`email`=?,`city`=?,`state`=?,`country`=?,`pin_code`=?,`latitude`=?,`longitude`=?,`open_time`=?,`close_time`=?,`user_id`=?,`password`=? WHERE `id`= ?"))
		{
		  $stmt->bind_param("ssssssssssssssi",$reg_station_name,$res_person_name,$res_mobile_no,$res_email,$res_city,$res_state,$res_country,$reg_pin_code,$reg_latitude,$reg_longitude,$reg_open_time,$reg_close_time,$reg_user_id,$reg_password,$var_update_id);	
		 if($stmt->execute())
		 {
			 return true;
		 }
		 return false;
		}
	}
	
	function add_new_registration($var_full_name,$var_mo_no,$var_address,$var_email,$var_password)
      {
            
            $current_date = date("Y-m-d");
            $current_time = date("h:i:s a");
            if($stmt = $this->con->prepare("INSERT INTO `entry`( `full_name`, `mo_no`, `address`, `email`, `password`, `date`, `time`)  VALUES (?,?,?,?,?,?,?)"))
            {
                  $stmt->bind_param("sssssss",$var_full_name,$var_mo_no,$var_address,$var_email,$var_password,$current_date,$current_time);

                  if($stmt->execute()){
                        return true;
                  }
                  return false;
            }
      }
      function get_all_registration_record(){
            if($stmt = $this->con->prepare("SELECT `id`, `full_name`, `mo_no`, `address`, `email`, `password`, `date`, `time` FROM `entry`")){
                  $stmt -> bind_result($res_id,$res_full_name,$res_mo_no,$res_addres,$res_email,$res_password,$res_date,$res_time);
            
                  if($stmt->execute()){
                        $data = array();
                        $counter=0;
                        while($stmt->fetch()){
                              $data[$counter][0]= $res_id;
                              $data[$counter][1]= $res_full_name;
                              $data[$counter][2]= $res_mo_no;
                              $data[$counter][3]= $res_addres;
                              $data[$counter][4]= $res_email;
                              $data[$counter][5]= $res_password;
                              $data[$counter][6]= $res_date;
					          $data[$counter][7]= $res_time;

                              $counter ++;

                        }

                        if(!empty($data)){

                              return $data;
                        }
                        else{
                              return false;
                        }
                  }
            }
      }


	function delete_user_record($delete_id)
	{
		if ($stmt = $this->con->prepare("DELETE FROM `entry` WHERE `id` =?")) {
			$stmt->bind_param("i", $delete_id);

			if ($stmt->execute()) {
				return true;
			}
			return false;
		}
	}



	function get_register_update_data($update_id)
	{
		//echo $update_id;
		if ($stmt = $this->con->prepare("SELECT `id`, `full_name`, `mo_no`, `address`, `email`, `password`, `date`, `time`  FROM `entry` WHERE `id`=?")) {

			$stmt->bind_param("i", $update_id);
			$stmt->bind_result($res_id, $res_full_name, $res_mo_no,$res_address, $res_email, $res_password,  $res_date, $res_time);
			if ($stmt->execute()) {
				//echo 88;
				$std_data = array();
				if ($stmt->fetch()) {
					$std_data[0] = $res_id;
					$std_data[1] = $res_full_name;
					$std_data[2] = $res_mo_no;
					$std_data[3] = $res_address;
					$std_data[4] = $res_email;
					$std_data[5] = $res_password;
					
					
					$std_data[6] = $res_date;
					$std_data[7] = $res_time;
					


					return $std_data;
				}
			}
			return false;

		}
	}
	function update_user_record($var_full_name,$var_mo_no, $var_address,$var_email, $var_password,  $update_id)
	{
		//echo $update_id;
		$current_date = date("Y-m-d");
		$current_time = date("h:i:s a");
		if ($stmt = $this->con->prepare("UPDATE `entry` SET `full_name`=?,,`mo_no`=?,`address`=?,`email`=?,`password`=?,`date`=?,`time`=? WHERE `id` = ?")) {

			$stmt->bind_param("sssssssi", $var_full_name,$var_mo_no, $var_address,$var_email, $var_password,  $current_date, $current_time, $update_id);

			if ($stmt->execute()) {
				return true;
			}
			return false;
		}
	}
	
	function update_ev_set_refilled($ev_id)
	{
		$current_date = date("Y-m-d");
		$current_time = date("h:i:s a");
		if ($stmt = $this->con->prepare("UPDATE `ev_booking` SET `status`='completed' where `id`=?"))
		{
			$stmt->bind_param("i", $ev_id);

			if ($stmt->execute()) {
				return true;
			}
			return false;
		}
	}
	
	function  get_password_from_mobile_number($mobile_number){
      if($stmt = $this->con->prepare("SELECT `password` FROM `entry` WHERE `mo_no`=?")){
      $stmt->bind_param("s",$mobile_number);
      $stmt->bind_result($reg_password);
      if($stmt->execute()){
            if($stmt->fetch()){
                  return $reg_password;
            }
      
      }
      return false;


      
      }
      }
	  
	  function  get_id_from_login_mob_no($mobile_number){
      if($stmt = $this->con->prepare("SELECT `id` FROM `add-charging-points` WHERE `mobile_no`=?")){
      $stmt->bind_param("s",$mobile_number);
      $stmt->bind_result($reg_password);
      if($stmt->execute()){
            if($stmt->fetch()){
                  return $reg_password;
            }
		}
		return false;
		}
      }
	  
	  function  get_ev_point_password_from_mobile_number($mobile_number){
      if($stmt = $this->con->prepare("SELECT `password` FROM `add-charging-points` WHERE `mobile_no`=?")){
      $stmt->bind_param("s",$mobile_number);
      $stmt->bind_result($reg_password);
      if($stmt->execute()){
            if($stmt->fetch()){
                  return $reg_password;
            }
      
      }
      return false;


      
      }
      }

	function add_ev_booking($user_id ,$charging_point,	$booking_date,$booking_type)
              {
	    $date	=	date("Y-m-d");
		  $time	=	date("H:i:s");
		  $status = "pending";
	      if($stmt = $this->con->prepare("INSERT INTO `ev_booking`(`user_id`, `charging_point`, `booking_date`, `booking_type`, `status`, `date`, `time`) VALUES (?,?,?,?,?,?,?)") )
	        {
		 $stmt->bind_param("sssssss",$user_id ,$charging_point,$booking_date,$booking_type,$status,$date,$time);
		 if($stmt ->execute())
			{
				
				return true;
			}
			else
			{
			return false;
			}
	 }
	 
    } 
		function get_all_booking(){
			if($stmt = $this->con->prepare("SELECT `id`, `user_id`, `charging_point`, `booking_date`, `booking_type`, `status`, `date`, `time` FROM `ev_booking` ")){
						$stmt -> bind_result($res_id,$res_user_id,$res_charging_point,$res_booking_date,$res_booking_time,$res_status,$res_date,$res_time);
			
						if($stmt->execute()){
									$data = array();
									$counter=0;
									while($stmt->fetch()){
												$data[$counter][0]= $res_id;
												$data[$counter][1]= $res_user_id;
												$data[$counter][2]= $res_charging_point;
												$data[$counter][3]= $res_booking_date;
												$data[$counter][4]= $res_booking_time;
												$data[$counter][5]= $res_status;
												$data[$counter][6]= $res_date;
							$data[$counter][7]= $res_time;

												$counter ++;

									}

									if(!empty($data)){

												return $data;
									}
									else{
												return false;
									}
						}
			}
			
}

function get_all_booking_from_today_date($c_date){

			if($stmt = $this->con->prepare("SELECT `id`, `user_id`, `charging_point`, `booking_date`, `booking_type`, `status`, `date`, `time` FROM `ev_booking` where `booking_date`='$c_date' AND `status`='pending'"))
			{
						$stmt -> bind_result($res_id,$res_user_id,$res_charging_point,$res_booking_date,$res_booking_time,$res_status,$res_date,$res_time);
			
						if($stmt->execute()){
									$data = array();
									$counter=0;
									while($stmt->fetch()){
												$data[$counter][0]= $res_id;
												$data[$counter][1]= $res_user_id;
												$data[$counter][2]= $res_charging_point;
												$data[$counter][3]= $res_booking_date;
												$data[$counter][4]= $res_booking_time;
												$data[$counter][5]= $res_status;
												$data[$counter][6]= $res_date;
							$data[$counter][7]= $res_time;

												$counter ++;

									}

									if(!empty($data)){

												return $data;
									}
									else{
												return false;
									}
						}
			}
			
}


function get_all_booking_from_today_date_for_ev_station($c_date,$chargin_station_id){

			if($stmt = $this->con->prepare("SELECT `id`, `user_id`, `charging_point`, `booking_date`, `booking_type`, `status`, `date`, `time` FROM `ev_booking` where `booking_date`='$c_date' AND `status`='pending' AND `charging_point`='$chargin_station_id'"))
			{
						$stmt -> bind_result($res_id,$res_user_id,$res_charging_point,$res_booking_date,$res_booking_time,$res_status,$res_date,$res_time);
			
						if($stmt->execute()){
									$data = array();
									$counter=0;
									while($stmt->fetch()){
												$data[$counter][0]= $res_id;
												$data[$counter][1]= $res_user_id;
												$data[$counter][2]= $res_charging_point;
												$data[$counter][3]= $res_booking_date;
												$data[$counter][4]= $res_booking_time;
												$data[$counter][5]= $res_status;
												$data[$counter][6]= $res_date;
							$data[$counter][7]= $res_time;

												$counter ++;

									}

									if(!empty($data)){

												return $data;
									}
									else{
												return false;
									}
						}
			}
			
}



function get_all_booking_from_today_date_completed($c_date){

			if($stmt = $this->con->prepare("SELECT `id`, `user_id`, `charging_point`, `booking_date`, `booking_type`, `status`, `date`, `time` FROM `ev_booking` where `booking_date`='$c_date' AND `status`='completed'"))
			{
						$stmt -> bind_result($res_id,$res_user_id,$res_charging_point,$res_booking_date,$res_booking_time,$res_status,$res_date,$res_time);
			
						if($stmt->execute()){
									$data = array();
									$counter=0;
									while($stmt->fetch()){
												$data[$counter][0]= $res_id;
												$data[$counter][1]= $res_user_id;
												$data[$counter][2]= $res_charging_point;
												$data[$counter][3]= $res_booking_date;
												$data[$counter][4]= $res_booking_time;
												$data[$counter][5]= $res_status;
												$data[$counter][6]= $res_date;
							$data[$counter][7]= $res_time;

												$counter ++;

									}

									if(!empty($data)){

												return $data;
									}
									else{
												return false;
									}
						}
			}
			
}



function get_all_booking_from_today_date_completed_for_cng($c_date,$chargin_station_id){

			if($stmt = $this->con->prepare("SELECT `id`, `user_id`, `charging_point`, `booking_date`, `booking_type`, `status`, `date`, `time` FROM `ev_booking` where `booking_date`='$c_date' AND `status`='completed' AND `charging_point`='$chargin_station_id'"))
			{
						$stmt -> bind_result($res_id,$res_user_id,$res_charging_point,$res_booking_date,$res_booking_time,$res_status,$res_date,$res_time);
			
						if($stmt->execute()){
									$data = array();
									$counter=0;
									while($stmt->fetch()){
												$data[$counter][0]= $res_id;
												$data[$counter][1]= $res_user_id;
												$data[$counter][2]= $res_charging_point;
												$data[$counter][3]= $res_booking_date;
												$data[$counter][4]= $res_booking_time;
												$data[$counter][5]= $res_status;
												$data[$counter][6]= $res_date;
							$data[$counter][7]= $res_time;

												$counter ++;

									}

									if(!empty($data)){

												return $data;
									}
									else{
												return false;
									}
						}
			}
			
}

function get_all_booking_from_users_id($email)
{
	if($stmt = $this->con->prepare("SELECT `id`, `user_id`, `charging_point`, `booking_date`, `booking_type`, `status`, `date`, `time` FROM `ev_booking` where `user_id`='$email'"))
	{
	$stmt -> bind_result($res_id,$res_user_id,$res_charging_point,$res_booking_date,$res_booking_time,$res_status,$res_date,$res_time);

		if($stmt->execute()){
			$data = array();
			$counter=0;
			while($stmt->fetch()){
				$data[$counter][0]= $res_id;
				$data[$counter][1]= $res_user_id;
				$data[$counter][2]= $res_charging_point;
				$data[$counter][3]= $res_booking_date;
				$data[$counter][4]= $res_booking_time;
				$data[$counter][5]= $res_status;
				$data[$counter][6]= $res_date;
				$data[$counter][7]= $res_time;

				$counter ++;
			}

			if(!empty($data)){

						return $data;
			}
			else{
						return false;
			}
		}
	}
}


function delete_ev_booking($delete_id)
{
	if ($stmt = $this->con->prepare("DELETE FROM `ev_booking` WHERE `id`=?")) {
		$stmt->bind_param("i", $delete_id);

		if ($stmt->execute()) {
			return true;
		}
		return false;
	}
}

function get_ev_update_data($update_id)
	{
		//echo $update_id;
		if ($stmt = $this->con->prepare("SELECT `user_id`, `charging_point`, `booking_date`, `booking_type`, `status`, `date`, `time` FROM `ev_booking` WHERE `id`=?")) {

			$stmt->bind_param("i", $update_id);
			$stmt->bind_result($user_id, $charging_point,$booking_date, $booking_time, $status, $date, $time);
			if ($stmt->execute()) {
				//echo 88;
				$std_data = array();
				if ($stmt->fetch()) {
					// $std_data[0] = $res_id;
					$std_data[1] = $user_id;
					$std_data[2] = $charging_point;
					$std_data[3] = $booking_date;
					$std_data[4] = $booking_time;
					$std_data[5] = $status;
					
					
					// $std_data[6] = $res_date;
					// $std_data[7] = $res_time;
					


					return $std_data;
				}
			}
			return false;

		}
	}

	function update_ev_record($charging_point, $booking_date,$booking_time,  $update_id)
	{
		//echo $update_id;
		$current_date = date("Y-m-d");
		$current_time = date("h:i:s a");
		if ($stmt = $this->con->prepare("UPDATE `ev_booking` SET `charging_point`=?,`booking_date`=?,`booking_type`=? WHERE `id`=?")) {

			$stmt->bind_param("sssi",$charging_point, $booking_date,$booking_time, $update_id);

			if ($stmt->execute()) {
				return true;
			}
			return false;
		}
	}

}
	//End
?>