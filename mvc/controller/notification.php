<?php


class NotificationController{

    public function userNotification()
    {
        $data['user_info']=UserModel::user_info();
        $data['tweets']=TweetModel::show_tweets();
        $data['trends']=TrendModel::trends_list();
        $data['suggest_follows']=FollowModel::suggest_follow();
        $data['tweet_count'] = TweetModel::tweet_count($data['user_info']['username']);

        NotificationModel::update_notification_count();

        $data['notifications'] = NotificationModel::get_notification();

        View::render('notification/userNotification',$data);
    }


    public function get_notif_count()
    {
        $count = NotificationModel::count_notification_detail($_SESSION['id']);

        echo json_encode(
            array("notif_count" => $count['notif_count'])
        );

    }


    public function userNotificationMetion()
    {


    }


}