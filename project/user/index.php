<?php
    // include "model/db.php";
    // include "model/users.php";
    // include "lib/session.php";
    // Session::init();
    // $db=new Database();
    // $user=new User;
   if(isset($_GET['controller'])) {
       $controller=$_GET['controller'];
    }
    else{
        $controller='';
    }
    switch ($controller) { 
    	case 'index':{
            require_once('controller/route.php');
            break;
        }  
        case 'shop':{
            require_once('controller/route.php');
            break;
        }
        case 'single':{
            require_once('controller/route.php');
            break;
        }
        case 'checkout':{
            require_once('controller/route.php');
            break;
        }
        case 'contact':{
           require_once('controller/route.php');
           break;
        }
        case 'cart':{
           require_once('controller/route.php');
           break;
        }
        case 'login':{
           require_once('controller/route.php');
           break;
        }
        case 'signup':{
           require_once('controller/route.php');
           break;
        }
        case 'account':{
           require_once('controller/account.php');
           break;
        }

        default:{
            require_once('controller/route.php');
        }
    }

 ?>