<div class="header-wrapper">

    <div class="nav-container">
        <!-- Nav -->
        <div class="nav">

            <div class="nav-left">
                <ul>
                    <li><a href="/user/home"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                    <li><a href="/notification/userNotification"><i class="fa fa-bell" aria-hidden="true"></i>
                            Notification</a>
                        <audio id="notificationAudio">
                            <source src="/assets/sound/notification.mp3" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <span id="notifcount">

                       </span>

                    </li>
                    <li id="messagePopup">
                        <i class="fa fa-envelope" aria-hidden="true"></i>Messages
                        <audio id="messageAudio">
                            <source src="/assets/sound/message.mp3" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                       <span id="msgcount">
                             <?if(isset($count_message['count_message']) && $count_message['count_message'] > -1){?>
                                 <span class="span-i">  <?=$count_message['count_message']?></span>
                             <?}?>
                       </span>
                    </li>
                </ul>
            </div><!-- nav left ends-->

            <div class="nav-right">
                <ul>
                    <li>
                        <input type="text" placeholder="Search" class="search" style="outline: none"/>
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <div class="search-result">
                        </div>
                    </li>

                    <li class="hover"><label class="drop-label" for="drop-wrap1"><img src="<?=$user_info['profileImage']?>"/></label>
                        <input type="checkbox" id="drop-wrap1">
                        <div class="drop-wrap">
                            <div class="drop-inner">
                                <ul>
                                    <li><a href="/user/profile/<?=$user_info['username']?>"><?=$user_info['username']?></a></li>
                                    <li><a href="/user/account">Settings</a></li>
                                    <li><a href="/user/logout">Log out</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li><label class="addTweetBtn">Tweet</label></li>
                </ul>
            </div><!-- nav right ends-->

        </div><!-- nav ends -->

    </div><!-- nav container ends -->

</div><!-- header wrapper end -->

<script src="/assets/js/search.js?a"></script>
<script src="/assets/js/tweetPopup.js?b"></script>
<script src="/assets/js/message.js?bv1"></script>
<script src="/assets/js/notification.js?s"></script>