<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <!-- login / register -->
    <div class="bg-contact100" style="background-image: url('../../../assets/images/entry/bg-01.jpg');">
        <div class="container-contact100">
            <div class="wrap-contact100" id="loginForm">
                <div class="contact100-pic js-tilt" data-tilt>
                    <img src="/assets/images/entry/login.png" alt="IMG">
                </div>

                <form method="post" action="/user/entry" class="contact100-form validate-form">
                    <span class="contact100-form-title">
                        Log in AppDb
                    </span>
                    <? if (isset($error)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error ?>
                        </div>
                        <? } ?>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="email" name="emailLogin" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="text" name="PasswordLogin" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-contact100-form-btn">
                        <button class="contact100-form-btn mb-2" name="login" type="submit">
                            Login
                        </button>
                        New One?
                        <button class="btn btn-info w-100 rounded mt-2" id="registerClick" type="button">
                            Register here
                        </button>
                    </div>
                </form>
            </div>
            <div class="wrap-contact100" id="registerForm">
                <div class="contact100-pic js-tilt" data-tilt>
                    <img src="/assets/images/entry/register.png" alt="IMG">
                </div>

                <form method="post" action="/user/entry" class="contact100-form validate-form">
                    <span class="contact100-form-title">
                        Register AppDb
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Full Name is required">
                        <input class="input100" type="text" name="screenNameRegister" placeholder="Name">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="emailRegister" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="text" name="PasswordRegister" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-contact100-form-btn">
                        <button class="contact100-form-btn mb-2" name="Register" type="submit">
                            Register
                        </button>
                        One of us?
                        <button class="btn btn-info w-100 rounded mt-2" id="loginClick" type="button">
                            Login here
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- login / register -->


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="/assets/js/index.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>