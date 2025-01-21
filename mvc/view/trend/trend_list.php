<div class="trend-wrapper">
    <div class="trend-inner">
        <div class="trend-title">
            <h3>Trends</h3>
        </div>
        <!-- trend title end-->
   <? for ($i = 0 ; $i< count($trends) ; $i++){?>
        <div class="trend-body">
            <div class="trend-body-content">
                <div class="trend-link">
                    <a href="/trend/hashtag/latest/<?=str_replace('#',"",$trends[$i]['hashtag'])?>"><?=$trends[$i]['hashtag']?></a>
                </div>
                <div class="trend-tweets">
                    <?=$trends[$i]['hashtag_count']?> <span>tweets</span>
                </div>
            </div>
        </div>
    <?}?>

        <!--Trend body end-->

    </div><!--TREND INNER END--></div><!--TRENDS WRAPPER ENDS-->