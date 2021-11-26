<?php
    Class Home extends Controller {
        function defaultView(){
            $productDB = $this->model("ProductsModel");
            $_SESSION['username'] = 1;
            $this->view("HomeView", [
                "all-pro"=>$productDB->getAllProducts(),
                "all-type"=>$productDB->getAllCategories(),
                "pro-db"=>$productDB,
            ]);
        }
    }
?>