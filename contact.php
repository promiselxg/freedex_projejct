<?php
	if(isset($_POST['fname'])){
		$fname = preg_replace('#[^a-z]#i','',$_POST['fname']);
		$lname = preg_replace('#[^a-z]#i','',$_POST['lname']);
		$email = preg_replace('#[^a-z0-9-_.@]#i','',$_POST['email']);
		$phone = preg_replace('#[^0-9]#','',$_POST['phone']);
		$fullname = $fname." ".$lname;
		if(!$fname || !$lname || !$email || !$phone){
			echo "You left a field empty, Please fill all fields.|error";exit();
		}elseif(strlen($phone) < 10){
			echo "Your Phone Number should be at least 10 Characters Long.|error";exit();
		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "Please enter a valid Email Address.|error";exit();
		}else{
			//	connect to DB
			include_once('./scripts/db_conx.php');
			//	check if email or phone number already exist.
			$email_phone_check = mysqli_query($conx, 'SELECT email_address, phone_number FROM subscribers WHERE email_address = "'.$email.'" OR phone_number = "'.$phone.'" ');
			if(mysqli_num_rows($email_phone_check) > 0){
				echo "We already have your Details in our Database.|warning";exit();
			}else{
				$sql = mysqli_query($conx, 'INSERT INTO subscribers (full_name,email_address,phone_number,createdAt) VALUES ("'.$fullname.'","'.$email.'","'.$phone.'",now()) ');
			}
			if($sql){
				//$to = "promiselxg@gmail.com";
				$to = "freeedx2@gmail.com";
				$from = "auto_response@freeedx.guinessdeliveryservice.com";
				$subject = 'NEW EMAIL SUBSCRIBER | FeeEdx';
				$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Habra Bank | One Time Password </title></head><body><h1>NEW EMAIL FROM</h1><br/><br/><p>Full Name : '.ucwords($fname).' '.ucwords($lname).'</p><p>Email Address : '.$email.'</p><p>Phone Number : '.$phone.'</p></body></html>';
				$headers = "From: $from\n";
				$headers .= "MIME-Version: 1.0\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\n";
				$mail = mail($to, $subject, $message, $headers);
				if($mail){
					echo "Thank you for contacting us, we promise to get back to you as soon as possible via your email address - $email|success";exit();
				}else{
					echo "An unexpected error occured, Please try again later.|error";exit();
				}
			}
		}
	}
?>

