<?php

class Session{

    public $userid; //int
    public $rule; //int
    private $logged_in = false; //boolean

    public function __construct()
    {
        session_start();
        $this->check_login();
        
    }
    public function get_logged_in(){
        return $this->logged_in;
      
    }
    public function login($user){
        if($user){
            $this->userid = $_SESSION['userid'] = $user->id;
            $this->rule  = $_SESSION['rule'] = $user->rule;
            $this->logged_in = true;
        }
    }

    public function logout(){
        unset($this->userid);
        unset($_SESSION['userid']);
        unset($_SESSION['rule']);
        unset($this->rule);
        $this->rule = false;
    }

    private function check_login(){
        if(isset($_SESSION['userid']) && isset($_SESSION['rule'])){
            $this->userid = $_SESSION['userid'];
            $this->rule = $_SESSION['rule'];
            $this->logged_in = true;
        }else{
            unset($this->userid);
            unset($this->rule);
            $this->logged_in = false;
        }
    }
}

$session = new Session();
?>