<!DOCTYPE HTML>
<html>
<head>
    <title>twitter</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
    <link rel="stylesheet" href="/assets/css/style-complete.css"/>
    <script src="/assets/js/jquery-3.6.0.min.js" ></script>
</head>
<!--Helvetica Neue-->
<body>
<div class="wrapper">
    <!-- header wrapper -->


    <?
    $data['user_info'] = $user_info;
    $data['count_message'] = $count_message;
    View::render('user/header',$data)?>
<!--#hash-header-->
<div class="hash-header">
    <div class="hash-inner">
        <h1>#<?=$hashtag?></h1>
    </div>
</div>
<!--#hash-header end-->

<!--hash-menu-->
<div class="hash-menu">
    <div class="hash-menu-inner">
        <ul>
            <li><a href="/trend/hashtag/latest/<?=$hashtag?>">Latest</a></li>
            <li><a href="/trend/hashtag/accounts/<?=$hashtag?>">Accounts</a></li>
            <li><a href="/trend/hashtag/photos/<?=$hashtag?>">Photos</a></li>
        </ul>
    </div>
</div>
<!--hash-menu-->
<!---Inner wrapper-->

<div class="in-wrapper">
    <div class="in-full-wrap">

        <div class="in-left">
            <div class="in-left-wrap">

                <!--Who To Follow-->
                <div class="follow-wrap"><div class="follow-inner"><div class="follow-title"><h3>Who to follow</h3></div>
                        <? foreach ($suggest_follows as $suggest_follow) {?>


                            <div class="follow-body">
                                <div class="follow-img">
                                    <img src="<?=$suggest_follow['profileImage']?>"/>
                                </div>
                                <div class="follow-content">
                                    <div class="fo-co-head">
                                        <a href="/user/profile/<?=$suggest_follow['username']?>"><?=$suggest_follow['screenName']?></a><span>@<?=$suggest_follow['username']?></span>
                                    </div>
                                    <?=FollowController::follow_btn_list($_SESSION['id'],$suggest_follow['user_id'])?>

                                </div>
                            </div>
                        <?}?>
                    </div>
                </div>

                <!--Who To Follow-->
                <?
                $data['trends']=$trends;
                View::render('trend/trend_list',$data)?>

            </div>
            <!-- in left wrap-->
        </div>
        <!-- in left end-->
        <div class="popupTweet"></div>

        <? if(str_contains($_SERVER['REQUEST_URI'],'photos')){?>


            <? for ($i = 0 ; $i< count($tweets) ; $i++){?>

         <div class="hash-img-wrapper">
             <div class="hash-img-inner">
                 <div class="hash-img-flex">
                     <? if (str_contains($tweets[$i]['tweetMedia'] , '.mp4') ){ ?>
                         <!--tweet show head end-->
                         <div class="t-show-body">
                             <div class="t-s-b-inner">
                                 <div class="t-s-b-inner-in">
                                     <video width="320" height="240" controls class="imagePopup">
                                         <source src="<?=$tweets[$i]['tweetMedia']?>" type="video/mp4">
                                         Your browser does not support the video tag.
                                     </video>
                                 </div>
                             </div>
                         </div>
                     <?}else{?>
                         <div class="t-show-body">
                             <div class="t-s-b-inner">
                                 <div class="t-s-b-inner-in">
                                     <img src="<?=$tweets[$i]['tweetMedia']?>" class="imagePopup"/>
                                 </div>
                             </div>
                         </div>
                     <?}?>
                     <div class="hash-img-flex-footer">
                         <ul>
                             <li><button class="comment-btn" data-tweetid="<?=$tweets[$i]['tweet_id']?>"><i class="fa fa-share" aria-hidden="true"></i></button></li>

                             <?if($tweets[$i]['retweetCount']  == 0){?>
                                 <li><button class="retweet" data-tweetid="<?=$tweets[$i]['tweet_id']?>">
                                         <i class="fa fa-retweet" aria-hidden="true"></i>
                                     </button></li>
                             <?}else{?>
                                 <li><button class="retweeted" data-tweetid="<?=$tweets[$i]['tweet_id']?>">
                                         <i class="fa fa-retweet" aria-hidden="true">
                                         </i><span class="retweetCount"><?=$tweets[$i]['retweetCount']?></span>
                                     </button></li>
                             <?}?>

                             <?if(LikeModel::check_like($tweets[$i]['tweet_id'], $_SESSION['id'])){?>
                                 <li><button class="unlike-btn" data-tweetid="<?=$tweets[$i]['tweet_id']?>">
                                         <i class="fa fa-heart" aria-hidden="true"></i>
                                         <span class="likeCount"><?=$tweets[$i]['likeCount']?></span>
                                     </button>
                                 </li>
                             <?}else{?>
                                 <li><button class="like-btn" data-tweetid="<?=$tweets[$i]['tweet_id']?>">
                                         <i class="fa fa-heart-o" aria-hidden="true"></i>
                                         <span class="likeCount"><?=$tweets[$i]['likeCount']?></span>
                                     </button>
                                 </li>
                             <?}?>
                         </ul>
                     </div>
                </div>
            </div>
        </div>
                <?}?>
        <!-- TWEETS IMAGES -->

        <!--TWEETS ACCOUTS-->

        <?}else if(str_contains($_SERVER['REQUEST_URI'],'accounts')){?>

        <div class="wrapper-following">
            <div class="wrap-follow-inner">
                <!--////////////////////////////////////////////////////////////////////////////////////////-->
                <? foreach ($followings as $following) {?>

                    <div class="follow-unfollow-box">
                        <div class="follow-unfollow-inner">
                            <div class="follow-background">
                                <img src="<?=$following['profileCover']?>"/>
                            </div>
                            <div class="follow-person-button-img">
                                <div class="follow-person-img">
                                    <img src="<?=$following['profileImage']?>"/>
                                </div>
                                <div class="follow-person-button">
                                    <?=FollowController::follow_btn_list($_SESSION['id'],$following['user_id'])?>

                                </div>
                            </div>
                            <div class="follow-person-bio">
                                <div class="follow-person-name">
                                    <a href="/user/profile/<?=$following['username']?>"><?=$following['screenName']?></a>
                                </div>
                                <div class="follow-person-tname">
                                    <a href="/user/profile/<?=$following['username']?>"><?=$following['username']?></a>
                                </div>
                                <div class="follow-person-dis">
                                    <?=$following['bio']?>
                                </div>
                            </div>
                        </div>
                    </div>
                <? }?>
                <!--////////////////////////////////////////////////////////////////////////////////////////-->


            </div><!-- wrap follo inner end-->
        </div><!--FOLLOWING OR FOLLOWER FULL WRAPPER END-->

        <?}else{?>
        <!--TWEETS ACCOUTS-->


        <div class="in-center">

            <div class="in-center-wrap">

                <?
                $data['tweets']=$tweets;
                View::render('tweet/tweets',$data)?>


            </div>
        </div>
    <?}?>

    </div><!--in full wrap end-->
</div><!-- in wrappper ends-->

</div><!-- ends wrapper -->


</body>
</html>

<script src="/assets/js/tweet.js?c1"></script>
<script src="/assets/js/follow_list.js?q"></script>
<script src="/assets/js/retweet.js?b1"></script>
<script src="/assets/js/like.js?c1"></script>
<script src="/assets/js/comment.js?qd"></script>