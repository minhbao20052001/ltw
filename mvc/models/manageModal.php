<?php
class manageModal extends db{
    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    
    public function deleteProductManage($id){
        $typesql = "DELETE FROM products WHERE product_id=" . $id . ";";
        $query1 = $this->_query($typesql);
        return $query1;
    }
    public function editProductManage($id,$name,$type,$price,$quantity,$detail,$brand,$rating){
        if($id != -1){
            $typesql1 = "UPDATE products
                        SET product_name='".$name."', product_type='".$type."',product_price=".$price.", product_quantity=".$quantity.", product_detail='".$detail."', product_brand='".$brand."', product_image='".$rating."'
                        WHERE product_id=".$id.";";
            $query1 = $this->_query($typesql1);
        }else{
            $typesql1 = "insert into products (product_name, product_type, product_price, product_quantity, product_detail, product_brand, product_image)
            values ('".$name."', '".$type."', ".$price.", ".$quantity.", '".$detail."', '".$brand."', '".$rating."');";
            $query1 = $this->_query($typesql1);
        }
        return $id;
    }
    public function getProductManagePaging($page){
        $skip = (intval($page) - 1) * 5;
        if(intval($page) - 1 == 0){
            $skip = 0;
        }
        
        $typesql = "SELECT * FROM products LIMIT ".$skip.", 5;";
        $query1 = $this->_query($typesql);
        if(!$query1) return [];
        $types = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($types, $row);
        }
        return $types;
    } 
    public function getProductUserPaging($page){
        $skip = (intval($page) - 1) * 5;
        if(intval($page) - 1 == 0){
            $skip = 0;
        }
        
        $typesql = "SELECT * FROM member LIMIT ".$skip.", 5;";
        $query1 = $this->_query($typesql);
        if(!$query1) return [];
        $types = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($types, $row);
        }
        return $types;
    }
    public function deleteUserManage($id){
        $typesql = "DELETE FROM member WHERE member_id=" . $id . ";";
        $query1 = $this->_query($typesql);
        return $query1;
    }
    public function editUserManage($id,$Name,$Password,$Email,$Phone,$Avatar){
        if($id != -1){
            $typesql1 = "UPDATE member
                        SET member_name='".$Name."', member_password='".$Password."', member_email='".$Email."', member_phone=".$Phone.", member_role='".$Avatar."'
                        WHERE member_id=".$id.";";
            $query1 = $this->_query($typesql1);
        }else{
            $Password = password_hash($Password, PASSWORD_DEFAULT);
            $typesql1 = "insert into member (member_name, member_password, member_email, member_phone, member_role)
            values ('".$Name."', '".$Password."', '".$Email."', ".$Phone.", '".$Avatar."');";
            $query1 = $this->_query($typesql1);
        }
        return $id;
    }
    public function getOrderPaging($page){
        $skip = (intval($page) - 1) * 5;
        $skipnext = $skip + 5;
        if(intval($page) - 1 == 0){
            $skip = 0;
            $skipnext = 5;
        }
        
        $typesql = "SELECT * FROM order_product LIMIT ".$skip.", ".$skipnext.";";
        $query1 = $this->_query($typesql);
        if(!$query1) return [];
        $types = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($types, $row);
        }
        return $types;
    }
    public function deleteOrderManage($id){
        $typesql = "DELETE FROM order_product WHERE order_id=" . $id . ";";
        $query1 = $this->_query($typesql);
        return $query1;
    }
}
?>