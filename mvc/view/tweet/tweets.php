
<? for ($i = 0 ; $i< count($tweets) ; $i++){?>


<div class="all-tweet">
    <div class="t-show-wrap">
        <div class="t-show-inner">

            <div class="t-show-popup">
                <div class="t-show-head">
                    <div class="t-show-img">
                        <img src="<?=$tweets[$i]['profileImage']?>"/>
                    </div>
                    <div class="t-s-head-content">
                        <div class="t-h-c-name">
                            <span><a href="/user/profile/<?=$tweets[$i]['username']?>"><?=$tweets[$i]['screenName']?></a></span>
                            <span>@<?=$tweets[$i]['username']?></span>
                            <span><?=$tweets[$i]['tweetTime']?></span>
                        </div>
                        <div class="t-h-c-dis">
                            <?=get_link($tweets[$i]['text'])?>
                        </div>
                    </div>
                </div>
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
                <!--tweet show body end-->
            </div>
            <div class="t-show-footer">
                <div class="t-s-f-right">
                    <ul>

                        <li><button class="comment-btn" data-tweetid="<?=$tweets[$i]['tweet_id']?>"><i class="fa fa-share" aria-hidden="true"></i></button></li>

                        <?if($tweets[$i]['retweetCount']  == 0){?>
                        <li><button class="retweet" data-tweetid="<?=$tweets[$i]['tweet_id']?>" >
                                <i class="fa fa-retweet" aria-hidden="true"></i>
                            </button></li>
                        <?}else{?>
                        <li><button class="retweeted" data-tweetid="<?=$tweets[$i]['tweet_id']?>" >
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
                        <li><button data-tweetby="<?=$tweets[$i]['tweetBy']?>" class="like-btn"  data-tweetid="<?=$tweets[$i]['tweet_id']?>" >
                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                <span class="likeCount"><?=$tweets[$i]['likeCount']?></span>
                            </button>
                        </li>
                        <?}?>

                        <?if($tweets[$i]['tweetBy'] == $_SESSION['id']){?>
                        <li>
                            <span class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></span>
                            <ul>
                                <li><label data-tweetid="<?=$tweets[$i]['tweet_id']?>" class="deleteTweet">Delete Tweet</label></li>
                            </ul>
                        </li>
                        <?}?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<? $retweets=TweetModel::get_retweet($tweets[$i]['tweet_id'])?>
<!--    //////////RETWEET/////////-->

    <? foreach ($retweets as $retweet) {?>

    <div class="t-s-b-inner">
        <div class="t-s-b-inner-in" style="padding: 5px 0px;">
            <div class="retweet-t-s-b-inner" style="padding: 0px;">
                <div class="t-show-banner">
                    <div class="t-show-banner-inner">
                        <span><i class="fa fa-retweet" aria-hidden="true"></i></span>
                        <span><?=$retweet['screenName']?> Retweeted</span>
                    </div>
                </div>
                <div class="retweet-t-s-b-inner-left">
                    <img src="<?=$retweet['profileImage']?>"/>
                </div>
                <div class="retweet-t-s-b-inner-right">
                    <div class="t-h-c-name">
                        <span><a href="/user/profile/<?=$retweet['username']?>">Retweet <?=$retweet['screenName']?></a></span>
                        <span>@<?=$retweet['username']?></span>
                        <span><?=$retweet['tweetTime']?></span>
                    </div>
                    <div class="retweet-t-s-b-inner-right-text">
                        <?=get_link($retweet['retweetText'])?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?}?>
<!--    //////////RETWEET/////////-->


<?}?>












