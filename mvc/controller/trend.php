<?php

class TrendController{

    public static function add_trend($status){

        $str = $status;
        $pattern = "/#[a-zA-z0-9]+/";
        if(preg_match_all($pattern, $str, $matches)) {

            for ($i=0 ; $i < count($matches[0]);$i++){
                TrendModel::insert_trend($matches[0][$i]);
            }

        }
    }

    public static function add_mention($status,$tweet_id){

        $str = $status;
        $pattern = "/@[a-zA-Z0-9\_]+/";
        if(preg_match_all($pattern, $str, $matches)) {

            for ($i=0 ; $i < count($matches[0]);$i++){

                $username = str_replace("@","",$matches[0][$i]);
                $user_info=UserModel::user_info_by_username($username);
                NotificationModel::send_notification($_SESSION['id'],$user_info['user_id'],$tweet_id,'mention');

            }

        }
    }


    public function show_suggest_trend()
    {
        $data['suggests']=TrendModel::suggest_hashtag($_POST['reg'][0]);
        View::render('trend/hashtag_suggest',$data);
    }


    public function hashtag($type,$param)
    {
        $data['trends']=TrendModel::trends_list();
        $data['user_info'] = UserModel::user_info();
        $data['suggest_follows']=FollowModel::suggest_follow();
        $data['hashtag'] = str_replace('#', "", $param);

        if ($type == 'accounts'){

            $data['followings']=TrendModel::get_account_member($param);
            View::render('trend/hashtag', $data);

        }else if ($type == 'photos'){
            $data['tweets']=TrendModel::get_photo_tweet($param);
            View::render('trend/hashtag', $data);


        }else {
            $data['tweets']=TweetModel::show_tweets_by_hashtag($param);
            View::render('trend/hashtag', $data);
        }
    }



    public static function remove_trend_by_tweet($tweet_id)
    {
       $result = TrendModel::remove_hashtaag($tweet_id);

        foreach ($result as $item) {

            if ($item['text'] != null){
                $str = $item['text'];
                $pattern = "/#[a-zA-Z0-9]+/";
                if(preg_match_all($pattern, $str, $matches)) {

                    for ($i=0 ; $i < count($matches[0]);$i++){
                        TrendModel::delete_trend($matches[0][$i]);
//                        echo $matches[0][$i];
                    }

                }
            }else if ($item['retweetText'] != null){
                $str = $item['retweetText'];
                $pattern = "/#[a-zA-Z0-9]+/";
                if(preg_match_all($pattern, $str, $matches)) {

                    for ($i=0 ; $i < count($matches[0]);$i++){
                        TrendModel::delete_trend($matches[0][$i]);
                    }

                }
            }

       }


    }



}