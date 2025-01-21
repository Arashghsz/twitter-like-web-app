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