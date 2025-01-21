<? foreach ($messages as $message) {?>

<!-- Chat messages-->
<?if($message['messageTo'] == $_SESSION['id']){?>
<!-- Main message BODY RIGHT START -->

        <div class="main-msg-body-left">
            <div class="main-msg-l">
                <div class="msg-img-l">
                    <a href="/user/profile/<?=$message['username']?>"><img src="<?=$message['profileImage']?>"/></a>
                </div>
                <div class="msg-l">

                    <?if(str_contains($message['message'] , '.mp4') or
                        str_contains($message['message'] , '.jpg') or
                        str_contains($message['message'] , '.png') ){?>
                        <? if (str_contains($message['message'] , '.mp4') ){ ?>
                            <!--tweet show head end-->
                            <video width="320" height="240" controls class="imagePopup">
                                <source src="<?=$message['message']?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>

                        <?}else{?>
                            <img  width="320" height="240" src="<?=$message['message']?>" class="imagePopup"/>
                        <?}?>

                    <?}else{?>
                        <?=get_link($message['message'])?>

                    <?}?>

                    <div class="msg-time-l">
                        <?$time=explode(":",explode(" ",  $message['messageTime'])[1])?>
                        <?=$time[0]?>:<?=$time[1]?>
                    </div>
                </div>
                <div class="msg-btn-l">
                    <a><i class="fa fa-ban" aria-hidden="true"></i></a>
                    <a class="deleteMsg" data-msgid="<?=$message['message_id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
<!--Main message BODY RIGHT END-->
<?}else{?>

<!--Main message BODY LEFT START-->
        <div class="main-msg-body-right">
            <div class="main-msg">
                <div class="msg-img">
                    <a href="/user/profile/<?=$message['username']?>"><img src="<?=$message['profileImage']?>"/></a>
                </div>
                <div class="msg">

       <?if(str_contains($message['message'] , '.mp4') or
          str_contains($message['message'] , '.jpg') or
          str_contains($message['message'] , '.png') ){?>
           <? if (str_contains($message['message'] , '.mp4') ){ ?>
               <!--tweet show head end-->
               <video width="320" height="240" controls class="imagePopup">
                   <source src="<?=$message['message']?>" type="video/mp4">
                   Your browser does not support the video tag.
               </video>

           <?}else{?>
               <img  width="320" height="240" src="<?=$message['message']?>" class="imagePopup"/>
           <?}?>

        <?}else{?>
           <?=get_link($message['message'])?>

       <?}?>



                    <div class="msg-time">
                        <?$time=explode(":",explode(" ",  $message['messageTime'])[1])?>
                        <?=$time[0]?>:<?=$time[1]?>
                    </div>
                </div>
                <div class="msg-btn">
                    <a><i class="fa fa-ban" aria-hidden="true"></i></a>
                    <a class="deleteMsg" data-msgid="<?=$message['message_id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
<!--Main message BODY LEFT END-->
<!-- Chat  -->
<?}?>
<?}?>
