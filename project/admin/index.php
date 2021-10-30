<?php
   if(isset($_GET['controller'])) {
       $controller=$_GET['controller'];
    }
    else{
        $controller='';
    }
    switch ($controller) { 
    	case 'home':{
            require_once('controller/home.php');
            break;
        }
		case 'login':{
            require_once('controller/login.php');
            break;
        }
        case 'user':{
            require_once('controller/usermn.php');
            break;
        } 
        case 'product':{
            require_once('controller/productmn.php');
            break;
        }
        case 'order':{
            require_once('controller/ordermn.php');
            break;
        }
        case 'banner':{
            require_once('controller/banner.php');
            break;
        }
        default:{
           require_once('controller/home.php');
            break;
        }
    }

 ?>