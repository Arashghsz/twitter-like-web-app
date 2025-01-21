<html>
<head>
    <title>Account settings page</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
    <script src="/assets/js/jquery-3.6.0.min.js" ></script>
    <link rel="stylesheet" href="/assets/css/style-complete.css"/>
</head>
<!--Helvetica Neue-->
<body>
<div class="wrapper">
    <!-- header wrapper -->
    <?
    $data['user_info'] = $user_info;
    $data['count_message'] = $count_message;
    View::render('user/header',$data)?>
    <div class="container-wrap">

        <div class="lefter">
            <div class="inner-lefter">

                <div class="acc-info-wrap">
                    <div class="acc-info-bg">
                        <!-- PROFILE-COVER -->
                        <img src="<?=$user_info['profileCover']?>"/>
                    </div>
                    <div class="acc-info-img">
                        <!-- PROFILE-IMAGE -->
                        <img src="<?=$user_info['profileImage']?>"/>
                    </div>
                    <div class="acc-info-name">
                        <h3><?=$user_info['screenName']?></h3>
                        <span><a href="PROFILE-LINK">@<?=$user_info['username']?></a></span>
                    </div>
                </div><!--Acc info wrap end-->

                <div class="option-box">
                    <ul>
                        <li>
                            <a href="/user/account" class="bold">
                                <div>
                                    Account
                                    <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/user/password">
                                <div>
                                    Password
                                    <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div><!--LEFTER ENDS-->

        <div class="righter">
            <div class="inner-righter">
                <div class="acc">
                    <div class="acc-heading">
                        <h2>Account</h2>
                        <h3>Change your basic account settings.</h3>
                    </div>
                    <div class="acc-content">
                        <form method="POST" action="/user/account">
                            <div class="acc-wrap">
                                <div class="acc-left">
                                    USERNAME
                                </div>
                                <div class="acc-right">
                                    <input type="text" name="edit_username" value="<?=$user_info['username']?>"/>
                                    <span>
                                        <?if(isset($error_username)){?>
									    <span style="color: red">
                                        <?=$error_username?>
								    </span>
                                        <?}?>
								</span>
                                </div>
                            </div>

                            <div class="acc-wrap">
                                <div class="acc-left">
                                    Email
                                </div>
                                <div class="acc-right">
                                    <input type="text" name="edit_email" value="<?=$user_info['email']?>"/>

                                    <?if(isset($error_email)){?>
                                        <span style="color: red">
                                        <?=$error_email?>
								    </span>
                                    <?}?>


                                </div>
                            </div>
                            <div class="acc-wrap">
                                <div class="acc-left">

                                </div>
                                <div class="acc-right">
                                    <input type="Submit" name="submit" value="Save changes"/>
                                </div>
                                <?if(isset($error)){?>
                                <div class="settings-error">
                                        <?=$error?>
                                </div>
                                <?}?>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="content-setting">
                    <div class="content-heading">

                    </div>
                    <div class="content-content">
                        <div class="content-left">

                        </div>
                        <div class="content-right">

                        </div>
                    </div>
                </div>
            </div>
        </div><!--RIGHTER ENDS-->

    </div>
    <!--CONTAINER_WRAP ENDS-->

</div><!-- ends wrapper -->
</body>

</html>

