<?php
$errors = ['result' => ''];
if(isset($_POST['submit'])){

$username = $db->secure($_POST['username']);
$password = $db->secure($_POST['password']);

if(empty($username) || empty($password)){
    $errors['result'] = "Please Fill In The Blanks Nicely";
}else{
//method
$check = User::verify($username, $password);
if($check){
$session->login($check);
redirect("index.php");
}else{
$errors['result'] = "Your Username Or Password Was incorrect !";
}
}
}


?>