<div class="retweet-popup">
    <div class="wrap5">
        <div class="retweet-popup-body-wrap" style="top: 10%">
            <div class="retweet-popup-heading">
                <h3>Retweet this to followers?</h3>
                <span><button class="close-retweet-popup"><i class="fa fa-times" aria-hidden="true"></i></button></span>
            </div>
            <div class="retweet-popup-input">
                <div class="retweet-popup-input-inner">
                    <input style="outline: none" type="text" class="retweetMsg" placeholder="Add a comment.."/>
                    <div class="hash-box">
                        <ul>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="retweet-popup-inner-body">
                <div class="retweet-popup-inner-body-inner">
                    <div class="retweet-popup-comment-wrap">
                        <div class="retweet-popup-comment-head">
                            <img src="<?=$tweet['profileImage']?>"/>
                        </div>
                        <div class="retweet-popup-comment-right-wrap">
                            <div class="retweet-popup-comment-headline">
                                <a><?=$tweet['screenName']?> </a><span>‏@<?=$tweet['username']?> - <?=$tweet['tweetTime']?></span>
                            </div>
                            <br>
                            <div class="retweet-popup-comment-body">

                                <?=get_link($tweet['text'])?>
                                <br>
                                <? if (str_contains($tweet['tweetMedia'] , '.mp4') ){ ?>

                                    <video width="320" height="240" controls >
                                        <source src="<?=$tweet['tweetMedia']?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>

                                <?}else if (str_contains($tweet['tweetMedia'] , '.png') or
                                       str_contains($tweet['tweetMedia'] , '.jpg') ){?>

                                    <img  width="320" height="240" src="<?=$tweet['tweetMedia']?>" />

                                <?}?>
                                <!--tweet show body end-->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="retweet-popup-footer">
                <div class="retweet-popup-footer-right">
                    <button class="retweet-it" data-tweetid="<?=$tweet['tweet_id']?>" data-tweetby="<?=$tweet['tweetBy']?>" type="submit"><i class="fa fa-retweet" aria-hidden="true"></i>Retweet</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- Retweet PopUp ends-->

