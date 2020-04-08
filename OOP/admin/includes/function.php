<?php
function redirect($url){
header("Location:{$url}");
}

function in($i){
global $session;

    if($i === 0){
    if($session->get_logged_in()){
        redirect("index.php");
    }
}
     
    if($i === 1){
        if(!$session->get_logged_in()){
            redirect("login.php");
        }
    }

    if($i === 2){
        if( ($session->get_logged_in() || !$session->get_logged_in()) && $session->rule != 2){
            redirect("index.php");
        }
    }

}

if(isset($_GET['logout'])){
    $session->logout();
    redirect("login.php");
}
?>
