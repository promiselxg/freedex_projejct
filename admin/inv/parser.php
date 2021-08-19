<?php include_once("scripts/userlog.php");?>
<?php
    //Remove an ITEM
    if(isset($_POST['tbl']) && isset($_POST['cat'])){
        $id = preg_replace('#[^0-9]#','',$_POST['tbl']);
        $cat = preg_replace('#[^a-z_]#i','',$_POST['cat']);
        //check if category ID exist
        $sql = mysqli_query($conx,'SELECT id FROM '.$cat.' WHERE id = '.$id.' LIMIT 1');
        if(mysqli_num_rows($sql) < 1){
            echo "An Unknown Error Occured |error";exit();
        }
        if($cat == "subscribers"){
            $sql_ = mysqli_query($conx, 'DELETE FROM '.$cat.' WHERE id = '.$id.' LIMIT 1');
            $msg = "Email Subscriber Removed Successfully";
        }
        elseif($cat == "user_option"){
           $sql = mysqli_query($conx, 'DELETE FROM user_option WHERE id = '.$id.' LIMIT 1' );
           $sql_ = mysqli_query($conx, 'DELETE FROM admin WHERE id = '.$id.' LIMIT 1' );
           $msg = "This user Has been removed successfully";
        }
        if($sql){
            echo  "$msg|success";exit();
        }
    }
?>
<?php
//  GENEREATE NUMBERS
function randStrGen($len){
    $result = "";
    $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $charArray = str_split($chars);
    for($i = 0; $i < $len; $i++){
	    $randItem = array_rand($charArray);
	    $result .= "".$charArray[$randItem];
    }
    return $result;
}
$username = randStrGen(10);
$tracking_code = randStrGen(10);
$reference_no = rand(000000,5000000000000);
?>
<?php
//  UPDATE USERNAME
    if(isset($_POST['c_name']) && isset($_POST['author'])){
        //accept incoming values
        $c_name = preg_replace('#[^a-z0-9 ]#i','',$_POST['c_name']);
        $author = preg_replace('#[^a-z0-9 ]#i','',$_POST['author']);
        $cat_type = preg_replace('#[^a-z_]#i','',$_POST['cat_type']);
        $id = preg_replace('#[^0-9]#i','',$_POST['id']);
        if($c_name == "" || $author == ""){
            echo "Please Fill out the Form|error";exit();
        }
        //check if author exist
        $author_check = mysqli_query($conx,'SELECT id FROM user_option WHERE username = "'.$author.'" LIMIT 1');
        if(mysqli_num_rows($author_check) == 0){
          header("location:logout");exit();
        }
        if($cat_type == "edit_username"){
            //update Admin and User Options Table
            $username = preg_replace('#[^a-z0-9]#i','',$c_name);
            if(strlen($username) < 3){
                echo "Username is too Short|error";exit();
            }
            //check if Username already Exist
            $user_check = mysqli_query($conx, 'SELECT id FROM user_option WHERE username = "'.$username.'" LIMIT 1');
            if(mysqli_num_rows($user_check) > 0){
                echo "Username already Exist|error";exit();
            }
            $sql = mysqli_query($conx, 'UPDATE user_option SET username = "'.$username.'" WHERE id = "'.$id.'" LIMIT 1' );
            $sql_ = mysqli_query($conx, 'UPDATE admin SET username = "'.$username.'" WHERE id = "'.$id.'" LIMIT 1' );
            $msg = "You need to LOGOUT in order to Apply this Change";
            session_destroy();
        }else{
          echo "An Unknown Error Occured|error";exit();
        }
        
        if($sql){
            echo "$msg|success";exit();
        }
    }
