<?php
    Class Cart extends Controller {
        function defaultView(){
            $user_id = $_SESSION['username'];
            $cartDB = $this->model("CartModel");
            $productDB = $this->model("ProductsModel");
            
            $orderList = array();
            $quantityList = array();

            foreach ($cartDB->getAllOrders($user_id) as $pro){
                $product = mysqli_fetch_array($productDB->getProduct($pro["product_id"]));
                array_push($orderList, $product);
                array_push($quantityList, $pro["quantity"]);
            }

            $this->view("CartView", [
                "all-order"=>$orderList,
                "all-quantity"=>$quantityList,
            ]);
        }
    }
?>