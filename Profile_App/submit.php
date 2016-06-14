<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	include('db_connection.php');

	$pic_update = 0;
	
	if(isset($_POST['submit']))
	{
		$count = 0;

		// Validating first name
		if(isset($_POST['first_name']) && !empty($_POST['first_name']))
		{
			$f_name = formatted($_POST['first_name']);
		}
		else
		{
			echo 'Please give a valid First Name';
			echo "<br>";
			$count++;
		}

		// Validating middle name
		if(isset($_POST['middle_name']) && !empty($_POST['middle_name']))
		{
			$m_name = formatted($_POST['middle_name']);
		}
		else
		{
			echo 'Please give a valid Middle Name';
			echo "<br>";
			$count++;
		}

		// Validating last name
		if(isset($_POST['last_name']) && !empty($_POST['last_name']))
		{
			$l_name = formatted($_POST['last_name']);
		}
		else
		{
			echo 'Please give a valid Last Name';
			echo "<br>";
			$count++;
		}

		// Validating prefix
		if(isset($_POST['prefix']))
		{
			$prefix = $_POST['prefix'];
		}
		else
		{
			$count++;
		}
		// Validating gender
		if(isset($_POST['gender']))
		{
			$gender = $_POST['gender'];
		}
		else
		{
			$count++;
		}

		// Validating date of birth
		if(isset($_POST['dob']))
		{
			$dob = $_POST['dob'];
		}
		else
		{
			$count++;
		}

		// Validating marital status
		if(isset($_POST['marital']))
		{
			$marital = $_POST['marital'];
		}
		else
		{
			$count++;
		}

		// Validating employment status
		if(isset($_POST['employment']))
		{
			$employment = $_POST['employment'];
		}
		else
		{
			$count++;
		}

		// Validating employer
		if(isset($_POST['employer']) && !empty($_POST['employer']))
		{
			$employer = formatted($_POST['employer']);
		}
		else
		{
			echo 'Please give a valid Employer Name';
			echo "<br>";
			$count++;
		}

		// Validating residence street
		if(isset($_POST['r_street']) && !empty($_POST['r_street']))
		{
			$r_street = formatted($_POST['r_street']);
		}
		else
		{
			echo 'Please give a valid residence Street';
			echo "<br>";
			$count++;
		}

		// Validating residence city
		if(isset($_POST['r_city']) && !empty($_POST['r_city']))
		{
			$r_city = formatted($_POST['r_city']);
		}
		else
		{
			echo 'Please give a valid residence City';
			echo "<br>";
			$count++;
		}

		// Validating residence state
		if(isset($_POST['r_state']) && !empty($_POST['r_state']))
		{
			$r_state = formatted($_POST['r_state']);
		}
		else
		{
			echo 'Please give a valid residence State';
			echo "<br>";
			$count++;
		}

		// Validating residence zip
		if(isset($_POST['r_zip']) && !empty($_POST['r_zip']))
		{
			$r_zip = formatted($_POST['r_zip']);
			if(!ctype_digit($r_zip))
			{
				echo 'Please give a valid residence Zip';
				echo "<br>";
				$count++;
			}
		}

		// Validating residence phone
		if(isset($_POST['r_phone']) && !empty($_POST['r_phone']))
		{
			$r_phone = formatted($_POST['r_phone']);
			if(!ctype_digit($r_phone))
			{
				echo 'Please give a valid residence Phone';
				echo "<br>";
				$count++;
			}
		}

		// Validating residence fax
		if(isset($_POST['r_fax']) && !empty($_POST['r_fax']))
		{
			$r_fax = formatted($_POST['r_fax']);
			if(!ctype_digit($r_fax))
			{
				echo 'Please give a valid residence Fax';
				echo "<br>";
				$count++;
			}
		}

		// Validating office street
		if(isset($_POST['o_street']) && !empty($_POST['o_street']))
		{
			$o_street = formatted($_POST['o_street']);
		}
		else
		{
			echo 'Please give a valid office Street';
			echo "<br>";
			$count++;
		}

		// Validating office city
		if(isset($_POST['o_city']) && !empty($_POST['o_city']))
		{
			$o_city = formatted($_POST['o_city']);
		}
		else
		{
			echo 'Please give a valid office City';
			echo "<br>";
			$count++;
		}

		// Validating office state
		if(isset($_POST['o_state']) && !empty($_POST['o_state']))
		{
			$o_state = formatted($_POST['o_state']);
		}
		else
		{
			echo $_POST['o_state'];
			echo 'Please give a valid office State';
			echo "<br>";
			$count++;
		}

		// Validating office zip
		if(isset($_POST['o_zip']) && !empty($_POST['o_zip']))
		{
			$o_zip = formatted($_POST['o_zip']);
			if(!ctype_digit($o_zip))
			{
				echo 'Please give a valid office Zip';
				echo "<br>";
				$count++;
			}
		}

		// Validating office phone
		if(isset($_POST['o_phone']) && !empty($_POST['o_phone']))
		{
			$o_phone = formatted($_POST['o_phone']);
			if(!ctype_digit($o_phone))
			{
				echo 'Please give a valid office Phone';
				echo "<br>";
				$count++;
			}
		}

		// Validating office fax
		if(isset($_POST['o_fax']) && !empty($_POST['o_fax']))
		{
			$o_fax = formatted($_POST['o_fax']);
			if(!ctype_digit($o_fax))
			{
				echo 'Please give a valid office Fax';
				echo "<br>";
				$count++;
			}
		}

		// Validating Picture
		if(isset($_FILES['pic']))
		{
		    $errors= array();
		    $file_name = $_FILES['pic']['name'];
		    $file_size = $_FILES['pic']['size'];

		    if (0 < $file_size) 
		    {
				$pic_update = 1;
			    $file_tmp = $_FILES['pic']['tmp_name'];
			    $file_type= $_FILES['pic']['type'];

			    $ext_arr = explode('.',$file_name);
			    $file_ext = strtolower(end($ext_arr));
			    $expensions = array("jpeg","jpg","png");
			      
			    if(in_array($file_ext,$expensions)=== false)
			    {
			       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
			    }		      
			    if($file_size > 8388608)
			    {
			       $errors[]='File size must be excately 2 MB';
			    }		      
			    if(empty($errors)==true)
			    {
			       move_uploaded_file($file_tmp,"images/".$file_name);
			    }else
			    {
			       print_r($errors);
			    }
			}
		}
		// if(isset($_FILES['pic']) && !empty($_FILES['pic']))
		// {
		// 	$pic = formatted($file_name);
		// }
		else
		{
			echo 'Please give a valid Photo';
			echo "<br>";
			$count++;
		}
		
		// Validating Notes
		if(isset($_POST['notes']))
		{
			$notes = formatted($_POST['notes']);
		}
		else
		{
			$notes = ' ';
		}

		// Validating Communication Medium
		if(isset($_POST['comm']) && !empty($_POST['comm']))
		{
			$comm = implode(', ', $_POST['comm']);
		}
		else
		{
			echo 'Please give at least one Communication Medium';
			echo "<br>";
			$count++;
		}

		if($count > 0)
		{
			exit;
		}
		$check = 0;
		if(isset($_POST['edit_id']) && 0 != $_POST['edit_id'])
		{
			if(1 == $pic_update)
			{
				$q_pic = "SELECT emp.photo AS photo FROM employee AS emp
				WHERE emp.id = ".$_POST['edit_id'];

				$result_pic = mysqli_query($conn, $q_pic);
				$row_pic = mysqli_fetch_array($result_pic, MYSQLI_ASSOC);
				$pic_name = "images/".$row_pic['photo'];
	    		unlink($pic_name);
			}

			$q_fetch = "SELECT emp.first_name AS f_name, emp.middle_name AS m_name, 
			emp.last_name AS l_name, emp.prefix AS prefix, emp.gender AS gender, 
			emp.dob AS dob, emp.marital_status AS marital, emp.employment AS employment, 
			emp.employer AS employer, res.street AS r_street, res.city AS r_city, 
			res.state AS r_state, res.zip AS r_zip, res.phone AS r_phone, res.fax AS r_fax, 
			off.street AS o_street, off.city AS o_city, off.state AS o_state, 
			off.zip AS o_zip, off.phone AS o_phone, off.fax AS o_fax, emp.photo AS photo, 
			emp.extra_note AS notes, emp.comm_id AS comm_id 
			from employee AS emp 
			INNER JOIN address AS res ON (emp.id = res.emp_id AND res.address_type = 'residence')
			INNER JOIN address AS off ON (emp.id = off.emp_id AND off.address_type = 'office')
			WHERE emp.id = ".$_POST['edit_id'];

			$result = mysqli_query($conn, $q_fetch);

			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

			$update_add = "UPDATE `address` 
			SET `street` = '$r_street', `city` = '$r_city', `state` = '$r_state', `zip` = $r_zip, 
			`phone` = $r_phone, `fax` = $r_fax 
			WHERE (address_type = 'residence' AND emp_id = ".$_POST['edit_id'].");
			UPDATE `address` 
			SET `street` = '$o_street', `city` = '$o_city', `state` = '$o_state', `zip` = $o_zip, 
			`phone` = $o_phone, fax` = $o_fax 
			WHERE (address_type = 'office' AND emp_id = ".$_POST['edit_id'].");";

			mysqli_query($conn,$update_add);

			if($pic_update)
			{
				$update_emp = "UPDATE `employee` 
				SET `first_name` = '$f_name', `middle_name` = '$m_name', `last_name` = '$l_name', 
				`prefix` = '$prefix', `gender` = '$gender', `dob` = '$dob', 
				`marital_status` = '$marital', `employment` = '$employment', 
				`employer` = '$employer', `photo` = '$file_name', `extra_note` = '$notes', 
				`comm_id` = '$comm' 
				WHERE id = ".$_POST['edit_id'];

				mysqli_query($conn,$update_emp);
			}
			else
			{
				$update_emp = "UPDATE `employee` 
				SET `first_name` = '$f_name', `middle_name` = '$m_name', `last_name` = '$l_name', 
				`prefix` = '$prefix', `gender` = '$gender', `dob` = '$dob', 
				`marital_status` = '$marital', `employment` = '$employment', 
				`employer` = '$employer', `extra_note` = '$notes', `comm_id` = '$comm' 
				WHERE id = ".$_POST['edit_id'];

				mysqli_query($conn,$update_emp);
			}
			$check = 1;
			header("Location: display.php");
		}

		if(0 == $check)
		{
			$q_employee = "INSERT INTO employee(first_name, middle_name, last_name, prefix, gender, 
			dob, marital_status, employment, employer, photo, extra_note, comm_id) 
			VALUES ('$f_name', '$m_name', '$l_name', '$prefix', '$gender', '$dob', '$marital', 
			'$employment', '$employer', '$file_name', '$notes', '$comm')";

			$result_1 = mysqli_query($conn, $q_employee);

			if (TRUE === $result_1) 
			{
				$employee_id = mysqli_insert_id($conn);

	            $q_address = "INSERT INTO `address`(`emp_id`, `address_type`, `street`, `city`, 
	            `state`, `zip`, `phone`, `fax`) 
	            VALUES
				($employee_id,'residence','$r_street','$r_city','$r_state','$r_zip','$r_phone','$r_fax'),
				($employee_id,'office','$o_street','$o_city','$o_state','$o_zip','$o_phone','$o_fax')";

				$result_2 = mysqli_query($conn, $q_address);
			} 
			else
			{
				echo 'Not inserting'; 
				exit;
			}
		}		
	}
	else
	{
		exit;
	}
	function formatted($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	// echo 'Hello';
	header("Location: display.php");
	?>