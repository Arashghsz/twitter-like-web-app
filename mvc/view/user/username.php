<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">AppDb</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Dr seyed danesh</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Dropdown
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Made by Arash Ghasemzadeh</a>
					</li>
				</ul>
				<!-- <form class="d-flex">
					<input class="form-control me-2" type="search" placeholder="Search Users" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form> -->
				<!-- <div class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Settings
					</a>
					<ul class="dropdown-menu " style="margin-left: -60px !important;" aria-labelledby="navbarDropdown1">
						<li><a class="dropdown-item" href="#"> </a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a class="dropdown-item" href="#">smth</a></li>
						<li><a class="dropdown-item" href="#">smth</a></li>
						<li><a class="dropdown-item" href="/user/logout">Log Out</a></li>
					</ul>
				</div> -->
			</div>
		</div>
	</nav>
    <!-- navbar -->
    <!-- username -->
    <div class="wrapper">
        <!-- nav wrapper -->
        <div class="nav-wrapper">

            <div class="nav-container">
                <div class="nav-second">
                    <ul>
                        <li><a href="#" <i class="fa fa-twitter" aria-hidden="true"></i></a></li>
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
                            <h6>Don't worry, you can always change it later.</h6>
                            <div>
                                <input type="text" name="username" placeholder="Username" />
                            </div>
                            <div>
                                <ul>
                                    <li>
                                        <? if (isset($error)) { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= $error ?>
                                            </div>
                                        <? } ?>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <input type="submit" name="next" value="Next" />
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
    </div>
    <!-- username ends -->

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="/assets/js/index.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>