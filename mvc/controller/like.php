<?php

class LikeController{


    public function add_like()
    {
        TweetModel::update_likeCount($_POST['tweet_id']);
        LikeModel::add_like($_POST['tweet_id'],$_SESSION['id']);

        NotificationModel::send_notification($_SESSION['id'],$_POST['tweet_by'],$_POST['tweet_id'],'like');

    }

    public function reomve_like()
    {
        TweetModel::update_likeCount_dec($_POST['tweet_id']);
        LikeModel::remove_like($_POST['tweet_id'],$_SESSION['id']);

    }
}