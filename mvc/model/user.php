<?php

class UserModel{

    public static function check_email_exist($email)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `users` WHERE `email` = :email");
        $res->bindParam(":email" , $email);
        $res->execute();

        return $res->fetch(PDO::FETCH_ASSOC);
    }

    public static function register($name, $email, $password,$count,$profileImage,$profileCover)
    {
        $db = Db::getInstance();
        $res = $db->pdo->prepare("INSERT INTO `users`(`screenName`, `email`, `password`, `profileImage`, 
                                      `profileCover`, `following`, `follower`) VALUES 
                                      (:screenName,:email,:password,:profileImage,:profileCover,:following,:follower)");
        $res->bindParam(":screenName" , $name);
        $res->bindParam(":email" , $email);
        $res->bindParam(":password" , $password);
        $res->bindParam(":profileImage" , $profileImage);
        $res->bindParam(":profileCover" , $profileCover);
        $res->bindParam(":following" , $count);
        $res->bindParam(":follower" , $count);
        $res->execute();

        return $db->pdo->lastInsertId();
    }

    public static function check_password($email)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `users` WHERE `email` = :email");
        $res->bindParam(":email" , $email);
        $res->execute();

         $record = $res->fetch(PDO::FETCH_ASSOC);

         return $record['password'];
    }

    public static function check_username_exist($username)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `users` WHERE `username` = :username");
        $res->bindParam(":username" , $username);
        $res->execute();

        if ($res->rowCount() > 0){
            return true;
        }else{
            return false;
        }

    }

    public static function set_username($username)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("UPDATE `users` SET `username`= :username WHERE `user_id` = :userID");
        $res->bindParam(":username" , $username);
        $res->bindParam(":userID" , $_SESSION['id']);
        $res->execute();
    }

    public static function check_username_exist_by_user_id()
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `users` WHERE `user_id` = :userID");
        $res->bindParam(":userID" , $_SESSION['id']);
        $res->execute();
        $record = $res->fetch(PDO::FETCH_ASSOC);
        if ($record['username'] == null){
            return false;
        }else{
            return true;
        }
    }

    public static function user_info_by_username($username)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `users` WHERE `username` = :username");
        $res->bindParam(":username" , $username);
        $res->execute();

        return $res->fetch(PDO::FETCH_ASSOC);

    }

    public static function user_info()
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `users` WHERE `user_id` = :userID");
        $res->bindParam(":userID" , $_SESSION['id']);
        $res->execute();
        return $res->fetch(PDO::FETCH_ASSOC);
    }

    public static function user_info_id($user_id)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `users` WHERE `user_id` = :userID");
        $res->bindParam(":userID" , $user_id);
        $res->execute();
        return $res->fetch(PDO::FETCH_ASSOC);
    }

    public static function check_username_exist_without_specsial_user_id($username)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `users` WHERE `username` = :username and `user_id` not in (:userId)");
        $res->bindParam(":username" , $username);
        $res->bindParam(":userId" , $_SESSION['id']);
        $res->execute();

        if ($res->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public static function check_email_exist_without_specsial_user_id($edit_email)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `users` WHERE `email` = :email and `user_id` not in (:userId)");
        $res->bindParam(":email" , $edit_email);
        $res->bindParam(":userId" , $_SESSION['id']);
        $res->execute();

        if ($res->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public static function update_user_info($edit_username, $edit_email)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("UPDATE `users` SET `username`= :username , `email`= :email WHERE `user_id` = :userID");
        $res->bindParam(":username" , $edit_username);
        $res->bindParam(":email" , $edit_email);
        $res->bindParam(":userID" , $_SESSION['id']);
        $res->execute();
    }

    public static function check_password_exist()
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `users` WHERE `user_id` = :user_id");
        $res->bindParam(":user_id" , $_SESSION['id']);
        $res->execute();

        $record = $res->fetch(PDO::FETCH_ASSOC);

        return $record['password'];
    }

    public static function update_user_password($rePassword)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("UPDATE `users` SET `password`= :password  WHERE `user_id` = :userID");
        $res->bindParam(":password" , md5($rePassword));
        $res->bindParam(":userID" , $_SESSION['id']);
        $res->execute();
    }

    public static function update_user_profile($screenName, $bio, $country, $website)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("UPDATE `users` SET `screenName`= :screenName ,
   `bio`= :bio ,`country`= :country ,`website`= :website WHERE `user_id` = :userID");
        $res->bindParam(":screenName" , $screenName);
        $res->bindParam(":bio" , $bio);
        $res->bindParam(":country" ,$country );
        $res->bindParam(":website" , $website);
        $res->bindParam(":userID" , $_SESSION['id']);
        $res->execute();
    }

    public static function get_username()
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `users` WHERE `user_id` = :userID");
        $res->bindParam(":userID" , $_SESSION['id']);
        $res->execute();
        $record = $res->fetch(PDO::FETCH_ASSOC);
        return $record['username'] ;
    }

    public static function update_user_profile_cover($string)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("UPDATE `users` SET `profileCover`= :profileCover  WHERE `user_id` = :userID");
        $res->bindParam(":profileCover" , $string);
        $res->bindParam(":userID" , $_SESSION['id']);
        $res->execute();
    }

    public static function update_user_profile_image($string)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("UPDATE `users` SET `profileImage`= :profileImage  WHERE `user_id` = :userID");
        $res->bindParam(":profileImage" , $string);
        $res->bindParam(":userID" , $_SESSION['id']);
        $res->execute();
    }

    public static function user_search($search)
    {
        $search = $search."%";
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT screenName,username,profileImage FROM 
`users` WHERE (`screenName` like :screenName or `username` like :username) and user_id != :userid");
        $res->bindParam(":screenName" , $search);
        $res->bindParam(":username" , $search);
        $res->bindParam(":userid" , $_SESSION['id']);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function update_user_follower_and_following($id, $receiver)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("UPDATE `users` SET `following`= `following` + 1
                                                                  WHERE `user_id` = :userID");
        $res->bindParam(":userID" , $id);
        $res->execute();

        $res = $db->pdo->prepare("UPDATE `users` SET `follower`= `follower` + 1
                                                                  WHERE `user_id` = :userID");
        $res->bindParam(":userID" , $receiver);
        $res->execute();

    }

    public static function update_user_follower_and_following_dec($id, $receiver)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("UPDATE `users` SET `following`= `following` - 1
                                                                  WHERE `user_id` = :userID");
        $res->bindParam(":userID" , $id);
        $res->execute();

        $res = $db->pdo->prepare("UPDATE `users` SET `follower`= `follower` - 1
                                                                  WHERE `user_id` = :userID");
        $res->bindParam(":userID" , $receiver);
        $res->execute();
    }

    public static function suggest_mention($reg)
    {
        $reg = $reg.'%';
        $db = Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM users where username like :reg limit 3");
        $res->bindParam(":reg" , $reg);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

}