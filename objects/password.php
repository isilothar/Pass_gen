<?php
	
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '/home/jmbnu/public_html/test.jmb.nu/PHPMailer/PHPMailer/src/Exception.php';
require '/home/jmbnu/public_html/test.jmb.nu/PHPMailer/PHPMailer/src/PHPMailer.php';
require '/home/jmbnu/public_html/test.jmb.nu/PHPMailer/PHPMailer/src/SMTP.php';

include 'config.php';		//add config file
	

class Password{
 
    // database connection and table name
    private $conn;
    private $table_name = "pass_gen";
	

 
    // object properties
    public $id;
    public $uid;
    public $password;
    public $e_post;
	public $uses;
 
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create product
    function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    uid=:uid, password=:password, e_post=:e_post, uses=:uses";
 
        $stmt = $this->conn->prepare($query);
 
        
        $this->uid=$this->generateRandomString();
        $this->password=$this->generateRandomString();
		
		
		
		// posted values
        $this->e_post=htmlspecialchars(strip_tags($this->e_post));
        $this->uses=htmlspecialchars(strip_tags($this->uses));
 
   
        // bind values 
        $stmt->bindParam(":uid", $this->uid);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":e_post", $this->e_post);
        $stmt->bindParam(":uses", $this->uses);
        
 
        if($stmt->execute()){
			
			$this->send_smtp_mail($this->e_post, $this->uid);
			
            return true;
        }else{
            return false;
        }
 
    }
	
	function generateRandomString($length = 18) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
		for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		
    return $randomString;
	}
	

	
	function update_count($email, $user_uid){
		
		
		$query = "UPDATE 
		
				" . $this->table_name . "
                
            SET 
               current_uses=current_uses+1
			WHERE

				e_post='$email' AND uid='$user_uid'";
                
	$stmt = $this->conn->prepare( $query );
    $stmt->execute();
	}
	
	function get_counts($email, $user_uid){
		
		$query = "SELECT uses, current_uses
            FROM
                " . $this->table_name . "
            WHERE

				e_post='$email' AND uid='$user_uid'";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
	
	$result = $stmt->fetch(\PDO::FETCH_ASSOC);	

	 return $result;
		
	}
	
	function Show_and_remove_pass_on_count($email, $user_uid){
		
		$counts = $this->get_counts($email, $user_uid);
		
		$password_max_uses = $counts[uses];
		$password_current_uses = $counts[current_uses];
		
		if($password_current_uses > $password_max_uses){
			
			$this->delete_pass($email, $user_uid);
			
			return "Password no longer available";
			
		}
		else{
			$pass = $this->show_password($email, $user_uid);
			
			
			return 'Your password: '.$pass[password].'';
		}
		
	}
	
	
	function delete_pass($email, $user_uid){
		
		
		$query = "DELETE 
            FROM
                " . $this->table_name . "
            WHERE

				e_post='$email' AND uid='$user_uid'";
 
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
	}	
	
	function show_password($email, $user_uid){
		$query = "(SELECT password
            FROM
                " . $this->table_name . "
            WHERE

				e_post='$email' AND uid='$user_uid')
				
				UNION (SELECT 'does not exist')LIMIT 1";
 
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		$result = $stmt->fetch(\PDO::FETCH_ASSOC);
	 
		return $result;
		
	}
	
	
	
	function check_if_exist($email, $user_uid){
		
		
		$query = "select exists(SELECT password 
            FROM
                " . $this->table_name . "
            WHERE

				e_post='$email' AND uid='$user_uid')";
 
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		
		$result = $stmt->fetch();	

		return $result;
		
		
	}	

	function html_mail ($email, $user_uid){
		
			$message = '<html><body>';
			$message .= '<h1>Hi '.$email.'</h1>
				<p>Your new passwors is generted, follow the link below to copy it.</p>
				<p><a href="'.$SITE_URL.'/index.php?uid='.$user_uid.'&e_post='.$email.'" target="_blank" rel="noopener">Get your new pssword</a></p>';
			$message .= "</body></html>";
			
		return 	$message;
	}
	
	
	function send_smtp_mail($email, $user_uid){
		
		
		
		
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->CharSet = CHARSET;

			$mail->Host       = SMTP_HOST; 						// SMTP server example
			$mail->SMTPDebug  = SMTP_DEBUG;                     // enables SMTP debug information (for testing)
			$mail->SMTPSecure = SMTP_SECURE;
			$mail->SMTPAuth   = SMTP_AUTH;                  	// enable SMTP authentication
			$mail->Port       = SMTP_PORT;                      // set the SMTP port for the GMAIL server
			$mail->Username   = SMTP_USERNAME; 					// SMTP account username example
			$mail->Password   = SMTP_PASSWORD;        			// SMTP account password example
			
			
			$mail->setFrom($MAIL_SEND_ADRESS, 'NoReply-Password Generator');
			$mail->addAddress($email, 'My Friend');
			$mail->Subject = 'Your new Password';
			$mail->isHTML(true);
			$mail->Body = $this->html_mail($email, $user_uid);
			
			if(!$mail->send()){
			  echo 'Message was not sent.';
			  echo 'Mailer error: ' . $mail->ErrorInfo;
			} else {
			   echo '';//echo 'Message has been sent.';
}
		
			//$message = $this->html_mail($email, $user_uid);
	}	
}
?>