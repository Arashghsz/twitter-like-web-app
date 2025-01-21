<?php

class FollowModel{

    public static function check_follow($sender,$receiver)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `follow` WHERE `sender` = :sender 
                                                                and `receiver` = :receiver");
        $res->bindParam(":sender" , $sender);
        $res->bindParam(":receiver" , $receiver);
        $res->execute();

        return $res->fetch(PDO::FETCH_ASSOC);
    }

    public static function add_follow($sender, $receiver)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("INSERT INTO `follow`( `sender`, `receiver`) VALUES (:sender,:receiver)");
        $res->bindParam(":sender" , $sender);
        $res->bindParam(":receiver" , $receiver);
        $res->execute();
    }

    public static function remove_follow($sender, $receiver)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("DELETE FROM `follow` WHERE `sender` = :sender AND `receiver` = :receiver");
        $res->bindParam(":sender" , $sender);
        $res->bindParam(":receiver" , $receiver);
        $res->execute();
    }

    public static function get_following_member($username)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `users`WHERE users.user_id IN 
    (SELECT receiver FROM follow WHERE sender IN (SELECT user_id FROM users WHERE username= :username))");
        $res->bindParam(":username" , $username);
        $res->execute();

        return $res->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function get_follower_member($username)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `users`WHERE users.user_id IN 
(SELECT sender FROM follow WHERE `receiver` IN (SELECT user_id FROM users WHERE username= :username))
");
        $res->bindParam(":username" , $username);
        $res->execute();

        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function suggest_follow()
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `users` WHERE user_id != :userid AND user_id 
                          NOT IN (SELECT follow.receiver FROM follow WHERE follow.sender = :userid)
");
        $res->bindParam(":userid" , $_SESSION['id']);
        $res->bindParam(":userid" , $_SESSION['id']);
        $res->execute();

        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

}