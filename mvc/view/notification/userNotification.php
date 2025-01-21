
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

    <!---Inner wrapper-->
    <div class="inner-wrapper">
        <div class="in-wrapper">
            <div class="in-full-wrap">
                <div class="in-left">
                    <div class="in-left-wrap">
                        <div class="info-box">
                            <div class="info-inner">
                                <div class="info-in-head">
                                    <!-- PROFILE-COVER-IMAGE -->
                                    <img src="<?=$user_info['profileCover']?>"/>
                                </div><!-- info in head end -->
                                <div class="info-in-body">
                                    <div class="in-b-box">
                                        <div class="in-b-img">
                                            <!-- PROFILE-IMAGE -->
                                            <img src="<?=$user_info['profileImage']?>"/>
                                        </div>
                                    </div><!--  in b box end-->
                                    <div class="info-body-name">
                                        <div class="in-b-name">
                                            <div><a href="/user/profile/<?=$user_info['username']?>"><?=$user_info['screenName']?></a></div>
                                            <span><small><a href="/user/profile/<?=$user_info['username']?>">@<?=$user_info['username']?></a></small></span>
                                        </div><!-- in b name end-->
                                    </div><!-- info body name end-->
                                </div><!-- info in body end-->
                                <div class="info-in-footer">
                                    <div class="number-wrapper">
                                        <div class="num-box">
                                            <div class="num-head">
                                                TWEETS
                                            </div>
                                            <div class="num-body">
                                                <?=$tweet_count['tweet_count']?>
                                            </div>
                                        </div>
                                        <div class="num-box">
                                            <div class="num-head">
                                                FOLLOWING
                                            </div>
                                            <div class="num-body">
                                                <span class="count-following"><?=$user_info['following']?></span>
                                            </div>
                                        </div>
                                        <div class="num-box">
                                            <div class="num-head">
                                                FOLLOWERS
                                            </div>
                                            <div class="num-body">
                                                <span class="count-followers"><?=$user_info['follower']?></span>
                                            </div>
                                        </div>
                                    </div><!-- mumber wrapper-->
                                </div><!-- info in footer -->
                            </div><!-- info inner end -->
                        </div><!-- info box end-->

                        <!--==TRENDS==-->
                        <?
                        $data['trends']=$trends;
                        View::render('trend/trend_list',$data)?>
                    </div>
                    <!--==TRENDS==-->

                </div><!-- in left wrap-->
            </div><!-- in left end-->
            <div class="in-center">
                <div class="in-center-wrap">


                    <!--NOTIFICATION WRAPPER FULL WRAPPER-->
                    <div class="notification-full-wrapper">

                        <div class="notification-full-head">
                            <div>
                                <a href="/notification/userNotification">All</a>
                            </div>

                            <div>
                                <a href="/user/account">settings</a>
                            </div>
                        </div>


                        <? foreach ($notifications as $notification) {?>

                            <?if($notification['type'] == "follow"){?>
                        <!-- Follow Notification -->
                        <!--NOTIFICATION WRAPPER-->
                        <div class="notification-wrapper">
                            <div class="notification-inner">
                                <div class="notification-header">

                                    <div class="notification-img">
			                        	<span class="follow-logo">
			                        		<i class="fa fa-child" aria-hidden="true"></i>
			                        	</span>
                                    </div>
                                    <div class="notification-name">
                                        <div>
                                            <img src="<?=$notification['profileImage']?>"/>
                                        </div>

                                    </div>
                                    <div class="notification-tweet">
                                        <a href="/user/profile/<?=$notification['username']?>" class="notifi-name"><?=$notification['screenName']?></a><span> Followed you your - <span><?=$notification['notificationTime']?></span>

                                    </div>

                                </div>

                            </div>
                            <!--NOTIFICATION-INNER END-->
                        </div>
                        <!--NOTIFICATION WRAPPER END-->
                        <!-- Follow Notification -->
                        <?}else if($notification['type'] == "like"){?>

                        <!-- Like Notification -->
                        <!--NOTIFICATION WRAPPER-->
                        <div class="notification-wrapper">
                            <div class="notification-inner">
                                <div class="notification-header">
                                    <div class="notification-img">
				<span class="heart-logo">
					<i class="fa fa-heart" aria-hidden="true"></i>
				</span>
                                    </div>
                                    <div class="notification-name">
                                        <div>
                                            <img src="<?=$notification['profileImage']?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="notification-tweet">
                                    <a href="/user/profile/<?=$notification['username']?>" class="notifi-name"><?=$notification['screenName']?></a><span> liked your TWEET - <span><?=$notification['notificationTime']?></span>
                                </div>
                                <div class="notification-footer">
                                    <div class="noti-footer-inner">
                                        <div class="noti-footer-inner-left">
                                            <div class="t-h-c-name">
                                                <span><a href="/user/profile/<?=$user_info['username']?>"><?=$user_info['screenName']?></a></span>
                                                <span>@<?=$user_info['username']?></span>
                                                <span><?=$notification['tweetTime']?></span>
                                            </div>
                                            <div class="noti-footer-inner-right-text">
                                                <?=get_link($notification['text'])?>
                                            </div>
                                        </div>
                                        <div class="noti-footer-inner-right">
                                            <? if (str_contains($notification['tweetMedia'] , '.mp4') ){ ?>
                                                <!--tweet show head end-->
                                                            <video width="320" height="240" controls class="imagePopup">
                                                                <source src="<?=$notification['tweetMedia']?>" type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                            <?}elseif (str_contains($notification['tweetMedia'] , '.jpg') or
                                                str_contains($notification['tweetMedia'] , '.png')){?>
                                                            <img src="<?=$notification['tweetMedia']?>" class="imagePopup"/>
                                            <?}?>
                                        </div>

                                    </div><!--END NOTIFICATION-inner-->
                                </div>
                            </div>
                        </div>
                        <!--NOTIFICATION WRAPPER END-->
                        <!-- Like Notification -->

                            <?}else if($notification['type'] == "retweet"){?>

                        <!-- Retweet Notification -->
                        <!--NOTIFICATION WRAPPER-->
                        <div class="notification-wrapper">
                            <div class="notification-inner">
                                <div class="notification-header">

                                    <div class="notification-img">
				<span class="retweet-logo">
					<i class="fa fa-retweet" aria-hidden="true"></i>
				</span>
                                    </div>
                                    <div class="notification-tweet">
                                        <a href="/user/profile/<?=$notification['username']?>" class="notifi-name"><?=$notification['screenName']?></a><span> retweet your TWEET - <span><?=$notification['notificationTime']?></span>
                                    </div>
                                    <div class="notification-footer">
                                        <div class="noti-footer-inner">

                                            <div class="noti-footer-inner-left">
                                                <div class="t-h-c-name">
                                                    <span><a href="/user/profile/<?=$user_info['username']?>"><?=$user_info['screenName']?></a></span>
                                                    <span>@<?=$user_info['username']?></span>
                                                    <span><?=$notification['tweetTime']?></span>
                                                </div>
                                                <div class="noti-footer-inner-right-text">
                                                    <?=get_link($notification['text'])?>
                                                </div>
                                            </div>


                                            <div class="noti-footer-inner-right">
                                                <img src="<?=$notification['profileImage']?>"/>
                                            </div>

                                        </div><!--END NOTIFICATION-inner-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--NOTIFICATION WRAPPER END-->
                        <!-- Retweet Notification -->

                            <?}else if($notification['type'] == "mention"){?>

                                <!-- Retweet Notification -->
                                <!--NOTIFICATION WRAPPER-->
                                <div class="notification-wrapper">
                                    <div class="notification-inner">
                                        <div class="notification-header">

                                            <div class="notification-img">
				<span class="retweet-logo">
					<i class="fa fa-retweet" aria-hidden="true"></i>
				</span>
                                            </div>
                                            <div class="notification-tweet">
                                                <a href="/user/profile/<?=$notification['username']?>" class="notifi-name"><?=$notification['screenName']?></a><span> mentioned you - <span><?=$notification['notificationTime']?></span>
                                            </div>
                                            <div class="t-show-popup">
                                                <div class="t-show-head">
                                                    <div class="t-show-img">
                                                        <img src="<?=$notification['profileImage']?>"/>
                                                    </div>
                                                    <div class="t-s-head-content">
                                                        <div class="t-h-c-name">
                                                            <span><a href="/user/profile/<?=$user_info['username']?>"><?=$user_info['screenName']?></a></span>
                                                            <span>@<?=$user_info['username']?></span>
                                                            <span><?=$notification['tweetTime']?></span>
                                                        </div>
                                                        <div class="t-h-c-dis">
                                                            <?=get_link($notification['text'])?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <? if (str_contains($notification['tweetMedia'] , '.mp4') ){ ?>
                                                    <!--tweet show head end-->
                                                    <div class="t-show-body">
                                                        <div class="t-s-b-inner">
                                                            <div class="t-s-b-inner-in">
                                                                <video width="320" height="240" controls class="imagePopup">
                                                                    <source src="<?=$notification['tweetMedia']?>" type="video/mp4">
                                                                    Your browser does not support the video tag.
                                                                </video>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?}else{?>
                                                    <div class="t-show-body">
                                                        <div class="t-s-b-inner">
                                                            <div class="t-s-b-inner-in">
                                                                <img src="<?=$notification['tweetMedia']?>" class="imagePopup"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?}?>

                                                </div><!--END NOTIFICATION-inner-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--NOTIFICATION WRAPPER END-->
                                <!-- Retweet Notification -->

                            <?}?>



                        <?}?>



                    </div>
                    <!--NOTIFICATION WRAPPER FULL WRAPPER END-->




                    <div class="loading-div">
                <img id="loader" src="/assets/images/loading.svg" style="display: none;"/>
            </div>
            <div class="popupTweet"></div>
            <!--Tweet END WRAPER-->

        </div><!-- in left wrap-->
    </div><!-- in center end -->

    <div class="in-right">
        <div class="in-right-wrap">

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

        </div><!-- in left wrap-->

    </div><!-- in right end -->

</div><!--in full wrap end-->

</div><!-- in wrappper ends-->
</div><!-- inner wrapper ends-->
</div><!-- ends wrapper -->
</body>

</html>

<script src="/assets/js/tweet.js?c12"></script>
<script src="/assets/js/follow_list.js?q"></script>
<script src="/assets/js/retweet.js?b1"></script>
<script src="/assets/js/like.js?c1"></script>
<script src="/assets/js/comment.js?qd"></script>