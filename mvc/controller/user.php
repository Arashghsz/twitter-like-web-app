<?php

class UserController{

    public function entry()
    {

        if (isset($_POST['screenName_s']) and isset($_POST['email_s']) and isset($_POST['password_s'])){

            $this->register();

        }elseif (isset($_POST['email_l']) and isset($_POST['password_l'])){

            $this->login();

        }else{
            View::render('user/entry');
        }
    }

    private function login()
    {
        if (empty($_POST['email_l']) or empty($_POST['password_l'])){

            $data['error_l']="please fill all options";
            View::render('user/entry',$data);
        }else{

            $email = $_POST['email_l'];
            $password = $_POST['password_l'];
            $captcha = $_POST['captcha'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['error_l']="please enter valid email";
                View::render('user/entry',$data);
            }elseif (strlen($password) < 5){
                $data['error_l']="password is short";
                View::render('user/entry',$data);
            }
            // elseif ($captcha != $_SESSION['captcha_text']) {
            //     $data['error_l'] = "security code is not true";
            //     View::render('user/entry', $data);
            // }
            elseif (UserModel::check_email_exist($email) == null){
                $data['error_l']="your email not exist, please sign up";
                View::render('user/entry',$data);
            }elseif(UserModel::check_password($email) != md5($password)){
                $data['error_l']="your password is not correct";
                View::render('user/entry',$data);

            }else{
                $info=UserModel::check_email_exist($email);
                $_SESSION['id']= $info['user_id'];
                header("Location: /user/home");
            }

        }


        }

