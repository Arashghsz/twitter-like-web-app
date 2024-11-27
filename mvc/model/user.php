<?php

class UserModel {
   
    public static function register($name, $email, $password, $countFollow, $profileImage, $profileCover, $bio ){
        $db = Db::getInstance();
        $res = $db->pdo->prepare("INSERT INTO `users`(`screenName`, `email`, `password`, 
             `following`, `follower`,`profileImage`, `profileCover`, `bio`) VALUES 
            (:screenName, :email, :password, :following, :follower, :profileImage, :profileCover, :bio)");
        
        $res -> bindparam("screenName", $name);
        $res -> bindparam("email", $email);
        $res -> bindparam("password", $password);
        $res -> bindparam("following", $countFollow);
        $res -> bindparam("follower", $countFollow);
        $res -> bindparam("profileImage", $profileImage);
        $res -> bindparam("profileCover", $profileCover);
        $res -> bindparam("bio", $bio);
        $res -> execute();

        return $db->pdo->lastinsertId();
    }

    public static function check_email_exist($email){
        $db = Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `users` WHERE `email` = :email");
        $res -> bindparam(":email", $email);
        $res -> execute();
        
        return $res->fetch(PDO::FETCH_ASSOC);    
    }

    public static function check_password($email){
        $db = Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `users` WHERE `email` = :email");
        $res -> bindparam(":email", $email);
        $res -> execute();
        
        $record = $res->fetch(PDO::FETCH_ASSOC);    
        return $record['password'];
    }

    public static function check_username_exist($username){
        $db = Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `users` WHERE `username` = :username");
        $res -> bindparam(":username", $username);
        $res -> execute();
        
        if($res->RowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
    public static function set_username($username){
        $db = Db::getInstance();
        $res = $db->pdo->prepare("UPDATE `users` SET `username`= :username WHERE `user_id` = :userID");
        $res -> bindparam(":username", $username);
        $res -> bindparam(":userID", $_SESSION['id'] );
        $res -> execute();  
    }
    public static function user_info(){
        $db = Db::getInstance();
        $res = $db->pdo->prepare(" SELECT * FROM `users` WHERE `user_id` = :userID");
        $res -> bindparam(":userID", $_SESSION['id']);
        $res -> execute();
        return $res->fetch(PDO::FETCH_ASSOC);
    }
    public static function deleteAcc(){
        $db = Db::getInstance();
        $res = $db->pdo->prepare("DELETE FROM `users` WHERE `user_id` = :userID");
        $res -> bindparam(":userID", $_SESSION['id']);
        $res -> execute();
    }

}

?>