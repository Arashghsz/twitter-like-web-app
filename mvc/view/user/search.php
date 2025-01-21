<div class="nav-right-down-wrap">
    <ul>
        <? foreach ($records as $record) {?>
        <li>
            <div class="nav-right-down-inner">
                <div class="nav-right-down-left">
                    <a href="/user/profile/<?=$record['username']?>"><img src="<?=$record['profileImage']?>"></a>
                </div>
                <div class="nav-right-down-right">
                    <div class="nav-right-down-right-headline">
                        <a href="/user/profile/<?=$record['username']?>"><?=$record['screenName']?></a><span>@<?=$record['username']?></span>
                    </div>
                    <div class="nav-right-down-right-body">

                    </div>
                </div>
            </div>
        </li>
        <?}?>
    </ul>
</div>
 