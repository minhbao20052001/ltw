<?php
    class CartModel extends db{
        function getAllOrders($user_id){
            $qr = "SELECT * FROM order_product WHERE user_member='".$user_id."'";
            return mysqli_query($this->connect, $qr);
        }
    }
?>