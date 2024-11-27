<?php

class UserController{
    public function entry(){
        // if(!isset($_SESSION['id'])){
        //     header("Location:/user/entry");
        //     exit();
        // }
        if (isset($_POST['screenNameRegister']) and isset($_POST['emailRegister']) and isset($_POST['PasswordRegister'])){
            $this->register();
        }
        elseif (isset($_POST['emailLogin']) and isset($_POST['PasswordLogin'])){
            $this->login();
        }
        else{
            View::render('user/entry');
        }
    }
    private function register(){
        if(empty($_POST['screenNameRegister']) or empty($_POST['emailRegister']) or empty($_POST['PasswordRegister'])){
            $data['error'] = "Please fill all inputs!";
            View::render('user/entry', $data);
        }
        else{

            $name = $_POST['screenNameRegister'];
            $email = $_POST['emailRegister'];
            $password = $_POST['PasswordRegister'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['error'] = "Please enter valid email!";
                View::render('user/entry', $data);
            }
            elseif(strlen($password) < 5){
                $data['error'] = "Password is too short!";
                View::render('user/entry', $data);
            }
            elseif(UserModel::check_email_exist($email)!=null){
                $data['error'] = "Email in already exist!";
                View::render('user/entry', $data);
            }else{
               $user_id = UserModel::register($name, $email, md5($password),0,"/assets/images/entry/profilePhoto.jpg", "/assets/images/entry/backgroundCover.jpg", "Hey! i'm using appDb application.");
               $_SESSION['id'] = $user_id;
               header("Location:/user/username");
            }
        }
    }
    private function login(){
        if(empty($_POST['emailLogin']) or empty($_POST['PasswordLogin'])){
            $data['error'] = "Please fill all inputs!";
            View::render('user/entry', $data);
        }
        else{
            $emailLogin = $_POST['emailLogin'];
            $passwordLogin = $_POST['PasswordLogin'];

            if (!filter_var($emailLogin, FILTER_VALIDATE_EMAIL)) {
                $data['error'] = "Please enter valid email!";
                View::render('user/entry', $data);
            }
            elseif(strlen($passwordLogin) < 5){
                $data['error'] = "Password is too short!";
                View::render('user/entry', $data);
            }
            elseif(UserModel::check_email_exist($emailLogin) == null){
                $data['error'] = "Email in not exist, please register first!";
                View::render('user/entry', $data);
            }
            elseif(UserModel::check_password($emailLogin) != md5($passwordLogin)){
                $data['error'] = "Password is incorrect, try again!";
                View::render('user/entry', $data);
            }else{
                $info = UserModel::check_email_exist($emailLogin);
                $_SESSION['id'] = $info['user_id'];
                header("Location:/user/home");
            }

        }
    }
    public function home(){
        $data['user_info'] = UserModel::user_info();
        View::render('user/home', $data);
    }
    public function username(){
        if(isset($_POST['username']) and !empty($_POST['username'])){
            $username = $_POST['username'];

            if(strlen($username) < 3 or strlen($username) > 20){
                $data['error'] = "Please enter must be 3-20 characters!";
                View::render('user/username', $data);
            }
            elseif(UserModel::check_username_exist($username)){
                $data['error'] = "This username is already exist, please try again!";
                View::render('user/username', $data);
            }
            else{
                UserModel::set_username($username);
                header("Location: /user/home");
            }
        }
        else{

            View::render('user/username');
        }
    }
    public function logout(){
        session_destroy();
        header("Location:/user/entry");
    }
    public function deleteAcc(){
        UserModel::deleteAcc();
        $data['error'] = "User deleted successfully!";
        View::render('user/entry', $data);
    }
}

?>