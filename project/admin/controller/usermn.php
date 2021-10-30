<?php
    include 'model/db.php';
    include 'model/users.php';
    $user=new User;
    if(isset($_GET['action'])){
        $action=$_GET['action'];
    }
    else{
        $action='';
    }


    switch ($action) {
        case "add":
        {
            if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['add'])){
                          $add=$user->AddUser($_POST);

            } 
             require_once('view/adduser.php');
             break;
        }
        case "edit":
        {
                if(isset($_GET["id"])){
                        $id=$_GET["id"];
                } 
                
                if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['update'])){
                          $update=$user->UpdateUser($_POST,$id);
                }
                $result=$user->LoadById($id);

                       
             require_once('view/edituser.php');
             break;
        }
        case "delete":
        {
            if(isset($_GET["id"])){
                $id=$_GET["id"];
                  $del=$user->DeleteUser($id);
                  header("location:index.php?controller=user");
            }
            else{
                header("location:index.php?controller=user");
            }
            
             break;
        }

       default:
        {
            $result=$user->LoadInform();
            require_once('view/usermn.php');
        }
        
    }
?>