<?php

class TweetModel{

    public static function tweet_text_only($status)
    {
        $db = Db::getInstance();
        $res = $db->pdo->prepare("INSERT INTO `tweets`(`tweetBy`, `text`) VALUES (:tweetBy,:text)");
        $res->bindParam(":tweetBy" , $_SESSION['id']);
        $res->bindParam(":text" , $status);
        $res->execute();

        return $db->pdo->lastInsertId();
    }

    public static function tweet_media_only($file)
    {
        $db = Db::getInstance();
        $res = $db->pdo->prepare("INSERT INTO `tweets`(`tweetBy`, `tweetMedia`) VALUES (:tweetBy,:tweetMedia)");
        $res->bindParam(":tweetBy" , $_SESSION['id']);
        $res->bindParam(":tweetMedia" , $file);
        $res->execute();
    }

    public static function tweet_text_and_media($status, $file)
    {
        $db = Db::getInstance();
        $res = $db->pdo->prepare("INSERT INTO `tweets`(`tweetBy`, `text` , `tweetMedia`) VALUES (:tweetBy,:text,:tweetMedia)");
        $res->bindParam(":tweetBy" , $_SESSION['id']);
        $res->bindParam(":text" , $status);
        $res->bindParam(":tweetMedia" , $file);
        $res->execute();

        return $db->pdo->lastInsertId();
    }

    public static function show_tweets()
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `tweets` LEFT OUTER JOIN
                           users ON tweets.tweetBy = users.user_id WHERE users.user_id = :user_id 
                           or users.user_id in (SELECT `receiver` FROM `follow` WHERE `sender` = :user_id )
                           ORDER BY `tweets`.`tweetTime` DESC");
        $res->bindParam(":user_id" , $_SESSION['id']);
        $res->bindParam(":user_id" , $_SESSION['id']);
        $res->execute();

        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function tweet_count($username)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT count(*) as tweet_count FROM `tweets` where tweetBy 
            in (select user_id from users where username = :username)");
        $res->bindParam(":username" , $username);
        $res->execute();

        return $res->fetch(PDO::FETCH_ASSOC);
    }

    public static function show_retweet_form($tweet_id)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `tweets` LEFT OUTER JOIN
                           users ON tweets.tweetBy = users.user_id WHERE  tweets.tweet_id = :tweet_id");
        $res->bindParam(":tweet_id" , $tweet_id);
        $res->execute();

        return $res->fetch(PDO::FETCH_ASSOC);
    }


    public static function update_tweetCount($tweet_id)
    {
        $db = Db::getInstance();
        $res = $db->pdo->prepare("UPDATE `tweets` SET retweetCount = retweetCount + 1 WHERE `tweet_id` = :retweet_id");
        $res->bindParam(":retweet_id" , $tweet_id);

        $res->execute();
    }

    public static function add_retweet($tweet_id, $retweetMsg)
    {
        $db = Db::getInstance();
        $res = $db->pdo->prepare("INSERT INTO `tweets`(`retweet_id`, `retweetBy`, `retweetText`) 
                              VALUES (:retweet_id , :retweetBy , :retweetText)");
        $res->bindParam(":retweet_id" , $tweet_id);
        $res->bindParam(":retweetBy" , $_SESSION['id']);
        $res->bindParam(":retweetText" , $retweetMsg);
        $res->execute();
    }

    public static function get_retweet($tweet_id)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `tweets` LEFT OUTER JOIN
                           users ON tweets.retweetBy = users.user_id WHERE  tweets.retweet_id = :tweet_id");
        $res->bindParam(":tweet_id" , $tweet_id);
        $res->execute();

        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delete_tweet($tweet_id)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("DELETE FROM `tweets` WHERE `tweet_id` = :tweet_id OR `retweet_id` = :tweet_id");
        $res->bindParam(":tweet_id" , $tweet_id);
        $res->bindParam(":tweet_id" , $tweet_id);
        $res->execute();

    }

    public static function update_likeCount($tweet_id)
    {
        $db = Db::getInstance();
        $res = $db->pdo->prepare("UPDATE `tweets` SET likeCount = likeCount + 1 
                                                            WHERE `tweet_id` = :retweet_id");
        $res->bindParam(":retweet_id" , $tweet_id);

        $res->execute();
    }

    public static function update_likeCount_dec($tweet_id)
    {
        $db = Db::getInstance();
        $res = $db->pdo->prepare("UPDATE `tweets` SET likeCount = likeCount - 1 
                                                            WHERE `tweet_id` = :retweet_id");
        $res->bindParam(":retweet_id" , $tweet_id);

        $res->execute();
    }

    public static function show_tweets_by_username($username)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `tweets` LEFT OUTER JOIN
                           users ON tweets.tweetBy = users.user_id WHERE
                            users.user_id in (SELECT user_id FROM `users` WHERE `username` = :username )
                           ORDER BY `tweets`.`tweetTime` DESC");
        $res->bindParam(":username" , $username);

        $res->execute();

        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function show_tweets_by_hashtag($param)
    {
        $param = '%#'.$param.'%';
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `tweets` LEFT OUTER JOIN users ON tweets.tweetBy
 = users.user_id WHERE tweets.text like :hashtag OR tweets.tweet_id
  IN(SELECT retweet_id FROM tweets WHERE retweetText LIKE :hashtag)");
        $res->bindParam(":hashtag" , $param);
        $res->bindParam(":hashtag" , $param);

        $res->execute();

        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

}