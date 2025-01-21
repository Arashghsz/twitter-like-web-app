<?php

class TrendModel{

    public static function insert_trend($hashtag)
    {
        $db = Db::getInstance();
        $res = $db->pdo->prepare("INSERT INTO `trends`(`hashtag`) VALUES (:hashtag)");
        $res->bindParam(":hashtag" , $hashtag);
        $res->execute();
    }

    public static function trends_list(){
        $db = Db::getInstance();
        $res = $db->pdo->prepare("SELECT COUNT(`hashtag`) AS 'hashtag_count' , `hashtag`
                                  FROM trends GROUP BY `hashtag`ORDER BY COUNT(`hashtag`) DESC limit 5");
        $res->execute();

        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function suggest_hashtag($reg)
    {
        $reg = $reg.'%';
        $db = Db::getInstance();
        $res = $db->pdo->prepare("SELECT distinct hashtag FROM trends where hashtag like :reg limit 3");
        $res->bindParam(":reg" , $reg);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function get_account_member($param)
    {

        $param = '%#'.$param.'%';
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT DISTINCT users.* FROM `tweets` LEFT OUTER JOIN users
 ON tweets.tweetBy = users.user_id OR tweets.retweetBy = users.user_id WHERE tweets.text like :hashtag OR 
    tweets.retweetText like :hashtag");

        $res->bindParam(":hashtag" , $param);
        $res->bindParam(":hashtag" , $param);

        $res->execute();

        return $res->fetchAll(PDO::FETCH_ASSOC);
    }




    public static function get_photo_tweet($param)
    {
        $param = '%#'.$param.'%';
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `tweets` 
    WHERE tweets.text IS NOT NULL AND tweets.tweetMedia IS NOT NULL AND tweets.text like :hashtag");
        $res->bindParam(":hashtag" , $param);
        $res->execute();

        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function remove_hashtaag($tweet_id)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `tweets` WHERE `tweet_id` = :tweet_id OR 
                                                                      `retweet_id` = :tweet_id");
        $res->bindParam(":tweet_id" , $tweet_id);
        $res->bindParam(":tweet_id" , $tweet_id);
        $res->execute();

        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delete_trend($i)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("DELETE FROM `trends` WHERE `hashtag` = :hash LIMIT 1");
        $res->bindParam(":hash" , $i);
        $res->execute();

    }


}
