<?php 

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$name = security_requires_check($_POST["name"]);
	  	$email = security_requires_check($_POST["email"]);
	  	$description = security_requires_check($_POST["description"]);
	  	$reason_for_contact = security_requires_check($_POST["reason_for_contact"]);
	}

	$formcontent="From: $name \n Message: $message";
	$recipient = "nmanivan@umich.edu";
	$subject = "User Email from Personal Website";
	$mailheader = "From: $email \r\n";
	mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
	echo "Thank You!";


	function security_requires_check($data) 
	{
		$nameErr = $emailErr = $reason_for_contact_err = "";
		$name = $email = $reason_for_contact = $description = "";

		if (empty($_POST["name"])) 
		{
			$nameErr = "Name is required";
		} 
		else 
		{
			$name = security_check($_POST["name"]);
		}

		if (empty($_POST["email"])) 
		{
			$emailErr = "Email is required";
		} 
		else 
		{
			$email = security_check($_POST["email"]);
		}

		if (empty($_POST["description"])) 
		{
			$description = "";
		} 
		else 
		{
			$description = security_check($_POST["comment"]);
		}

		if (empty($_POST["reason_for_contact"])) 
		{
			$reason_for_contact_err = "Reason for Contact is required";
		} 
		else 
		{
			$reason_for_contact = security_check($_POST["gender"]);
		}

	}

	function security_check($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>








