<!doctype html>
<html>
<head>
    <title>Following list</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
    <link rel="stylesheet" href="/assets/css/style-complete.css?b"/>
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="wrapper">
    <!-- header wrapper -->
    <?
    $data['user_info'] = $user_info;
    $data['count_message'] = $count_message;
    View::render('user/header',$data)?>
    <!-- header wrapper end -->

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
                                0
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
                                            <li>
                                                <div class="profile-ex-location-i">
                                                    <i class="fa fa-camera" aria-hidden="true"></i>
                                                </div>
                                                <div class="profile-ex-location">
                                                    <a href="#">0 Photos and videos </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
<!--                                <div class="profile-extra-footer-body">-->
<!--                                    <ul>-->
<!--                                        <li><img src="#"/></li>-->
<!--                                    </ul>-->
<!--                                </div>-->
                                <!-- whoToFollow -->

                                <!-- Trends -->
                            </div>
                        </div>
                        <!--PROFILE INFO INNER END-->
                    </div>
                    <!--PROFILE INFO WRAPPER END-->

                    <div class="popupTweet"></div>
                </div>
                <!-- in left wrap-->
            </div>
            <!-- in left end-->
            <!--FOLLOWING OR FOLLOWER FULL WRAPPER-->
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
                                    <!-- BIO -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <? }?>
<!--////////////////////////////////////////////////////////////////////////////////////////-->


                </div><!-- wrap follo inner end-->
            </div><!--FOLLOWING OR FOLLOWER FULL WRAPPER END-->

        </div><!--in full wrap end-->
    </div>
    <!-- in wrappper ends-->

</div><!-- ends wrapper -->
</body>
</html>
<script src="/assets/js/follow.js"></script>
<script src="/assets/js/follow_list.js"></script>