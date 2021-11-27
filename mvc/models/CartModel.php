<?php
    class CartModel extends db{
        function getAllOrders($user_id){
            $qr = "SELECT * FROM order_product WHERE user_member='".$user_id."'";
            return mysqli_query($this->connect, $qr);
        }

        function payOrder($order_id){
            $qr = "UPDATE order_product SET order_status=1 WHERE order_id='".$order_id."'";
            mysqli_query($this->connect, $qr);
        }
    }
?>