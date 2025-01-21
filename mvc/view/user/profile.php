
<!doctype html>
<html>
<head>
    <title>twitter</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
    <script src="/assets/js/jquery-3.6.0.min.js" ></script>
    <link rel="stylesheet" href="/assets/css/style-complete.css"/>

</head>
<!--Helvetica Neue-->
<body>
<div class="wrapper">
    <!-- header wrapper -->
    <?
    $data['user_info'] = $user_info;
    $data['count_message'] = $count_message;
    View::render('user/header',$data)?>

    <!--Profile cover-->
    <div class="profile-cover-wrap">
        <div class="profile-cover-inner">
            <div class="profile-cover-img">
                <!-- PROFILE-COVER -->
                <img src="<?=$user_info['profileCover']?>"/>
            </div>
        </div>
        <div class="profile-nav">
            <div class="profile-navigation">
                <ul>
                    <li>
                        <div class="n-head">
                            TWEETS
                        </div>
                        <div class="n-bottom">
                            <?=$tweet_count['tweet_count']?>

                        </div>
                    </li>
                    <li>
                        <a href="/follow/following/<?=$user_info['username']?>">
                            <div class="n-head">
                                <a href="/follow/following/<?=$user_info['username']?>">FOLLOWING</a>
                            </div>
                            <div class="n-bottom">
                                <span class="count-following"><?=$user_info['following']?></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/follow/followers/<?=$user_info['username']?>">
                            <div class="n-head">
                                FOLLOWERS
                            </div>
                            <div class="n-bottom">
                                <span class="count-followers"><?=$user_info['follower']?></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="n-head">
                                LIKES
                            </div>
                            <div class="n-bottom">
                                <?=$like_count['like_count']?>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="edit-button">
                    <?=FollowController::follow_btn($_SESSION['id'],$user_info['user_id'])?>
                </div>
            </div>
        </div>
    </div><!--Profile Cover End-->

    <!---Inner wrapper-->
    <div class="in-wrapper">
        <div class="in-full-wrap">
            <div class="in-left">
                <div class="in-left-wrap">
                    <!--PROFILE INFO WRAPPER END-->
                    <div class="profile-info-wrap">
                        <div class="profile-info-inner">
                            <!-- PROFILE-IMAGE -->
                            <div class="profile-img">
                                <img src="<?=$user_info['profileImage']?>"/>
                            </div>

                            <div class="profile-name-wrap">
                                <div class="profile-name">
                                    <a href="/user/profile/<?=$user_info['username']?>"><?=$user_info['screenName']?></a>
                                </div>
                                <div class="profile-tname">
                                    @<span class="username"><?=$user_info['username']?></span>
                                </div>
                            </div>

                            <div class="profile-bio-wrap">
                                <div class="profile-bio-inner">
                                    <?=$user_info['bio']?>
                                </div>
                            </div>

                            <div class="profile-extra-info">
                                <div class="profile-extra-inner">
                                    <ul>
                                        <?if($user_info['country'] != null){?>
                                        <li>
                                            <div class="profile-ex-location-i">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            </div>
                                            <div class="profile-ex-location">
                                                <?=$user_info['country']?>
                                            </div>
                                        </li>
                                        <?}?>
                                        <?if($user_info['website'] != null){?>
                                        <li>
                                            <div class="profile-ex-location-i">
                                                <i class="fa fa-link" aria-hidden="true"></i>
                                            </div>
                                            <div class="profile-ex-location">
                                                <a target="_blank" href="<?=$user_info['website']?>"> <?=$user_info['website']?></a>
                                            </div>
                                        </li>
                                        <?}?>

                                        <li>
                                            <div class="profile-ex-location-i">
                                                <!-- <i class="fa fa-calendar-o" aria-hidden="true"></i> -->
                                            </div>
                                            <div class="profile-ex-location">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="profile-ex-location-i">
                                                <!-- <i class="fa fa-tint" aria-hidden="true"></i> -->
                                            </div>
                                            <div class="profile-ex-location">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="profile-extra-footer">
                                <div class="profile-extra-footer-head">
                                    <div class="profile-extra-info">
                                        <ul>

                                        </ul>
                                    </div>
                                </div>
                                <div class="profile-extra-footer-body">
                                    <ul>
                                        <!-- <li><img src="#"/></li> -->
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!--PROFILE INFO INNER END-->

                    </div>
                    <!--PROFILE INFO WRAPPER END-->

                </div>
                <!-- in left wrap-->

            </div>
            <!-- in left end-->

            <div class="in-center">
                <div class="in-center-wrap">
                    <!--Tweet SHOW WRAPER-->
                    <?
                    $data['tweets']=$tweets;
                    View::render('tweet/tweets',$data)?>
                </div><!-- in left wrap-->
                <div class="popupTweet"></div>
            </div>
            <!-- in center end -->

            <div class="in-right">
                <div class="in-right-wrap">

                    <!--==WHO TO FOLLOW==-->
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
                    <!--==WHO TO FOLLOW==-->

                    <!--==TRENDS==-->
                    <?
                    $data['trends']=$trends;
                    View::render('trend/trend_list',$data)?>
                    <!--==TRENDS==-->

                </div><!-- in right wrap-->
            </div>
            <!-- in right end -->

        </div>
        <!--in full wrap end-->
    </div>
    <!-- in wrappper ends-->
</div>
<!-- ends wrapper -->
</body>
</html>

<script src="/assets/js/follow.js"></script>
<script src="/assets/js/tweet.js?c"></script>
<script src="/assets/js/follow_list.js?q"></script>
<script src="/assets/js/retweet.js?b1"></script>
<script src="/assets/js/like.js?c1"></script>
<script src="/assets/js/comment.js?qd"></script>
