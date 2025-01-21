<?php

class NotificationModel{

    public static function send_notification($notificationFrom,$notificationFor,$target,$type)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("INSERT INTO `notification`
                  (`notificationFrom`, `notificationFor`, `target`, `type`) 
                  VALUES (:notificationFrom, :notificationFor, :target, :typee)");
        $res->bindParam(":notificationFrom" , $notificationFrom);
        $res->bindParam(":notificationFor" , $notificationFor);
        $res->bindParam(":target" , $target);
        $res->bindParam(":typee" , $type);
        $res->execute();
    }


    public static function count_notification_detail($user_id)
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT COUNT(*) AS notif_count FROM `notification`
 WHERE `notificationFor` = :me AND `status` = 0");
        $res->bindParam(":me" , $user_id);
        $res->execute();

        return $res->fetch(PDO::FETCH_ASSOC);
    }

    public static function update_notification_count()
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("UPDATE `notification` SET `status`=1 WHERE `notificationFor` = :me");
        $res->bindParam(":me" , $_SESSION['id']);
        $res->execute();
    }


    public static function get_notification()
    {
        $db =Db::getInstance();
        $res = $db->pdo->prepare("SELECT * FROM `notification` LEFT OUTER JOIN users ON 
notification.notificationFrom = users.user_id LEFT OUTER JOIN tweets ON notification.target = tweets.tweet_id
 LEFT OUTER JOIN likes ON notification.target = likes.likeOn LEFT OUTER JOIN follow ON 
 notification.notificationFrom = follow.sender AND notification.notificationFor = follow.receiver 
 WHERE notification.notificationFor = :me order by notification.notificationTime desc");
        $res->bindParam(":me" , $_SESSION['id']);
        $res->execute();

        return $res->fetchAll(PDO::FETCH_ASSOC);

    }
}