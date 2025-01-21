<div class="popup-message-wrap">
    <input id="popup-message-tweet" type="checkbox" checked="unchecked"/>
    <div class="wrap2">
        <div class="message-send">
            <div class="message-header">
                <div class="message-h-left">
                    <label for="mass"><i class="fa fa-angle-left" aria-hidden="true"></i></label>
                </div>
                <div class="message-h-cen">
                    <h4>New message</h4>
                </div>
                <div class="message-h-right">
                    <label for="popup-message-tweet" ><i class="fa fa-times" aria-hidden="true"></i></label>
                </div>
            </div>
            <div class="message-input">
                <h4>Send message to:</h4>
                <input type="text" placeholder="Search people" class="search-user"/>
                <ul class="search-result down">

                </ul>
            </div>
            <div class="message-body">
                <h4>Recent</h4>
                <div class="message-recent">

                    <? foreach ($pvs as $pv) {?>
                        <?$last_message_info=MessageModel::last_message_info($pv['user_id'])?>
                        <?$count_message=MessageModel::count_message_detail($pv['user_id'])?>
                        <div class="people-message" data-userid="<?=$pv['user_id']?>">
                            <div class="people-inner">
                                <div class="people-img">
                                    <img src="<?=$pv['profileImage']?>"/>
                                </div>
                                <div class="name-right2">
                                    <span><a href="/user/profile/<?=$pv['username']?>"><?=$pv['screenName']?></a></span><span>@<?=$pv['username']?></span>
                                </div>
                                <div class="msg-box">

                                    <?if(!str_contains($last_message_info['message'],"/assets/messageMedia/")){?>
                                    <?=$last_message_info['message']?>
                                    <?}?>
                                </div>

                                <span > <?=$count_message['count_message']?></span>


                                <span>

					    <?$time=explode(":",explode(" ",  $last_message_info['messageTime'])[1])?>
                                    <?=$time[0]?>:<?=$time[1]?>

                            </span>
                            </div>
                        </div>
                    <?}?>

                </div>
            </div>
            <!--message FOOTER-->
            <div class="message-footer">
                <div class="ms-fo-right">
                    <label>Next</label>
                </div>
            </div><!-- message FOOTER END-->
        </div><!-- MESSGAE send ENDS-->


        <input id="mass" type="checkbox" checked="unchecked" />
        <div class="back">
            <div class="back-header">
                <div class="back-left">
                    Direct message
                </div>
                <div class="back-right">
                    <label for="mass"  class="new-message-btn">New messages</label>
                    <label for="popup-message-tweet"><i class="fa fa-times" aria-hidden="true"></i></label>
                </div>
            </div>
            <div class="back-inner">
                <div class="back-body">
                    <? foreach ($pvs as $pv) {?>
                        <?$last_message_info=MessageModel::last_message_info($pv['user_id'])?>
                        <?$count_message=MessageModel::count_message_detail($pv['user_id'])?>

                        <div class="people-message" data-userid="<?=$pv['user_id']?>">
                        <div class="people-inner">
                            <div class="people-img">
                                <img src="<?=$pv['profileImage']?>"/>
                            </div>
                            <div class="name-right2">
                                <span><a href="/user/profile/<?=$pv['username']?>"><?=$pv['screenName']?></a></span><span>@<?=$pv['username']?></span>

                            </div>
                            <div class="msg-box">
                                <?if(!str_contains($last_message_info['message'],"/assets/messageMedia/")){?>
                                    <?=$last_message_info['message']?>
                                <?}?>
                            </div>
                            <?if($count_message['count_message'] > 0){?>
                            <span style=" background: #7fc400;
    padding: 1px 5px;
    border-radius: 7px;
    border: 2px solid #fff;
    color: #fff;
    position: relative;
    right: 90px;
    top: 12px;
    font-size: 10px;"> <?=$count_message['count_message']?></span>

                            <span>
                                <?}?>

					    <?$time=explode(":",explode(" ",  $last_message_info['messageTime'])[1])?>
                                <?=$time[0]?>:<?=$time[1]?>

                            </span>
                        </div>
                    </div>
                    <?}?>
                </div>
            </div>
            <div class="back-footer">

            </div>
        </div>
    </div>
</div>
<!-- POPUP MESSAGES END HERE -->