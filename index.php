<?php
// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Test url http://yourdomain/index.php?uid=MoFSTsuktw&e_post=test2@jmb.nu

// get password info
if (isset($_GET['uid'])&&isset($_GET['e_post'])){
	
	$user_epost = htmlspecialchars(strip_tags($_GET['e_post']));
	$user_uid = htmlspecialchars(strip_tags($_GET['uid']));
	
	
} else {
    // Fallback behaviour goes here
	echo "<div class='alert alert-info'>No password found.</div>";
}
 
 
 
 
// set number of records per page
$records_per_page = 5;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;
 
// include database and object files
include_once 'config/database.php';
include_once 'objects/password.php';
 
// instantiate database and objects
$database = new Database();
$db = $database->getConnection();
 
$password = new Password($db);

 
// query products
//$stmt = $password->readAll($from_record_num, $records_per_page);
//$num = $stmt->rowCount();


// set page header
$page_title = "Your password";
include_once "layout_header.php";


if($password->check_if_exist($user_epost,$user_uid)[0]){
	
	
	
$password->update_count($user_epost,$user_uid);


		
	
		
		echo "<div><h2>".$password->Show_and_remove_pass_on_count($user_epost,$user_uid)."</h2></div>";
		
		
}else{
	
	
	echo "<div><h2>Password does not exist</h2></div>";
	
}
	

	



 
echo "<div class='right-button-margin'>";
    echo "<a href='create_pass.php' class='btn btn-default pull-right'>Create Password</a>";
echo "</div>";


 
// set page footer
include_once "layout_footer.php";
?>