<?php
require_once "./mvc/core/basehref.php";
class authModal extends db{
    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    public function authLogin($email,$password){
        $typesql = "SELECT * FROM member WHERE member_email='".$email."' AND member_password='".$password."';";
        $query1 = $this->_query($typesql);
        if(!$query1) return [];
        $types = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($types, $row);
        }
        return $types;
    } 
    public function authRegister($member_name,$member_password, $member_email,$member_phone){
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