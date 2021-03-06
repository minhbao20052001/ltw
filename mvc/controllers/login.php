<?php
    require_once "./mvc/core/basehref.php";
    Class Login extends Controller {
        public function loginView(){
            $this->view("loginView");
        }
        public function auth(){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $demoData = $this->model('authModal')->authLogin($email,$password);
            
            if(!$demoData) echo "<script>
                alert('Thông tin đăng nhập sai. Mời nhập lại');
                location.href = '".geturl()."/login/loginView';
            </script>";
            else {
                $_SESSION['username'] = $demoData[0]['member_id'];
                header("Location: " . geturl(). "/home");
            }
        }
        public function registerView(){
            $this->view("registerView");
        }
        public function register(){
            $member_name = $_POST['member_name'];
            $member_password = $_POST['member_password'];
            $member_email = $_POST['member_email'];
            $member_phone = $_POST['member_phone'];
            $demoData = $this->model('authModal')->authRegister($member_name,$member_password, $member_email,$member_phone);
            if($demoData != "") echo $demoData;
            else header("Location: " . geturl(). "/login/loginView");
        }
        public function logout(){
            unset($_SESSION['username']);
            header("Location: " . geturl(). "/login/loginView");
        }

    }
?>