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
					<li><a class="dropdown-item" href="/user/logout">Log Out</a></li>

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

	</div><!-- header wrapper end -->
	<!---Inner wrapper-->
	
								<div class="info-in-head">
									<!-- PROFILE-COVER-IMAGE -->
									<img src="<?= $user_info['profileCover'] ?> " alt="profile Cover" />
								</div><!-- info in head end -->
								<div class="info-in-body">
									<div class="in-b-box">
										<div class="in-b-img">
											<!-- PROFILE-IMAGE -->
											<img src="<?= $user_info['profileImage'] ?> " alt="profile photo" />
										</div>
									</div><!--  in b box end-->
									<div class="info-body-name">
										<div class="in-b-name">
											<div><a href="PROFILE-LINK"> <?= $user_info['screenName'] ?> </a></div>
											<span><small><a href="PROFILE-LINK">@<?= $user_info['username'] ?></a></small></span>
										</div><!-- in b name end-->
									</div><!-- info body name end-->
								</div><!-- info in body end-->
								<div class="card p-2 m-1 mt-2" style="width: 18rem;">
									<div class="card-body">
										<h5 class="card-title">Bio</h5>
										<h6 class="card-subtitle mb-2 text-muted">Bio</h6>
										<p class="card-text"><?= $user_info['bio'] ?></p>
									</div>
								</div>
								<div><small><a href="deleteAcc">Delete my account</a></small></div>
								<div><small><a href="username">Change my username</a></small></div>
								<div class="info-in-footer mt-4">
									<div class="number-wrapper">
										<div class="num-box">
											<div class="num-head">
												TWEETS
											</div>
											<div class="num-body">
												0
											</div>
										</div>
										<div class="num-box">
											<div class="num-head">
												FOLLOWING
											</div>
											<div class="num-body">
												<span class="count-following"><?= $user_info['following'] ?></span>
											</div>
										</div>
										<div class="num-box">
											<div class="num-head">
												FOLLOWERS
											</div>
											<div class="num-body">
												<span class="count-followers"><?= $user_info['follower'] ?></span>
											</div>
										</div>
									</div><!-- mumber wrapper-->
								</div><!-- info in footer -->
							</div><!-- info inner end -->
						</div><!-- info box end-->

						<!--==TRENDS==-->
						<!---TRENDS HERE-->
						<!--==TRENDS==-->

					</div><!-- in left wrap-->
				</div><!-- in left end-->
				<div class="in-center">
					<div class="in-center-wrap">
						<!--TWEET WRAPPER-->
						<!-- <div class="tweet-wrap">
							<div class="tweet-inner">
								<div class="tweet-h-left">
									<div class="tweet-h-img">
										<img src="" alt="profile photo"/>
									</div>
								</div>
								<div class="tweet-body">
									<form method="post" enctype="multipart/form-data">
										<textarea class="status" name="status" placeholder="Type Something here!" rows="4" cols="50"></textarea>
										<div class="hash-box">
											<ul>
											</ul>
										</div>
								</div>
								<div class="tweet-footer">
									<div class="t-fo-left">
										<ul>
											<input type="file" name="file" id="file" />
											<li><label for="file"><i class="fa fa-camera" aria-hidden="true"></i></label>
												<span class="tweet-error"></span>
											</li>
										</ul>
									</div>
									<div class="t-fo-right">
										<span id="count">140</span>
										<input type="submit" name="tweet" value="tweet" />
										</form>
									</div>
								</div>
							</div>
						</div> -->
						<!--TWEET WRAP END-->


						<!--Tweet SHOW WRAPPER-->
						<div class="tweets">
							<!--TWEETS HERE-->
						</div>
						<!--TWEETS SHOW WRAPPER-->

						<div class="loading-div">
							<img id="loader" src="assets/images/loading.svg" style="display: none;" />
						</div>
						<div class="popupTweet"></div>
						<!--Tweet END WRAPER-->

					</div><!-- in left wrap-->
				</div><!-- in center end -->

				<div class="in-right">
					<div class="in-right-wrap">

						<!--Who To Follow-->
						<!--WHO_TO_FOLLOW HERE-->
						<!--Who To Follow-->

			

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="/assets/js/index.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>