<?php
    include_once 'model/db.php';
    include_once 'model/order.php';
    $db=new Database();
    $order=new Order;
    if(isset($_GET['action'])){
        $action=$_GET['action'];
    }
    else{
        $action='';
    }


    switch ($action) {
        case "edit":
        {
            if(isset($_GET["id"])){
                        $id=$_GET["id"];
                        
                        if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['update'])){
                        $update=$order->UpdateOrder($_POST,$id);

                        }
                         $result=$order->GetById($id);
            } 
                
             require_once('view/editorder.php');
             break;
        }
        case "delete":
        {
            if(isset($_GET["id"])){
                $id=$_GET["id"];
                $del=$order->DeleteOrer($id);
                header("location:index.php?controller=order");
            }
            else{
                header("location:index.php?controller=order");
            }
             break;
        }

       default:
        {
            $result=$order->GetAllOrder();
            require_once('view/ordermn.php');
        }
        
    }
?>