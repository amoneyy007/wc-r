<?php
// Allow requests from any origin
header("Access-Control-Allow-Origin: *");

// Allow sending credentials (like cookies and HTTP authentication) in CORS requests
header("Access-Control-Allow-Credentials: true");

// Other headers you might want to include to control allowed methods, headers, etc.
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Authorization, Content-Type");
if(isset($_GET['dom'])) {
	
	$email = $_GET['dom'];

	$domain_name = substr(strrchr($email, "@"), 1);
	
	if(getmxrr($domain_name,$mx_details)){
		
		foreach($mx_details as $value){
			$mxName = $value;
		}
		
		$output = array(
			'success'	=> $mxName
		);
		
		
	}else{
		
		$output = array(
			'error'	=> 'An error occurred!'
		);
		
	}
	
	echo json_encode($output);
	
	
	
}
?>