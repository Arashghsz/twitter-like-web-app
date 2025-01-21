<!doctype html>
<html>
<head>
    <title>Profile edit page</title>
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

                <div class="img-upload-button-wrap">
                    <div class="img-upload-button1">
                        <label for="cover-upload-btn">
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </label>
                        <span class="span-text1">
					Change your profile photo
				</span>
                        <input id="cover-upload-btn" type="checkbox"/>
                        <div class="img-upload-menu1">
                            <span class="img-upload-arrow"></span>
                            <form id="profileCoverForm" method="post" action="/user/profileEdit" enctype="multipart/form-data">
                                <ul>
                                    <li>
                                        <label for="file-up">
                                            Upload photo
                                        </label>
                                        <input type="file" name="profileCover" id="file-up" />
                                    </li>
                                    <li>
                                        <label for="cover-upload-btn">
                                            Cancel
                                        </label>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-nav">
            <div class="profile-navigation">
                <ul>
                    <li>
                        <a href="#">
                            <div class="n-head">
                                TWEETS
                            </div>
                            <div class="n-bottom">
                                <?=$tweet_count['tweet_count']?>

                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/follow/following/<?=$user_info['username']?>">
                            <div class="n-head">
                                FOLLOWINGS
                            </div>
                            <div class="n-bottom">
                                <?=$user_info['following']?>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/follow/followers/<?=$user_info['username']?>">
                            <div class="n-head">
                                FOLLOWERS
                            </div>
                            <div class="n-bottom">
                                <?=$user_info['follower']?>
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
			<span>
				<button class="f-btn" type="button" value="Cancel">Cancel</button>
			</span>
                    <span>
				<input type="submit" id="save" value="Save Changes">
			</span>

                </div>
            </div>
        </div>
    </div><!--Profile Cover End-->

    <div class="in-wrapper">
        <div class="in-full-wrap">
            <div class="in-left">
                <div class="in-left-wrap">
                    <!--PROFILE INFO WRAPPER END-->
                    <div class="profile-info-wrap">
                        <div class="profile-info-inner">
                            <div class="profile-img">
                                <!-- PROFILE-IMAGE -->
                                <img src="<?=$user_info['profileImage']?>"/>
                                <div class="img-upload-button-wrap1">
                                    <div class="img-upload-button">
                                        <label for="img-upload-btn">
                                            <i class="fa fa-camera" aria-hidden="true"></i>
                                        </label>
                                        <span class="span-text">
					Change your profile photo
				</span>
                                        <input id="img-upload-btn" type="checkbox"/>
                                        <div class="img-upload-menu">
                                            <span class="img-upload-arrow"></span>
                                            <form id="profileImageFrom" method="post" enctype="multipart/form-data">
                                                <ul>
                                                    <li>
                                                        <label for="profileImage">
                                                            Upload photo
                                                        </label>
                                                        <input id="profileImage" type="file"  name="profileImage"/>

                                                    </li>
                                                    <li><span id="removeProfileImage" style="cursor: pointer">Remove</span></li>
                                                    <li>
                                                        <label for="img-upload-btn">
                                                            Cancel
                                                        </label>
                                                    </li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- img upload end-->
                                </div>
                            </div>

                            <form id="editForm" method="post" action="/user/profileEdit" enctype="multipart/Form-data">
                                <div class="profile-name-wrap">
                                    <?if(isset($error)){?>
                                     <ul>
                                          <li class="error-li">
                                              <div class="span-pe-error"><?=$error?></div>
                                         </li>
                                     </ul>
                                    <?}?>
                                    <div class="profile-name">
                                        <input type="text" name="screenName" value="<?=$user_info['screenName']?>"/>
                                    </div>
                                    <div class="profile-tname">
                                        @<?=$user_info['username']?>
                                    </div>
                                </div>
                                <div class="profile-bio-wrap">
                                    <div class="profile-bio-inner">
                                        <textarea class="status" name="bio"><?=$user_info['bio']?></textarea>
                                        <div class="hash-box">
                                            <ul>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-extra-info">
                                    <div class="profile-extra-inner">
                                        <ul>
                                            <li>
                                                <div class="profile-ex-location">
                                                    <input id="cn" type="text" name="country" placeholder="Country" value="<?=$user_info['country']?>" />
                                                </div>
                                            </li>
                                            <li>
                                                <div class="profile-ex-location">
                                                    <input type="text" name="website" placeholder="Website" value="<?=$user_info['website']?>"/>
                                                </div>
                                            </li>
                            </form>
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
                                <!-- <li><img src="#"></li> -->
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
            <?
            $data['tweets']=$tweets;
            View::render('tweet/tweets',$data)?>
        </div>
        <!-- in left wrap-->
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
        </div>
        <!-- in left wrap-->
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

<script src="/assets/js/profileEdit.js?q"></script>
<script src="/assets/js/tweet.js?c"></script>
<script src="/assets/js/follow_list.js?q"></script>
<script src="/assets/js/retweet.js?b1"></script>
<script src="/assets/js/like.js?c1"></script>
<script src="/assets/js/comment.js?qd"></script>