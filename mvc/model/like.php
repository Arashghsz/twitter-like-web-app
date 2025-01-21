<?php

class LikeModel{

    public static function add_like($tweet_id, $id)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("INSERT INTO `likes`(`likeOn`, `likeBy`) VALUES (:tweet_id,:id)");
        $res->bindParam(":tweet_id" , $tweet_id);
        $res->bindParam(":id" , $id);
        $res->execute();
    }

    public static function remove_like($tweet_id, $id)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("DELETE FROM `likes` WHERE `likeOn` = :tweet_id and `likeBy` = :id");
        $res->bindParam(":tweet_id" , $tweet_id);
        $res->bindParam(":id" , $id);
        $res->execute();
    }

    public static function check_like($tweet_id, $id)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `likes` WHERE `likeOn` = :tweet_id AND `likeBy` = :id LIMIT 1");
        $res->bindParam(":tweet_id" , $tweet_id);
        $res->bindParam(":id" , $id);
        $res->execute();

        if ($res->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public static function remove_like_by_tweet($tweet_id)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("DELETE FROM `likes` WHERE `likeOn` = :tweet_id");
        $res->bindParam(":tweet_id" , $tweet_id);
        $res->execute();
    }

    public static function like_count($username)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT count(*) as like_count FROM `likes` where likeBy 
            in (select user_id from users where username = :username)");
        $res->bindParam(":username" , $username);
        $res->execute();

        return $res->fetch(PDO::FETCH_ASSOC);
    }
}