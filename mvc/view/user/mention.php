<? foreach ($suggests as $suggest) {?>
<li>
    <div class="nav-right-down-inner">
        <div class="nav-right-down-left">
            <span><img src="<?=$suggest['profileImage']?>"></span>
        </div>
        <div class="nav-right-down-right">
            <div class="nav-right-down-right-headline">
                <a><?=$suggest['screenName']?></a>
                <span class="getValue">@<?=$suggest['username']?></span>
<!--                <input class="getValue1" type="hidden" value="--><?//=$suggest['username']?><!--">-->
            </div>
        </div>
    </div><!--nav-right-down-inner end-here-->
</li>
<?}?>