<html>

<head>
    <title>twitter</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" />
    <link rel="stylesheet" href="/assets/css/style-complete.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<!--Helvetica Neue-->

<body>
    <div class="front-img">
        <img src="/assets/images/bg-entry.png" alt="background">
    </div>

    <div class="wrapper">
        <!-- header wrapper -->
        <div class="header-wrapper">

            <div class="nav-container">
                <!-- Nav -->
                <div class="nav">

                    <div class="nav-left">
                        <ul>
                            <li><i class="fa fa-twitter" aria-hidden="true"></i><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                        </ul>
                    </div><!-- nav left ends-->

                    <!-- <div class="nav-right">
                    <ul>
                        <li><a href="#">Language</a></li>
                    </ul>
                </div>nav right ends -->

                </div><!-- nav ends -->

            </div><!-- nav container ends -->

        </div><!-- header wrapper end -->

        <!---Inner wrapper-->
        <div class="inner-wrapper">
            <!-- main container -->
            <div class="main-container">
                <!-- content left-->
                <div class="content-left">

                    <br />
                </div><!-- content left ends -->

                <!-- content right ends -->
                <div class="content-right">
                    <!-- Log In Section -->
                    <div class="login-wrapper" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
                        <div class="login-div">
                            <form method="post" action="/user/entry">
                                <ul>
                                    <li>
                                        <input type="text" name="email_l" placeholder="Please enter your Email here" />
                                    </li>
                                    <li>
                                        <input style="width: 92%" type="password" name="password_l" placeholder="password" />
                                    </li>
                                    <!-- <li>
                                        <img src="/user/captcha" />
                                        <input style="width: 92%" type="text" name="captcha" placeholder="captcha" />

                                    </li> -->
                                    <li>
                                        <input type="submit" name="login" value="Log in" />
                                    </li>


                                </ul>

                                <? if (isset($error_l)) { ?>
                                    <script>
                                        swal("Log in error!", "<?= $error_l ?>", "error");
                                    </script>
                                <? } ?>

                            </form>
                        </div>


                    </div><!-- log in wrapper end -->

                    <!-- SignUp Section -->
                    <div class="signup-wrapper">


                        <form method="post" action="/user/entry">
                            <div class="signup-div">
                                <h3>Sign up </h3>
                                <ul>
                                    <li>
                                        <input type="text" name="screenName_s" placeholder="Full Name" />
                                    </li>
                                    <li>
                                        <input type="text" name="email_s" placeholder="Email" />
                                    </li>
                                    <li>
                                        <input type="password" name="password_s" placeholder="Password" />
                                    </li>
                                    <li>
                                        <input type="submit" name="signup" Value="Signup for Twitter">
                                    </li>
                                </ul>

                                <? if (isset($error)) { ?>
                                    <script>
                                        swal("Sign Up error!", "<?= $error ?>", "error");
                                    </script>
                                <? } ?>
                            </div>
                        </form>


                    </div>
                    <!-- SIGN UP wrapper end -->

                </div><!-- content right ends -->

            </div><!-- main container end -->

        </div><!-- inner wrapper ends-->
    </div><!-- ends wrapper -->

</body>

</html>