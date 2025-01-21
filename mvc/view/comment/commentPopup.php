<div class="tweet-show-popup-wrap">
    <input type="checkbox" id="tweet-show-popup-wrap">
    <div class="wrap4">
        <label for="tweet-show-popup-wrap">
            <div class="tweet-show-popup-box-cut">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
        </label>
        <div class="tweet-show-popup-box">
            <div class="tweet-show-popup-inner">
                <div class="tweet-show-popup-head">
                    <div class="tweet-show-popup-head-left">
                        <div class="tweet-show-popup-img">
                            <img src="<?=$tweet['profileImage']?>"/>
                        </div>
                        <div class="tweet-show-popup-name">
                            <div class="t-s-p-n">
                                <a href="/user/profile/<?=$tweet['username']?>">
                                    <?=$tweet['screenName']?>
                                </a>
                            </div>
                            <div class="t-s-p-n-b">
                                <a href="/user/profile/<?=$tweet['username']?>">
                                    @<?=$tweet['username']?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="tweet-show-popup-head-right">
                        <?=FollowController::follow_btn_list($_SESSION['id'],$tweet['user_id'])?>
                    </div>
                </div>
                <div class="tweet-show-popup-tweet-wrap">
                    <div class="tweet-show-popup-tweet">
                        <?=get_link($tweet['text'])?>
                    </div>
                    <div class="tweet-show-popup-tweet-ifram">
                        <? if (str_contains($tweet['tweetMedia'] , '.mp4') ){ ?>

                            <video width="320" height="240" controls >
                                <source src="<?=$tweet['tweetMedia']?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>

                        <?}else if (str_contains($tweet['tweetMedia'] , '.png') or
                            str_contains($tweet['tweetMedia'] , '.jpg') ){?>

                            <img  width="320" height="240" src="<?=$tweet['tweetMedia']?>" />

                        <?}?>
                    </div>
                </div>
                <div class="tweet-show-popup-footer-wrap">
                    <div class="tweet-show-popup-retweet-like">
                        <div class="tweet-show-popup-retweet-left">
                            <div class="tweet-retweet-count-wrap">
                                <div class="tweet-retweet-count-head">
                                    RETWEET
                                </div>
                                <div class="tweet-retweet-count-body">
                                    <?=$tweet['retweetCount']?>
                                </div>
                            </div>
                            <div class="tweet-like-count-wrap">
                                <div class="tweet-like-count-head">
                                    LIKES
                                </div>
                                <div class="tweet-like-count-body">
                                    <?=$tweet['likeCount']?>
                                </div>
                            </div>
                        </div>
                        <div class="tweet-show-popup-retweet-right">

                        </div>
                    </div>
                    <div class="tweet-show-popup-time">
                        <span><?=$tweet['tweetTime']?></span>
                    </div>
                    <div class="tweet-show-popup-footer-menu">
                        <ul>

                            <?if($tweet['retweetCount']  == 0){?>
                                <li><button class="retweet" data-tweetid="<?=$tweet['tweet_id']?>">
                                        <i class="fa fa-retweet" aria-hidden="true"></i>
                                    </button></li>
                            <?}else{?>
                                <li><button class="retweeted" data-tweetid="<?=$tweet['tweet_id']?>">
                                        <i class="fa fa-retweet" aria-hidden="true">
                                        </i><span class="retweetCount"><?=$tweet['retweetCount']?></span>
                                    </button></li>
                            <?}?>

                            <?if(LikeModel::check_like($tweet['tweet_id'], $_SESSION['id'])){?>
                                <li><button class="unlike-btn" data-tweetid="<?=$tweet['tweet_id']?>">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                        <span class="likeCount"><?=$tweet['likeCount']?></span>
                                    </button>
                                </li>
                            <?}else{?>
                                <li><button class="like-btn" data-tweetid="<?=$tweet['tweet_id']?>">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        <span class="likeCount"><?=$tweet['likeCount']?></span>
                                    </button>
                                </li>
                            <?}?>

                            <?if($tweet['tweetBy'] == $_SESSION['id']){?>
                                <li>
                                    <span class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></span>
                                    <ul>
                                        <li><label data-tweetid="<?=$tweet['tweet_id']?>" class="deleteTweet">Delete Tweet</label></li>
                                    </ul>
                                </li>
                            <?}?>

                        </ul>
                    </div>
                </div>
            </div><!--tweet-show-popup-inner end-->
            <div class="tweet-show-popup-footer-input-wrap">
                <div class="tweet-show-popup-footer-input-inner">
                    <div class="tweet-show-popup-footer-input-left">
                        <img src="<?=$tweet['profileImage']?>"/>
                    </div>
                    <div class="tweet-show-popup-footer-input-right">
                        <input style="outline: none" id="commentField" type="text" name="comment"  placeholder="Reply to @<?=$tweet['username']?>">
                    </div>
                </div>
                <div class="tweet-footer">
                    <div class="t-fo-left">
                        <ul>
                            <li>
                                <!-- <label for="t-show-file"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                <input type="file" id="t-show-file"> -->
                            </li>
                            <li class="error-li">
                            </li>
                        </ul>
                    </div>
                    <div class="t-fo-right">
                        <input type="submit" id="postComment" data-tweetid="<?=$tweet['tweet_id']?>">
                    </div>
                </div>
            </div><!--tweet-show-popup-footer-input-wrap end-->

            <div class="tweet-show-popup-comment-wrap">
                <div id="comments">

                    <? foreach ($comments as $comment) {?>
                        <div class="tweet-show-popup-comment-box">
                            <div class="tweet-show-popup-comment-inner">
                                <div class="tweet-show-popup-comment-head">
                                    <div class="tweet-show-popup-comment-head-left">
                                        <div class="tweet-show-popup-comment-img">
                                            <img src="<?=$comment['profileImage']?>">
                                        </div>
                                    </div>
                                    <div class="tweet-show-popup-comment-head-right">
                                        <div class="tweet-show-popup-comment-name-box">
                                            <div class="tweet-show-popup-comment-name-box-name">
                                                <a href="/user/profile/<?=$comment['username']?>"><?=$comment['screenName']?></a>
                                            </div>
                                            <div class="tweet-show-popup-comment-name-box-tname">
                                                <a href="/user/profile/<?=$comment['username']?>">@<?=$comment['username']?> - <?=$comment['commentTime']?></a>
                                            </div>
                                        </div>
                                        <div class="tweet-show-popup-comment-right-tweet">
                                            <p><a href="/user/profile/<?=$comment['username']?>">@<?=$comment['username']?></a> <?=$comment['comment']?></p>
                                        </div>
                                        <div class="tweet-show-popup-footer-menu">

                                            <?if(CommentModel::check_comment($comment['commentOn'],$_SESSION['id'],$comment['comment'])){?>
                                            <ul>
                                                <li><button data-commentid="<?=$comment['comment_id']?>" class="trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button></li>
                                            </ul>
                                            <?}?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--TWEET SHOW POPUP COMMENT inner END-->
                        </div>
                    <?}?>
                </div>

            </div>
            <!--tweet-show-popup-box ends-->
        </div>
    </div>

