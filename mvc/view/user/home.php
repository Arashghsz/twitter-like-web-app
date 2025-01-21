
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
                        <!--TWEET WRAPPER-->
                        <div class="tweet-wrap">
                            <div class="tweet-inner">
                                <div class="tweet-h-left">
                                    <div class="tweet-h-img">
                                        <!-- PROFILE-IMAGE -->
                                        <img src="<?=$user_info['profileImage']?>"/>
                                    </div>
                                </div>
                                <form method="post" action="/user/home" enctype="multipart/form-data">
                                <div class="tweet-body">
                                        <textarea class="status" style="outline: none" name="status" placeholder="Type Something here!" rows="4" cols="50"></textarea>
                                        <div class="hash-box">
                                            <ul>
<!--                                                <li><span>123</span></li>-->
                                            </ul>
                                        </div>
                                </div>
                                <div class="tweet-footer">
                                    <div class="t-fo-left">
                                        <ul>
                                            <input type="file" name="file" id="file"/>
                                            <li><label for="file"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                                <?if(isset($error)){?>
                                                <span class="tweet-error"><?=$error?></span>
                                                <?}?>
                                                <span class="tweet-error1"></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="t-fo-right">
                                        <span id="count">140</span>
                                        <input type="submit" name="tweet" value="tweet"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!--TWEET WRAP END-->


                        <!--Tweet SHOW WRAPPER-->
                        <div class="tweets">

                           <?
                            $data['tweets']=$tweets;
                            View::render('tweet/tweets',$data)?>
                        </div>
                        <!--TWEETS SHOW WRAPPER-->

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