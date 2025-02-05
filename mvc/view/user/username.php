<!doctype html>
<html>
<head>
    <title>twitter</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
    <link rel="stylesheet" href="/assets/css/style-complete.css"/>
</head>
<!--Helvetica Neue-->
<body>
<div class="wrapper">
    <!-- nav wrapper -->
    <div class="nav-wrapper">

        <div class="nav-container">
            <div class="nav-second">
                <ul>
                    <li><a href="#"<i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                </ul>
            </div><!-- nav second ends-->
        </div><!-- nav container ends -->

    </div><!-- nav wrapper end -->

    <!---Inner wrapper-->
    <div class="inner-wrapper">
        <!-- main container -->
        <div class="main-container">
            <!-- step wrapper-->

            <div class="step-wrapper">
                <div class="step-container">
                    <form method="post" action="/user/username">
                        <h2>Choose a Username</h2>
                        <h4>Don't worry, you can always change it later.</h4>
                        <div>
                            <input type="text" name="usernamee" placeholder="Username"/>
                        </div>
                        <div>
                            <?if(isset($error)){?>
                                <ul>
                                    <li class="error-li" style="margin-top: -5px">
                                        <div class="span-fp-error"><?=$error?></div>
                                    </li>
                                </ul>
                            <?}?>
                        </div>
                        <div>
                            <input type="submit" name="next" value="Next"/>
                        </div>
                    </form>
                </div>
            </div>

            <!-- 	<div class='lets-wrapper'>
                    <div class='step-letsgo'>
                        <h2>We're glad you're here, ScreenName</h2>
                        <p>Tweety is a constantly updating stream of the coolest, most important news, media, sports, TV, conversations and more--all tailored just for you.</p>
                        <br/>
                        <p>
                            Tell us about all the stuff you love and we'll help you get set up.
                        </p>
                        <span>
                            <a href='../home.php' class='backButton'>Let's go!</a>
                        </span>
                    </div>
                </div>
                   -->

        </div><!-- main container end -->

    </div><!-- inner wrapper ends-->
</div><!-- ends wrapper -->

</body>
</html>
