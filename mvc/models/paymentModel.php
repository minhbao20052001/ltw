<?php
    class paymentModel extends db{
        
        public function add($quantity, $user_member, $product_id){
            $qr = "INSERT INTO order_product (quantity, user_member, product_id) VALUES (".$quantity.", ".$user_member.", ".$product_id.")";
            mysqli_query($this->connect, $qr);
        }
    }
?>