<?php
    require_once "./mvc/core/basehref.php";
    Class payment extends Controller {
        function addToCart(){
            $quantity = $_POST['quantity'];
            $user_member = $_POST['user_member'];
            $product_id = $_POST['user_member'];
            $this->model("paymentModel")->add($quantity, $user_member, $product_id);
            header("Location: " . geturl(). "/home");
        }
    }
?>