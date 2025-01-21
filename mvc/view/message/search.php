<? foreach ($pvs as $pv) {?>
    <?$last_message_info=MessageModel::last_message_info($pv['user_id'])?>
    <div class="people-message" data-userid="<?=$pv['user_id']?>">
        <div class="people-inner">
            <div class="people-img">
                <img src="<?=$pv['profileImage']?>"/>
            </div>
            <div class="name-right2">
                <span><a href="/user/profile/<?=$pv['username']?>"><?=$pv['screenName']?></a></span><span>@<?=$pv['username']?></span>

            </div>
            <div class="msg-box">
                <?=$last_message_info['message']?>
            </div>

            <span>
            <?if($last_message_info != null){?>
			<?$time=explode(":",explode(" ",  $last_message_info['messageTime'])[1])?>
                <?=$time[0]?>:<?=$time[1]?>
<?}?>
                            </span>
        </div>
    </div>
<?}?>
