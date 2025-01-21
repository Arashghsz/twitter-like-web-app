<?php

class TweetController{


    public function show_tweets()
    {
        $records = TweetModel::show_tweets();


    }

    public function tweet_popup()
    {

        View::render('tweet/tweetPopup');
    }

    public function tweet_popup_submit()
    {

        if (isset($_POST['status']) and isset($_FILES['file'])){

            if (empty($_POST['status']) and empty($_FILES['file']['name'])){
                $data['error']="type or choose media for tweet";
                View::render('user/home',$data);

            }elseif ( strlen($_POST['status']) > 140 ){
                $data['error']="the length of text must be lower than 140 . ";
                View::render('user/home',$data);

            }elseif (!empty($_POST['status'] and empty($_FILES['file']['name']))){

                TrendController::add_trend($_POST['status']);
                TweetModel::tweet_text_only($_POST['status']);
                header("Location: /user/home");

            }elseif (empty($_POST['status'] and !empty($_FILES['file']['name']))){

                $this->tweet_media_only();

            }elseif (!empty($_POST['status'] and !empty($_FILES['file']['name']))) {

                TrendController::add_trend($_POST['status']);
                $this->tweet_text_and_media();
            }

        }else{
            header("Location: /user/home");
        }

    }


    private function tweet_text_and_media()
    {

        $file_name = $_FILES['file']['name'];
        $file_tmp =$_FILES['file']['tmp_name'];

        $file_ext=strtolower(end(explode('.',$file_name)));

        $extensions= array("jpeg","jpg","png","mp4");

        if(in_array($file_ext,$extensions)=== false){
            $data['error'] = "please upload photo or video";
            View::render('user/home', $data);
        }else {

            if ($file_ext == "mp4") {
                move_uploaded_file($file_tmp, "assets/tweetMedia/video/" . $file_name);
                TweetModel::tweet_text_and_media($_POST['status'],"/assets/tweetMedia/video/" . $file_name);
            } else {
                move_uploaded_file($file_tmp, "assets/tweetMedia/image/" . $file_name);
                TweetModel::tweet_text_and_media($_POST['status'],"/assets/tweetMedia/image/" . $file_name);
            }

            header("Location: /user/home");
        }

    }


    private function tweet_media_only()
    {
        $file_name = $_FILES['file']['name'];
        $file_tmp =$_FILES['file']['tmp_name'];

        $file_ext=strtolower(end(explode('.',$file_name)));

        $extensions= array("jpeg","jpg","png","mp4");

        if(in_array($file_ext,$extensions)=== false){
            $data['error'] = "please upload photo or video";
            View::render('user/home', $data);
        }else{

            if ($file_ext == "mp4"){
                move_uploaded_file($file_tmp,"assets/tweetMedia/video/".$file_name);
                TweetModel::tweet_media_only("/assets/tweetMedia/video/".$file_name);
            }else{
                move_uploaded_file($file_tmp,"assets/tweetMedia/image/".$file_name);
                TweetModel::tweet_media_only("/assets/tweetMedia/image/".$file_name);
            }

            header("Location: /user/home");
        }

    }


    public function show_retweet()
    {
        $data['tweet']=TweetModel::show_retweet_form($_POST['tweet_id']);
        View::render('tweet/retweet',$data);

    }


    public function add_retweet()
    {
        TweetModel::update_tweetCount($_POST['tweet_id']);
        TrendController::add_trend($_POST['retweetMsg']);
        TweetModel::add_retweet($_POST['tweet_id'],$_POST['retweetMsg']);

        NotificationModel::send_notification($_SESSION['id'],$_POST['tweet_by'],$_POST['tweet_id'],'retweet');

    }

    public function delete_tweet_popup()
    {
        $data['tweet']=TweetModel::show_retweet_form($_POST['tweet_id']);
        View::render("tweet/deletePopup",$data);

    }

    public function delete_tweet()
    {
        TrendController::remove_trend_by_tweet($_POST['tweet_id']);
        CommentModel::remove_comment_by_tweet($_POST['tweet_id']);
        LikeModel::remove_like_by_tweet($_POST['tweet_id']);
        TweetModel::delete_tweet($_POST['tweet_id']);
    }

}