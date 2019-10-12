<?php

// include database and object files
include_once 'config/database.php';
include_once 'objects/password.php';

 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to objects
$password = new Password($db);


// set page headers
$page_title = "Create pass";
include_once "layout_header.php";
 
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>Back</a>";
echo "</div>";
 
?>
<?php 
// if the form was submitted 



if($_POST){
 
    // set pass property values
    $password->e_post = htmlspecialchars(strip_tags($_POST['epost']));
    $password->uses = htmlspecialchars(strip_tags($_POST['uses']));

 
    // create the pass
    if($password->create()){
		
        echo "<div class='alert alert-success'>Password was created & Sent.</div>";
		
    }
 
    // if unable to create the password, tell the user
    else{
        echo "<div class='alert alert-danger'>Unable to create password.</div>";
		
    }
}
?>

<!-- 'create pass' html form will be here -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>E-post</td>
            <td><input type='text' name='epost' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Uses</td>
            <td><input type='text' name='uses' class='form-control' /></td>
        </tr>
 

 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
 
    </table>
</form>
<?php
 
// footer
include_once "layout_footer.php";
?>