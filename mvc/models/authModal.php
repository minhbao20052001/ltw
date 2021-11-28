<?php
require_once "./mvc/core/basehref.php";
class authModal extends db{
    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    public function authLogin($email,$password){
        $typesql = "SELECT * FROM member WHERE member_email='".$email."';";
        $query1 = $this->_query($typesql);
        if(!$query1) return [];
        $types = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($types, $row);
        }
        $pwDB = $types[0]['member_password'];
        if(password_verify($password, $pwDB)) {
           return $types;
        }else{
            return [];
        }
        
    } 
    public function authRegister($member_name,$member_password, $member_email,$member_phone){
        $member_password = password_hash($member_password, PASSWORD_DEFAULT);
        if(!($member_name&&$member_password&& $member_email&&$member_phone)) return "<script>
            alert('Thông tin nhập thiếu. Mời nhập lại');
            location.href = '".geturl()."/login/registerView';
        </script>";
        $typesql1 = "insert into member (	member_name,	member_password,	member_email,	member_phone)
        values ('".$member_name."', '".$member_password."', '".$member_email."', '".$member_phone."');";
        if (!$this->_query($typesql1)) {
            return "<script>
                alert('Thông tin nhập thiếu. Mời nhập lại');
                location.href = '".geturl()."/login/registerView';
            </script>";
        }
        return "";
    }

}
?>