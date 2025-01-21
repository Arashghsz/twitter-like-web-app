<?php

class FollowController{

    public static function follow_btn($user_id,$follow_id)
    {

        if ($user_id != $follow_id) {

            $result = FollowModel::check_follow($user_id, $follow_id);

            if ($result == null) {
                //follow_btn
                return "  <button class=\"f-btn follow-btn \" data-follow=\"$follow_id\">
               <i class=\"fa fa-user-plus\"></i> Follow </button>";

            } else {

                //following_btn
                return "  <button class=\"f-btn following-btn follow-btn\" data-follow=\"$follow_id\">
                Following </button>";
            }

        }else {
            return "  <button onclick=\"location.href='/user/profileEdit'\" class=\"f-btn\">
                Edit Profile </button>";
        }
    }

    public static function follow_btn_list($user_id,$follow_id)
    {

        if ($user_id != $follow_id) {

            $result = FollowModel::check_follow($user_id, $follow_id);

            if ($result == null) {
                //follow_btn
                return "  <button class=\"f-btn follow-btn-list \" data-follow=\"$follow_id\">
               <i class=\"fa fa-user-plus\"></i> Follow </button>";

            } else {

                //following_btn
                return "  <button class=\"f-btn following-btn-list follow-btn-list\" data-follow=\"$follow_id\">
                Following </button>";
            }

        }else {
            return "  <button onclick=\"location.href='/user/profileEdit'\" class=\"f-btn\">
                Edit Profile </button>";
        }
    }

    public function follow()
    {
        $receiver=$_POST['receiver'];

        FollowModel::add_follow($_SESSION['id'],$receiver);

        UserModel::update_user_follower_and_following($_SESSION['id'],$receiver);

        NotificationModel::send_notification($_SESSION['id'],$receiver,0,'follow');

    }


    public function unfollow()
    {
        $receiver=$_POST['receiver'];

        FollowModel::remove_follow($_SESSION['id'],$receiver);

        UserModel::update_user_follower_and_following_dec($_SESSION['id'],$receiver);

    }

    public function following($username)
    {
        $data['user_info']=UserModel::user_info_by_username($username);
        $data['followings']=FollowModel::get_following_member($username);
        $data['tweet_count'] = TweetModel::tweet_count($username);

        View::render('/follow/following',$data);

    }

    public function followers($username)
    {
        $data['user_info']=UserModel::user_info_by_username($username);
        $data['followings']=FollowModel::get_follower_member($username);
        $data['tweet_count'] = TweetModel::tweet_count($username);

        View::render('/follow/follower',$data);
    }
}