    private function register()
    {

        if (empty($_POST['screenName_s']) or empty($_POST['email_s']) or empty($_POST['password_s'])){

            $data['error']="please fill all options";
            View::render('user/entry',$data);
        }else{

            $name = $_POST['screenName_s'];
            $email = $_POST['email_s'];
            $password = $_POST['password_s'];


            if (strlen($name) < 3 or strlen($name) > 20){
                $data['error']="name must be 3 - 20 characters";
                View::render('user/entry',$data);
            }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['error']="please enter valid email";
                View::render('user/entry',$data);
            }elseif (strlen($password) < 5){
                $data['error']="password is short";
                View::render('user/entry',$data);
            }elseif (UserModel::check_email_exist($email) != null){
                $data['error']="your email is exist";
                View::render('user/entry',$data);
            }else{

                $user_id=UserModel::register($name,$email,md5($password),
                    0,"/assets/images/defaultprofileimage.png","/assets/images/defaultCoverImage.png");

                $_SESSION['id'] =  $user_id;

                header("Location: /user/username");
                //go to username
            }

        }

    }

    public function home()
    {
        if (!isset($_SESSION['id'])){
            $this->logout();
            exit();
        }

        $data['user_info']=UserModel::user_info();
        $data['tweets']=TweetModel::show_tweets();
        $data['trends']=TrendModel::trends_list();
        $data['suggest_follows']=FollowModel::suggest_follow();
        $data['tweet_count'] = TweetModel::tweet_count($data['user_info']['username']);
        $data['count_message'] = MessageModel::count_message();

        if (isset($_POST['status']) and isset($_FILES['file'])){


            if (empty($_POST['status']) and empty($_FILES['file']['name'])){
                $data['error']="type or choose media for tweet";
                View::render('user/home',$data);

            }elseif ( strlen($_POST['status']) > 140 ){
                $data['error']="the length of text must be lower than 140 . ";
                View::render('user/home',$data);

            }elseif (!empty($_POST['status'] and empty($_FILES['file']['name']))){

                $tweet_id=TweetModel::tweet_text_only($_POST['status']);
                TrendController::add_trend($_POST['status']);
                TrendController::add_mention($_POST['status'],$tweet_id);

                header("Location: /user/home");

            }elseif (empty($_POST['status'] and !empty($_FILES['file']['name']))){

                $this->tweet_media_only();
                
            }elseif (!empty($_POST['status'] and !empty($_FILES['file']['name']))) {

                TrendController::add_trend($_POST['status']);
                $this->tweet_text_and_media();



            }

            }else{
            View::render('user/home',$data);
        }
    }

    private function tweet_text_and_media()
    {

        $file_name = $_FILES['file']['name'];
        $file_tmp =$_FILES['file']['tmp_name'];

        $file_ext=strtolower(end(explode('.',$file_name)));

        $extensions= array("jpeg","jpg","png","mp4");

        if(in_array($file_ext,$extensions)=== false){
            $data['error'] = "please upload photo or video";
            View::render('user/home', $data);
        }else {

            if ($file_ext == "mp4") {
                move_uploaded_file($file_tmp, "assets/tweetMedia/video/" . $file_name);
                $tweet_id=TweetModel::tweet_text_and_media($_POST['status'],"/assets/tweetMedia/video/" . $file_name);
                TrendController::add_mention($_POST['status'],$tweet_id);
            } else {
                move_uploaded_file($file_tmp, "assets/tweetMedia/image/" . $file_name);
                $tweet_id=TweetModel::tweet_text_and_media($_POST['status'],"/assets/tweetMedia/image/" . $file_name);
                TrendController::add_mention($_POST['status'],$tweet_id);

            }

            header("Location: /user/home");
        }

    }


    private function tweet_media_only()
    {
        $file_name = $_FILES['file']['name'];
        $file_tmp =$_FILES['file']['tmp_name'];

        $file_ext=strtolower(end(explode('.',$file_name)));

        $extensions= array("jpeg","jpg","png","mp4");

        if(in_array($file_ext,$extensions)=== false){
            $data['error'] = "please upload photo or video";
            View::render('user/home', $data);
        }else{

            if ($file_ext == "mp4"){
                move_uploaded_file($file_tmp,"assets/tweetMedia/video/".$file_name);
                TweetModel::tweet_media_only("/assets/tweetMedia/video/".$file_name);
            }else{
                move_uploaded_file($file_tmp,"assets/tweetMedia/image/".$file_name);
                TweetModel::tweet_media_only("/assets/tweetMedia/image/".$file_name);
            }

            header("Location: /user/home");
        }

    }

    public function username()
    {

        if (!isset($_SESSION['id'])){
            $this->logout();
            exit();
        }elseif (UserModel::check_username_exist_by_user_id()){
            $this->logout();
            exit();
        }

        if (isset($_POST['usernamee']) and !empty($_POST['usernamee'])){

            $username = $_POST['usernamee'];

            if (strlen($username) < 3 or strlen($username) > 20){

                $data['error']="username must be 3 - 20 characters";
                View::render('user/username',$data);
            }elseif (UserModel::check_username_exist($username)){
                $data['error']="this username is exist , please choose another";
                View::render('user/username',$data);
            }else{

                UserModel::set_username($username);
                header("Location: /user/home");
            }


        }else{
            View::render('user/username');
        }

    }

    public function logout()
    {
        session_destroy();
        header("Location: /user/entry");
    }

    public function captcha()
    {
        View::render('user/captcha');
    }


    public function account()
    {
        $data['user_info']=UserModel::user_info();

        if (isset($_POST['edit_username']) and isset($_POST['edit_email'])){

            if (empty($_POST['edit_username']) or empty($_POST['edit_email'])){
                $data['error']="please fill all options";
                View::render('user/account',$data);
            }elseif (UserModel::check_username_exist_without_specsial_user_id($_POST['edit_username'])){
                $data['error_username']="this uername exist , please choose another one";
                View::render('user/account',$data);
            }elseif (UserModel::check_email_exist_without_specsial_user_id($_POST['edit_email'])){
                $data['error_email']="this email exist , please choose another one";
                View::render('user/account',$data);
            }else{
                UserModel::update_user_info($_POST['edit_username'],$_POST['edit_email']);
                header("Location: /user/home");
            }

        }else{
            View::render('user/account',$data);
        }
    }

    public function password()
    {
        $data['user_info']=UserModel::user_info();

        if (isset($_POST['currentPwd']) and isset($_POST['newPassword'])  and isset($_POST['rePassword'])){


            if (empty($_POST['currentPwd']) or empty($_POST['newPassword'])  or empty($_POST['rePassword'])){
                $data['error']="please fill all options";
                View::render('user/passwords',$data);

            }elseif(UserModel::check_password_exist() != md5($_POST['currentPwd'])){
                $data['error_currentPwd']="your current password is not true";
                View::render('user/passwords',$data);

            }elseif($_POST['newPassword'] != $_POST['rePassword']){
                $data['error_NewPassword']="your new and renew password is not same";
                View::render('user/passwords',$data);
            }else{
                UserModel::update_user_password($_POST['rePassword']);
                header("Location: /user/home");
            }


        }else{
            View::render('user/passwords',$data);
        }
    }


    public function profile($username)
    {
        $data['trends']=TrendModel::trends_list();
        $data['suggest_follows']=FollowModel::suggest_follow();
        $data['tweets']=TweetModel::show_tweets_by_username($username);
        $data['tweet_count'] = TweetModel::tweet_count($username);
        $data['like_count'] = LikeModel::like_count($username);
        $data['user_info']=UserModel::user_info_by_username($username);
        View::render('user/profile',$data);
    }

    public function profileEdit()
    {

        if (!isset($_SESSION['id'])) {
            $this->logout();
            exit();
        }
        $data['trends']=TrendModel::trends_list();
        $data['suggest_follows']=FollowModel::suggest_follow();
        $data['user_info'] = UserModel::user_info();
        $data['tweets']=TweetModel::show_tweets_by_username($data['user_info']['username']);
        $data['like_count'] = LikeModel::like_count($data['user_info']['username']);
        $data['tweet_count'] = TweetModel::tweet_count($data['user_info']['username']);

        if (isset($_POST['screenName']) and isset($_POST['bio']) and isset($_POST['country']) and
            isset($_POST['website'])) {

            $screenName = $_POST['screenName'];
            $bio = $_POST['bio'];
            $country = $_POST['country'];
            $website = $_POST['website'];

            if (empty($screenName)) {
                $data['error'] = 'name can not be empty';
                View::render('user/profileEdit', $data);
            } elseif (strlen($screenName) < 3 or strlen($screenName) > 20) {
                $data['error'] = "name must be 3 - 20 characters";
                View::render('user/profileEdit', $data);
            } else {
                UserModel::update_user_profile($screenName, $bio, $country, $website);
                header("Location: /user/profile/" . UserModel::get_username());
            }


        } elseif (isset($_FILES['profileCover'])) {

            $file_name = $_FILES['profileCover']['name'];
            $file_size =$_FILES['profileCover']['size'];
            $file_tmp =$_FILES['profileCover']['tmp_name'];
            $file_type=$_FILES['profileCover']['type'];

            $file_ext=strtolower(end(explode('.',$file_name)));

            $extensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$extensions)=== false){
                $data['error'] = "please upload photo";
                View::render('user/profileEdit', $data);
            }else{
                move_uploaded_file($file_tmp,"assets/images/".$file_name);
                UserModel::update_user_profile_cover("/assets/images/".$file_name);
                header("Location: /user/profileEdit");

            }

        }elseif (isset($_FILES['profileImage'])) {

            $file_name = $_FILES['profileImage']['name'];
            $file_size =$_FILES['profileImage']['size'];
            $file_tmp =$_FILES['profileImage']['tmp_name'];
            $file_type=$_FILES['profileImage']['type'];

            $file_ext=strtolower(end(explode('.',$file_name)));

            $extensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$extensions)=== false){
                $data['error'] = "please upload photo";
                View::render('user/profileEdit', $data);
            }else{
                move_uploaded_file($file_tmp,"assets/images/".$file_name);
                UserModel::update_user_profile_image("/assets/images/".$file_name);
                header("Location: /user/profileEdit");

            }

        }else{
            View::render('user/profileEdit',$data);
        }
    }


    public function removeProfileImage()
    {
        $record=UserModel::user_info();
        if ($record['profileImage'] != "/assets/images/defaultprofileimage.png"){

            $path= str_replace_first("/","",$record['profileImage']);
            unlink($path);
            UserModel::update_user_profile_image("/assets/images/defaultprofileimage.png");
        }
    }

    public function search()
    {
        $search = $_POST['search'];

        $data['records'] = UserModel::user_search($search);

        View::render('user/search',$data);

    }


    public function show_suggest_mention()
    {
        $mention = $_POST['mention'][0];
        $mention = str_replace('@',"",$mention);

        $data['suggests']=UserModel::suggest_mention($mention);
        View::render('user/mention',$data);

    }



}