?>
<?php
// BLOCK / UNBLOCK USER
    if(isset($_POST['user']) && isset($_POST['user']) != ""){
       $username = preg_replace('#[^a-z0-9 ]#i','',$_POST['user']);
       $type =  preg_replace('#[^a-z0-9 ]#i','',$_POST['type']);
       if($username == ""){
            echo "Username Field is Empty|error";exit();
       }
       //check if Username Exist
       $u_check = mysqli_query($conx,'SELECT id FROM user_option WHERE username = "'.$username.'" LIMIT 1' );
       if(mysqli_num_rows($u_check) < 1){
           echo "Username Does not Exist|error";exit();
       }
       if($type == "Unblock User"){
            $block_user = mysqli_query($conx, 'UPDATE user_option SET blocked = "0" WHERE username = "'.$username.'" LIMIT 1' );
            $block_ = mysqli_query($conx, 'UPDATE admin SET blocked = "0" WHERE username = "'.$username.'" LIMIT 1' );
            $msg = "This User has Been Unblocked Successfully";
       }else{
            $block_user = mysqli_query($conx, 'UPDATE user_option SET blocked = "1" WHERE username = "'.$username.'" LIMIT 1' );
            $block_ = mysqli_query($conx, 'UPDATE admin SET blocked = "1" WHERE username = "'.$username.'" LIMIT 1' );
            $msg = "This User has Been Blocked Successfully";
       }
       if($block_user && $block_ ){
            echo "$msg|success";exit();
       }
    }
?>
<?php
// CHANGE PASSWORD
    if(isset($_POST['current_password'])){
		$c_pass = "";$db_pass = "";
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
            //check for empty field
            if($current_password == "" || $new_password == "" || $confirm_password == ""){
                echo "All Fields are required|error";exit();
            }
            //check if password match
            if($new_password != $confirm_password){
                echo "The passwords you entered do NOT match|error";exit();
            }
            //check password length
            if(strlen($new_password) < 5){
                echo "Password TOO Weak|error";exit();
            }
            //get DEFAULT password from DB
            $pass_check = mysqli_query($conx, 'SELECT id FROM user_option WHERE username = "'.$log_username.'" LIMIT 1' );
            if(mysqli_num_rows($pass_check) < 1){
				echo "Incorrect Password|error";exit();
			}
			
            //hash password and update DB
            $p_hash = password_hash($new_password,PASSWORD_DEFAULT);
            $sql = mysqli_query($conx, 'UPDATE user_option SET password = "'.$p_hash.'" WHERE username = "'.$log_username.'" LIMIT 1' );
            //clear the Default Password
            $clear_pass = mysqli_query($conx, 'UPDATE admin SET password = "" WHERE username = "'.$log_username.'" LIMIT 1' );
            if($sql && $clear_pass){
                echo "Please Logout to apply this change|success";exit();
            }else{
                echo "we were unable to update your password now, please try again later|error";exit();
            }
    }
?>
<?php
//  CREATE NEW USER
    if(isset($_POST['fullname']) && isset($_POST['user_role'])){
        $fullname = preg_replace('#[^a-z0-9 ]#i','',$_POST['fullname']);
        $user_role = preg_replace('#[^a-z]#','',$_POST['user_role']);

        //check if Username exist
        $check_uname = mysqli_query($conx, 'SELECT id FROM user_option WHERE username = "'.$username.'" LIMIT 1' );
        if(mysqli_num_rows($check_uname) > 0){
            $username;
        }
        $default_pass = 12345;
        $hash_pass = password_hash($default_pass,PASSWORD_DEFAULT);
        $sql = mysqli_query($conx,'INSERT into admin (username,password,last_login,full_name,user_level) values ("'.$username.'","'.$default_pass.'",now(),"'.$fullname.'","'.$user_role.'") ' );
        $p_id = mysqli_insert_id($conx);
        $user_op = mysqli_query($conx, 'INSERT into user_option (id,username,password,user_level) values ("'.$p_id.'","'.$username.'","'.$hash_pass.'","'.$user_role.'") ' );
        if($sql && $user_op){
            echo "New User Created Successfully|success";exit();
        }else{
            echo mysqli_error($conx)."Unable to Create new User|error";exit();
        }
    }
?>
