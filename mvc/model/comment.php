<?php
class CommentModel{

    public static function add_comment($tweet_id, $comment)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("INSERT INTO `comments`(`commentOn`, `commentBy`, `comment`) 
                                            VALUES (:tweet_id , :userid , :comment)");
        $res->bindParam(":tweet_id" , $tweet_id);
        $res->bindParam(":userid" , $_SESSION['id']);
        $res->bindParam(":comment" , $comment);
        $res->execute();


    }

    public static function show_comments($tweet_id)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `comments` left outer join users 
on comments.commentBy = users.user_id WHERE comments.`commentOn` = :tweet_id");
        $res->bindParam(":tweet_id" , $tweet_id);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function check_comment($commentOn, $id , $comment)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `comments` WHERE `commentOn` = :tweet_id AND `commentBy` = :id and comment = :comment LIMIT 1");
        $res->bindParam(":tweet_id" , $commentOn);
        $res->bindParam(":id" , $id);
        $res->bindParam(":comment" , $comment);
        $res->execute();

        if ($res->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public static function remove_comment($comment_id)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("DELETE FROM `comments` WHERE `comment_id` = :comment");
        $res->bindParam(":comment" , $comment_id);
        $res->execute();

    }

    public static function remove_comment_by_tweet($tweet_id)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("DELETE FROM `comments` WHERE `commentOn` = :comment");
        $res->bindParam(":comment" , $tweet_id);
        $res->execute();
    }
}