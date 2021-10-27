<?php
    if(isset($_GET['controller'])){
        $controller=$_GET['controller'];
    }
    else{
        $controller='';
    }


    switch ($controller) {
        case 'index':{
            require_once('view/index.php');
            
            break;
        }  
        case 'shop':{
            require_once('view/shop.php');
            break;
        }
        case 'tim-kiem':{
            if(isset($_GET['tukhoa'])){
                $key=$_GET['tukhoa'];
               


            }
            require_once('view/search.php');
            break;
        }
        case 'single':{
            require_once('view/single-product.php');
            break;
        }
        case 'checkout':{
            require_once('view/checkout.php');
            break;
        }
        case 'contact':{
           require_once('view/lienhe.php');
           break;
        }
        case 'cart':{
           require_once('view/cart.php');
           break;
        }
        case 'login':{
           require_once('view/login.php');
           break;
        }
        case 'signup':{
           require_once('view/signup.php');
           break;
        }
        default:{
            require_once('view/index.php');
        }
    }
?>