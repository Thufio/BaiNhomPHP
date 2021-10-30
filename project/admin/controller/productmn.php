<?php
    include_once 'model/db.php';
    include_once 'model/products.php';
    $db=new Database();
    $product=new Product;
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
                          $add=$product->AddProduct($_POST,$_FILES);

            } 
             require_once('view/addproduct.php');
             break;
        }
        case "edit":
        {
           
            if(isset($_GET["id"])){
                        $id=$_GET["id"];
                } 
                if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['update'])){
                          $update=$product->UpdateProduct($_POST,$_FILES,$id);
                }
                $result=$product->GetProductById($id);
             require_once('view/editproduct.php');
             break;
        }
        case "delete":
        {
            if(isset($_GET["id"])){
                $id=$_GET["id"];
                $del=$product->DeleteProduct($id);
                header("location:index.php?controller=product");
            }
            else{
                header("location:index.php?controller=product");
            }
             break;
        }

       default:
        {
            $result=$product->GetAllProduct();
            require_once('view/productmn.php');
        }
        
    }
?>