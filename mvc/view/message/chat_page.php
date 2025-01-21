<!-- MESSAGE CHAT START -->
<div class="popup-message-body-wrap">
    <input id="popup-message-tweet" type="checkbox" checked="unchecked"/>
    <input id="message-body" type="checkbox" checked="unchecked"/>
    <div class="wrap3">
        <div class="message-send2">
            <div class="message-header2">
                <div class="message-h-left">
                    <label class="back-messages" for="mass"><i class="fa fa-angle-left" aria-hidden="true"></i></label>
                </div>
                <div class="message-h-cen">
                    <div class="message-head-img">
                        <img src="<?=$user_info['profileImage']?>"/><h4><?=$user_info['screenName']?></h4>
                    </div>
                </div>
                <div class="message-h-right">
                    <label class="close-msgPopup" for="message-body" ><i class="fa fa-times" aria-hidden="true"></i></label>
                </div>
                <div class="message-del">
                    <div class="message-del-inner">
                        <h4>Are you sure you want to delete this message? </h4>
                        <div class="message-del-box">
					<span>
						<button class="cancel" value="Cancel">Cancel</button>
					</span>
                            <span>
						<button class="delete" value="Delete">Delete</button>
					</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-msg-wrap">
                <div id="chat" class="main-msg-inner">

                </div>
            </div>
            <div class="main-msg-footer">
                <div class="main-msg-footer-inner">
                    <ul>
                        <form id="msgpopupForm" method="POST" enctype="multipart/form-data">
                        <li><textarea id="msg" name="msg" placeholder="Write some thing!"></textarea></li>
                        <li><input id="msg-upload" type="file" name="msg-upload" value="upload"/><label for="msg-upload"><i class="fa fa-camera" aria-hidden="true"></i></label></li>
                        <li><input  type="hidden" name="msgTo" value="<?=$user_info['user_id']?>"/></li>
                        <li><input id="send" type="submit" value="Send"/></li>
                        </form>
                    </ul>
                </div>
            </div>
        </div> <!--MASSGAE send ENDS-->
    </div> <!--wrap 3 end-->
</div><!--POP UP message WRAP END-->

<!-- message Chat popup end -->